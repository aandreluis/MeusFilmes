<?php 
    include("header.php");
    include("conecta.php");
    include("banco-filmes.php"); 
?>

<?php 
    $id = $_GET["id"];
    removeFilme($conexao, $id);
    header("Location: listar-filmes.php?removido=true");//volta para a pagita listar-filmes.php com um valor GET = true
    die();
?>



<?php include("footer.php"); ?>
