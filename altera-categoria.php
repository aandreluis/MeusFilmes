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

    //verifica se algum campo está vazio
    if(empty($nome)) {
        header("location: altera-categoria-form.php?id=$id&camposVazios=true");
        die();
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