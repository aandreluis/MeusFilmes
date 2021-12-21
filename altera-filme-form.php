<title>MeusFilmes - Alterar</title>
<?php 
    include("header.php"); 
    include("conecta.php");
    include("banco-filmes.php");
    include("banco-categorias.php");
    verificaUsuario();
?>

<?php 
    $id = $_GET["id"];
    $filme = buscaFilme($conexao, $id);
    $categorias = listaCategoriasUsuario($conexao, $_SESSION["id-usuario"], 1);
?>

<?php 
    //erros upload da imagem
    if(isset($_GET["uploadImagemErro"])) {
		if($_GET["uploadImagemErro"] == 0){
			?>
			<div class="container sticky-top">
			<div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 30%;" role="alert">
                Não foi possível alterar o filme, pois a imagem da capa possui <strong>extensão inválida.</strong>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
			</div>
			<?php 
		} else {
			if($_GET["uploadImagemErro"] == 1){
				?>
				<div class="container sticky-top">
				<div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 30%;" role="alert">
					Não foi possível alterar o filme, pois a imagem da capa é <strong>muito grande.</strong>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				</div>
				<?php 
			} else {
				if($_GET["uploadImagemErro"] == 2){
					?>
					<div class="container sticky-top">
					<div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 30%;" role="alert">
                    Não foi possível alterar o filme, pois a imagem da capa <strong>não foi cadastrada com sucesso.</strong>
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
                    <div class="col-md-6">
                        <img class="img-home mx-auto d-block" src="img/home-cinema.svg" alt="Cinema em casa">
                    </div>
                    <div class="col-md-6">
                    <h1 class="titulo-home">Alterar Filme</h1>
                        <form class="row g-3 text-white" enctype="multipart/form-data" action="altera-filme.php" method="post">
                            <div class="col-md-6">
                                <label for="inputNome" class="form-label">Nome *</label>
                                <input type="text" class="form-control" name="nome" value="<?php echo $filme["nome"]; ?>" placeholder="Nome do filme">
                            </div>
                            <div class="col-md-6">
                                <label for="inputDiretor" class="form-label">Diretor *</label>
                                <input type="text" class="form-control" name="diretor" value="<?php echo $filme["diretor"]; ?>" placeholder="Nome do diretor">
                            </div>
                            <div class="col-12">
                                <label for="inputDescricao" class="form-label">Descrição *</label>
                                <textarea id="descricao" class="form-control" style="resize: none; height: 100px;" name="descricao" id="inputDescricao" placeholder="Descrição do filme"><?php echo $filme["descricao"]; ?></textarea>
                                <div class="form-text" id="falta"></div>
                            </div>
                            <div class="col-md-12">
                                <label for="formFile" class="form-label">Nova imagem da capa</label>
                                <input class="form-control" type="file" name="imagem" accept=".jpg, .png, .jpeg">
                                <input type="hidden" name="imagemCapaAtual" value="<?php echo $filme["imagem"];?>">
                                <div class="form-text">(Opcional). Extensões permitidas: png, jpg, jpeg</div>
                            </div>
                                <div class="col-md-4">
                                    <label for="inputDuracao" class="form-label">Duração *</label>
                                    <input type="time" class="form-control" name="duracao" value="<?php echo $filme["duracao"]; ?>" placeholder="Duração do filme">
                                </div>
                                <div class="col-md-8">
                                    <label for="inputData" class="form-label">Data de lançamento *</label>
                                    <input type="date" class="form-control" name="data_lancamento" value="<?php echo $filme["data_lancamento"]; ?>">
                                </div>
                            <div class="col-12">
                                <label for="categoria" class="form-label">Categoria +<a href="categoria-formulario.php" class="link-padrao ms-1">Adicionar Categoria</a></label>
                                <select name="categoria_id" class="form-select">
                                <?php 
                                foreach($categorias as $categoria) {
                                    $essaCategoria = $filme["categoria_id"] == $filme["id"];
                                    $selecao = $essaCategoria ? "selected = 'selected'" : ""; //operador ternario    
                                    ?>
                                    <option value="<?php echo $categoria["id"]; ?>" <?php echo $selecao; ?>><?php echo $categoria["nome"];?></option>
                                    <?php   
                                }   
                                ?>
                                </select>
                                <div class="form-text">Já disponibilizamos diversas categorias, mas você pode adicionar a suas!</div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="form-check">
                                    <?php //verificar se é usado ou não
                                        if ($filme["assistido"] == 0) {//novo
                                            $assistido = "checked = 'checked'";
                                        } else { //assistido
                                            $assistido = "";
                                        }
                                    ?>
                                <input class="form-check-input" type="checkbox" name="assistido" value="true" <?php echo $assistido; ?>>
                                    Já assistiu?
                                </div>
                                <input type="hidden" name="id" value="<?php echo $filme["id"];?>">
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-menu mt-2">Alterar</button>
                            </div>
                            <div class="form-text text-center">
                                ou <br> 
                                <a href="listar-filmes.php" class="link-padrao">Ver filmes</a>
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