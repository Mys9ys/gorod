$(document).ready(function () {
    $('.product_add_confirm').on('click', function () {
        console.log(' mi ytt');
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