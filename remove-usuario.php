<?php 
    include("header.php");
    include("conecta.php");
    include("banco-usuarios.php"); 
    include("banco-filmes.php");
    include("banco-categorias.php");
    verificaUsuario();
?>

<?php 
    $id = $_GET["id"];
    removeImagemPerfil($conexao, $_SESSION["id-usuario"]); //remove imagem do perfil
    removeFilmesUsuario($conexao, $_SESSION["id-usuario"]); //remove todos os filmes
    removeCategoriasUsuario($conexao, $_SESSION["id-usuario"]); //remove todas as categorias
    removeUsuario($conexao, $id); //remove o usuario

    header("Location: index.php?removido=true");//volta para a pagita listar-filmes.php com um valor GET = true
    logout();
    die();
?>



<?php include("footer.php"); ?>
