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
                <!-- Cards -->
                <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
<?php
    $filmes = listaFilmes($conexao, $_SESSION["id-usuario"]);
    
    foreach($filmes as $filme){//for melhorado

?>
                    <!-- início card -->
                    <div class="col">
                        <div class="card text-white bg-dark border-card h-100 card-box">
                        <img src="<?php echo $filme["imagem"] ?>" class="card-img-top" alt="Capa do filme">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $filme["nome"];?></h5>
                            <p class="card-text">
                                <b>Diretor:</b> <?php echo $filme["diretor"];?> <br>
                                <b>Duração:</b> <?php echo $filme["duracao"];?> <br>
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
            </div>
        </div>
    </section> 
		<!-- Seção inicio -->


<?php include("footer.php"); ?>
