$(document).ready(function () {
    $('.product_add_confirm').on('click', function () {
        var data ={};
        $.each($(this).parent().find('.product_input'), function (key, value) {
           console.log('key', key, 'value', value, 'data-name', $(value).data('name'), 'couunt', $(value).val());
           if($(value).data('name')) data[$(value).data('name')]=$(value).val();
        });
        console.log('data', data); $.post({
            url: '/addProduct',
            data:data,
            success: function(result){
                console.log('result')
            }
        });
    });
    $('.product_input').on('change', function(){
        console.log('$(this).data(\'name\')', $(this).data('name'));
        switch ($(this).data('name')){
            case 'make_in_day':
                calculateTotalPrice($(this).parent().parent());
                break;
            case 'amortization':
                calculateTotalPrice($(this).parent().parent());
                break;
            case 'pack':
                calculateTotalPrice($(this).parent().parent());
                break;
            default: console.log('error');
        }
    });
    $('.add_btn_product').on('click', function(){
        modalClear();
        $('#addProductModal').find('.modal-header').append('<h4 class="modal-title">'+$(this).data("title")+'</h4>');
        $('#addProductModal').find('.modal-footer').append('<div class="confirm_add_btn_product" data-selector="'+$(this).data("selector")+'" data-selector_count="'+$(this).data("selector_count")+'">Добавить</div>');
        $('#addProductModal').modal('show');
    });

    //кнопки выбора товаров для вкладок Сырье/тара
    $('.select_item').on('click', function () {
        $('.select_item').removeClass('selected_item');
        prod_id = prod_name = price ='';
        prod_id = Number($(this).data('id'));
        prod_name = $(this).find('.name').text();
        price = Number($(this).find('.price').text());
        $(this).addClass('selected_item');
        console.log('data-id', $(this).data('id'), 'name', $(this).find('.name').text(), 'price', $(this).find('.price').text());
    });
    $('.calculate_value').on('click', function () {
        var count = Number($(this).text());
        console.log('mi tyt', price, prod_name);
        if($('.product_formula').text()){
            var old_formula = $('.product_formula').text();
            $('.product_formula').text('');
            $('.product_formula').text(old_formula+'+'+prod_name+'x'+count);
            $('.product_formula_summ').text((Number($('.product_formula_summ').text())+price*count).toFixed(2));
            console.log('mi tyt13', price, prod_name, 'old_formula', old_formula);
        } else {
            $('.product_formula').text(prod_name+'x'+count);
            $('.product_formula_summ').text((price*count).toFixed(2));
            console.log('mi tyt22', price, prod_name);
        }
        $('.select_item').removeClass('selected_item');
        // prod_id = name = price = '';
    });
    $('.fa-trash').on('click', function () {
        $('.product_formula').text('');
        $('.product_formula_summ').text('');
    });
    $('.confirm_add_btn_product').on('click')
});

function calculateTotalPrice(selector) {
    console.log(selector);
    var make_in_day = Number($(selector).find('.product_make_in_day').val());
    var mrot = Number($(selector).find('.product_make_in_day').data('mrot'));
    var FOT = (mrot/(make_in_day*6)).toFixed(2);
    $(selector).find('.product_FOT').val(FOT);
    var count_detail_material = Number($(selector).find('.product_count_detail_material').val());
    var amortization = Number($(selector).find('.product_amortization').val());
    var pack = Number($(selector).find('.product_pack').val());
    var sum = Number(FOT)+count_detail_material+amortization+pack;

    var profit = (sum*0.1);
    $(selector).find('.product_profit').val(profit.toFixed(2));
    sum = Number(sum)+profit;

    var transport = Number($(selector).find('.product_transport').val());
    sum += transport;

    var shop_profit = (sum*0.1);
    $(selector).find('.product_shop_profit').val(shop_profit.toFixed(2));
    sum += shop_profit;

    var NDS_base = Number($(selector).find('.product_NDS').data('nds'));
    var NDS = (sum*NDS_base);
    $(selector).find('.product_NDS').val(NDS.toFixed(2));
    sum += NDS;

    console.log('sum5', sum);
    $(selector).find('.product_total').val(sum.toFixed(2));
}
function modalClear() {
    $('#addProductModal').find('.modal-header, .modal-footer').html('');
}