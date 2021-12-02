<?php 
    session_start();

    function verificaUsuario() {
        if(!usuarioEstaLogado()) {
            header("Location: index.php?falhaDeSeguranca=true");
            die();
        }
    }

    function usuarioEstaLogado() {//retorna existencia
        return isset($_SESSION["usuario_logado"]);
    }

    function usuarioLogado() {//retorna qual usuario
        return $_SESSION["usuario_logado"];
    }

    function logaUsuario($email) {
        $_SESSION["usuario_logado"] = $email;
    }

    function logout() {
        session_destroy();
    }


?>