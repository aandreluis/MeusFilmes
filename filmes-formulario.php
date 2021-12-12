<title>MeusFilmes - Adicionar Filmes</title>
<?php 
    include("header.php"); 
    include("conecta.php");
    include("banco-filmes.php");
    include("banco-categorias.php");
    verificaUsuario();
?>

<?php 
    $categorias = listaCategorias($conexao, $_SESSION["id-usuario"]);
?>

<?php 

    if (isset($_GET["add"])) {
        ?>
            <div class="container sticky-top">
                <div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 30%;" role="alert">
                    O filme <strong>não</strong> foi cadastrado!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php
    }

    if (isset($_GET["alterado"])) {
        ?>
             <div class="container sticky-top">
                <div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 30%;" role="alert">
                    O filme <strong>não</strong> foi alterado!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        <?php
        }

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
                        <form class="row g-3 text-white" action="adiciona-filme.php" method="post">
                            <div class="col-md-6">
                                <label for="inputNome" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome" placeholder="Nome do filme" autofocus>
                            </div>
                            <div class="col-md-6">
                                <label for="inputDiretor" class="form-label">Diretor</label>
                                <input type="text" class="form-control" name="diretor" placeholder="Nome do diretor do filme">
                            </div>
                            <div class="col-12">
                                <label for="inputDescricao" class="form-label">Descrição</label>
                                <textarea  style="resize: none; height: 100px;" class="form-control"  name="descricao" placeholder="Descrição do filme"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="inputImagem" class="form-label">Link imagem</label>
                                <input type="url" class="form-control" name="imagem" placeholder="URL da capa do filme">
                            </div>
                                <div class="col-md-4">
                                    <label for="inputDuracao" class="form-label">Duração</label>
                                    <input type="time" class="form-control" name="duracao" placeholder="Duração do filme">
                                </div>
                                <div class="col-md-8">
                                    <label for="inputData" class="form-label">Data de lançamento</label>
                                    <input type="date" class="form-control" name="data_lancamento">
                                </div>
                            <div class="col-12">
                                <label for="categoria" class="form-label">Categoria +<a href="categoria-formulario.php" class="link-padrao ms-1">Adicionar Categoria</a></label>
                                <select name="categoria_id" class="form-select">
                                    <!-- loop para chamar as categorias e seus respectivos nomes de forma dinamica com o bd -->
                                    <?php foreach($categorias as $categoria) {?>
                                            <option value="<?php echo $categoria["id"];?>"><?php echo $categoria["nome"];?></option>
                                    <?php   }   ?>
                                </select>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="assistido" value="true"> Já assistiu?
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-menu mt-1">Adicionar</button>
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
<?php include("footer.php"); ?>
