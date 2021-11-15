<?php 
    include("header.php");
    include("conecta.php");
    include("banco-filmes.php"); 
?>

<?php 
    $id = $_GET["id"];
    removeCategoria($conexao, $id);
    header("Location: listar-categorias.php?removido=true");//volta para a pagina
    die();
?>



<?php include("footer.php"); ?>
