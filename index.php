<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<!-- favicon -->
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
		<link rel="manifest" href="/site.webmanifest">
		<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
		<meta name="msapplication-TileColor" content="#da532c">
		<meta name="theme-color" content="#ffffff">
		<!-- favicon -->

		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
		<title>MeusFilmes - Login</title>
	</head>
	<body>
		<!-- MENU -->
        <nav class="navbar navbar-expand-lg navbar-dark nav-bg">
            <div class="container justify-content-center">
                <a class="navbar-brand" href="index.php">
                    <img class="d-inline-block align-text-center me-2" width="50" src="img/logo.png" alt="logo">
                    <h2 class="nav-title d-inline-block align-text-top">MeusFilmes</h2>
                </a>
            </div>
        </nav>	
		<!-- MENU -->
		
	<?php 

		if(isset($_GET["falhaDeSeguranca"])) {
			?>
			<div class="container sticky-top">
				<div id="alert" class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 30%;" role="alert">
					Você não tem acesso a esta funcionalidade. <strong>Favor fazer login.</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
			<?php
		}

		if(isset($_GET["login"]) && $_GET["login"] == "false") {
			?>
			<div class="container sticky-top">
			<div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 30%;" role="alert">
				Email ou senha <strong>invalidos!</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
				</div>
			<?php
		}

		if(isset($_GET["logout"])) {
			?>
			<div class="container sticky-top">
				<div class="alert alert-success alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 30%;" role="alert">
					Deslogado com <strong>sucesso!</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
			<?php
		}

		if(isset($_GET["removido"])) {
			?>
			<div class="container sticky-top">
				<div class="alert alert-success alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 30%;" role="alert">
					Conta excluida com <strong>sucesso!</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
			<?php
		}

	?>
		<!-- Seção inicio -->
		<section class="mt-5">
			<div class="custom-home-container">
				<div id="login-pg">
					<div class="container">
						<div class="row">
						  <img class="img-login mx-auto d-block" src="./img/password.svg" alt="">
						</div>
						<div class="row mt-3">
							<form action="login.php" method="post">
								<div class="mb-3">
								  <label for="inputEmail" class="form-label text-white">Seu email</label>
								  <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="nome@exemplo.com" autofocus required>
								  <div class="form-text">Nunca compartilharemos seu e-mail.</div>
								</div>
								<div class="mb-3">
									<label for="inputSenha" class="form-label text-white">Sua senha</label>
									<input type="password" class="form-control" name="senha" placeholder="Digite sua senha" required>
									<div class="form-text">Não compartilhe sua senha com ninguem.</div>

								</div>
								<div class="d-grid gap-2 col-6 mx-auto mt-3">
									<button class="btn btn-menu" type="submit">Fazer login</button>
									<div class="form-text text-center">
										Não possui uma conta? 
										<a  href="usuario-formulario.php" class="link-padrao">Cadastre-se aqui!</a>
									</div>
								</div>
							  </form>
						</div>
					  </div>
				</div>
			</div>
		  </section> 
		<!-- Seção inicio -->


<?php include ("footer.php") ?>