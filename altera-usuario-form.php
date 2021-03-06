<?php 
    include("header.php"); 
    include("conecta.php");
    verificaUsuario();
?>
<title>MeusFilmes - Editar Perfil</title>

<?php 
    $id = $_GET["id"]; 

    if(isset($_GET["alteraUsuario"])) {
        ?>
        <div class="container sticky-top">
            <div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
                Não foi possivel alterar seu perfil. <strong>Tente novamente!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php
	}
	if(isset($_GET["uploadImagemErro"])) {
		if($_GET["uploadImagemErro"] == 0){
			?>
			<div class="container sticky-top">
			<div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
				A imagem não foi cadastrada, <strong>extensão inválida.</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			</div>
			<?php 
		} else {
			if($_GET["uploadImagemErro"] == 1){
				?>
				<div class="container sticky-top">
				<div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
					Arquivo <strong>muito grande.</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				</div>
				<?php 
			} else {
				if($_GET["uploadImagemErro"] == 2){
					?>
					<div class="container sticky-top">
					<div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
						Imagem <strong>não foi</strong> cadastrada com sucesso.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					</div>
					<?php 
				}
			}
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
					<form id="alteraUserForm" enctype="multipart/form-data" action="altera-usuario.php" method="post" novalidate>
						<div class="mb-3">
							<label for="formImagem" class="form-label text-white">Imagem do perfil</label>
							<!-- <input type="hidden" name="MAX_FILE_SIZE" value="5000" /> -->
							<input class="form-control" type="file" name="imagem" id="imagem" accept=".jpg, .png, .jpeg"/> 
							<div class="form-text">(Opcional). Extensões permitidas: png, jpg, jpeg ou se preferir</div>
						</div>
						<div class="mb-3">
							<label for="inputNome" class="form-label text-white">Seu nome</label>
							<input type="text" class="form-control" name="nome" id="nome" aria-describedby="nomeHelp" placeholder="Exemplo: André Luis" required value="<?php echo $_SESSION["nome-usuario"]; ?>">
							<div class="form-text">Seu nome completo, ou apenas o primeiro nome.</div>
						</div>
						<div class="mb-3">
							<label for="inputEmail" class="form-label text-white">Seu email</label>
							<input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="nome@exemplo.com" required value="<?php echo $_SESSION["email-usuario"]; ?>">
						</div>
						<div class="mb-3 text-center">
							<!--	
							<label for="inputSenha" class="form-label text-white">Senha</label>
							 <input type="password" class="form-control" name="senhaNova" id="senhaNova">
							<div class="form-text">(Opcional). Se preferir, deixe o campo em branco, sua senha continuará a mesma que você cadastrou anteriormente.</div>
							-->
							<a class="link-padrao text-decoration-none mt-1" href="alterar-senha-form.php" target="_black">Alterar senha <i class="bi bi-box-arrow-up-right"></i></a>
						</div>
						<div class="d-grid gap-2 col-6 mx-auto mt-3">
							<button id="btnSubmit" class="btn btn-menu" type="submit"><i class="bi bi-check2-square me-2"></i>Salvar</button>
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
