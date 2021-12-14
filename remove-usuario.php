<?php 
    include("header.php");
    include("conecta.php");
    include("banco-usuarios.php"); 
    include("banco-filmes.php");
    verificaUsuario();
?>

<?php 
    $id = $_GET["id"];
    removeImagem();
    removeFilmesUsuario($conexao, $_SESSION["id-usuario"]);
    removeUsuario($conexao, $id);
    header("Location: index.php?removido=true");//volta para a pagita listar-filmes.php com um valor GET = true
    logout();
    die();
?>



<?php include("footer.php"); ?>
