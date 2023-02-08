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
						base_url();
					?>"
                    class="list-group-item list-group-item-action py-2 "
                    aria-current="true"
                    >
                    <i class="fas fa-home fa-fw me-3"></i><span>Accueil</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-2">
                    <i class="fas fa-users fa-fw me-3"></i><span>Client</span>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-2"
                   ><i class="fas fa-warehouse fa-fw me-3"></i><span>Stock</span></a
                >
                <a href="#" class="list-group-item list-group-item-action py-2"
                   ><i class="fas fa-chart-line fa-fw me-3"></i><span>Recette</span></a
                >
                <a href="#" class="list-group-item list-group-item-action py-2"
                   ><i class="fas fa-balance-scale fa-fw me-3"></i><span>Commission</span></a
                >
                <a href="#" class="list-group-item list-group-item-action py-2"
                   ><i class="fas fa-store fa-fw me-3"></i><span>Boutiques</span></a
                >
                <a href="#" class="list-group-item list-group-item-action py-2"
                   ><i class="fas fa-mail-bulk fa-fw me-3"></i><span>Factures</span></a
                >
            </div>
        </div>
    </nav>
    <!-- Sidebar -->
</header>
<main>
