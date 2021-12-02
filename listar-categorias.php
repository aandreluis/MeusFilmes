<title>MeusFilmes - Listar Categorias</title>
<?php 
    include("header.php"); 
    include("conecta.php");
    include("banco-filmes.php");
    verificaUsuario();
?>

<?php
    if(isset($_GET["alterado"])) { //recebe o valor por GET
        $alterado = $_GET["alterado"]; //se o valor existir adiciona para variavel
    } else {
        $alterado = ''; //se não deixa como null
    }
    if(isset($_GET["removido"])) {
        $removido = $_GET["removido"];
    } else {
        $removido = '';
    }
    if(isset($_GET["add"])) {
        $add = $_GET["add"];
    }else{
        $add = '';
    }
?>

<?php 
    if ($add == "true") {
    ?>
        <div class="container sticky-top">
            <div class="alert alert-success alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 35%;" role="alert">
                A categoria foi <strong>cadastrada</strong> com sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php
    }
    if ($add == "false") {
    ?>
         <div class="container sticky-top">
            <div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 35%;" role="alert">
                A categoria <strong>não</strong> foi cadastrada!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php
    }

?>

<?php 
    if ($alterado == "true") {
    ?>
        <div class="container sticky-top">
            <div class="alert alert-success alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 35%;" role="alert">
                A categoria foi <strong>alterada</strong> com sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php
    }
    if ($alterado == "false") {
    ?>
         <div class="container sticky-top">
            <div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 35%;" role="alert">
                A categoria <strong>não</strong> foi alterada!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php
    }
?>

<?php 
    if ($removido == "true") {
    ?>
        <div class="container sticky-top">
            <div class="alert alert-success alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 35%;" role="alert">
                A categoria foi <strong>removida</strong> com sucesso!
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
                    <div class="col-md-6">
                    <h1 class="titulo-home">Categorias</h1>
                    <?php
                    if (listaCategorias($conexao) == null) {//verifica se existe categorias para mostrar
                        ?>
                            <div class="row d-flex justify-content-center mt-4">
                                <div class="col-md-12">
                                    <h5 class="paragrafo-home text-muted text-center">Ops... Nenhuma categoria encontrada!</h5>
                                    <img class="mx-auto d-block mt-3" style="width: 50%;" src="img/searching.svg" alt="Nada encontrado" >
                                </div>
                            </div>
                    <?php
                    } else {
                    ?>            
                        <table class="table table-dark table-striped table-bordered border-padrao text-center mt-3">
                            <tr class="text-white">
                                <td><b>Categorias</b></td>
                                <td colspan="2"><b>Ações</b></td>
                            </tr>
                        <?php
                        $categorias = listaCategorias($conexao);
                            foreach($categorias as $categoria){//for melhorado
                        ?>
                            <tr class="text-white">
                                <td><?php echo $categoria["nome"]; ?></td>
                                <td><a class="btn btn-danger" href="remove-categoria.php?id=<?php echo $categoria["id"] ?>"><i class="bi bi-trash"></i></a></td>
                                <td><a class="btn btn-primary" href="altera-categoria-form.php?id=<?php echo $categoria["id"] ?>"><i class="bi bi-gear-fill"></td>
                            </tr>
                        <?php
                        }
                    }
                        ?>
                        </table>
                    </div>
                    <div class="col-md-6 d-flex">
                        <img class="img-home mx-auto d-block" src="img/list.svg" alt="Cinema em casa">
                    </div>

                </div>
            </div>
        </div>
    </section> 
    <!-- Seção inicio -->
<?php include("footer.php"); ?>
