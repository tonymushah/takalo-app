<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php
		echo $title;
	?></title>
	<link rel="stylesheet" href="/assets/bootstrap-5.2.3-dist/css/bootstrap.css" />
	<link rel="stylesheet" href="/assets/MDB5-STANDARD/css/mdb.min.css" />
	<script src="/assets/bootstrap-5.2.3-dist/js/bootstrap.js"></script>
    <link rel="stylesheet" href="/assets/css/fronoffice/sidebar.css"/>
    <link rel="stylesheet" href="/assets/fontawesome-free-6.2.1-web/css/all.css"/>
	<script src="/assets/fontawesome-free-6.2.1-web/js/all.js"></script>
	<script src="/assets/MDB5-STANDARD/js/mdb.min.js"></script>
</head>
<body>
	<header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse collapse-horizontal bg-white">
        <div class="">
            <div class="list-group list-group-flush mx-3 mt-4">
                <button
                    class="list-group-item list-group-item-action py-2 navbar-toggler"
                    data-mdb-toggle="collapse"
                    data-mdb-target="#sidebarMenu"
                    aria-controls="sidebarMenu"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                    >
                    <i class="fas fa-bars"></i>
                </button>
               
                <a
                    href="<?php
						echo base_url();
					?>"
                    class="list-group-item list-group-item-action py-2 "
                    aria-current="true"
                    >
                    <i class="fas fa-home fa-fw me-3"></i><span>Accueil</span>
                </a>
				<a href="<?php
						echo base_url("frontoffice/user_me");
					?>" class="list-group-item list-group-item-action py-2">
                    <i class="fas fa-user fa-fw me-3"></i><span><?php
						echo $current_user["nom"];
					?></span>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-2">
                    <i class="fas fa-users fa-fw me-3"></i><span>Utilisateurs</span>
                </a>
				
                <a href="#" class="list-group-item list-group-item-action py-2">
					<i class="fas fa-inbox fa-fw me-3"></i><span>Liste des demandes recues</span>
				</a>
				<a href="#" class="list-group-item list-group-item-action py-2">
					<i class="fas fa-clock fa-fw me-3"></i><span>Liste des demandes envoye</span>
				</a>
				<a href="#" class="list-group-item list-group-item-action py-2">
					<i class="fas fa-mail-bulk fa-fw me-3"></i><span>Liste des echanges</span>
				</a>
				<a href="<?php echo base_url('/frontoffice/disconnect');?>" class="list-group-item list-group-item-action text-danger py-2">
					<i class="fas fa-external-link fa-fw me-3"></i><span>Se deconnecter</span>
				</a>
            </div>
        </div>
    </nav>
    <!-- Sidebar -->
</header>
<main>
