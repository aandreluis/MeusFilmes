jQuery.validator.addMethod('senhaForte', function (value, element) {
    /*
    Regex para senha forte:
    /^
    (?=.*\d)              // deve conter ao menos um dígito
    (?=.*[a-z])           // deve conter ao menos uma letra minúscula
    (?=.*[A-Z])           // deve conter ao menos uma letra maiúscula
    (?=.*[!"#$%&'()*+ ,-./:;<=>?@^_`|~]) // deve conter ao menos um caractere especial
    [0-9a-zA-Z$*&@#]{6,}  // deve conter ao menos 8 dos caracteres mencionados
    $/ */

    let regras = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!"#$%&'()*+ ,-./:;<=>?@^_`|~])[0-9a-zA-Z!"#$%&'()*+ ,-./:;<=>?@^_`|~]{6,}$/
    if(regras.test(value)){
        return true;
    } else {
        return false;
    }
}, );


$("#alteraUserForm").validate({
    errorClass: "is-invalid",
    validClass: "is-valid",
    rules : {
        imagem:{
            accept: "image/*",
            extension: "png|jpe?g|jpg"
        },
        nome:{
            required:true,
            maxlength: 30
        },
       
        mensagem:{
            required:true
          }                                 
    },
    messages:{
        imagem:{
            accept:"Só são aceitos arquivos de imagem",
            extension:"Só são permitidos arquivos com a extenção .png, .jpg e .jpeg"
        },
        nome:{
            required:"Informe o nome",
            maxlength:"Limite de 30 caracteres"
        },
        mensagem:{
            required:"A mensagem não pode ficar em branco"
        }      
    }
});

//verifica se o form está validado
var form = $("#alteraUserForm");
form.validate();
$("#btnSubmit").click(function() {
    var button = $('#btnSubmit');
    if(form.valid()) {
        button.prop('disabled', true);
        button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+' Aguarde...');
        $('#alteraUserForm').submit();
    } else {
        button.prop('disabled', false);
    }
});