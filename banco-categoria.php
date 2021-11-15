<?php
    function listaCategorias($conexao){
        $categorias = array();//criação da array vazia
        $resultado = mysqli_query($conexao, "select * from categoria");//retorna um array de valores
        //laço para pegar todas os categorias
        while($categoria = mysqli_fetch_assoc($resultado)){//pega a array de valores
            array_push($categorias, $categoria); //adiciona valores dentro da array
        }
        return $categorias;
    }
?>