<?php 
    include("conecta.php");
    include("banco-usuarios.php");
?>

<?php
    $email = $_POST['email'];

    if(verificaEmail($conexao, $email)) {
        echo "false";  //email já cadastrado
    } else {
        echo "true"; //email válido
    }

?>