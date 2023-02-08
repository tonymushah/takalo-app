<?php
	$this->load->view("frontoffice/templates/sidebar", array("title" => $title, "current_user" => $current_user));
	$this->load->view($contents, $data);
	$this->load->view("frontoffice/templates/footer");
?>
