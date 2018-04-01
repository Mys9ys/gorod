$(document).ready(function () {
    $('.create_country').hover(function () {
        $(this).find('.hidden-title').toggle(400);
    });
    $('.create_country').click(function () {
        $('#myModal').find('.modal-header').html('<span>Основать государство</span>');
        $('#myModal').find('.modal-body').html('' +
            '<div class="form-wrap">'+
                '<input class="form-info country_name" data="country_name" type="text" placeholder="Название">'+
                '<span class="form-title form_button country_generate">Сгенерировать</span>'+
            '</div>'+
            '<div class="form-wrap">'+
                '<input class="form-info city_name" data="city_name" type="text" placeholder="Первый город">'+
                '<span class="form-title form_button city_generate">Сгенерировать</span>'+
            '</div>'
        );
        $('#myModal').find('.modal-footer').html('<button class="add_country">Подтвердить</button>');

        $('.country_name').val(generateName('country'));
        $('.city_name').val(generateName('city'));
        $('#myModal').modal('show');

    });
    $('#myModal').on('click', '.country_generate', function () {
        $('.country_name').val(generateName('country'));
    });
    $('#myModal').on('click', '.city_generate', function () {
        $('.city_name').val(generateName('city'));
    });
    $('#myModal').on('click', '.add_country', function () {
        var data ={}, validate = '';
        $('.modal-body').find('input').each(function () {
            if($(this).val()!= null && $(this).val()!=''){
                data[$(this).attr('data')]=$(this).val();
                if($(this).val().length<4){
                    validate = 1;
                }
            } else {
                $(this).addClass('form_fail');
                validate = 1;
            }
        });
        console.log('validate', validate);
        if(validate != 1){
            $.post(
                '/setCountry',
                data,
                function (result) {
                    console.log('result', result);
                }
            );
        }
    });
    
});