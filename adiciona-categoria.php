<?php 
    include("header.php");
    include("conecta.php");
    include("banco-filmes.php");
    verificaUsuario();
?>
<?php
    //pega as variaveis do formulario
    $nome = $_POST["nome"];
    
    
    if(insereCategorias($conexao, $nome)){//funcionou
        ?>
            <p class="alert alert-success">Categoria <?php echo $nome; ?> cadastrada com sucesso!</p>
            <?php 
            header("location: listar-categorias.php?add=true");
            die();
        ?>
        <?php
    }else{//não funcionou
        ?>
            <p class="alert alert-danger">Categoria <?php echo $nome; ?> não foi cadastrada!</p>
            <?php 
            header("location:listar-categorias.php?add=true");
            die();
        ?>
        <?php
    }
    //encerrar a conexão
    mysqli_close($conexao);
?>    
<?php include("footer.php"); ?>
