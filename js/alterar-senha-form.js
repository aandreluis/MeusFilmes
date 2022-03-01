jQuery.validator.addMethod('senhaForte', function (value, element) {
    /*
    Regex para senha forte:
    /^
    (?=.*\d)              // deve conter ao menos um dígito
    (?=.*[a-z])           // deve conter ao menos uma letra minúscula
    (?=.*[A-Z])           // deve conter ao menos uma letra maiúscula
    (?=.*[@!#$%^&*()/]) // deve conter ao menos um caractere especial
    [0-9a-zA-Z$*&@#]{6,}  // deve conter ao menos 6 dos caracteres mencionados
    $/ */

    let regras = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@!#$%&*()/])[0-9a-zA-Z@!#$%&*()/]{6,}$/
    if(regras.test(value)){
        return true;
    } else {
        return false;
    }
}, );


$("#alterarSenhaForm").validate({
    errorClass: "is-invalid",
    validClass: "is-valid",
    rules : {
        senhaAtual:{
            required:true,
            remote: {
                url: 'validarSenhaAtual.php',
                type: "post",
            }
        },
        senhaNova:{
            required:true,
            senhaForte: true,
            minlength: 6
        },
        senhaConfirmacao:{
            equalTo: "#senhaNova"
        },
        mensagem:{
            required:true
          }                                 
    },
    messages:{
        senhaAtual:{
            required:"Informe sua senha atual",
            remote:"Senha incorreta!"
        },
        senhaNova:{
            required:"Informe uma nova senha",
            senhaForte: "Utilize letras maiusculas, minusculas, números e caracteres especiais: [a-Z], [0-9], [@!#$%^&*()/]",
            minlength: "Sua senha deve possuir no mínino 6 caracteres"
        },
        senhaConfirmacao:{
            required:"Repita sua nova senha",
            equalTo:"Suas senhas não conferem"
        },
        mensagem:{
            required:"A mensagem não pode ficar em branco"
        }      
    }
});

//verifica se o form está validado
var form = $("#alterarSenhaForm");
form.validate();
$("#btnSubmit").click(function() {
    var button = $('#btnSubmit');
    if(form.valid()) {
        button.prop('disabled', true);
        button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+' Aguarde...');
        $('#alterarSenhaForm').submit();
    } else {
        button.prop('disabled', false);
    }
});