<title>MeusFilmes - Adicionar Categorias</title>
<?php 
    include("header.php"); 
    include("conecta.php");
    verificaUsuario();
?>

<?php 
    $id = $_GET["id"];
    //$categoria = buscaCategoria($conexao, $id);
?>

<?php 

    if(isset($_GET["alteraUsuario"])) {
        ?>
        <div class="container sticky-top">
            <div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 30%;" role="alert">
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
			<div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 30%;" role="alert">
				A imagem não foi cadastrada, extensão inválida.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			</div>
			<?php 
		} else {
			if($_GET["uploadImagemErro"] == 1){
				?>
				<div class="container sticky-top">
				<div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 30%;" role="alert">
					Arquivo muito grande.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				</div>
				<?php 
			} else {
				if($_GET["uploadImagemErro"] == 2){
					?>
					<div class="container sticky-top">
					<div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 30%;" role="alert">
						Imagem não foi cadastrada com Sucesso.
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					</div>
					<?php 
				}
			}
		}
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
							<form enctype="multipart/form-data" action="altera-usuario.php" method="post">
								<div class="mb-3">
								<label for="formImagem" class="form-label text-white">Imagem do perfil</label>
								<input type="hidden" name="MAX_FILE_SIZE" value="99999999" />
								<input class="form-control" type="file" name="imagem"/>
								</div>
                            	<div class="mb-3">
								  <label for="inputNome" class="form-label text-white">Seu nome</label>
								  <input type="text" class="form-control" name="nome" aria-describedby="nomeHelp" value="<?php echo $_SESSION["nome-usuario"]; ?>">
								</div>
								<div class="mb-3">
								  <label for="inputEmail" class="form-label text-white">Seu email</label>
								  <input type="email" class="form-control" name="email" aria-describedby="emailHelp" value="<?php echo $_SESSION["email-usuario"]; ?>">
								</div>
								<div class="mb-3">
								  <label for="inputSenha" class="form-label text-white">Senha antiga ou nova senha</label>
								  <input type="password" class="form-control" name="senha" placeholder="Digite sua senha ou crie uma nova">
								</div>
                                <input type="hidden" name="id" value="<?php echo $_SESSION["id-usuario"];?>">
								<div class="d-grid gap-2 col-6 mx-auto mt-5">
									<button class="btn btn-menu" type="submit">Salvar</button>
								</div>
							  </form>
						</div>
					  </div>
				</div>
			</div>
		  </section> 
		<!-- Seção inicio -->

<?php include("footer.php"); ?>
