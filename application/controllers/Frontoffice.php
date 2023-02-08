<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Frontoffice extends CI_Controller {
 
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->model('register_model');
    }
	public function validate_sessions(){
		$valid_session_id = $this->session->has_userdata("id");
		$valid_session_nom = $this->session->has_userdata("nom");
		if($valid_session_id === true && $valid_session_nom === true){
			return true;
		}else{
			return false;
		}
	}
	public function load_view($contents, $title, $data){
		$data_["contents"] = $contents;
		$data_["data"] = $data;
		$data_["title"] = $title;
		$data_["current_user"]["id"] = $this->session->userdata("id");
		$data_["current_user"]["nom"] = $this->session->userdata("nom");
		$this->load->helper("objet_componnent");
		$this->load->view('frontoffice/templates', $data_);
	}
    
    public function register_user(){
        $nom = $this->input->post('nom');
        $mot_de_passe = $this->input->post('mot_de_passe');
        $data = array(
            'nomUtilisateur' => $nom,
            'mdp' => $mot_de_passe
        );
        $this->register_model->insert_data($data);
        $this->index();
    }

    
    public function list_users(){
        $data['users'] = $this->register_model->get_users();
        $this->load->view('users', $data);
    }

    public function validate_credentials(){
        $nom = $this->input->post('nom');
        $mot_de_passe = $this->input->post('mot_de_passe');
     
        $result = $this->register_model->validate_user($nom, $mot_de_passe);
     
        if ($result != 0) {
            $session_data = array(
                'id' => $result["id"],
                'nom' => $result["nom"]
            );
            $this->session->set_userdata($session_data);
            redirect('frontoffice');
        } else {
            $data = array(
                'error' => 'Nom d\'utilisateur ou mot de passe incorrect'
            );
            $this->load->view('frontoffice/login_page', $data);
        }
    }


    public function controller_proposition() {
        $userId = $this->session->userdata('id');
        $data['propositions'] = $this->register_model->getProposition($userId);
        $this->load->view('proposition', $data);
    }

    public function controller_proposition_accepte() {
        $userId = $this->session->userdata('id');
        $data['propositions'] = $this->register_model->getPropositionRefuse($userId);
        $this->load->view('proposition_refuse', $data);
    }

    public function controller_proposition_refuse() {
        $userId = $this->session->userdata('id');
        $data['propositions'] = $this->register_model->getPropositionAccepte($userId);
        $this->load->view('proposition_accepte', $data);
    }


    public function get_object_by_id($id) {
        $data['objects'] = $this->register_model->get_objects_by_id($id);
        $objuser = $this->register_model->get_objects_by_id($this->session->userdata('id'));
        $data['objuser'] = $objuser;
        $this->load->view('objet_par_utilisateur', $data);
    }
        

    public function get_users_by_id($id) {
        $data['objects'] = $this->register_model->get_users_by_id($id);
        $this->load->view('proposition_refuse', $data);
    }

    public function get_object_host() {
        $donnee['objuser'] = $this->register_model->get_objects_by_id($this->session->userdata('id'));
        $this->load->view('objet_par_utilisateur', $donnee);
    }


    public function accept_exchange($id) {
        $echange = $this->register_model->get_exchange_by_id($id);
        $this->register_model->updateEchangeStatus($id, 'accepted');
        $this->register_model->update_owner($echange['idObjetDemandeur'], $echange['accepteurId']);
        $this->register_model->update_owner($echange['idObjetAccepteur'], $echange['demandeurId']);
        $data = array(
            'accepte' => 'echange accepté'
        );
        $this->load->view('notification', $data);
    }
    

    public function declineProposition($id) {
        $this->register_model->updateEchangeStatus($id, 'declined');
        $data = array(
            'refus' => 'echange refusé'
        );
        $this->load->view('notification', $data);
    }


    public function accept($exchangeId){
        if ($this->register_model->acceptExchangeProposal($exchangeId)) {
            $data = array(
                'accepte' => 'echange accepté'
            );
        } else {
            $data = array(
                'accepte' => 'il y a un probleme'
            );
        }
        $this->load->view('notification', $data);
    }

    public function demander_echange() {
        $objet_choisi = $this->input->post('objet_choisi');
        $mon_objet = $this->input->post('mon_objet');
        $proprietaire=$this->input->post('proprietaire_choisi');
        $mon_id=$this->session->userdata('id');
    
        // Enregistrer les informations dans la table "echange" en utilisant votre modèle
        $this->register_model->enregistrer_echange($mon_id, $proprietaire,$mon_objet,$objet_choisi);
    
        // Afficher une page de confirmation ou rediriger vers une autre page
        $this->load->view('confirmation_echange');
    }


    public function home(){
		$data = [];
		$data["recent_uploads"] = $this->register_model->get_recent_objects();
		$data['users'] = $this->register_model->get_users();
		$data['categories_data'] = $this->register_model->get_all_categories_with_objects();
		$this->load_view("frontoffice/Acceuil.php", "Bienvenue dans Takalo", $data);
	}
	
	public function disconnect(){
		$data = ["id", "nom"];
		$this->session->unset_userdata($data);
		redirect('');
	}
	public function index(){
		if($this->validate_sessions()){
			$this->home();
		}else{
			$data["error"] = "Une erreur s'est produite";
			$this->load->view('frontoffice/login_page');
		}
    }
	public function user_me()
	{
		if($this->validate_sessions()){
			$current_user["id"] = $this->session->userdata("id");
			$current_user["nom"] = $this->session->userdata("nom");
			$current_user_objects = $this->register_model->get_objects_by_id($current_user["id"]);
			$data["current_user"] = $current_user;
			$data["current_user_objects"] = $current_user_objects;
			$this->load_view("frontoffice/user", sprintf("%s - Takalo Utilisateur", $current_user["nom"]), $data);
		}else{
			$data["error"] = "Une erreur s'est produite";
			$this->load->view('frontoffice/login_page');
		}
	}
	public function user($id){
		if($this->validate_sessions()){
			$to_use = $this->register_model->get_users_by_id($id)[0];
			$current_user["id"] = $to_use->id;
			$current_user["nom"] = $to_use->nomUtilisateur;
			$current_user_objects = $this->register_model->get_objects_by_id($current_user["id"]);
			$data["current_user"] = $current_user;
			$data["current_user_objects"] = $current_user_objects;
			$this->load_view("frontoffice/user", sprintf("%s - Takalo Utilisateur", $current_user["nom"]), $data);
		}else{
			$data["error"] = "Une erreur s'est produite";
			$this->load->view('frontoffice/login_page');
		}
	}
}



    /*public function envoyerEchange() {
        $data = array(
          'idDemaneur' => $this->input->post('demandeurId'),
          'idAccepteur' => $this->input->post('accepteurId'),
          'idObjDem' => $this->input->post('idObjetDemandeur'),
          'idObjAccept' => $this->input->post('idObjetAccepteur'),
          'status' => $this->input->post('status')
        );
        
        $this->db->insert('echange', $data);
    }
    }*/


