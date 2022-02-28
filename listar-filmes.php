<?php 
    include("header.php"); 
    include("conecta.php");
    include("banco-filmes.php");
    verificaUsuario();
?>
<title>MeusFilmes - Listar Filmes</title>

<?php 
    if (isset($_GET["add"])) {
        ?>
        <div class="container sticky-top">
            <div class="alert alert-success alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
                O filme foi <strong>cadastrado</strong> com sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        <?php
    }

    if(isset($_GET["alterado"])) {
        ?>
        <div class="container sticky-top">
            <div class="alert alert-success alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
                O filme foi <strong>alterado</strong> com sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        <?php
    }

    if(isset($_GET["removido"])) {
        ?>
        <div class="container sticky-top">
            <div class="alert alert-success alert-dismissible fade show position-absolute top-0 start-50 translate-middle-x mt-3 alert-padrao" role="alert">
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

    //Verifica se o usuario está acessando de um dispositivo mobile
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
        // Defina aqui a quantidade máxima de registros por página em dispositivos mobile.
        $qnt = 4;
        // Número máximos de botões de paginação
        $max_links = 2;
    } else {
        // Defina aqui a quantidade máxima de registros por página em computadores
        $qnt = 9;
        // Número máximos de botões de paginação
        $max_links = 10;
    }
   
    // O sistema calcula o início da seleção calculando: 
    // (página atual * quantidade por página) - quantidade por página
    $inicio = ($p * $qnt) - $qnt;

    // Seleciona no banco de dados com o LIMIT indicado pelos números acima
    $query = "SELECT f.*, c.nome AS categoria_nome FROM filmes AS f JOIN categoria AS c ON c.id = f.categoria_id WHERE f.usuario_id = '{$_SESSION["id-usuario"]}' ORDER BY f.id DESC LIMIT $inicio, $qnt";
    $resultado = mysqli_query($conexao, $query);
