<?php 
    include("header.php");
    include("conecta.php");
    include("banco-usuarios.php"); 
?>
<?php
    
    $id = $_SESSION["id-usuario"]; //pega o id via session
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    
    if(empty($senhaNova = $_POST["senhaNova"])) {//se a senha nova estiver vazia
        $senha = $_SESSION["senha-usuario"]; //deixa a senha atual, a que está na sessão (ja md5)
    } else { //se não estiver vazia
        $senha = md5($senhaNova); //coloca a nova senha md5
    }
    
    if(empty($imagem = $_FILES['imagem']['name'])) {
        $imagemFinal = $_SESSION["imagem-usuario"]; //deixa a imagem atual da sessão
    } else {
        $_UP["pasta"] = "/xampp/htdocs/meusfilmes/img/avatar/";//caminho
        $_UP["tamanho"] = 1024*1024*100; //5mb
        $_UP["extensoes"] = array('png', 'jpg', 'jpeg');//array com as extensões permitidas
        $_UP["renomeia"] = true;
        //erros de upload
        $_UP['erros'][0] = 'Não houve erro';
        $_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
        $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
        $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
        $_UP['erros'][4] = 'Não foi feito o upload do arquivo';

        //Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
        if($_FILES['imagem']['error'] != 0) {
            die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['imagem']['error']]);
            exit; //Para a execução do script
        }

        //Faz a verificação da extensao do arquivo
        /*  explode //separa pelo "." o nome da imagem e sua extensão
            array_pop //pega o ultimo valor da array
            strtolower //deixa todos os caracteres minusculos */
        $extensao = strtolower(array_pop(explode('.', $_FILES['imagem']['name'])));
        if(array_search($extensao, $_UP['extensoes']) === false) {
            header("location: altera-usuario-form.php?id=$id&uploadImagemErro=0");//extensão invalida
            exit();
        } else {
            //Faz a verificação do tamanho do arquivo
            if($_UP['tamanho'] < $_FILES['imagem']['size']) {
                header("location: altera-usuario-form.php?id=$id&uploadImagemErro=1");//tamanho maior que o permitido
                exit();
            } else {  //O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
                //Renomear o arquivo
                if($_UP['renomeia'] == true) {
                    //Cria um nome baseado na DATA e UNIX TIMESTAMP atual + extensão .PNG
                    date_default_timezone_set("Brazil/East"); //define o timerzone default para o Brasil
                    $imagemFinal = "IMG".date("-dmY-Hisa").".png"; //concatena IMG + DATA e HORA + extensão
                } else {
                    //mantem o nome original do arquivo
                    $imagemFinal = $_FILES['imagem']['name'];
                }
                //Verificar se é possivel mover o arquivo para a pasta escolhida
                if(move_uploaded_file($_FILES['imagem']['tmp_name'], $_UP['pasta']. $imagemFinal)) {
                    removeImagem();//funcão que remove a imagem antiga
                    //Upload efetuado com sucesso
                } else {
                    //Upload não efetuado com sucesso, exibe a mensagem
                    header("location: altera-usuario-form.php?id=$id&uploadImagemErro=2");//erro de upload
                    exit();
                }
            }
        }
    }
    //depois de trabalhar com o upload segue para a alteração no banco
    if(alteraUsuario($conexao, $id, $imagemFinal, $nome, $email, $senha)) {//funcionou
        header("location: perfil.php?alteraUsuario=true");
        die();
    } else {
        header("location: altera-usuario-form.php?alteraUsuario=false");
        die();
    }
    //encerrar a conexão
    mysqli_close($conexao);
?>   

<?php include("footer.php"); ?>
