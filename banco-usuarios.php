<?php 
    function buscaUsuario($conexao, $email, $senha) {
        $senhaMd5 = md5($senha);
        $email = mysqli_real_escape_string($conexao, $email);//mysql injections
        $query = "select * from usuarios where email = '{$email}' and senha = '{$senhaMd5}'";
        $resultado = mysqli_query($conexao, $query);
        $usuario = mysqli_fetch_assoc($resultado);
        return $usuario;
    }

    function verificaEmail($conexao, $email) {
        if($email == "" || $email == NULL) {
            return 1;
        }
        $linhas = mysqli_query($conexao, "select * from usuarios where email = '{$email}'");
        if(mysqli_num_rows($linhas) > 0){
            return 1; //existe um email ja cadastrado
        }
        return 0; //não existe
    }

    function cadastraUsuario($conexao, $imagem, $nome, $email, $senha){
        $query = "insert into usuarios (imagem, nome, email, senha) values ('{$imagem}', '{$nome}', '{$email}', '{$senha}')";
        return mysqli_query($conexao, $query);
    }

    function removeUsuario($conexao, $id){
        $query = "delete from usuarios where id = {$id}";
        return mysqli_query($conexao, $query);
    }

    function removeImagem() { //altera-usuario
        $imagem = "/xampp/htdocs/meusfilmes/img/avatar/".$_SESSION["imagem-usuario"];
        if(file_exists($imagem)) {
            unlink($imagem);
        }
    }

    function removeImagemPerfil($conexao, $id) { //remove-usuario
        $imagem = mysqli_query($conexao, "SELECT imagem FROM usuarios where id = {$id}");
        $validarImagem = implode(mysqli_fetch_row($imagem));
        if($validarImagem == NULL || $validarImagem == ''){
            return 0;
        }
        $imagem = "/xampp/htdocs/meusfilmes/img/avatar/".$_SESSION["imagem-usuario"];
        if(file_exists($imagem)) {
            unlink($imagem);
            return 1;
        }
        return 0;
    }

    function alteraUsuario($conexao, $id, $imagem, $nome, $email, $senha) {
        $query = "update usuarios set imagem = '{$imagem}', nome = '{$nome}', email = '{$email}', senha = '{$senha}' where id = '{$id}'";
        //atualiza dos valores da session
        $_SESSION["id-usuario"] = $id;
        $_SESSION["imagem-usuario"] = $imagem;
        $_SESSION["nome-usuario"] = $nome;
        $_SESSION["email-usuario"] = $email;
        $_SESSION["senha-usuario"] = $senha;
        return mysqli_query($conexao, $query);
    }

    function listarUsuarios($conexao){
        $usuarios = array();//criação da array vazia
        $resultado = mysqli_query($conexao, "select * from usuarios");//retorna um array de valores
        //laço para pegar todas os produtos
        while($usuario = mysqli_fetch_assoc($resultado)){//pega a array de valores
            array_push($usuarios, $usuario); //adiciona valores dentro da array
        }
        return $usuarios;
    }
    




?>