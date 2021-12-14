<?php 
    function insereCategorias($conexao, $nome, $usuario_id){
        //insere do banco de dados
        $query = "insert into categoria (nome, usuario_id) values ('{$nome}', '{$usuario_id}')";
        return mysqli_query($conexao, $query);
    }

    function listaCategorias($conexao, $usuario_id){
        $categorias = array();//criação da array vazia
        $resultado = mysqli_query($conexao, "select * from categoria where usuario_id = '{$usuario_id}'");//retorna um array de valores
        //laço para pegar todas as categorias
        while($categoria = mysqli_fetch_assoc($resultado)){//pega a array de valores
            array_push($categorias, $categoria); //adiciona valores dentro da array
        }
        return $categorias;
    }

    function removeCategoria($conexao, $id){
        $query = "delete from categoria where id = {$id}";
        return mysqli_query($conexao, $query);
    }

    function buscaCategoria($conexao, $id){
        $query = "select * from categoria where id = {$id}";
        $resultado = mysqli_query($conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }

    function alteraCategoria($conexao, $id, $nome) {
        $query = "update categoria set nome = '{$nome}' where id = '{$id}'";
        return mysqli_query($conexao, $query);
    }

?>