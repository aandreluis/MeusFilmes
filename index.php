<?php
	include("header-simples.php");
	include("logica-usuario.php");
	verificaStatusLogin();
?>
<title>MeusFilmes - Login</title>		

<?php 
	if(isset($_GET["falhaDeSeguranca"])) {
		?>
		<div class="container sticky-top">
			<div id="myAlert" name="alert" class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
				Você está <strong>desconectado</strong> ou <strong>não possui</strong> acesso a essa funcionalidade. <strong>Faça login para continuar.</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		</div>
		<?php
	}

	if(isset($_GET["login"]) && $_GET["login"] == "false") {
		?>
		<div class="container sticky-top">
			<div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
				Email ou senha <strong>invalidos!</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		</div>
		<?php
	}

	if(isset($_GET["logout"])) {
		?>
		<div class="container sticky-top">
			<div class="alert alert-success alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
				Deslogado com <strong>sucesso!</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		</div>
		<?php
	}

	if(isset($_GET["removido"])) {
		?>
		<div class="container sticky-top">
			<div class="alert alert-success alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
				Conta excluida com <strong>sucesso!</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		</div>
		<?php
	}
?>
	<!-- SEÇÃO LOGIN -->
	<section class="mt-5">
		<div class="custom-home-container">
			<div id="login-pg">
				<div class="container">
					<div class="row">
						<img class="img-login mx-auto d-block" src="./img/password.svg" alt="Imagem login">
					</div>
					<div class="row mt-3">
						<form action="login.php" method="post" onsubmit="return checkForm(this);">
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
								<button id="btnSubmit" class="btn btn-menu" type="submit"><i class="bi bi-box-arrow-in-right me-2"></i>Fazer login</button>
								<div class="form-text text-center">
									Não possui uma conta? <br>
									<a  href="usuario-formulario.php" class="link-padrao">Cadastre-se aqui! <i class="bi bi-person-lines-fill"></i></a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section> 
	<!-- SEÇÃO LOGIN -->

    <script type="text/javascript" src="js/validarform.js"></script>
<?php include ("footer.php") ?>