<?php 
    ob_start();
    include("logica-usuario.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
        <!-- favicon -->
		<link rel="apple-touch-icon" sizes="180x180" href="img/favicon-package/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-package/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="img/favicon-package/favicon-16x16.png">
		<link rel="manifest" href="img/favicon-package/site.webmanifest">
		<link rel="mask-icon" href="img/favicon-package/safari-pinned-tab.svg" color="#5b3fbf">
		<meta name="msapplication-TileColor" content="#5b3fbf">
		<meta name="theme-color" content="#5b3fbf">
		<!-- favicon -->
        
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	</head>
	<body>
		<!-- MENU -->
        <nav class="navbar navbar-expand-lg navbar-dark nav-bg">
            <div class="container">
                <a class="navbar-brand" href="index2.php">
                    <img class="d-inline-block align-text-center me-2" width="50px" src="img/logo.png" alt="logo">
                    <h2 class="nav-title d-inline-block align-text-top">MeusFilmes</h2>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a href="index2.php" class="btn btn-menu btn-drop-ini d-flex align-items-center justify-content-center nav-link" style="padding: 10px;">
                                <i class="bi bi-house-door me-2"></i>Início
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="btn btn-menu btn-drop-center nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-collection-play me-2"></i>Filmes
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark-padrao" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item-padrao" href="filmes-formulario.php"><i class="bi bi-plus-square me-2"></i>Adicionar</a></li>
                                <li><a class="dropdown-item-padrao" href="listar-filmes.php?p=1"><i class="bi bi-zoom-in me-2"></i>Listar</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="btn btn-menu btn-drop-center nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-collection me-2"></i>Categorias
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark-padrao" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item-padrao" href="categoria-formulario.php"><i class="bi bi-plus-square me-2"></i>Adicionar</a></li>
                                <li><a class="dropdown-item-padrao" href="listar-categorias.php"><i class="bi bi-zoom-in me-2"></i>Listar</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="btn btn-menu btn-drop-end nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
                                    //se a imagem por null ou não exista no diretorio referenciado
                                if($_SESSION["imagem-usuario"] == NULL || !file_exists("./img/avatar/".$_SESSION["imagem-usuario"])) {
                                    ?>
                                    <img src="img/avatar-default.svg" width="27" height="27" class="rounded-circle" style="object-fit: cover; object-position: center;">
                                    <?php
                                } else {//se existir
                                    ?>
                                    <img src="img/avatar/<?php ob_start(); echo $_SESSION["imagem-usuario"];?>" width="27" height="27" class="rounded-circle" style="object-fit: cover; object-position: center;">
                                    <?php
                                }
                            ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark-padrao" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item-padrao" href="perfil.php"><i class="bi bi-person-square me-2"></i>Perfil</a></li>
                                <li><a class="dropdown-item-padrao" href="altera-usuario-form.php?id=<?php ob_start(); echo $_SESSION["id-usuario"];?>"><i class="bi bi-gear-fill me-2"></i>Configurações</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item-padrao-sair" href="logout.php"><i class="bi bi-box-arrow-left me-2"></i>Sair</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>	
		<!-- MENU -->