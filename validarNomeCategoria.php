<?php 
    include("conecta.php");
    include("banco-categorias.php");
    include("logica-usuario.php");
?>

<?php
    $nome = $_POST["nome"];
    $usuario_id = $_SESSION["id-usuario"];

    if(verificaNomeCategoria($conexao, $nome, $usuario_id)) {
        echo "true"; //nome do filme válido
    } else {
        echo "false";  //filme já cadastrado
    }

?>