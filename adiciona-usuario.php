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

    // Pegando as variáveis dinamicamente
    foreach ($_POST as $chave => $valor) {
        // Remove todas as tags HTML e os espaços em branco do valor no inicio e fim
        $$chave = trim(strip_tags($valor));

        //verifica se algum campo está vazio
        if (empty ($valor)) {
            header("location: usuario-formulario.php?erro=camposVazios");
            die();  
        }
    }
    

     //verificação do email
     if(verificaEmail($conexao, $email)) {
        header("location: usuario-formulario.php?erro=emailInvalido");
        die();
    }

    //vefiricação da senha
    if($senha == "" || $senha == NULL) { //senha em branco
        header("location: usuario-formulario.php?erro=senhaInvalida");
        die();
    } else {
        if($senha == $senhaConfirmacao) {
            //Ok
            $senhaMd5 = md5($senha);
        } else {
            header("location: usuario-formulario.php?erro=senhasNaoConferem");
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
