<?php 
    include("conecta.php");
    include("banco-usuarios.php");

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $usuario = buscaUsuario($conexao, $email, $senha);

    if($usuario == NULL) {
        header("Location: index.php?login=false");
    } else {
        header("Location: index2.php?login=true");
    }
?>

