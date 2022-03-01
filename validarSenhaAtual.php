<?php 
    include("conecta.php");
    include("banco-categorias.php");
    include("logica-usuario.php");
?>

<?php
    $senhaAtual = $_POST["senhaAtual"];

    //confirma senha atual
    if(md5($senhaAtual) == $_SESSION["senha-usuario"]) {
        echo "true"; //nome do filme válido
    } else {
        echo "false";  //filme já cadastrado
    }

?>