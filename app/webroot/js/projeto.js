function getCep() {
    $(".Cep").blur(function () {
        var cep = $(this).val().replace(/\D/g, '');
        console.log(cep);
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;
            if (validacep.test(cep)) {

                $(".Rua").val("Carregando...");
                $(".Bairro").val("Carregando....");
                $(".Cidade").val("Carregando...");
                $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
                    if (!("erro" in dados)) {
                        $(".Rua").val(dados.logradouro);
                        $(".Bairro").val(dados.bairro);
                        $(".Cidade").val(dados.localidade);
                    } else {
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            }
        }
    });
}


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