<title>MeusFilmes - Adicionar Filmes</title>
<?php 
    include("header.php"); 
    include("conecta.php");
    include("banco-filmes.php");
    include("banco-categorias.php");
    verificaUsuario();
?>

<?php 
    $categorias = listaCategoriasUsuario($conexao, $_SESSION["id-usuario"], 1);
?>

<?php 

    if (isset($_GET["add"])) {
        ?>
            <div class="container sticky-top">
                <div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
                    O filme <strong>não</strong> foi cadastrado!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php
    }

    if (isset($_GET["alterado"])) {
        ?>
             <div class="container sticky-top">
                <div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
                    O filme <strong>não</strong> foi alterado!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php
    }

    if(isset($_GET["camposVazios"])) {
		?>
		<div class="container sticky-top">
            <div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
            	Preencha todos os campos <strong>obrigatórios*</strong> para adicionar o filme.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
		
	<?php
	}

    //erros upload da imagem
    if(isset($_GET["uploadImagemErro"])) {
		if($_GET["uploadImagemErro"] == 0){
			?>
			<div class="container sticky-top">
			<div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
                Não foi possível cadastrar o filme, pois a imagem da capa possui <strong>extensão inválida.</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			</div>
			<?php 
		} else {
			if($_GET["uploadImagemErro"] == 1){
				?>
				<div class="container sticky-top">
				<div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
					Não foi possível cadastrar o filme, pois a imagem da capa é <strong>muito grande.</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				</div>
				<?php 
			} else {
				if($_GET["uploadImagemErro"] == 2){
					?>
					<div class="container sticky-top">
					<div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
                    Não foi possível cadastrar o filme, pois a imagem da capa <strong>não foi cadastrada com sucesso.</strong>
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>
					</div>
					<?php 
				}
			}
		}
	}
    //erros upload da imagem

?>

<!-- Seção inicio -->
    <section class="mt-5">
        <div class="custom-home-container">
            <div id="home-pg">
                <div class="row">
                    <div class="col-md-6 d-flex">
                        <img class="img-home mx-auto d-block" src="img/create.svg" alt="Cinema em casa">
                    </div>

                    <div class="col-md-6">
                    <h1 class="titulo-home">Cadastrar Filme</h1>
                        <form class="row g-3 text-white mt-2" enctype="multipart/form-data" action="adiciona-filme.php" method="post">
                            <div class="col-md-6">
                                <label for="inputNome" class="form-label">Nome *</label>
                                <input type="text" class="form-control" name="nome" placeholder="Nome do filme" autofocus>
                            </div>
                            <div class="col-md-6">
                                <label for="inputDiretor" class="form-label">Diretor *</label>
                                <input type="text" class="form-control" name="diretor" placeholder="Nome do diretor">
                            </div>
                            <div class="col-12">
                                <label for="inputDescricao" class="form-label">Descrição *</label>
                                <textarea id="descricao" style="resize: none; height: 100px;" class="form-control" name="descricao"  maxlength="200" placeholder="Uma breve descrição sobre o filme"></textarea>                                
                                <div class="form-text" id="falta">Cuidado com o limite de caracteres! Faltam: <strong>200</strong> caracteres. <i class="bi bi-exclamation-circle"></i></div>
                            </div>
                            <div class="col-md-12">
                                <label for="formFile" class="form-label">Imagem da capa</label>
                                <input class="form-control" type="file" name="imagem" accept=".jpg, .png, .jpeg">
                                <div class="form-text">(Opcional). Extensões permitidas: png, jpg, jpeg</div>
                            </div>
                            <div class="col-md-4">
                                <label for="inputDuracao" class="form-label">Duração *</label>
                                <input type="time" class="form-control" name="duracao" placeholder="Duração do filme">
                            </div>
                            <div class="col-md-8">
                                <label for="inputData" class="form-label">Data de lançamento *</label>
                                <input type="date" class="form-control" name="data_lancamento">
                            </div>
                            <div class="col-12">
                                <label for="categoria" class="form-label">Categoria * +<a href="categoria-formulario.php" class="link-padrao ms-1">Adicionar Categoria</a></label>
                                <select name="categoria_id" class="form-select">
                                    <!-- loop para chamar as categorias e seus respectivos nomes de forma dinamica com o bd -->
                                    <?php 
                                    foreach($categorias as $categoria) {
                                        ?>
                                        <option value="<?php echo $categoria["id"];?>"><?php echo $categoria["nome"];?></option>
                                        <?php   
                                    }   
                                    ?>
                                </select>
                                <div class="form-text">Já disponibilizamos diversas categorias, mas você pode adicionar as suas!</div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="assistido" value="true"> Já assistiu?
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-menu mt-1"><i class="bi bi-plus-square me-2"></i>Adicionar</button>
                            </div>
                            <div class="form-text text-center">
                                ou <br> 
                                <a href="listar-filmes.php" class="link-padrao">Ver filmes <i class="bi bi-collection-play"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <!-- Seção inicio -->

    <script type="text/javascript" src="js/filmes-forms.js"></script>
<?php include("footer.php"); ?>
