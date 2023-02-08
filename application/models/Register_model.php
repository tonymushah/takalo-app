<?php

class Register_model extends CI_Model {
 
    public function __construct(){
        $this->load->database();
    }
 
    public function insert_data($data){
        return $this->db->insert('Utilisateur', $data);
    }
    
    public function get_users(){
        $query = $this->db->get('Utilisateur');
        return $query->result();
    }

    public function login($username, $password){
        $this->db->where('nomUtilisateur', $username);
        $this->db->where('mdp', $password);
 
        $result = $this->db->get('utilisateur');
 
        if ($result->num_rows() == 1) {
            return $result->row(0)->id;
        } else {
            return false;
        }
    }

    public function validate_user($nom, $mot_de_passe){
        $this->db->where('nomUtilisateur', $nom);
        $this->db->where('mdp', $mot_de_passe);
        $query = $this->db->get('Utilisateur');
        if($query->num_rows() == 1){
            $utilisateur=$query->row();
            return array("id" => $utilisateur->id, "nom" => $utilisateur->nomUtilisateur);
        }
        return 0;
    }
    
    public function acceptExchangeProposal($exchangeId)
    {
        $this->db->trans_start();

        $this->db->select('objetId, demandeurId, accepteurId, idObjetDemandeur, idObjetAccepteur');
        $this->db->from('Echange');
        $this->db->where('id', $exchangeId);
        $query = $this->db->get();
        $exchange = $query->row_array();

        $this->db->set('proprietaireId', $exchange['demandeurId']);
        $this->db->where('id', $exchange['idObjetAccepteur']);
        $this->db->update('Objet');

        $this->db->set('proprietaireId', $exchange['accepteurId']);
        $this->db->where('id', $exchange['idObjetDemandeur']);
        $this->db->update('Objet');

        $this->db->set('status', 'accepted');
        $this->db->where('id', $exchangeId);
        $this->db->update('Echange');

        $this->db->trans_complete();

        return $this->db->trans_status();
    }


    /*public function getProposition($userId) {
        $this->db->select('Echange.*, Objet.*, Utilisateur.*');
        $this->db->from('Echange');
        $this->db->join('Objet', 'Echange.objetId = Objet.id');
        $this->db->join('Utilisateur', 'Echange.accepteurId = Utilisateur.id');
        $this->db->where('Echange.accepteurId', $userId);
        $query = $this->db->get();
        return $query->result_array();
    }*/

