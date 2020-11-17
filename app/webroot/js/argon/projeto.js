function setPaginate() {
    $("[paginate-control]").on('change', function () {
        url = $(this).attr('url') + $(this).val();
        $.get(url).done(function (response) {
            $('#content').html(response)
        });
    });
}

function createAjax() {
    $('[requisicaoAjax]').each(function (index) {
        $(this).on('click', function (event) {
            event.preventDefault();
            var url = $(this).attr('href');
            var update = $(this).attr('update');
            $.ajax({
                async: true,
                cache: false,
                type: 'post',
                data: $(this).closest('form').serialize(),
                url: url
            }).done(function (response) {
                $(update).html(response);
            });
        });
    });
}

window.setTimeout(function() {
    $(".alert").fadeTo(250, 0).slideUp(250, function(){
        $(this).remove(); 
    });
}, 4000);



function ocultaMutipleSelect() {
    var situacao = function (tipo) {
        if (tipo == 'Sim') {
            $('#materiaPrima').attr("disabled", false).parent('div').show();
        } else {
            $('#materiaPrima').attr("disabled", true).parent('div').hide();
        }
    }
    $('input[name="data[Produto][utiliza_materia_prima]"]').on('change', function (e) { situacao($(this).val()); });
    situacao($('[name="data[Produto][utiliza_materia_prima]"]:checked').val());
}
