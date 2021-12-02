<?php 
	include("header.php");
    verificaUsuario();
?>

<?php 
		if(isset($_GET["login"]) && $_GET["login"] == "true") {
			?>
			<div class="container sticky-top">
			<div class="alert alert-success alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 30%;" role="alert">
				Login realizado com <strong>sucesso!</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
				</div>
			<?php
		}
	
?>

<?php 
        if(usuarioEstaLogado()) {
            ?>
            <p class="text-success">Você está logado como <?php echo $_SESSION["usuario_logado"]; ?> </p>
            <a href="logout.php" class="btn btn-danger">Sair</a>
            <?php
        }
    
?>

    <!-- Seção inicio -->
		<section class="mt-5">
			<div class="custom-home-container">
				<div id="home-pg">
					<div class="row">
						<div class="col-md-6">
							<img class="img-home mx-auto d-block" src="img/home-cinema.svg" alt="Cinema em casa">
						</div>
						<div class="col-md-6">
							<h1 class="titulo-home">Sobre o MeusFilmes</h1>
							<p class="paragrafo-home mx-auto">
								No <b>MeusFilmes</b> você poderá listar todos os filmes que já assitiu, ou os que ainda vai assistir! <br>
								- Adicione: <b>titulo, descrição, data de lançamento, categorias, entre outras informações!</b>
							 </p>
							<h3 class="titulo-home">Confira os filmes já cadastrados ou adicione novos filmes</h3>
							<br>
                            <div class="row d-flex align-items-center">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a href="filmes-formulario.php" class="btn btn-menu btn-lg" type="button">Adicionar</a>
                                </div>
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a href="listar-filmes.php" class="btn btn-menu btn-lg" type="button">Listar</a>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		  </section> 
		<!-- Seção inicio -->
<?php include("footer.php"); ?>
