function doAll() {
    /* ---------- Datable ---------- */
    $('.datatable').dataTable({
        "sDom": "<'row'<'col-lg-6'l><'col-lg-6'f>r>t<'row'<'col-lg-12'i><'col-lg-12 center'p>>",
        "sPaginationType": "bootstrap",
        "oLanguage":
                {
                    "sProcessing": "Processando...",
                    "sLengthMenu": "Mostrar _MENU_ itens",
                    "sZeroRecords": "Não foram encontrados resultados",
                    "sInfo": "Mostrando de _START_ a _END_ de _TOTAL_ itens",
                    "sInfoEmpty": "Mostrando de 0 até 0 de 0 itens",
                    "sInfoFiltered": "(filtrado de _MAX_ itens no total)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext": "Seguinte",
                        "sLast": "Último"
                    }
                }
    });
    /* ------------------------- ---------- */

}

function goTop() {
    $('html, body').animate({
        scrollTop: $('body').offset().top
    }, 800);
}

function submitFormLogin() {
    $('#password').val(hex_md5($('#password').val()));
}

function submitFormAdmin() {
    $('#a_senha').val(hex_md5($('#a_senha').val()));
    $('#n_senha').val(hex_md5($('#n_senha').val()));
    $('#c_senha').val(hex_md5($('#c_senha').val()));
}