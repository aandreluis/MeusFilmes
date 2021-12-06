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

    if(isset($_GET["cadastrarUsuario"])) {
        ?>
        <div class="container sticky-top">
            <div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 30%;" role="alert">
                Não foi possivel realizar o cadastro. <strong>Tente novamente!</strong>
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
							<form action="adiciona-usuario.php" method="post">
                            <div class="mb-3">
								  <label for="inputNome" class="form-label text-white">Seu nome</label>
								  <input type="text" class="form-control" name="nome" aria-describedby="nomeHelp">
								</div>
								<div class="mb-3">
								  <label for="inputEmail" class="form-label text-white">Seu email</label>
								  <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
								  <div id="emailHelp" class="form-text">Nunca compartilharemos seu e-mail.</div>
								</div>
								<div class="mb-3">
								  <label for="inputSenha" class="form-label text-white">Crie uma senha</label>
								  <input type="password" class="form-control" name="senha">
								</div>
								<div class="d-grid gap-2 col-6 mx-auto mt-5">
									<button class="btn btn-menu" type="submit">Cadastrar</button>
								</div>
							  </form>
						</div>
					  </div>
				</div>
			</div>
		  </section> 
		<!-- Seção inicio -->


<?php include ("footer.php") ?>