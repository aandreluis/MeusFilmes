<?php
	include("header-simples.php");
?>
<title>MeusFilmes - Novo Cadastro</title>

<?php 
    if(isset($_GET["cadastrarUsuario"])) {
        ?>
        <div class="container sticky-top">
			<div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
				Não foi possivel realizar o cadastro. <strong>Tente novamente.</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		</div>
    	<?php
	}

	if(isset($_GET["erro"])) {
        if($_GET["erro"] == "camposVazios"){
            ?>
            <div class="container sticky-top">
                <div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
                    Preencha todos os campos <strong>obrigatórios*</strong> para realizar o cadastro.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <?php
		}

		if($_GET["erro"] == "emailInvalido") {
			?>
			<div class="container sticky-top">
				<div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
					Este email é <strong>invalido</strong> ou <strong>já foi cadastrado.</strong> Tente novamente.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
			<?php
		}

		if($_GET["erro"] == "senhasNaoConferem") {
			?>
			<div class="container sticky-top">
				<div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
					As senhas que você digitou <strong>não conferem.</strong> Tente novamente.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
			<?php
		}
	}
?>
	<!-- SEÇÃO CADASTRO DE USUÁRIOS -->
	<section class="mt-5">
		<div class="custom-home-container">
			<div id="login-pg">
				<div class="container">
					<div class="row">
						<img class="img-login mx-auto d-block" src="./img/insert.svg" alt="">
					</div>
					<div class="row mt-3">
						<form action="adiciona-usuario.php" method="post" onsubmit="return checkForm(this);">
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
								<button id="btnSubmit" class="btn btn-menu" type="submit"><i class="bi bi-person-check-fill me-2"></i>Cadastrar</button>
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
	<!-- SEÇÃO CADASTRO DE USUÁRIOS -->

    <script type="text/javascript" src="js/validarform.js"></script>
<?php include ("footer.php") ?>