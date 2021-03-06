const textDescricao = document.getElementById("descricao");
const divFalta = document.getElementById("falta");

function contarTexto(campo, limite, container) {
    if(campo.value.length > limite) {
        campo.value = campo.value.substring(0, limite);
    } else {
        container.innerHTML = 'Cuidado com o limite de caracteres! Faltam: <strong>' + (parseInt(limite) - parseInt(campo.value.length)) + '</strong> caracteres. <i class="bi bi-exclamation-circle"></i>';
    }
}

textDescricao.addEventListener("keydown", function(){
    contarTexto(textDescricao, 200, divFalta);
});


$("#filmeForm").validate({
    errorClass: "is-invalid",
    validClass: "is-valid",
    rules : {
        nome:{
            required:true,
            maxlength: 30,
            remote: {
                url: 'validarNomeFilme.php',
                type: "post",
            }
        },
        diretor:{
            required:true,
            maxlength: 30
        },
        descricao:{
            required:true,
            maxlength:200
        },
        imagem:{
            accept: "image/*",
            extension: "png|jpe?g|jpg"
        },
        duracao:{
            required:true,
        },
        data_lancamento:{
            required:true,
            date:true
        },
        categoria_id:{
            required:true,
            number: true
        },
          mensagem:{
            required:true
          }                                 
    },
    messages:{
        nome:{
            required:"Informe o nome",
            maxlength:"Limite de 30 caracteres",
            remote: "Esse filme já foi cadastrado"
        },
        diretor:{
            required:"Informe o diretor",
            maxlength:"Limite de 30 caracteres"
        },
        descricao:{
            required:"Informe a descrição",
            maxlength:"Você só pode utilizar 200 caracteres!"
        },
        imagem:{
            accept:"Só são aceitos arquivos de imagem",
            extension:"Só são permitidos arquivos com a extenção .png, .jpg e .jpeg"
        },
        duracao:{
            required:"Informe a duração",
        },
        data_lancamento:{
            required:"Informe a data de lançamento",
            date:"A data que você informou não é valida"
        },
        categoria_id:{
            required:"Informe uma categoria",
            number: "Selecione uma categoria válida"
        },
        mensagem:{
            required:"A mensagem não pode ficar em branco"
        }      
    }
});

//verifica se o form está validado
var form = $("#filmeForm");
form.validate();
$("#btnSubmit").click(function() {
    var button = $('#btnSubmit');
    if(form.valid()) {
        button.prop('disabled', true);
        button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+' Aguarde...');
        $('#filmeForm').submit();
    } else {
        button.prop('disabled', false);
    }
});