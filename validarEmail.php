<?php 
    include("conecta.php");
    include("banco-usuarios.php");
?>

<?php
    $email = $_POST['email'];

    if(verificaEmail($conexao, $email)) {
        echo "true"; //email válido
    } else {
        echo "false";  //email já cadastrado
    }

?>