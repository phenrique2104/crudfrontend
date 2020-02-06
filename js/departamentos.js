function validaDepto() {
    var nome = document.querySelectorAll('#nome')[0];
    var sigla = document.querySelectorAll('#sigla')[0];

    if (nome.value == '') {
        alert('Preencha o nome');
        nome.focus();
        return false;
    }

    return false; //só para evitar o envio
}