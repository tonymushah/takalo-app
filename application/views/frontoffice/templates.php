<?php
	$this->load->view("frontoffice/templates/sidebar", array("title" => $title));
	$this->load->view($contents, $data);
	$this->load->view("frontoffice/templates/footer");
?>
