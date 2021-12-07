<?php 
    include("logica-usuario.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
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
                <a class="navbar-brand" href="index.php">
                    <img class="d-inline-block align-text-center me-2" width="50" src="img/logo.png" alt="logo">
                    <h2 class="nav-title d-inline-block align-text-top">MeusFilmes</h2>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <div class="btn-group me-3">
                        <a href="index2.php" class="btn btn-menu">Início</a>
                        <div class="dropdown">
                            <button class="btn btn-menu btn-drop-center dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Filmes
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                <li><a class="dropdown-item active" href="filmes-formulario.php">Adicionar</a></li>
                                <li><a class="dropdown-item" href="listar-filmes.php">Listar</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-menu btn-drop-center dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categorias
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                <li><a class="dropdown-item active" href="categoria-formulario.php">Adicionar</a></li>
                                <li><a class="dropdown-item" href="listar-categorias.php">Listar</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="btn btn-menu btn-drop-end dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo $_SESSION["nome-usuario"]; ?> <i class="bi bi-person-circle"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                <li><a class="dropdown-item active" href="perfil.php">Perfil</a></li>
                                <li><a class="dropdown-item" href="listar-usuarios.php">Usuários</a></li>
                                <li><a class="dropdown-item" href="logout.php">Sair</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>	
		<!-- MENU -->