    public function getProposition($userId) {
        $this->db->select('Echange.*, Objet.nomObjet as nomObjetDemandeur, Objet_2.nomObjet as nomObjetAccepteur, Utilisateur.nomUtilisateur');
        $this->db->from('Echange');
        $this->db->join('Objet', 'Echange.idObjetDemandeur= Objet.id');
        $this->db->join('Objet as Objet_2', 'Echange.idObjetAccepteur= Objet_2.id');
        $this->db->join('Utilisateur', 'Echange.accepteurId = Utilisateur.id');
        $this->db->where('Echange.accepteurId', $userId);
        $this->db->where('Echange.status', 'pending');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_exchange_by_id($id) {
        $this->db->select('*');
        $this->db->from('Echange');
        $this->db->where('id', $id);
        $query = $this->db->get();
    
        return $query->row_array();
    }
    
    
    public function get_objects_by_id($id) {
        $this->db->select('*');
        $this->db->from('Objet');
        $this->db->where('proprietaireId', $id);
        $query = $this->db->get();
    
        return $query->result();
    }

    public function get_users_by_id($id) {
        $this->db->select('*');
        $this->db->from('Utilisateur');
        $this->db->where('id', $id);
        $query = $this->db->get();
    
        return $query->result();
    }

    public function getPropositionAccepte($userId) {
        $this->db->select('Echange.*, Objet.nomObjet as nomObjetDemandeur, Objet_2.nomObjet as nomObjetAccepteur, Utilisateur.nomUtilisateur');
        $this->db->from('Echange');
        $this->db->join('Objet', 'Echange.idObjetDemandeur= Objet.id');
        $this->db->join('Objet as Objet_2', 'Echange.idObjetAccepteur= Objet_2.id');
        $this->db->join('Utilisateur', 'Echange.accepteurId = Utilisateur.id');
        $this->db->where('Echange.accepteurId', $userId);
        $this->db->where('Echange.status', 'accepted');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPropositionRefuse($userId) {
        $this->db->select('Echange.*, Objet.nomObjet as nomObjetDemandeur, Objet_2.nomObjet as nomObjetAccepteur, Utilisateur.nomUtilisateur');
        $this->db->from('Echange');
        $this->db->join('Objet', 'Echange.idObjetDemandeur= Objet.id');
        $this->db->join('Objet as Objet_2', 'Echange.idObjetAccepteur= Objet_2.id');
        $this->db->join('Utilisateur', 'Utilisateur.id= Echange.demandeurId');
        $this->db->where('Echange.accepteurId', $userId);
        $this->db->where('Echange.status', 'declined');
        $query = $this->db->get();
        return $query->result_array();
    }
	public function get_recent_objects($limit = null){
		if($limit == null){
			$query = $this->db->query("select Objet.id as idObjet, nomObjet, description, proprietaireId as idUtilisateur, nomUtilisateur from Objet join Utilisateur on Objet.proprietaireId = Utilisateur.id order by idObjet desc");
		}else{
			$query = $this->db->query(sprintf("select Objet.id as idObjet, nomObjet, description, proprietaireId as idUtilisateur, nomUtilisateur from Objet join Utilisateur on Objet.proprietaireId = Utilisateur.id order by idObjet desc limit %d"), $limit);
		}
		
		$result = [];
		$i = 0;
		foreach ($query->result() as $row) {
			$result[$i]["id"] = $row->idObjet;
			$result[$i]["nom"] = $row->nomObjet;
			$result[$i]["description"] = $row->description;
			$result[$i]["proprietaire"] = array(
				"id" => $row->idUtilisateur,
				"nom" => $row->nomUtilisateur
			);
			$i++;
		}
		return $result;
	}
	public function get_recent_objects_by_category($idCategory, $limit=null){
		if($limit == null){
			$query = $this->db->query(sprintf("select Objet.id as idObjet, nomObjet, description, proprietaireId as idUtilisateur, nomUtilisateur from Objet join Utilisateur on Objet.proprietaireId = Utilisateur.id where idCategory=%d order by idObjet desc ", $idCategory));
		}else{
			$query = $this->db->query(sprintf("select Objet.id as idObjet, nomObjet, description, proprietaireId as idUtilisateur, nomUtilisateur from Objet join Utilisateur on Objet.proprietaireId = Utilisateur.id where idCategory=%d order by idObjet desc limit %d", $idCategory, $limit));
		}
		
		$result = [];
		$i = 0;
		foreach ($query->result() as $row) {
			$result[$i]["id"] = $row->idObjet;
			$result[$i]["nom"] = $row->nomObjet;
			$result[$i]["description"] = $row->description;
			$result[$i]["proprietaire"] = array(
				"id" => $row->idUtilisateur,
				"nom" => $row->nomUtilisateur
			);
			$i++;
		}
		return $result;
	}
    public function enregistrer_echange($demandeur_id, $accepteur_id,$id_objet_demandeur,$id_objet_accepteur) {
        $data = array(
            'demandeurId' => $demandeur_id,
            'accepteurId' => $accepteur_id,
            'idObjetDemandeur' => $id_objet_demandeur,
            'idObjetAccepteur' => $id_objet_accepteur,
            'status' => 'pending'
        );
        $this->db->insert('echange', $data);
    }
    public function get_all_categories(){
		$query = $this->db->query("select * from Category");
		$result = [];
		foreach ($query->result() as $row) {
			$result[] = $row;
		}
		return $result;
	}
	public function get_all_categories_with_objects(){
		$all_category = $this->get_all_categories();
		$result = [];
		$i = 0;
		foreach ($all_category as $row) {
			$result[$i]["nom_categorie"] = $row->nom;
			$result[$i]["objets"] = $this->get_recent_objects_by_category($row->id);
			$i++;
		}
		return $result;
	}
}
