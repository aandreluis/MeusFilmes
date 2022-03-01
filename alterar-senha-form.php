<?php 
    include("header.php"); 
    include("conecta.php");
    verificaUsuario();
?>
<title>MeusFilmes - Editar Perfil</title>

<?php 
    if(isset($_GET["alterarSenha"])) {
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

		if($_GET["erro"] == "senhaFraca") {
			?>
			<div class="container sticky-top">
				<div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
                    Senha fraca. Utilize letras maiusculas, minusculas, números e caracteres especiais: [a-Z], [0-9], [@!#$&]. Tente novamente.
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

        if($_GET["erro"] == "senhaRepetida") {
			?>
			<div class="container sticky-top">
				<div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
					Sua nova senha não pode ser igual a atual. Tente novamente.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
			<?php
		}

        if($_GET["erro"] == "senhaAtualInvalida") {
			?>
			<div class="container sticky-top">
				<div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
					Senha atual <strong>não confe.</strong> Tente novamente.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
			<?php
		}
	}
?>
	<!-- SEÇÃO ALTERAR USUARIOS -->
	<section class="mt-5">
		<div class="custom-home-container">
			<div id="login-pg">
				<div class="container">
					<div class="row">
						<?php
						// se a imagem por null ou não exista no diretorio referenciado
						if($_SESSION["imagem-usuario"] == NULL || !file_exists("./img/avatar/".$_SESSION["imagem-usuario"])) {
							?>
							<img class="mx-auto d-block avatar" src="img/avatar-default.svg" alt="Imagem do perfil">
							<?php
						} else {//se existir
							?>
							<img class="mx-auto d-block avatar" src="img/avatar/<?php echo $_SESSION["imagem-usuario"]; ?>" alt="Imagem do perfil">
							<a class="link-padrao text-decoration-none text-center mt-1" href="remove-imagem.php">Remover imagem <i class="bi bi-trash-fill"></i></a>
							<?php
						}
						?>
					</div>
				</div>
				<div class="row mt-2">
					<form id="alteraSenhaUserForm" enctype="multipart/form-data" action="altera-senha.php" method="post" novalidate>
						<div class="mb-3">
                            <label for="inputSenha" class="form-label text-white">Confirme sua senha atual</label>
                            <input type="password" class="form-control" name="senhaAtual" id="senhaAtual" placeholder="Senha que você usou para fazer login">
							<div class="form-text">A senha que está cadastrada atualmente.</div>
						</div>
                        <div class="mb-3 mt-5">
                            <label for="inputSenha" class="form-label text-white">Crie uma nova senha</label>
                            <input type="password" class="form-control" name="senhaNova" id="senhaNova" placeholder="Crie uma senha forte" required>
                            <div class="form-text">Crie uma senha segura.</div>
                        </div>
                        <div class="mb-3">
                            <label for="inputSenhaConfirma" class="form-label text-white">Confirme sua senha</label>
                            <input type="password" class="form-control" name="senhaConfirmacao" id="senhaConfirmacao" placeholder="Repita sua senha" required>
                            <div class="form-text">Confirme sua senha para finalizar.</div>
                        </div>
						
						<div class="d-grid gap-2 col-6 mx-auto mt-3">
							<button id="btnSubmit" class="btn btn-menu" type="submit"><i class="bi bi-check2-square me-2"></i>Alterar</button>
						</div>
						<div class="form-text text-center">
							ou <br> 
							<a  href="perfil.php" class="link-padrao">Voltar para o meu perfil <i class="bi bi-person-square"></i></a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section> 
	<!-- SEÇÃO ALTERA-USUARIOS -->
	
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
    <script type="text/javascript" src="js/altera-usuario-form.js"></script>

<?php include("footer.php"); ?>
