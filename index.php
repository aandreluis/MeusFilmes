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
		<title>CarRent - Login</title>
	</head>
	<body>
		

		<!-- Seção inicio -->
		<section class="mt-5">
			<div class="custom-home-container">
				<div id="login-pg">
					<div class="container">
                        <?php 
                            if(isset($_GET["login"]) && $_GET["login"] == "false") {
                                ?>
                                <p class="alert alert-danger">ERRO</p>
                                <?php
                            }
                        
                        ?>
						<div class="row">
						  <img class="img-login mx-auto d-block" src="/img/password.svg" alt="">
						</div>
						<div class="row mt-3">
							<form action="login.php" method="post">
								<div class="mb-3">
								  <label for="inputEmail" class="form-label">Seu email</label>
								  <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
								  <div id="emailHelp" class="form-text">Nunca compartilharemos seu e-mail.</div>
								</div>
								<div class="mb-3">
								  <label for="inputPassword1" class="form-label">Sua senha</label>
								  <input type="password" class="form-control" name="password">
								</div>
					
								<div class="d-grid gap-2 col-6 mx-auto">
									<button class="btn btn-menu" type="submit">Fazer login</button>
								</div>
							  </form>
						</div>
					  </div>
				</div>
			</div>
		  </section> 
		<!-- Seção inicio -->


<?php include ("footer.php") ?>