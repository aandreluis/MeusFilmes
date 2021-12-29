<title>MeusFilmes - Listar Filmes</title>
<?php 
    include("header.php"); 
    include("conecta.php");
    include("banco-filmes.php");
    verificaUsuario();
?>

<?php 
    if (isset($_GET["add"])) {
        ?>
        <div class="container sticky-top">
            <div class="alert alert-success alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 30%;" role="alert">
                O filme foi <strong>cadastrado</strong> com sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        <?php
    }

    if(isset($_GET["alterado"])) {
        ?>
        <div class="container sticky-top">
            <div class="alert alert-success alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 30%;" role="alert">
                O filme foi <strong>alterado</strong> com sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        <?php
    }

    if(isset($_GET["removido"])) {
        ?>
        <div class="container sticky-top">
            <div class="alert alert-success alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3" style="width: 30%;" role="alert">
                O filme foi <strong>removido</strong> com sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
     <?php
    }
?>


<!-- Seção Veiculos -->
<section class="mt-5">
    <div class="custom-home-container">
        <div id="filmes-pg">
            <h1 class="titulo-home">Filmes Cadastrados</h1>
            <?php
            if (!listaFilmes($conexao, $_SESSION["id-usuario"])) {//verifica se existe filmes para mostrar
                ?>
                <div class="row d-flex justify-content-center mt-4">
                    <div class="col-md-12">
                        <h5 class="paragrafo-home text-muted">Ops... Nenhum filme encontrado!</h5>
                        <img class="mx-auto d-block mt-3" style="width: 50%;" src="img/searching.svg" alt="Nada encontrado" >
                    </div>
                </div>
                <?php
            }    
            ?>
            <div class="row d-flex justify-content-center mt-3">
                <div class="col-6">
                    <form class="d-flex" id="form-pesquisa" method="POST" action="">
                        <input class="form-control me-2" id="pesquisa" type="text" placeholder="Buscar filmes pelo nome" aria-label="Search">
                    </form>
                </div>
            </div>
            <div class="resultado"><!-- Exibe os resultados da pesquisa por jquery --></div>

                <!-- Cards -->
                <div id="card" class="row row-cols-1 row-cols-md-3 g-4 mt-3">
                    <?php
                        $filmes = listaFilmes($conexao, $_SESSION["id-usuario"]);
                        
                        foreach($filmes as $filme){//for melhorado

                    ?>
                    <!-- início card -->
                    <div class="col">
                        <div class="card text-white bg-dark border-card h-100 card-box">
                    <?php
                    if($filme["imagem"] == NULL || $filme["imagem"] == "") {
                        ?>
                        <img src="img/capa-default.svg" class="card-img-top" alt="Capa do filme default" style="padding: 20px;">
                        <?php
                    } else {
                        ?>
                        <img src="img/capa-filmes/<?php echo $filme["imagem"] ?>" class="card-img-top" alt="Capa do filme <?php echo $filme["nome"]; ?>">     
                        <?php
                    }
                    ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $filme["nome"];?></h5>
                            <p class="card-text">
                                <b>Diretor:</b> <?php echo $filme["diretor"];?> <br>
                                <b>Duração:</b> <?php echo date('H:i', strtotime($filme["duracao"]));?> <br>
                                <b>Data Lançamento:</b> <?php echo date('d/m/Y', strtotime($filme["data_lancamento"]));?> <br>
                                <b>Categoria:</b> <?php echo $filme["categoria_nome"];?> <br>
                                <?php if($filme["assistido"] == '0') {
                                    ?>
                                    <b>Já assistido</b>
                                    <i class="bi bi-play-circle-fill"></i>
                                    <?php
                                    } else {
                                    ?>
                                    <b>Nunca assistido</b>
                                    <i class="bi bi-pause-circle-fill"></i>
                                    <?php
                                    } ?> <br>
                                <b>Descrição:</b> <?php echo $filme["descricao"];?>
                            </p>
                            <div class="card-footer">
                                <div class="row">
                                    <p class="card-subtitle text-center text-muted">Ações</p>
                                </div>    
                                <div class="row mt-2">
                                    <a href="remove-filme.php?id=<?php echo $filme["id"];?>" class="btn btn-danger veiculos-btn d-block mx-auto"><i class="bi bi-trash"></i></a>
                                    <a href="altera-filme-form.php?id=<?php echo $filme["id"];?>" class="btn btn-primary veiculos-btn d-block mx-auto"><i class="bi bi-gear-fill"></i></a>
                                </div>       
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- fim card -->
                <?php
                }
                ?>

                </div>
                <!-- Cards -->
                <br>
                <nav aria-label="Page navigation example mt-3">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                        <a class="page-link">Anterior</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                        <a class="page-link" href="#">Próxima</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section> 
		<!-- Seção inicio -->

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/listarscript.js"></script>
<?php include("footer.php"); ?>
