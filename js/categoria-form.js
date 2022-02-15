$("#categoriaForm").validate({
    errorClass: "is-invalid",
    validClass: "is-valid",
    rules : {
        nome:{
            required:true,
            maxlength: 30
        },
        mensagem:{
            required:true
        }                                 
    },
    messages:{
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
var form = $("#categoriaForm");
form.validate();
$("#btnSubmit").click(function() {
    var button = $('#btnSubmit');
    if(form.valid()) {
        button.prop('disabled', true);
        button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+' Aguarde...');
        $('#categoriaForm').submit();
    } else {
        button.prop('disabled', false);
    }
});