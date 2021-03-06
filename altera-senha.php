<?php 
    include("header.php");
    include("conecta.php");
    include("banco-usuarios.php"); 
?>
<?php
    
    $id = $_SESSION["id-usuario"]; //pega o id via session
    $senhaAtual = $_POST["senhaAtual"];
    $senhaNova = $_POST["senhaNova"];
    $senhaConfirmacao = $_POST["senhaConfirmacao"];

     // Pegando as variáveis dinamicamente
     foreach ($_POST as $chave => $valor) {
        // Remove todas as tags HTML e os espaços em branco do valor no inicio e fim
        $$chave = trim(strip_tags($valor));

        //verifica se algum campo está vazio
        if (empty ($valor)) {
            header("location: alterar-senha-form.php?erro=camposVazios");
            die();  
        }
    }

    //confirma senha atual
    if(md5($senhaAtual) != $_SESSION["senha-usuario"]) {
        header("location: alterar-senha-form.php?erro=senhaAtualInvalida");
        die();
    }

    //verifica se a senha e a confirmação são iguais
    if ($senhaNova != $senhaConfirmacao) {
        header("location: alterar-senha-form.php?erro=senhasNaoConferem");
        die();
    }

    //verifica se a nova senha é igual a senha atual 
    if($senhaAtual == $senhaNova) {
        header("location: alterar-senha-form.php?erro=senhaRepetida");
        die();
    }

    /*regex para verificar o nivel de força da senha
    [a-z] // tem pelo menos uma letra minúscula
    [A-Z] // tem pelo menos uma letra maiúscula
    [0-9] // tem pelo menos um número
    [\w$@]{6,} // tem 6 ou mais caracteres 
    @!#$%^&*()/*/
    if(preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[\w!@#$%&*)/(]{6,}$/', $senhaNova)) {
        $senhaNovaMd5 = md5($senhaNova);
    } else {
        header("location: alterar-senha-form.php?erro=senhaFraca");
        die();
    }   

    //depois de trabalhar com o upload segue para a alteração no banco
    if(alteraSenhaUsuario($conexao, $id, $senhaNovaMd5)) {//funcionou
        header("location: perfil.php?alterarSenha=true");
        die();
    } else {
        header("location: alterar-senha-form.php?alterarSenha=false");
        die();
    }
    //encerrar a conexão
    mysqli_close($conexao);
?>   

<?php include("footer.php"); ?>
