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


$("#loginForm").validate({
    errorClass: "is-invalid",
    validClass: "is-valid",
    rules : {
        email:{
            required:true,
            email: true,
        },
        senha:{
            required:true,
        },
        mensagem:{
            required:true
        }                                 
    },
    messages:{
        email:{
            required:"Informe seu email",
            email:"Informe um email válido",
        },
        senha:{
            required:"Informe uma senha",
        },
        mensagem:{
            required:"A mensagem não pode ficar em branco"
        }      
    }
});

//verifica se o form está validado
var form = $("#loginForm");
form.validate();
$("#btnSubmit").click(function() {
    var button = $('#btnSubmit');
    if(form.valid()) {
        button.prop('disabled', true);
        button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+' Aguarde...');
        $('#loginForm').submit();
    } else {
        button.prop('disabled', false);
    }
});