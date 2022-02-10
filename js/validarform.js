function checkForm(form) {
    var btnSubmit = document.getElementById("btnSubmit");
    btnSubmit.disabled = true;
    btnSubmit.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'+' Aguarde...';
    return true;
}


