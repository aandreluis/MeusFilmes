<?php 
    function insereCategorias($conexao, $nome, $usuario_id){
        //insere do banco de dados
        $query = "INSERT INTO categoria (nome, usuario_id) VALUES ('{$nome}', '{$usuario_id}')";
        return mysqli_query($conexao, $query);
    }

    function listaCategoriasUsuario($conexao, $usuario_id, $opcao){
        $categorias = array();//criação da array vazia
        if($opcao == 1) { // 1 -> Categorias padrão + categorias do usuario (adicionar-filmes)
            $query = "SELECT * FROM categoria WHERE usuario_id = '{$usuario_id}' OR usuario_id = '0' ORDER BY nome ASC"; //usaruio_id = 0 admin
            $resultado = mysqli_query($conexao, $query);//retorna um array de valores
            while($categoria = mysqli_fetch_assoc($resultado)){//pega a array de valores
                array_push($categorias, $categoria); //adiciona valores dentro da array
            }
        }
        if($opcao == 2) { // 2 -> Apenas as categorias do usuario (listar-categorias)
            $query = "SELECT * FROM categoria WHERE usuario_id = '{$usuario_id}'"; //usaruio_id = 0 admin
            $resultado = mysqli_query($conexao, $query);//retorna um array de valores
            while($categoria = mysqli_fetch_assoc($resultado)){//pega a array de valores
                array_push($categorias, $categoria); //adiciona valores dentro da array
            }
        }
        return $categorias;
    }
   
    function listaTodasCategorias($conexao){// (Apenas para Painel adm)
        $categorias = array();//criação da array vazia
        $query = "SELECT * FROM categoria ORDER BY nome ASC"; //usaruio_id = 0 admin
        $resultado = mysqli_query($conexao, $query);//retorna um array de valores
        //laço para pegar todas as categorias
        while($categoria = mysqli_fetch_assoc($resultado)){//pega a array de valores
            array_push($categorias, $categoria); //adiciona valores dentro da array
        }
        return $categorias;
    }

    function removeCategoria($conexao, $id){
        $query = "DELETE FROM categoria WHERE id = {$id}";
        return mysqli_query($conexao, $query);
    }

    function removeCategoriasUsuario($conexao, $usuario_id){
        $query = "DELETE FROM categoria WHERE usuario_id = '{$usuario_id}'";
        return mysqli_query($conexao, $query);
    }

    function buscaCategoria($conexao, $id){
        $query = "SELECT * FROM categoria WHERE id = {$id}";
        $resultado = mysqli_query($conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }

    function alteraCategoria($conexao, $id, $nome) {
        $query = "UPDATE categoria SET nome = '{$nome}' WHERE id = '{$id}'";
        return mysqli_query($conexao, $query);
    }

?>