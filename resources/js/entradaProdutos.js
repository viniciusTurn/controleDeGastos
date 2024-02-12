$("#product_id").select2({
    language: "pt-BR",
    placeholder: "Selecione um produto",
    allowClear: false,
    ajax: {
        type: 'GET',
        url: "/products/listar",
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                parametro: params.term,
                page: params.page || 1,
            };
        },
        processResults: function (response) {
            return {
                results: $.map(response.data, function (item) {
                    return {
                        id: item.id,
                        text: item.description
                    };
                }),
                pagination: {
                    more: response.data.length >= 50
                }
            };
        }
    }
});

$("#product_id").on('change', function () {
    let valor = $(this).val();
    if (!valor) {
        $("#product_id_name").val('');
        return;
    }
    let texto = $("#product_id option:selected").text();
    $("#product_id_name").val(texto);
});