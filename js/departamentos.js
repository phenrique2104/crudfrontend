function validaDepto() {
    var nome = document.querySelectorAll('#nome')[0];
    var sigla = document.querySelectorAll('#sigla')[0];
    var caixaMsg = document.querySelectorAll('#msg-erro')[0];
    var msg = document.querySelectorAll('#msg-erro span')[0];
     

    if (nome.value == '') {
        msg.innerHTML = 'Preencha o nome';
        caixaMsg.classList.remove('hidden')
        nome.focus();
        return false;
    }

    if (sigla.value  == '') {
        msg.innerHTML = 'Preencha a sigla';
        caixaMsg.classList.remove('hidden')
        sigla.focus();
        return false;
    }

    return true; //só para evitar o envio
}