$(document).ready(function () {
    $('.product_add_confirm').on('click', function () {
        console.log(' mi ytt');
    });
    $('.product_input').on('change', function(){

        switch ($(this).data('name')){
            case 'make_in_day': console.log('mi ytt'); break;
            case 'amortization': console.log('mi amortization'); break;
            case 'pack': console.log('mi pack'); break;
            default: console.log('error');
            // case 2: return count+' продукта';
            // case 3: return count+' продукта';
            // case 4: return count+' продукта';
            // default: return count+' продуктов';
        }
        console.log('change', $(this).data('name'));
    });
});