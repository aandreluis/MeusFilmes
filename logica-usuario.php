<?php 
    include("conecta.php");
    session_start();

    function verificaUsuario() {
        if(!usuarioEstaLogado()) {
            header("Location: index.php?falhaDeSeguranca=true");
            die();
        }
    }

    function usuarioEstaLogado() {//retorna existencia
        return isset($_SESSION["email-usuario"]);
    }

    function usuarioLogado() {//retorna qual usuario
        return $_SESSION["email-usuario"];
    }

    function logaUsuario($conexao, $email) {
        $query = "select * from usuarios where email = '{$email}'";
        $resultado = mysqli_query($conexao, $query);
        $usuario = mysqli_fetch_assoc($resultado);
        $_SESSION["id-usuario"] = $usuario["id"];
        $_SESSION["imagem-usuario"] = $usuario["imagem"];
        $_SESSION["nome-usuario"] = $usuario["nome"];
        $_SESSION["email-usuario"] = $usuario["email"];
        $_SESSION["senha-usuario"] = $usuario["senha"];

    }

    function resetSession() {
        session_reset();
    }

    function logout() {
        session_destroy();
    }


?>