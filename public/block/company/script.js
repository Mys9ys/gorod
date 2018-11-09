$(document).ready(function () {
    // Выводим модальное окно с добавлением
    $('.generate_company').click(function () {

        $('#myModal').find('.modal-header').html('<span>Добавить компанию</span>');
        $('#myModal').find('.modal-body').html('' +
            '<div class="form-wrap">' +
            '<select class="selectForm setCompanyLibrary"><option value="">Выбрать компанию из библиотеки</option></select>'+
            '<select class="selectForm setCompanySector" data-form="sector"><option value="">Выбрать сектор экономики</option></select>'+
            '<div class="form-wrap"><input class="form-info company_name" data-form="name" type="text" placeholder="Название компании">' +
            '<span class="form-title form_button company_name_generate">Сгенерировать</span></div>' +
            '<input class="form-info company_workplace" type="number" data-form="workplace" placeholder="Рабочих мест">' +
            '</div>'
        );
        $('#myModal').find('.modal-footer').html('<button class="add_company">Добавить</button>');
        $.post(
            '/getCompanySector',
            function (result) {
                var sector = jQuery.parseJSON(result)['sector'];
                var companyLib = jQuery.parseJSON(result)['companyLib'];
                // console.log('result', JSON.parse(result));
                console.log('sector', sector);
                console.log('companyLib', companyLib);
                for(var value in companyLib) {
                    $('#myModal').find('.setCompanyLibrary').append(
                        '<option value="'+companyLib[value]['id']+'" ' +
                        'data-workplace="'+companyLib[value]['workplace']+'" ' +
                        'data-sector="'+companyLib[value]['sector']+'">'+companyLib[value]['name']+'</option>')
                }
                for(var value in sector) {
                    $('#myModal').find('.setCompanySector').append('<option value="'+sector[value]['id']+'">'+sector[value]['name']+'</option>')
                    console.log(sector[value]);
                }
            }
        );
        $('#myModal').modal('show');
    });
    $('#myModal').on('change', '.setCompanyLibrary', function () {
        var sector = $(this).find('option:selected').data('sector');
        var workplace = $(this).find('option:selected').data('workplace');
        $('#myModal').find('.setCompanySector').children().eq(sector).prop('selected', true);
        $('#myModal').find('.company_workplace').val(workplace);
    });
    $('#myModal').on('click', '.add_company', function () {
        var flag = true;
       // var count = $('.modal-body').find('*[data-form=""]').val();
        var data = {};
        $('.modal-body').find('*[data-form]').each(function () {
            if($(this).val()!=''){
                data[$(this).data('form')]=$(this).val();
            } else {
                flag = false;
            }
        });
        if(flag == true){
            console.log('data', data);
            $.post(
                '/addNewCompany',
                data,
                function (result) {
                    $('#myModal').find('.modal-footer').hide();
                    $('#myModal').find('.modal-body').html('<span class="alert-success">'+jQuery.parseJSON(result)+'</span>');
                }
            );
        }

    });
    var select = $('.select_box').clone();
    $('.add_worker').click(function () {
        $(this).parent().parent().parent().find('.select_wrap').append(select).show(400);
    });
});

function addWorker(companyID) {

}