?>
    <!-- SEÇÃO LISTAR FILMES -->
    <section class="mt-5">
        <div class="custom-home-container">
            <div id="filmes-pg">
                <h1 class="titulo-home">Seus Filmes</h1>
                <?php            
                if(listaFilmes($conexao, $_SESSION["id-usuario"])) {//verifica se existe filmes para mostrar
                    ?>
                    <!-- Pesquisa -->
                    <div class="row d-flex justify-content-center align-items-center mt-2">
                        <div class="container-md col-8 col-md-6 col-xs-8">
                            <div class="form-text text-center">Tente pesquisar o filme pelo seu nome. Exemplo: "Homem-Aranha"</div>
                            <form class="d-flex mt-1" id="form-pesquisa" method="POST" action="">
                                <input class="form-control" id="pesquisa" type="text" placeholder="Digite o nome do filme" aria-label="Search">
                                <input type="submit" disabled hidden> <!-- impede que aperte ENTER no input pesquisa -->
                            </form>
                        </div>
                    </div>
                    <div class="resultado"><!-- Exibe os resultados da pesquisa por jquery --></div>
                    <!-- Pesquisa -->

                    <!-- Card -->
                    <div id="card" class="row row-cols-1 row-cols-lg-3 row-cols-md-2 row-cols-sm-1 row-cols-lg-3 row-cols-xl-3 row-cols-xxl-6 g-3 mt-2">
                        <?php
                        //While para pegar as informações do BD
                        while($filme = mysqli_fetch_array($resultado)) {
                        ?>
                        <!-- início conteudo do card -->
                        <div class="col">
                            <div class="card text-white bg-dark border-card h-100 card-box">
                                <?php
                                if($filme["imagem"] == NULL || $filme["imagem"] == "") {
                                    ?>
                                    <img src="img/capa-default.svg" loading="lazy" class="card-img-top" alt="Capa do filme default" style="padding: 20px;">
                                    <?php
                                } else {
                                    ?>
                                    <img src="img/capa-filmes/<?php echo $filme["imagem"] ?>" loading="lazy" class="card-img-top" alt="Capa do filme <?php echo $filme["nome"]; ?>">     
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
                                        <?php 
                                        if($filme["assistido"] == '0') {
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
                                            <a href="remove-filme.php?id=<?php echo $filme["id"];?>" class="btn btn-danger filmes-btn d-block mx-auto"><i class="bi bi-trash"></i></a>
                                            <a href="altera-filme-form.php?id=<?php echo $filme["id"];?>" class="btn btn-primary filmes-btn d-block mx-auto"><i class="bi bi-gear-fill"></i></a>
                                        </div>       
                                    </div>
                                </div>
                            </div>
                        </div>
                            <!-- fim do conteudo do card -->
                        <?php
                        } //fim while
                        ?>
                    </div>
                        <!-- Card -->

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

                    // Exibe o primeiro link "primeira página", que não entra na contagem acima(3)
                    ?>
                    <br>
                    <nav id="pags" class="container-fluid aria-label="Página listar filmes">
                        <ul class="pagination justify-content-center">
                        <?php
                            if($p == 1){
                                ?>
                                <li class="page-item disabled"><a class="page-link pageLinkFIlmes" href="listar-filmes.php?p=1">Início</a></li>
                                <?php
                            } else {
                                ?>
                                <li class="page-item"><a class="page-link pageLinkFIlmes" href="listar-filmes.php?p=1">Início</a></li>
                                <?php
                            }
                            if($p > 1){
                                ?>
                                <li class="page-item"><a class="page-link pageLinkFIlmes" href="listar-filmes.php?p=<?php echo $p-1;?>"><</a></li>
                            <?php
                            } else {
                                ?>
                                <li class="page-item disabled"><a class="page-link pageLinkFIlmes" href="#"><</a></li>
                            <?php
                            }
                    
                    // Cria um for() para exibir os 3 links antes da página atual
                    for($i = $p - $max_links; $i <= $p - 1; $i++) {
                        // Se o número da página for menor ou igual a zero, não faz nada
                        // (afinal, não existe página 0, -1, -2..)
                        if($i <= 0) {
                        //faz nada
                        } else { // Se estiver tudo OK, cria o link para outra página
                            ?>
                            <li class="page-item"><a class="page-link pageLinkFIlmes" href="listar-filmes.php?p=<?php echo $i;?>"><?php echo $i;?></a></li>
                            <?php
                        }
                    }
							?>
							<li class="page-item active"><a class="page-link pageLinkFIlmes" href="listar-filmes.php?p=<?php echo $p;?>"><?php echo $p;?></a></li>
							<?php
                    // Cria outro for(), desta vez para exibir 3 links após a página atual
                    for($i = $p + 1; $i <= $p + $max_links; $i++) {
                        // Verifica se a página atual é maior do que a última página. Se for, não faz nada.
                        if($i > $pags) {
                        //faz nada
                        } else {// Se tiver tudo Ok gera os links.
                            ?>
                            <li class="page-item"><a class="page-link pageLinkFIlmes" href="listar-filmes.php?p=<?php echo $i;?>"><?php echo $i;?></a></li>
                            <?php
                        }
                    }

                    if($p < $pags){
                        ?>
                        <li class="page-item"><a class="page-link pageLinkFIlmes" href="listar-filmes.php?p=<?php echo $p+1;?>">></a></li>
                    <?php
                    } else {
                        ?>
                        <li class="page-item disabled"><a class="page-link pageLinkFIlmes" href="#">></a></li>
                    <?php
                    }

                    // Exibe o link "última página"
                        if($p == $pags){
                            ?>
                            <li class="page-item disabled"><a class="page-link pageLinkFIlmes" href="listar-filmes.php?p=<?php echo $pags;?>">Fim</a></li>
                            <?php
                        } else {
                            ?>
                            <li class="page-item"><a class="page-link pageLinkFIlmes" href="listar-filmes.php?p=<?php echo $pags;?>">Fim</a></li>
                            <?php
                        }
							?>
							</nav> 
                <?php 
                } else { // se não tiver nenhum filme
                    ?>
                    <div class="row d-flex justify-content-center mt-3">
                        <div class="col-md-12">
                            <h5 class="paragrafo-home text-muted text-center mt-2">Ops... Nenhum filme encontrado!</h5>
                            <img class="mx-auto d-block" style="width: 50%; margin: 10vh 0 10vh 0;" src="img/searching.svg" alt="Nada encontrado" >
                        </div>
                    </div> 
                    <?php
                } 
                ?>
            </div>
        </div>
    </section>
    <!-- SEÇÃO LISTAR FILMES -->
    
    <div class="container position-relative mt-2">
        <a href="#" class="btn btn-menu scrollToTop position-absolute top-50 start-50 translate-middle"><i class="bi bi-chevron-double-up"></i> Voltar ao topo</a>
    </div>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/listarscript.js"></script>
<?php include("footer.php"); ?>
