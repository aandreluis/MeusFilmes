<?php 
    include("header.php");
    include("conecta.php");
    include("banco-filmes.php"); 
    verificaUsuario();
?>

<?php 
    $id = $_GET["id"];
    
    removeImagemCapaUsuario($conexao, $id);
    removeFilme($conexao, $id);
    header("Location: listar-filmes.php?removido=true");//volta para a pagita listar-filmes.php com um valor GET = true
    die();
?>

<?php include("footer.php"); ?>
