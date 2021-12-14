<title>MeusFilmes - Listar Usuários</title>
<?php 
    include("header.php"); 
    include("conecta.php");
    include("banco-usuarios.php");
    include("banco-filmes.php");
    include("banco-categorias.php");
    verificaUsuario();
?>

<!-- Seção inicio -->
    <section class="mt-5">
        <div class="custom-home-container">
            <div id="home-pg">
                <div class="row">
                    <div class="col-md-12">
                    <h1 class="titulo-home">Usuários cadastrados</h1>
                    <?php
                    if (!listarUsuarios($conexao)) {//verifica se existe categorias para mostrar
                        ?>
                            <div class="row d-flex justify-content-center mt-4">
                                <div class="col-md-12">
                                    <h5 class="paragrafo-home text-muted text-center">Ops... Nenhum usuario encontrado!</h5>
                                    <img class="mx-auto d-block mt-3" style="width: 50%;" src="img/searching.svg" alt="Nada encontrado" >
                                </div>
                            </div>
                    <?php
                    } else {
                    ?>            
                        <table class="table table-dark table-striped table-bordered border-padrao text-center mt-3">
                            <tr class="text-white">
                                <td><b>ID</b></td>
                                <td><b>Nome</b></td>
                                <td><b>Email</b></td>
                                <td colspan="2"><b>Ações</b></td>
                            </tr>
                        <?php
                        $usuarios = listarUsuarios($conexao);
                            foreach($usuarios as $usuario){//for melhorado
                        ?>
                            <tr class="text-white">
                                <td><?php echo $usuario["id"]; ?></td>
                                <td><?php echo $usuario["nome"]; ?></td>
                                <td><?php echo $usuario["email"]; ?></td>
                                <td><a class="btn btn-danger" href="remove-usuario.php?id=<?php echo $usuario["id"] ?>"><i class="bi bi-trash"></i></a></td>
                                <td><a class="btn btn-primary" href="altera-usuario-form.php?id=<?php echo $usuario["id"] ?>"><i class="bi bi-gear-fill"></td>
                            </tr>
                        <?php
                        }
                    }
                        ?>
                        </table>
                    </div>
                </div>
                <!-- CATEGORIAS -->
                <div class="row">
                    <div class="col-md-12">
                    <h1 class="titulo-home">Categorias Cadastradas</h1>
                    <?php
                    if (!listaTodasCategorias($conexao)) {//verifica se existe categorias para mostrar
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
                        $categorias = listaTodasCategorias($conexao);
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
                <!-- CATEGORIAS -->


                <div class="row justify-content-center mt-3">
                    <div class="col-md-4 d-flex">
                        <img class="img-home mx-auto d-block" src="img/list.svg" alt="Cinema em casa">
                    </div>
                </div>

            </div>
        </div>
    </section> 
    <!-- Seção inicio -->
<?php include("footer.php"); ?>
