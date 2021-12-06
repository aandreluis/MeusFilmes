<?php 
	include("header.php");
    verificaUsuario();
?>
    <title>MeusFilmes - <?php echo $_SESSION["nome-usuario"]; ?></title>

    <?php
    if(isset($_GET["alteraUsuario"])) {
        ?>
        <div class="container sticky-top">
            <div class="alert alert-success alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 30%;" role="alert">
                Alterações realizadas com <strong>sucesso!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        
    <?php
    }

    ?>



    <!-- Seção inicio -->
    <section class="mt-5">
        <div class="custom-home-container">
            <div id="perfil-pg">
                <div class="row justify-content-center">
                    <h1 class="titulo-home">Meu perfil</h1>

                    <div class="col-md-6 avatar d-flex justify-content-center mt-3"><!-- DIV DA IMAGEM DO PERFIL -->
                        <?php
                            // se a imagem por null ou não exista no diretorio referenciado
                            if($_SESSION["imagem-usuario"] == NULL || !file_exists("/xampp/htdocs/meusfilmes/img/avatar/".$_SESSION["imagem-usuario"])) {
                                ?>
                                <img class="img-avatar" src="img/avatar-default.svg" alt="Imagem do perfil">
                                <?php
                            } else {//se existir
                                ?>
                                <img class="img-avatar" src="img/avatar/<?php echo $_SESSION["imagem-usuario"]; ?>" alt="Imagem do perfil">
                                <?php
                            }
                        ?>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <div class="col-md-6 paragrafo-home">
                            <div class="row justify-content-center">
                                <?php echo $_SESSION["nome-usuario"]; ?>
                            </div>
                            <div class="row justify-content-center">
                                <?php echo $_SESSION["email-usuario"]; ?>
                            </div>
                            <div class="card-footer mt-4">
                                <div class="row">
                                    <p class="card-subtitle text-center text-muted">Ações</p>
                                </div>    
                                <div class="row mt-2">
                                    <div class="col">
                                        <a href="remove-usuario.php?id=<?php echo $_SESSION["id-usuario"];?>" class="btn btn-danger veiculos-btn d-block mx-auto"><i class="bi bi-trash"></i></a>
                                    </div>
                                    <div class="col">
                                        <a href="altera-usuario-form.php?id=<?php echo $_SESSION["id-usuario"];?>" class="btn btn-primary veiculos-btn d-block mx-auto"><i class="bi bi-gear-fill"></i></a>
                                    </div>
                                </div>       
                            </div>       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <!-- Seção inicio -->
<?php include("footer.php"); ?>
