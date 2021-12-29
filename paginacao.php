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


<?php 

    // Pegar a página atual por GET
    $p = $_GET["p"];
    // Verifica se a variável tá declarada, senão deixa na primeira página como padrão
    if(isset($p)) {
    $p = $p;
    } else {
    $p = 1;
    }

    // Defina aqui a quantidade máxima de registros por página.
    $qnt = 3;

    // O sistema calcula o início da seleção calculando: 
    // (página atual * quantidade por página) - quantidade por página
    $inicio = ($p * $qnt) - $qnt;

    // Seleciona no banco de dados com o LIMIT indicado pelos números acima
    $query = "select f.*, c.nome as categoria_nome from filmes as f join categoria as c on c.id = f.categoria_id where f.usuario_id = '{$_SESSION["id-usuario"]}' LIMIT $inicio, $qnt";
    $resultado = mysqli_query($conexao, $query);
    // Cria um while para pegar as informações do BD
    ?>
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
                        //$filmes = listaFilmes($conexao, $_SESSION["id-usuario"]);
                        while($filme = mysqli_fetch_array($resultado)) {
                        

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

                <?php
                // Faz uma nova seleção no banco de dados, desta vez sem LIMIT, 
                // para pegarmos o número total de registros
                $query = "select f.*, c.nome as categoria_nome from filmes as f join categoria as c on c.id = f.categoria_id where f.usuario_id = '{$_SESSION["id-usuario"]}'";
                $resultado = mysqli_query($conexao, $query);//retorna um array de valores

                // Gera uma variável com o número total de registros no banco de dados
                $total_registros = mysqli_num_rows($resultado);

                // Gera outra variável, desta vez com o número de páginas que será precisa. 
                // O comando ceil() arredonda "para cima" o valor
                $pags = ceil($total_registros / $qnt);

                // Número máximos de botões de paginação
                $max_links = 3;

                // Exibe o primeiro link "primeira página", que não entra na contagem acima(3)
                ?>
                <br>
                <nav aria-label="Page navigation example mt-3">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled"><a class="page-link">Anterior</a></li>
                        <li class="page-item"><a class="page-link" href="paginacao.php?p=1">1</a></li>
                <?php
                // Cria um for() para exibir os 3 links antes da página atual
                for($i = $p - $max_links; $i <= $p - 1; $i++) {
                    // Se o número da página for menor ou igual a zero, não faz nada
                    // (afinal, não existe página 0, -1, -2..)
                    if($i <= 0) {
                    //faz nada
                    // Se estiver tudo OK, cria o link para outra página
                    } else {
                        ?>
                        <li class="page-item"><a class="page-link" href="paginacao.php?p=<?php echo $i;?>"><?php echo $i;?></a></li>
                        <?php
                    }
                }
                    // Exibe a página atual, sem link, apenas o número
                   // echo $p." ";

                    // Cria outro for(), desta vez para exibir 3 links após a página atual
                for($i = $p + 1; $i <= $p + $max_links; $i++) {
                    // Verifica se a página atual é maior do que a última página. Se for, não faz nada.
                    if($i > $pags) {
                    //faz nada
                    }
                    // Se tiver tudo Ok gera os links.
                    else {
                        ?>
                        <li class="page-item"><a class="page-link" href="paginacao.php?p=<?php echo $i;?>"><?php echo $i;?></a></li>
                        <?php
                    }
                }

                // Exibe o link "última página"
                ?>
                <li class="page-item"><a class="page-link" href="paginacao.php?p=<?php echo $pags;?>">Ultima página</a></li>
                <?php

        
/*
                
                <br>
            
                    
                       
                        <li class="page-item"><a class="page-link" href="">2</a></li>
                        <li class="page-item"><a class="page-link" href="">3</a></li>
                        <li class="page-item">
                        <a class="page-link" href="#">Próxima</a>
                        </li>
                    </ul>
                     */
            ?>
                </nav>
                
    
            </div>
        </div>
    </section> 
        
?>




<?php
/*
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
*/
?>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/listarscript.js"></script>
<?php include("footer.php"); ?>

<!-- paginação fonte http://www.linhadecodigo.com.br/artigo/1713/php-e-mysql-sistema-de-paginacao.aspx -->