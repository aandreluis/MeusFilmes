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
    $categorias = listaCategorias($conexao, $_SESSION["id-usuario"]);
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
                        <form class="row g-3 text-white" action="altera-filme.php" method="post">
                            <div class="col-md-6">
                                <label for="inputNome" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome" id="inputNome" value="<?php echo $filme["nome"]; ?>" placeholder="Nome do filme">
                            </div>
                            <div class="col-md-6">
                                <label for="inputDiretor" class="form-label">Diretor</label>
                                <input type="text" class="form-control" name="diretor" id="inputDiretor" value="<?php echo $filme["diretor"]; ?>" placeholder="Nome do diretor do filme">
                            </div>
                            <div class="col-12">
                                <label for="inputDescricao" class="form-label">Descrição</label>
                                <textarea class="form-control" style="resize: none; height: 100px;" name="descricao" id="inputDescricao" placeholder="Descrição do filme"><?php echo $filme["descricao"]; ?></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="inputImagem" class="form-label">Link imagem</label>
                                <input type="url" class="form-control" name="imagem" id="inputImagem" value="<?php echo $filme["imagem"]; ?>" placeholder="URL da capa do filme">
                            </div>
                                <div class="col-md-4">
                                    <label for="inputDuracao" class="form-label">Duração</label>
                                    <input type="time" class="form-control" name="duracao" id="inputDuracao" value="<?php echo $filme["duracao"]; ?>" placeholder="Duração do filme">
                                </div>
                                <div class="col-md-8">
                                    <label for="inputData" class="form-label">Data de lançamento</label>
                                    <input type="date" class="form-control" name="data_lancamento" id="inputData" value="<?php echo $filme["data_lancamento"]; ?>">
                                </div>
                            <div class="col-12">
                                <label for="categoria" class="form-label">Categoria +<a href="categoria-formulario.php" class="link-padrao ms-1">Adicionar Categoria</a></label>
                                <select name="categoria_id" class="form-select">
                                <?php foreach($categorias as $categoria) {
                                    $essaCategoria = $filme["categoria_id"] == $filme["id"];
                                    $selecao = $essaCategoria ? "selected = 'selected'" : ""; //operador ternario    
                                ?>
                                    <option value="<?php echo $categoria["id"]; ?>" <?php echo $selecao; ?>><?php echo $categoria["nome"];?></option>
                                <?php   }   ?>
                                </select>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <!-- Seção inicio -->
<?php include("footer.php"); ?>
