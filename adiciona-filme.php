<?php 
    include("header.php");
    include("conecta.php");
    include("banco-filmes.php");
    verificaUsuario();
?>
<?php

    //pega as variaveis do formulario
    $nome = $_POST["nome"];
    $diretor = $_POST["diretor"];
    $descricao = $_POST["descricao"];
    $data_lancamento = $_POST["data_lancamento"];
    $duracao = $_POST["duracao"];
    $categoria_id = $_POST["categoria_id"];
    $usuario_id = $_SESSION["id-usuario"]; //adiciona o user da sessão no banco
    if(isset($_POST['assistido'])) {
        $assistido = "0";
    } else {
       $assistido = "1";
    }

    // Pegando as variáveis dinamicamente
    foreach ($_POST as $chave => $valor) {
        // Remove todas as tags HTML e os espaços em branco do valor no inicio e fim
        $$chave = trim(strip_tags($valor));

        //verifica se algum campo está vazio
        if (empty ($valor)) {
            header("location: filmes-formulario.php?erro=camposVazios");
            die();  
        }
    }

    //verifica se ja existe um filme com o mesmo nome cadastrado
    if(!verificaNomeFilme($conexao, $nome, $usuario_id)) {
        header("location: filmes-formulario.php?erro=filmeRepetido");
        die(); 
    }

    //validação do input data_duração
    $data = $data_lancamento;
    $d = DateTime::createFromFormat('Y-m-d', $data); //define o formato Ano-Mês-Dia
    if($d && $d->format('Y-m-d') == $data){//verifica se o formato é igual ao aceito
        //data valida
    }else{
        header("location: filmes-formulario.php?erro=dataInvalida");
        die();
    } 

    //validação do input duração
    $tempo = $duracao;
    $d = DateTime::createFromFormat('H:i', $tempo); //define o formato Hora:Minuto
    if($d && $d->format('H:i') == $tempo){
        //tempo valido
    }else{
        header("location: filmes-formulario.php?erro=duracaoInvalida");
        die();
    }

    //verifica se existe e se é número (id)
    if((!isset($categoria_id) || !is_numeric($categoria_id))) {
        header("location: filmes-formulario.php?erro=categoriaInvalida");
       die();
    }

    //verifica se existe e se é número (1 e 0)
    if((!isset($assistido) || !is_numeric($assistido))) {
        header("location: filmes-formulario.php?erro=assistidoInvalido");
       die();
    }

    //upload imagem da capa
    if(empty($imagem = $_FILES['imagem']['name'])) {
        $imagemFinal = ""; //deixa vazia
    } else {
        $_UP["pasta"] = "./img/capa-filmes/"; //caminho
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
        $extensao = strtolower(array_pop(explode('.', $_FILES['imagem']['name'])));
        if(array_search($extensao, $_UP['extensoes']) === false) {
            header("location: filmes-formulario.php?uploadImagemErro=0");//extensão invalida
            exit();
        } else {
            //Faz a verificação do tamanho do arquivo
            if($_UP['tamanho'] < $_FILES['imagem']['size']) {
                header("location: filmes-formulario.php?uploadImagemErro=1");//tamanho maior que o permitido
                exit();
            } else {  //O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
                //Renomear o arquivo
                if($_UP['renomeia'] == true) {
                    //Cria um nome baseado na DATA e UNIX TIMESTAMP atual + extensão .PNG
                    date_default_timezone_set("Brazil/East"); //define o timerzone default para o Brasil
                    $imagemFinal = "IMG-CAPA".date("-dmY-Hisa").".png"; //concatena IMG + DATA e HORA + extensão
                } else {
                    //mantem o nome original do arquivo
                    $imagemFinal = $_FILES['imagem']['name'];
                }
                //Verificar se é possivel mover o arquivo para a pasta escolhida
                if(move_uploaded_file($_FILES['imagem']['tmp_name'], $_UP['pasta']. $imagemFinal)) {
                    //Upload efetuado com sucesso
                } else {
                    //Upload não efetuado com sucesso, exibe a mensagem
                    header("location: filmes-formulario.php?uploadImagemErro=2");//erro de upload
                    exit();
                }
            }
        }
    }
    
    if(insereFilmes($conexao, $nome, $diretor, $descricao, $imagemFinal, $data_lancamento, $duracao, $categoria_id, $usuario_id, $assistido)){//funcionou
        header("location: listar-filmes.php?p=1&add=true");
        die();
    }else{//não funcionou
        removeImagemCapa($imagemFinal); //remove imagem que foi cadastrada, porém o filme não.
        header("location: filmes-formulario.php?p=1&add=false");
        die();
    }
    //encerrar a conexão
    mysqli_close($conexao);
?>    
<?php include("footer.php"); ?>
