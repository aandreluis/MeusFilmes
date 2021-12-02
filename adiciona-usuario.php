<?php 
    include("header.php");
    include("conecta.php");
    include("banco-usuarios.php"); 
?>
<?php
    
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);

     if(cadastraUsuario($conexao, $nome, $email, $senha)) {//funcionou
        header("location: index.php?cadastrarUsuario=true");
        die();
    } else {
        header("location: usuario-formulario.php?cadastrarUsuario=false");
        die();
    }
    //encerrar a conexão
    mysqli_close($conexao);
?>   
<?php include("footer.php"); ?>
