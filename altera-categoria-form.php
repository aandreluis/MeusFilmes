<title>MeusFilmes - Adicionar Categorias</title>
<?php 
    include("header.php"); 
    include("conecta.php");
    include("banco-categorias.php");
    verificaUsuario();
?>

<?php 
    $id = $_GET["id"];
    $categoria = buscaCategoria($conexao, $id);
?>

<?php 
if(isset($_GET["camposVazios"])) {
    ?>
    <div class="container sticky-top">
        <div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
            Preencha o campo <strong>nome</strong> para adicionar a categoria.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    
<?php
}


?>

<!-- Seção inicio -->
    <section class="mt-5">
        <div class="custom-home-container">
            <div id="categoria-form-pg">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form class="row g-3 text-white" action="altera-categoria.php" method="post">
                            <div class="col-12">
                                <h1 class="titulo-home">Alterar categoria</h1>
                                <label for="inputNome" class="form-label mt-3">Nome</label>
                                <input type="text" class="form-control" name="nome" id="inputNome" value="<?php echo $categoria["nome"]; ?>" placeholder="Nome da categoria">
                            </div>

                            <input type="hidden" name="id" value="<?php echo $categoria["id"];?>">
                            
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-menu mt-2">Alterar</button>
                            </div>
                        </form>
                    </div>
                    <div class="row justify-content-center mt-4">
                        <div class="col-md-6">
                            <img class="img-home mx-auto d-block" src="img/home-cinema.svg" alt="Cinema em casa">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <!-- Seção inicio -->
<?php include("footer.php"); ?>
