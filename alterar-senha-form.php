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
                    Preencha todos os campos <strong>obrigatórios*</strong> para alterar sua senha.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <?php
		}

		if($_GET["erro"] == "senhaFraca") {
			?>
			<div class="container sticky-top">
				<div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
                    Não foi possivel alterar a senha! Sua senha está fraca. <strong>Utilize letras maiusculas, minusculas, números e caracteres especiais: [a-Z], [0-9], [@!#$&].</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
			<?php
		}

		if($_GET["erro"] == "senhasNaoConferem") {
			?>
			<div class="container sticky-top">
				<div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
                    Não foi possivel alterar a senha! As senhas que você criou <strong>não são iguais.</strong> Tente novamente.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
			<?php
		}

        if($_GET["erro"] == "senhaRepetida") {
			?>
			<div class="container sticky-top">
				<div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
                    Não foi possivel alterar a senha. Sua Nova Senha <strong>não pode ser igual</strong> a Senha Atual. Tente novamente.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			</div>
			<?php
		}

        if($_GET["erro"] == "senhaAtualInvalida") {
			?>
			<div class="container sticky-top">
				<div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
					Não foi possivel alterar a senha, pois a Senha Atual que você digitou <strong>não confere.</strong> Tente novamente.
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
						<img class="img-login mx-auto d-block" src="./img/password.svg" alt="">
					</div>
				</div>
				<div class="row mt-3">
					<form id="alterarSenhaForm" enctype="multipart/form-data" action="altera-senha.php" method="post" novalidate>
						<div class="mb-3">
                            <h5 class="titulo-home">Antes de criar a nova senha:</h5>
                            <label for="inputSenha" class="form-label text-white">Confirme sua Senha Atual *</label>
                            <input type="password" class="form-control" name="senhaAtual" id="senhaAtual" placeholder="Digite sua senha atual">
							<div class="form-text">A senha que está cadastrada atualmente.</div>
						</div>
                        <div class="mb-3 mt-4">
                            <h5 class="titulo-home">Agora vamos criar uma nova senha:</h5>
                            <label for="inputSenha" class="form-label text-white">Nova Senha *</label>
                            <input type="password" class="form-control" name="senhaNova" id="senhaNova" placeholder="Digite sua nova senha" required>
                            <div class="form-text">Crie uma senha segura.</div>
                        </div>
                        <div class="mb-3">
                            <label for="inputSenhaConfirma" class="form-label text-white">Confirme sua Nova Senha *</label>
                            <input type="password" class="form-control" name="senhaConfirmacao" id="senhaConfirmacao" placeholder="Repita sua nova senha" required>
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
    <script type="text/javascript" src="js/alterar-senha-form.js"></script>

<?php include("footer.php"); ?>
