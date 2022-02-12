<?php 
    include("header.php");
    include("conecta.php");
    include("banco-categorias.php");
    verificaUsuario();
?>
<?php
    //pega as variaveis do formulario
    $nome = $_POST["nome"];
    $usuario_id = $_SESSION["id-usuario"];

    // Pegando as variáveis dinamicamente
    foreach ($_POST as $chave => $valor) {
        // Remove todas as tags HTML e os espaços em branco do valor no inicio e fim
        $$chave = trim(strip_tags($valor));

        //verifica se algum campo está vazio
        if (empty ($valor)) {
           // header("location: filmes-formulario.php?erro=camposVazios");
            header("location: categoria-formulario.php?erro=camposVazios");
            die();  
        }
    }

    //verifica se ja existe alguma categoria com o mesmo nome cadastrado
    if(verificaNomeCategoria($conexao, $nome, $usuario_id)) {
        header("location: categoria-formulario.php?erro=categoriaRepetida");
        die(); 
    }

    if(insereCategorias($conexao, $nome, $usuario_id)){//funcionou
            header("location: listar-categorias.php?add=true");
            die();
    }else{//não funcionou
            header("location: categoria-formulario.php?add=false");
            die();
    }
    //encerrar a conexão
    mysqli_close($conexao);
?>    
<?php include("footer.php"); ?>
