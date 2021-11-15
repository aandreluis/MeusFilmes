<title>MeusFilmes - Adicionar</title>
<?php 
    include("header.php"); 
    include("conecta.php");//ok
    include("banco-categoria.php");   //ok  
?>

<?php 
    $categorias = listaCategorias($conexao);
?>

<!-- Seção inicio -->
    <section class="mt-5">
        <div class="custom-home-container">
            <div id="home-pg">
                <div class="row">
                    <div class="col-md-6 d-flex">
                        <img class="img-home mx-auto d-block" src="img/create.svg" alt="Cinema em casa">
                    </div>

                    <div class="col-md-6">
                    <h1 class="titulo-home">Cadastrar Filme</h1>
                        <form class="row g-3 text-white" action="adiciona-filme.php" method="post">
                            <div class="col-md-6">
                                <label for="inputNome" class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome" id="inputNome" placeholder="Nome do filme">
                            </div>
                            <div class="col-md-6">
                                <label for="inputDiretor" class="form-label">Diretor</label>
                                <input type="text" class="form-control" name="diretor" id="inputDiretor" placeholder="Nome do diretor do filme">
                            </div>
                            <div class="col-12">
                                <label for="inputDescricao" class="form-label">Descrição</label>
                                <textarea  style="resize: none; height: 100px;" class="form-control"  name="descricao" id="inputDescricao" placeholder="Descrição do filme"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="inputImagem" class="form-label">Link imagem</label>
                                <input type="url" class="form-control" name="imagem" id="inputImagem" placeholder="URL da capa do filme">
                            </div>
                                <div class="col-md-4">
                                    <label for="inputDuracao" class="form-label">Duração</label>
                                    <input type="time" class="form-control" name="duracao" id="inputDuracao" placeholder="Duração do filme">
                                </div>
                                <div class="col-md-8">
                                    <label for="inputData" class="form-label">Data de lançamento</label>
                                    <input type="date" class="form-control" name="data_lancamento" id="inputData">
                                </div>
                            <div class="col-12">
                                <label for="categoria" class="form-label">Categoria +<a href="categoria-formulario.php" class="link-padrao ms-1">Adicionar Categoria</a></label>
                                <select name="categoria_id" class="form-select">
                                    //loop para chamar as categorias e seus respectivos nomes de forma dinamica com o bd
                                    <?php foreach($categorias as $categoria) {?>
                                            <option value="<?php echo $categoria["id"];?>"><?php echo $categoria["nome"];?></option>
                                    <?php   }   ?>
                                </select>
                            </div>
                            <div class="d-flex justify-content-center">
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="assistido" value="true"> Já assistiu?
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-menu mt-2">Adicionar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <!-- Seção inicio -->
<?php include("footer.php"); ?>
