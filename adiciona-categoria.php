<?php 
    include("header.php");
    include("conecta.php");
    include("banco-categorias.php");
    verificaUsuario();
?>
<?php
    //pega as variaveis do formulario
    $nome = $_POST["nome"];
    $usuario_id = $_SESSION["id-usuario"];

    //verifica se algum campo está vazio
    if(empty($nome)) {
        header("location: categoria-formulario.php?camposVazios=true");
        die();
    }
    
    if(insereCategorias($conexao, $nome, $usuario_id)){//funcionou
            header("location: categoria-formulario.php?add=true");
            die();
    }else{//não funcionou
            header("location: categoria-formulario.php?add=false");
            die();
    }
    //encerrar a conexão
    mysqli_close($conexao);
?>    
<?php include("footer.php"); ?>
