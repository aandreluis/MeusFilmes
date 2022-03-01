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
        email:{
            required:true,
            email: true,
            remote: {
                url: 'validarAlteraEmail.php',
                type: "post",
            }
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
        email:{
            required:"Informe seu email",
            email:"Informe um email válido",
            remote: "Esse email já foi cadastrado"
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