<?php 
    include("header.php");
    include("conecta.php");
    include("banco-filmes.php"); 
    verificaUsuario();
?>
<?php
    //pega as variaveis do formulario
    $nome = $_POST["nome"];
    $diretor = $_POST["diretor"];
    $descricao = $_POST["descricao"];
    $imagem = $_POST["imagem"];
    $data_lancamento = $_POST["data_lancamento"];
    $duracao = $_POST["duracao"];
    $categoria_id = $_POST["categoria_id"];
    if(isset($_POST['assistido']))
    {
        $assistido = "0";
    }
    else
    {
       $assistido = "1";
    }
    
    if(insereProdutos($conexao, $nome, $diretor, $descricao, $imagem, $data_lancamento, $duracao, $categoria_id, $assistido)){//funcionou
        ?>
            <p class="alert alert-success">Filme <?php echo $nome; ?> cadastrado com sucesso!</p>
        <?php 
            header("location: listar-filmes.php?add=true");
            die();
        ?>

        <?php
    }else{//não funcionou
        ?>
            <p class="alert alert-danger">Filme <?php echo $nome; ?> não foi cadastrado!</p>
        <?php 
            header("location: listar-filmes.php?add=false");
            die();
        ?>
        
        <?php
    }
    //encerrar a conexão
    mysqli_close($conexao);
?>    
<?php include("footer.php"); ?>
