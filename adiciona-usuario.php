<?php 
    include("conecta.php");
    include("banco-usuarios.php"); 
    include("logica-usuario.php");
?>
<?php
    
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $senhaConfirmacao = $_POST["senhaConfirmacao"];
    $imagemNome = "IMG-default".date("-dmY-Hisa").".png"; //concatena IMG + DATA e HORA + extensão
    

     //verificação do email
     if(verificaEmail($conexao, $email)) {
        header("location: usuario-formulario.php?emailInvalido=true");
        die();
    }

    //vefiricação da senha
    if($senha == "" || $senha == NULL) { //senha em branco
        header("location: usuario-formulario.php?senhaInvalida=true");
        die();
    } else {
        if($senha == $senhaConfirmacao) {
            //Ok
            $senhaMd5 = md5($senha);
        } else {
            header("location: usuario-formulario.php?senhasNaoConferem=true");
            die();
        }
    }
       
    //cadastro do usuario
    if(cadastraUsuario($conexao, $imagemNome, $nome, $email, $senhaMd5)) {//funcionou
        logaUsuario($conexao, $email);
        header("location: index2.php?cadastrarUsuario=true");
        die();
    } else {
        header("location: usuario-formulario.php?cadastrarUsuario=false");
        die();
    }
    //encerrar a conexão
    mysqli_close($conexao);
?>   
<?php include("footer.php"); ?>
