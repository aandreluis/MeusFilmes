<title>MeusFilmes - Adicionar Categorias</title>
<?php 
    include("header.php"); 
    include("conecta.php");
    verificaUsuario();
?>

<?php 
    if(isset($_GET["add"])) {
        if($_GET["add"] == "true") {
            ?>
            <div class="container sticky-top">
                <div class="alert alert-success alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 35%;" role="alert">
                    A categoria foi <strong>cadastrada</strong> com sucesso!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <?php
        }
        if($_GET["add"] == "false") {
            ?>
            <div class="container sticky-top">
                <div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 35%;" role="alert">
                    A categoria <strong>não</strong> foi cadastrada!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <?php
        }
    }
?>

<!-- Seção inicio -->
    <section class="mt-5">
        <div class="custom-home-container">
            <div id="categoria-form-pg">
                <div class="row justify-content-center">
                    <h1 class="titulo-home">Cadastrar categoria</h1>
                    <div class="col-md-6">
                        <form class="row g-3 text-white" action="adiciona-categoria.php" method="post">
                            <div class="col-12">
                                <label for="inputNome" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome" id="inputNome" placeholder="Nome da categoria">
                            </div>
                            
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-menu mt-2">Adicionar</button>
                            </div>
                        </form>
                    </div>
                    <div class="row justify-content-center mt-4">
                        <div class="col-md-6">
                            <img class="img-home mx-auto d-block" src="img/new-ideas.svg" alt="Cinema em casa">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <!-- Seção inicio -->
<?php include("footer.php"); ?>
