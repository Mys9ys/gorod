$(document).ready(function () {
    $('.create_country').hover(function () {
        $(this).find('.hidden-title').toggle(400);
    });
    $('.create_country').click(function () {
        $('#myModal').find('.modal-header').html('<span>Основать государство</span>');
        $('#myModal').find('.modal-body').html('' +
            '<div class="form-wrap">'+
                '<input class="form-info country_name" type="text" placeholder="Название">'+
                '<span class="form-title country_generate">Сгенерировать</span>'+
            '</div>');
        // $('#myModal').find('.modal-header').css('background-color', 'rgb(156, 194, 24)');
        // $('#myModal').find('.modal-header').css('color', 'rgb(255, 255, 255)');
        // $('#myModal').find('.modal-body').css('background-color', 'rgb(255, 255, 255)');
        // $('#myModal').find('.modal-body').css('color', 'rgb(40, 40, 40)');
        // $('#myModal').find('.modal-footer').css('background-color', 'rgb(255, 255, 255)');
        $('#myModal').modal('show');
    });
    $('#myModal').on('click', '.country_generate', function () {
        
    });
    
});