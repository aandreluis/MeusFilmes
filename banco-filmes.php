<?php 
    function insereProdutos($conexao, $nome, $diretor, $descricao, $imagem, $data_lancamento, $duracao, $categoria_id, $assistido){//conexão com o banco e a query
        //insere do banco de dados
        $query = "insert into filmes (nome, diretor, descricao, imagem, data_lancamento, duracao, categoria_id, assistido) values ('{$nome}', '{$diretor}', '{$descricao}', '{$imagem}', '{$data_lancamento}', '{$duracao}', '{$categoria_id}', '{$assistido}')";
        /*  echo $query; //debugger
        die(); */
        return mysqli_query($conexao, $query);
    }

    function insereCategorias($conexao, $nome){//conexão com o banco e a query
        //insere do banco de dados
        $query = "insert into categoria (nome) values ('{$nome}')";
        return mysqli_query($conexao, $query);
    }

    function listaFilmes($conexao){
        $filmes = array();//criação da array vazia
        $resultado = mysqli_query($conexao, "select p.*, c.nome as categoria_nome from filmes as p join categoria as c on c.id=p.categoria_id");//retorna um array de valores
        //laço para pegar todas os produtos
        while($filme = mysqli_fetch_assoc($resultado)){//pega a array de valores
            array_push($filmes, $filme); //adiciona valores dentro da array
        }
        return $filmes;
    }

    function listaCategorias($conexao){
        $categorias = array();//criação da array vazia
        $resultado = mysqli_query($conexao, "select * from categoria");//retorna um array de valores
        //laço para pegar todas os produtos
        while($categoria = mysqli_fetch_assoc($resultado)){//pega a array de valores
            array_push($categorias, $categoria); //adiciona valores dentro da array
        }
        return $categorias;
    }

    function removeFilme($conexao, $id){
        $query = "delete from filmes where id = {$id}";
        return mysqli_query($conexao, $query);
    }

    function removeCategoria($conexao, $id){
        $query = "delete from categoria where id = {$id}";
        return mysqli_query($conexao, $query);
    }

    function buscaFilme($conexao, $id){
        $query = "select * from filmes where id = {$id}";
        $resultado = mysqli_query($conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }

    function buscaCategoria($conexao, $id){
        $query = "select * from categoria where id = {$id}";
        $resultado = mysqli_query($conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }

    function alteraFilme($conexao, $id, $nome, $diretor, $descricao, $imagem, $data_lancamento, $duracao, $categoria_id, $assistido) {
        $query = "update filmes set nome = '{$nome}', diretor = '{$diretor}', descricao = '{$descricao}', imagem = '{$imagem}', data_lancamento = '{$data_lancamento}', duracao = '{$duracao}', categoria_id = '{$categoria_id}', assistido = '{$assistido}' where id = '{$id}'";
        /*  echo $query; //debugger
        die(); */
        return mysqli_query($conexao, $query);
    }

    function alteraCategoria($conexao, $id, $nome) {
        $query = "update categoria set nome = '{$nome}' where id = '{$id}'";
        /*  echo $query; //debugger
        die(); */
        return mysqli_query($conexao, $query);
    }

?>