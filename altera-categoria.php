<?php 
    include("header.php");
    include("conecta.php");
    include("banco-filmes.php");
    verificaUsuario();
?>

<?php 
     //pega as variaveis do formulario
     $id = $_POST["id"];
     $nome = $_POST["nome"];
     
    if(alteraCategoria($conexao, $id, $nome)){//funcionou
        ?>
            <p class="alert alert-success">Categoria <?php echo $nome; ?> alterada com sucesso!</p>
            <?php 
            header("location: listar-categorias.php?alterado=true");
            die();
            ?>

        <?php
    }else{//não funcionou
        ?>
            <p class="alert alert-danger">Categoria <?php echo $nome; ?> não foi cadastrado!</p>
            <?php 
            header("location: listar-categorias.php?alterado=false");
            die();
            ?>

        <?php
    }
    //encerrar a conexão
    mysqli_close($conexao);

?>

<?php include("footer.php"); ?>