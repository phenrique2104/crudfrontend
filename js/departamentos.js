function validaDepto () {
    var nome = document.querySelectorAll('#nome')[0];
    var sigla = document.querySelectorAll('#sigla')[0];
    var caixaMsg = document.querySelectorAll('#msg-erro')[0];
    var msg = document.querySelectorAll('#msg-erro span')[0];

    if (nome.value == '') { 
        
        caixaMsg.classList.remove('hidden');
        msg.innerHTML = 'Preencha o nome!';

        nome.focus();
        return false;
    }

    if (sigla.value == '') { 
        
        caixaMsg.classList.remove('hidden');
        msg.innerHTML = 'Preencha a sigla!';

        sigla.focus();
        return false;
    }


    return true;
}