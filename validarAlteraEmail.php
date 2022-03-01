<?php 
    include("conecta.php");
    include("banco-usuarios.php");
    include("logica-usuario.php");
?>

<?php
    $emailAntigo = $_SESSION["email-usuario"];
    $email = $_POST['email'];

    if($emailAntigo == $email) {
        echo "true"; //email válido
    } else {
        if(verificaEmail($conexao, $email)) {
            echo "true"; //email válido
        } else {
            echo "false";  //email já cadastrado
        }
    }

?>