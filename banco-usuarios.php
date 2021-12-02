<?php 
    function buscaUsuario($conexao, $email, $senha) {
        $senhaMd5 = md5($senha);
        $email = mysqli_real_escape_string($conexao, $email);//mysql injections
        $query = "select * from usuarios where email = '{$email}' and senha = '{$senhaMd5}'";
        $resultado = mysqli_query($conexao, $query);
        $usuario = mysqli_fetch_assoc($resultado);
        return $usuario;
    }

    function cadastraUsuario($conexao, $nome, $email, $senha){
        $query = "insert into usuarios (nome, email, senha) values ('{$nome}', '{$email}', '{$senha}')";
        return mysqli_query($conexao, $query);
    }




?>