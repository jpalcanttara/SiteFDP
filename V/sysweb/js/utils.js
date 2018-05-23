$(document).ready(function() {
    preloader(doAll);
});

function so_numero(e) {
    //teclas adicionais permitidas (tab,delete,backspace,setas direita e esquerda)
    keyCodesPermitidos = new Array(8, 9, 37, 39, 46);
    //numeros e 0 a 9 do teclado alfanumerico
    for (x = 48; x <= 57; x++) {
        keyCodesPermitidos.push(x);
    }
    //numeros e 0 a 9 do teclado numerico
    for (x = 96; x <= 105; x++) {
        keyCodesPermitidos.push(x);
    }
    //Pega a tecla digitada
    keyCode = e.which;
    //Verifica se a tecla digitada é permitida
    if ($.inArray(keyCode, keyCodesPermitidos) != -1) {
        return true;
    }
    return false;
}


// -------------------------------------------------------------------------
function toast(sMessage) {
    var container = $(document.createElement("div"));
    container.addClass("toast");
    var message = $(document.createElement("div"));
    message.addClass("message");
    message.html(sMessage);
    message.appendTo(container);
    container.appendTo(document.body);
    container.delay(100).fadeIn("slow", function() {
        $(this).delay(5100).fadeOut(400, function() {
            $(this).remove();
        });
    });
    $(container).click(function() {
        $(this).remove();
    });
}
// -------------------------------------------------------------------------


// -------------------------------------------------------------------------
function preloader(callback) {
    $('body').waitForImages(function() {
        $('.link_interno').click(function() {
            carregar();
        });
        $('.link_externo').click(function() {
            this.target = '_blank';
        });

        callback.call();

//        var _xhr = function() {
//            var xhr = new window.XMLHttpRequest();
//            //Upload progress
//            xhr.upload.addEventListener("progress", function(evt) {
//                var kb = evt.loaded / 1024;
//                $('#preloader').html('<h1>Carregando ' + kb.toFixed(2) + ' kb</h1>');
//            }, false);
//            //Download progress
//            xhr.addEventListener("progress", function(evt) {
//                var kb = evt.loaded / 1024;
//                $('#preloader').html('<h1>Carregando ' + kb.toFixed(2) + ' kb</h1>');
//            }, false);
//            return xhr;
//        };
//
//
//        $.ajaxSetup({
//            xhr: _xhr
//        });

        carregado();
    }, function(loaded, count, success) {
        $('#preloader').html('<div class="progress progress-striped active"><div class="progress-bar" style="width:' + (loaded / count * 100) + '%;"></div></div>')
        $('#preloader').append('<h1>Carregando ' + ((loaded / count * 100).toFixed(2)) + '%</h1>');

    }, true);
}
// -------------------------------------------------------------------------


// -------------------------------------------------------------------------
function carregar() {
    $('#preloader').html('<div class="progress progress-striped active"><div class="bar" style="width:0;"></div></div>')
    $('#preloader').append('<h1>Carregando 0.00%</h1>');
    $('#preloader').show();
    document.getElementById("preloader").focus();
}
function carregado() {
//    $('.grid').each(function(index, element) {
//        var _table = $(element);
//        if (_table.hasClass('initialised')) {
//            $('.grid').dataTable().fnDestroy();
//            $('.grid').not('.initialized').removeClass('initialized');
//        }
//    });
//    $('.grid').not('.initialized').addClass('initialized').dataTable({
//        bJQueryUI: true,
////    aaSorting: [[0, 'desc']]
//        aaSorting: []
//    });

    $('#preloader').html('<div class="progress progress-striped active"><div class="progress-bar" style="width:100%;"></div></div>')
    $('#preloader').append('<h1>Carregando 100.00%</h1>');
    $('#preloader').fadeOut('1000', function() {
        $('#preloader').empty();
    });

}
// -------------------------------------------------------------------------

// -------------------------------------------------------------------------
//$('.grid').each(function(index, element) {
//    var _table = $(element);
//    if (_table.hasClass('initialised')) {
//        $('.grid').dataTable().fnDestroy();
//        $('.grid').not('.initialized').removeClass('initialized');
//    }
//});
//$('.grid').not('.initialized').addClass('initialized').dataTable({
//    bJQueryUI: true,
////    aaSorting: [[0, 'desc']]
//    aaSorting: []
//});
// -------------------------------------------------------------------------



//-----------------------------------------------------------------------------
/* Brazilian initialisation for the jQuery UI date picker plugin. */
/* Written by Leonildo Costa Silva (leocsilva@gmail.com). */
//jQuery(function($) {
//    $.datepicker.regional['pt-BR'] = {
//        closeText: 'Fechar',
//        prevText: '&#x3c;Anterior',
//        nextText: 'Pr&oacute;ximo&#x3e;',
//        currentText: 'Hoje',
//        monthNames: ['Janeiro', 'Fevereiro', 'Mar&ccedil;o', 'Abril', 'Maio', 'Junho',
//            'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
//        monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun',
//            'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
//        dayNames: ['Domingo', 'Segunda-feira', 'Ter&ccedil;a-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sabado'],
//        dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
//        dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
//        weekHeader: 'Sm',
//        dateFormat: 'dd/mm/yy',
//        firstDay: 0,
//        isRTL: false,
//        showMonthAfterYear: false,
//        yearSuffix: ''
//    };
//    $.datepicker.setDefaults($.datepicker.regional['pt-BR']);
//});

function formToObject(idForm, debug) {
    var param = {};
    var form = $(idForm).serializeArray();
    if (debug) {
        dumpObject(0);
    }
    var formLenth = form.length;
    for (i = 0; i < formLenth; i++) {
        param[form[i]['name']] = form[i]['value'];
    }
    return param;
}

function dumpObject(o) {
    var b = "";
    $(o).each(function(k, v) {
        b += (k + " => " + v + "<br />");
    });
    toast(b);
}
