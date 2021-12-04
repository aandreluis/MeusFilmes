<?php 
    include("header.php");
    include("conecta.php");
    include("banco-usuarios.php"); 
    verificaUsuario();
?>

<?php 
    $id = $_GET["id"];
    removeUsuario($conexao, $id);
    header("Location: index.php?removido=true");//volta para a pagita listar-filmes.php com um valor GET = true
    logout();
    die();
?>



<?php include("footer.php"); ?>
