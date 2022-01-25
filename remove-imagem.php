<?php 
    include("header.php");
    include("conecta.php");
    include("banco-usuarios.php"); 
    verificaUsuario();
?>

<?php 
    if(removeImagem()) { //remove imagem do perfil
        header("Location: perfil.php?removido=1"); // Se conseguir remover
        die();
    } else {
        header("Location: perfil.php?removido=0"); // Se não conseguir
        die();
    }
?>



<?php include("footer.php"); ?>
