<?php 
    include("header.php"); 
    include("conecta.php");
    verificaUsuario();
    ?>
<title>MeusFilmes - Adicionar Categorias</title>

<?php 
    if(isset($_GET["add"])) {
        if($_GET["add"] == "false") {
            ?>
            <div class="container sticky-top">
                <div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
                    A categoria <strong>não</strong> foi cadastrada!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <?php
        }
    }

    if(isset($_GET["erro"])) {
        if($_GET["erro"] == "camposVazios"){
            ?>
            <div class="container sticky-top">
                <div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
                    Preencha o campo <strong>nome*</strong> para adicionar a categoria.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <?php
		}

        if($_GET["erro"] == "categoriaRepetida"){
            ?>
            <div class="container sticky-top">
                <div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
                    Não é possível adicionar essa categoria pois, a mesma<strong> já foi cadastrada.</strong> Tente novamente.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <?php
		}
    }
?>

<!-- SEÇÃO ADICIONAR CATEGORIAS -->
    <section class="mt-5">
        <div class="custom-home-container">
            <div id="categoria-form-pg">
                <div class="row justify-content-center">
                    <h1 class="titulo-home">Cadastrar categoria</h1>
                    <div class="col-md-6">
                        <form class="row g-3 text-white" action="adiciona-categoria.php" method="post" onsubmit="return checkForm(this);">
                            <div class="col-12">
                                <label for="inputNome" class="form-label mt-3">Nome *</label>
                                <input type="text" class="form-control" name="nome" id="inputNome" placeholder="Nome da categoria">
                            </div>
                            <div class="d-flex justify-content-center">
                                <button id="btnSubmit" type="submit" class="btn btn-menu mt-2"><i class="bi bi-plus-square me-2"></i>Adicionar</button>
                            </div>
                            <div class="form-text text-center">
                                ou <br> 
                                <a href="listar-categorias.php" class="link-padrao">Ver categorias <i class="bi bi-collection"></i></a>
                            </div>
                        </form>
                    </div>
                    <div class="row justify-content-center mt-4">
                        <div class="col-md-6">
                            <img class="img-home mx-auto d-block" style="margin: 5vh 0 10vh 0;" src="img/new-ideas.svg" alt="Cinema em casa">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <!-- SEÇÃO ADICIONAR CATEGORIAS -->

    <script type="text/javascript" src="js/validarform.js"></script>
<?php include("footer.php"); ?>
