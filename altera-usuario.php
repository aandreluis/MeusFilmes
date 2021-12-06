<?php 
    include("header.php");
    include("conecta.php");
    include("banco-usuarios.php"); 
?>
<?php
    
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);
    
    $imagem = $_FILES['imagem']['name'];

    $_UP["pasta"] = "/xampp/htdocs/meusfilmes/img/avatar/";//caminho
    $_UP["tamanho"] = 1024*1024*100;
    $_UP["extensoes"] = array("png", "jpg", "jpeg", "svg");
    $_UP["renomeia"] = true;

    $_UP['erros'][0] = 'Não houve erro';
    $_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
    $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
    $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
    $_UP['erros'][4] = 'Não foi feito o upload do arquivo';

    //Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
    if($_FILES['imagem']['error'] != 0){
        die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['imagem']['error']]);
        exit; //Para a execução do script
    }

    //Faz a verificação da extensao do arquivo
	$extensao = explode('.', $_FILES['imagem']['name']);
	$extensao = strtolower(array_pop($extensao));
    //$extensao = strtolower(end(explode('.', $_FILES['imagem']['name']))); -> OLD
    if(array_search($extensao, $_UP['extensoes']) === false){		
        header("location: altera-usuario-form.php?uploadImagemErro=0");
    } else {
        //Faz a verificação do tamanho do arquivo
        if ($_UP['tamanho'] < $_FILES['imagem']['size']){
            header("location: altera-usuario-form.php?uploadImagemErro=1");
        } else { 
            //O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
            //Primeiro verifica se deve trocar o nome do arquivo
            if($_UP['renomeia'] == true){
                //Cria um nome baseado no UNIX TIMESTAMP atual e com extensão
               // $nome_final = time().'.png';
               $nome_final = "IMG".date("-Ymd-Hisa").".png";
            }else{
                //mantem o nome original do arquivo
                $nome_final = $_FILES['imagem']['name'];
            }
            //Verificar se é possivel mover o arquivo para a pasta escolhida
            if(move_uploaded_file($_FILES['imagem']['tmp_name'], $_UP['pasta']. $nome_final)){
                removeImagem();//remove imagem antiga
                //Upload efetuado com sucesso, exibe a mensagem
            }else{
                //Upload não efetuado com sucesso, exibe a mensagem
                header("location: altera-usuario-form.php?uploadImagemErro=2");
            }
        }
    }
   
    if(alteraUsuario($conexao, $id, $nome_final, $nome, $email, $senha)) {//funcionou
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
