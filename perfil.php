<?php 
	include("header.php");
    include("conecta.php");
    include("banco-filmes.php");
    include("banco-categorias.php");
    verificaUsuario();
?>
    <title>MeusFilmes - <?php echo $_SESSION["nome-usuario"]; ?></title>

    <?php
    if(isset($_GET["alteraUsuario"])) {
        ?>
        <div class="container sticky-top">
            <div class="alert alert-success alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
                Alterações realizadas com <strong>sucesso!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        
    <?php
    }

    if(isset($_GET["senhaVazia"])) {
        ?>
        <div class="container sticky-top">
            <div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
                Digite sua <strong>senha</strong> para continuar.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php
    }

    if(isset($_GET["senhaInvalida"])) {
        ?>
        <div class="container sticky-top">
            <div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
                Senha digitada incorreta, <strong>tente novamente.</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php
    }

    if(isset($_GET["removido"])) {
        if($_GET["removido"] == 1) {
            ?>
            <div class="container sticky-top">
                <div class="alert alert-success alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
                    A sua imagem foi <strong>removida</strong> com sucesso!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <?php
        }
        if($_GET["removido"] == 0) {
            ?>
            <div class="container sticky-top">
                <div class="alert alert-warning alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
                    Não foi possivel <strong>remover</strong> sua imagem! <strong>Tente novamente.</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <?php
        }   
    }

    $quantidadeFilmes =  qntdFilmes($conexao, $_SESSION["id-usuario"]);
    $quantidadeCategorias =  qntdCategorias($conexao, $_SESSION["id-usuario"]);
?>

    <!-- SEÇÃO PERFIL -->
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
                    <div class="row justify-content-center mt-4">
                        <div class="col-md-6 paragrafo-home">
                            <div class="row justify-content-center text-center">
                                <strong><?php echo $_SESSION["nome-usuario"]; ?></strong>
                            </div>
                            <div class="row justify-content-center text-center">
                                <?php 
								// Explode Divide uma string em strings.
								$emailReduzido = explode("@", $_SESSION["email-usuario"]); 
                                ?>
                               <p><strong>Email: </strong><?php echo $emailReduzido[0]."@..."; ?></p>
                            </div>
                            <div class="container mt-3">
                                <div class="row">
                                    <p class="card-subtitle text-center text-muted">Ações</p>
                                </div>    
                                <div class="row mt-2">
                                    <div class="col">
                                        <a class="btn btn-outline-danger filmes-btn d-block mx-auto" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash"></i></a>
                                    </div>
                                    <div class="col">
                                        <a href="altera-usuario-form.php?id=<?php echo $_SESSION["id-usuario"];?>" class="btn btn-outline-primary filmes-btn d-block mx-auto"><i class="bi bi-gear-fill"></i></a>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="container mt-5">
                    <h3 class="titulo-home">Total adicionado</h3>
                    <div class="row justify-content-center">
                        <div class="row row-cols-1 row-cols-sm-2">
                            <div class="col">
                                <a href="listar-filmes.php?p=1" class="text-decoration-none">
                                    <div class="card text-white bg-dark border-card card-box mt-2">
                                        <div class="card-header">Filmes</div>
                                        <div class="card-body">
                                            <h1 class="card-title text-center"><?php echo $quantidadeFilmes;?></h1>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col">
                                <a href="listar-categorias.php" class="text-decoration-none">
                                    <div class="card text-white bg-dark border-card card-box mt-2">
                                        <div class="card-header">Categorias</div>
                                        <div class="card-body">
                                            <h1 class="card-title text-center"><?php echo $quantidadeCategorias;?></h1>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
    </section> 
    <!-- SEÇÃO PERFIL -->

    <!-- MODAL CONFIRMAÇÃO -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark border-card card-box text-white">
        <div class="modal-header">
            <h5 class="modal-title text-danger fw-bold" id="deleteModalLabel">Deseja deletar sua conta?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="confirmacao.php" method="POST">
                <div class="mb-3">
                    <label for="inputSenha" class="form-label text-white">Para deletar sua conta confirme sua senha:</label>
                    <input type="password" class="form-control" name="senhaConfirmacao" placeholder="Digite sua senha" autofocus required>
                    <div class="form-text">A exclusão da conta não poderá ser desfeita! <strong>Cuidado ao prosseguir.</strong></div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-square me-2"></i>Cancelar</button>
            <a href="confirmacao.php" class="btn btn-danger"><i class="bi bi-trash me-2"></i>Sim, deletar</i></a>
        </div>
        </div>
    </div>
    </div>
    <!-- MODAL CONFIRMAÇÃO -->
<?php include("footer.php"); ?>