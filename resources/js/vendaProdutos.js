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
    
    // TO-DO
    // Pegar o preço do produto e preencher o input   
    $("#quantity").trigger('change');
});

$("#quantity, #unity_price").on('change', function () {
    let quantity = $("#quantity").val();
    if (!quantity) {                
        $("#total").val('');
        return;
    }
    let unity_price = $("#unity_price").val();
    if (!unity_price) {         
        $("#total").val('');
        return;
    }
    
    let total = parseInt(quantity) * parseFloat(unity_price);    
    $("#total").val(total).toLocaleString('pt-BR', { style: 'currency', currency: 'RS' });;    
});