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
    validClass: "os-valid",
    rules : {
        nome:{
            required:true,
            minlength:4
        },
        diretor:{
            required:true,
        },
        descricao:{
            required:true,
            maxlength:100
        },
        imagem:{
            accept: "image/*",
            extension: "png|jpe?g|jpg"
        },
        duracao:{
            required:true,
        },
        dataLancamento:{
            required:true,
            date:true
        },
          mensagem:{
            required:true
          }                                 
    },
    messages:{
        nome:{
            required:"Informe o nome do filme",
            minlength:"O nome deve ter pelo menos 4 caracteres"
        },
        diretor:{
            required:"Informe o nome do diretor",
        },
        descricao:{
            required:"Informe a descrição do filme",
            maxlength:"Você só pode utilizar 200 caracteres!"
        },
        imagem:{
            accept:"Só são aceitos arquivos de imagem",
            extension:"Só são permitidos arquivos com a extenção .png, .jpg e .jpeg"
        },
        duracao:{
            required:"Informe a duração do filme",
        },
        dataLancamento:{
            required:"Informe a data de lançamento do filme",
            date:"A data que você informou não é valida"

        },
        mensagem:{
            required:"A mensagem não pode ficar em branco"
        }      
    }
});