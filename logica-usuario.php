<?php 
    include("conecta.php");

    if (session_status() == PHP_SESSION_NONE) {
        $time = 2 * 60 * 60; // Define 2 horas tempo do cookie da sessão
        session_set_cookie_params($time);

        session_start();
    }

    function verificaStatusLogin() {
        if(usuarioEstaLogado()) {
            header("Location: index2.php?login=status");
            die();
        }
    }

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