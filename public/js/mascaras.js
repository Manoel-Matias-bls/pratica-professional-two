$(document).ready(function(){
    $('input.campoplaca').inputmask("AAA-9999", {'removeMaskOnSubmit' : true});
    $('input.campotelefone').inputmask("(99) 99999-9999", {'removeMaskOnSubmit' : true});
    $('input.campodata').inputmask("99/99/9999", {'removeMaskOnSubmit' : true});
    $('input.campocpf').inputmask("999.999.999-99", {'removeMaskOnSubmit' : true});
    $('input.campocep').inputmask("99999-999", {'removeMaskOnSubmit' : true});
    $('input.campocnpj').inputmask("99.999.999/9999-99", {'removeMaskOnSubmit' : true});
    $('input.campocartaomes').inputmask("99", {'removeMaskOnSubmit' : true});
    $('input.campocartaoano').inputmask("9999", {'removeMaskOnSubmit' : true});
    $('input.campocartaocvv').inputmask("999", {'removeMaskOnSubmit' : true});
    $('input.campocartaonumero').inputmask("9999 9999 9999 9999", {'removeMaskOnSubmit' : true});
    $('input.campodinheiro').inputmask("currency", {radixPoint: '.', prefix: 'R$ ', 'removeMaskOnSubmit' : true});
});