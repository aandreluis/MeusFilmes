<?php 
    include("header.php");
    include("conecta.php");
    include("banco-usuarios.php"); 
?>
<?php
    
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);

     if(alteraUsuario($conexao, $id, $nome, $email, $senha)) {//funcionou
        header("location: perfil.php?alteraUsuario=true");
        die();
    } else {
        header("location: altera-usuario-form.php?alteraUsuario=false");
        die();
    }
    //encerrar a conexão
    mysqli_close($conexao);
?>   
<?php include("footer.php"); ?>
