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
        switch ($(this).data('name')){
            case 'make_in_day':
                calculateTotalPrice($(this).parent());
                break;
            case 'amortization':
                calculateTotalPrice($(this).parent());
                break;
            case 'pack':
                calculateTotalPrice($(this).parent());
                break;
            default: console.log('error');
        }
    });
    $('.add_btn_product').on('click', function(){
        $('#addProductModal').modal('show');
    });
    //кнопки выбора товаров для вкладок Сырье/тара
    $('.select_item').on('click', function () {
        var prod_id = ''; var name = ''; var price = '';
        prod_id = Number($(this).data('id'));
        name = $(this).find('.name').text();
        price = Number($(this).find('.price').text());
        console.log('data-id', $(this).data('id'), 'name', $(this).find('.name').text(), 'price', $(this).find('.price').text());
        $('.calculate_value').on('click', function () {
            var count = Number($(this).text());
            console.log('mi tyt', price, name);
            if($('.product_formula').text()){
                var old_formula = $('.product_formula').text();
                $('.product_formula').text('');
                $('.product_formula').text(old_formula+'+'+name+'x'+count);
                $('.product_formula_summ').text((Number($('.product_formula_summ').text())+price*count).toFixed(2));
                console.log('mi tyt13', price, name, 'old_formula', old_formula);
            } else {
                $('.product_formula').text(name+'x'+count);
                $('.product_formula_summ').text(price*count.toFixed(2));
                console.log('mi tyt22', price, name);
            }
            prod_id = name = price = '';
        });
    });
});

function calculateTotalPrice(selector) {
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