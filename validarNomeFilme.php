<?php 
    include("conecta.php");
    include("banco-filmes.php");
    include("logica-usuario.php");
?>

<?php
    $nome = $_POST["nome"];
    $usuario_id = $_SESSION["id-usuario"];

    if(verificaNomeFilme($conexao, $nome, $usuario_id)) {
        echo "true"; //nome do filme válido
    } else {
        echo "false";  //filme já cadastrado
    }

?>