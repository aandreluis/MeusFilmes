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