<?php 
    include("header.php");
    include("conecta.php");
    include("banco-categorias.php");
    verificaUsuario();
?>

<?php 
     //pega as variaveis do formulario
     $id = $_POST["id"];
     $nome = $_POST["nome"];

    // Pegando as variáveis dinamicamente
    foreach ($_POST as $chave => $valor) {
        // Remove todas as tags HTML e os espaços em branco do valor no inicio e fim
        $$chave = trim(strip_tags($valor));

        //verifica se algum campo está vazio
        if (empty ($valor)) {
           // header("location: filmes-formulario.php?erro=camposVazios");
            header("location: altera-categoria-form.php?id=$id&erro=camposVazios");
            die();  
        }
    }
     
    if(alteraCategoria($conexao, $id, $nome)){//funcionou
        header("location: listar-categorias.php?alterado=true");
        die();
    }else{//não funcionou
        header("location: listar-categorias.php?alterado=false");
        die();
    }
    //encerrar a conexão
    mysqli_close($conexao);

?>

<?php include("footer.php"); ?>