<?php 
    include("conecta.php");
    include("banco-usuarios.php");
    include("logica-usuario.php");

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $usuario = buscaUsuario($conexao, $email, $senha);

    if($usuario == NULL) {
        header("Location: index.php?login=false");
    } else {
        logaUsuario($conexao, $email);
        header("Location: index2.php?login=true");
    }
?>

