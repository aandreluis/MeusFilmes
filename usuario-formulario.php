<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
		<title>MeusFilmes - Novo Cadastro</title>
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

    if(isset($_GET["cadastrarUsuario"])) {
        ?>
        <div class="container sticky-top">
			<div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
				Não foi possivel realizar o cadastro. <strong>Tente novamente!</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		</div>
    <?php
	}

	if(isset($_GET["emailInvalido"])) {
		?>
		<div class="container sticky-top">
            <div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
            	Este email invalido ou já cadastrado. <strong>Tente um novamente!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
		
	<?php
	}

	if(isset($_GET["senhaInvalida"])) {
		?>
		<div class="container sticky-top">
            <div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
				Senha invalida. <strong>Tente uma nova senha!</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
		
	<?php
	}

	if(isset($_GET["senhasNaoConferem"])) {
		?>
		<div class="container sticky-top">
            <div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
				As senhas que você digitou não conferem. <strong>Tente novamente!</strong>
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
						  <img class="img-login mx-auto d-block" src="./img/insert.svg" alt="">
						</div>
						<div class="row mt-3">
							<form action="adiciona-usuario.php" method="post">
                           		<div class="mb-3">
								  <label for="inputNome" class="form-label text-white">Seu nome</label>
								  <input type="text" class="form-control" name="nome" aria-describedby="nomeHelp" placeholder="Exemplo: André Luis" required>
								  <div class="form-text">Seu nome completo, ou apenas o primeiro nome.</div>
								</div>
								<div class="mb-3">
								  <label for="inputEmail" class="form-label text-white">Seu email</label>
								  <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="nome@exemplo.com" required>
								  <div class="form-text">Nunca compartilharemos seu e-mail.</div>
								</div>
								<div class="mb-3">
								  <label for="inputSenha" class="form-label text-white">Crie uma senha</label>
								  <input type="password" class="form-control" name="senha" placeholder="Crie uma senha forte" required>
								  <div class="form-text">Utilize letras maiusculas, minusculas, números e caracteres especiais, exemplo: ("@!#$&).</div>
								</div>
								<div class="mb-3">
								  <label for="inputSenhaConfirma" class="form-label text-white">Confirme sua senha</label>
								  <input type="password" class="form-control" name="senhaConfirmacao" placeholder="Repita sua senha" required>
								  <div class="form-text">Confirme sua senha para finalizar o cadastro.</div>
								</div>
								<div class="d-grid gap-2 col-6 mx-auto mt-3">
									<button class="btn btn-menu" type="submit"><i class="bi bi-person-check-fill me-2"></i>Cadastrar</button>
								</div>
								<div class="form-text text-center">
									Já possui uma conta? <br>
									<a  href="index.php" class="link-padrao">Fazer login <i class="bi bi-box-arrow-in-right"></i></a>
								</div>
							  </form>
						</div>
					  </div>
				</div>
			</div>
		  </section> 
		<!-- Seção inicio -->


<?php include ("footer.php") ?>