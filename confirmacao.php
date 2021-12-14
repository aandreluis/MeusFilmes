<?php 
    include("header.php");
    include("conecta.php");
    include("banco-usuarios.php"); 
?>
<?php 

if(empty($senhaConfirmacao = $_POST["senhaConfirmacao"])) {//se a senha nova estiver vazia
    header("Location: perfil.php?senhaVazia");
    die();
} else { //se não estiver vazia
    if($senhaConfirmacao = md5($_POST["senhaConfirmacao"]) == $_SESSION["senha-usuario"]) {
        $id = $_SESSION["id-usuario"];
        header("Location: remove-usuario.php?id=$id");
        die();
    } else {
        header("Location: perfil.php?senhaInvalida");
        die();
    }
}

?>