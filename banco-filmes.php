<?php 
    function insereProdutos($conexao, $nome, $diretor, $descricao, $imagem, $data_lancamento, $duracao, $categoria_id, $usuario_id, $assistido){
        //insere do banco de dados
        $query = "insert into filmes (nome, diretor, descricao, imagem, data_lancamento, duracao, categoria_id, usuario_id, assistido) values ('{$nome}', '{$diretor}', '{$descricao}', '{$imagem}', '{$data_lancamento}', '{$duracao}', '{$categoria_id}', '{$usuario_id}', '{$assistido}')";
        /*  echo $query; //debugger
        die(); */
        return mysqli_query($conexao, $query);
    }

    function listaFilmes($conexao, $usuario_id){
        $filmes = array();//criação da array vazia
        $query = "select f.*, c.nome as categoria_nome from filmes as f join categoria as c on c.id = f.categoria_id where f.usuario_id = '{$usuario_id}'";
        $resultado = mysqli_query($conexao, $query);//retorna um array de valores
        //laço para pegar todas os filmes
      /*   echo $query;
        die(); */
        while($filme = mysqli_fetch_assoc($resultado)){//pega a array de valores
            array_push($filmes, $filme); //adiciona valores dentro da array
        }
        return $filmes;
    }

    function removeFilme($conexao, $id){
        $query = "delete from filmes where id = {$id}";
        return mysqli_query($conexao, $query);
    }

    function removeFilmesUsuario($conexao, $usuario_id){
        return mysqli_query($conexao, "delete from filmes where usuario_id = {$usuario_id}");
    }

    function buscaFilme($conexao, $id){
        $query = "select * from filmes where id = {$id}";
        $resultado = mysqli_query($conexao, $query);
        return mysqli_fetch_assoc($resultado);
    }

    function alteraFilme($conexao, $id, $nome, $diretor, $descricao, $imagem, $data_lancamento, $duracao, $categoria_id, $assistido) {
        $query = "update filmes set nome = '{$nome}', diretor = '{$diretor}', descricao = '{$descricao}', imagem = '{$imagem}', data_lancamento = '{$data_lancamento}', duracao = '{$duracao}', categoria_id = '{$categoria_id}', assistido = '{$assistido}' where id = '{$id}'";
        return mysqli_query($conexao, $query);
    }

?>