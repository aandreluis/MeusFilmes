<?php 
    include("conecta.php");
    include("banco-filmes.php");
    include("logica-usuario.php");
    verificaUsuario();
?>

<?php 

    $nomeFilme = $_POST["palavra"];

    if(!buscarFilmes($conexao, $_SESSION["id-usuario"], $nomeFilme)) {
        ?>
        <div class="row d-flex justify-content-center mt-4">
            <div class="col-md-12">
                <h5 class="paragrafo-home text-muted">Ops... Nenhum filme encontrado!</h5>
                <img class="mx-auto d-block mt-3" style="width: 50%;" src="img/searching.svg" alt="Nada encontrado" >
            </div>
        </div>
        <?php
    } else {
        ?>
        <!-- Cards -->
                <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
                    <?php
                        $filmes = buscarFilmes($conexao, $_SESSION["id-usuario"], $nomeFilme);
                        
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
            </div>
            <?php
    }
    


?>