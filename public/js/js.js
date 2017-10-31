/**
 * Created by Мусяус on 22.08.2017.
 */
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function validateForm(array) {
    var flag = true;
    $.each(array, function (key, value) {
        if(!value){
            $('#'+key).addClass('alert-danger');
            flag = false;
        }
    });
    return flag;
}

$(document).ready(function(){

    $('.calendar').click(function () {
        console.log('zm9k');
        mainAction();
    });
    $('.chel').mouseenter(function () {
        var $chelData = $('.chel').data();
        // console.log('$chelData', $chelData);
        // var id = $chel.attr('data-id'),
        //     name = $chel.attr('data-name'),
        //     money = $chel.attr('data-money');
        // console.log('id', $chelData.id);
    });

    var $map = $('.map');
    var mapW = $map.width();
    var mapH = $map.height();
    var mapPos = $map.offset();

    $('.chel').each(function () {
        // var chelX = Math.floor(Math.random() * (mapW - $(this).width())) + mapPos.left;
        // var chelY = Math.floor(Math.random() * (mapH - $(this).height())) + mapPos.top;
        // console.log('name',$(this).data('name'),'chelX', chelX, 'chelH', chelY);
        // $(this).offset({top:chelY,left:chelX})
    });

    $('.reset').click(function () {
        $.post({
            url: '/reset',
            success: function(result){
                location.reload();
            }
        });
    });
    $('.addHuman').click(function () {
        addHuman(20);
    });

    // $('.gameSettings').click(function () {
    //     $('#myModal').modal('show');
    // });

    // вывод шаблонов компаний из базы
    $('.companyLibrary').click(function () {
        $('.companyLibBox').append('<div class="companyLibRow">'+
            '<div class="companyLibId">id</div>'+
            '<div class="companyLibName">Название</div>' +
            '<div class="companyLibWorkplace">Рабочих мест</div>'+
            '<div class="companyLibSector">Сектор экономики</div>'+
            '</div>');
        $.post('/companyLibGet',
            function(result){
                var nextID;
                $.each(result.companyLib, function (key, value) {
                    $('.companyLibBox').append('<div class="companyLibRow">'+
                        '<div class="companyLibId">'+value.id+'</div>'+
                        '<div class="companyLibName">'+value.name+'</div>' +
                        '<div class="companyLibWorkplace">'+value.workplace+'</div>'+
                        '<div class="companyLibSector">'+result.sector[value.sector-1].name+'</div>'+
                       '<div class="delete">х</div></div>');
                    nextID = value.id;
                });
                $('.companyLibBox').append('<div class="companyLibRow">' +
                    '<div class="companyLibId">'+(nextID+1)+'</div>' +
                    '<input type="text" id="companyLibName" class="companyLibName">' +
                    '<input type="number" id="companyLibWorkplace" class="companyLibWorkplace">' +
                    '<select id="sectorCompany"><option value="">Выбрать</option></select>' +
                    '</div><div class="setCompanyLib">Добавить компанию</div>');
                $.each(result.sector, function (value) {
                    $('#sectorCompany').append('<option value="' + result.sector[value].id + '">' + result.sector[value].name + '</option>')
                })
            }, "json"
        );
        $('.companyLibBox').toggle();
    });


    /*это можно попробовать оптимизировать под любые шаблоны*/
    // удаление шаблона компании
    $('.companyLibBox').on('click', '.delete', function () {
        var $this = $(this);
        var id = $this.parent().find('.companyLibId').text();
        var data = {
            id: id
        };
        $.post(
            '/companyLibDelete', data, function (result) {
                $this.parent().remove();
            }
        );
    });

    /*это можно попробовать оптимизировать под любые шаблоны
    попробовать запилить все селекторы по БЭМ*/

    // запись шаблона компании
    $('.companyLibBox').on('click', '.setCompanyLib', function () {
        var data ={}, validate ={};
        validate.companyLibName = data.name = $(this).parent().find('#companyLibName').val();
        validate.companyLibWorkplace = data.workplace = $(this).parent().find('#companyLibWorkplace').val();
        validate.sectorCompany = data.sector = $(this).parent().find('#sectorCompany').val();

       var child = $(this).parent().children();
       console.log('child', child);

            // валидация заполнения полей
       if(validateForm(validate) == true){
           $.post('/companyLibSet', data, function (result) {
               console.log('result', result);
           });
       }
    });
    // убираем выделение красным
    $('.companyLibBox').on('change', '.alert-danger', function () {
        $(this).removeClass('alert-danger');
    });

    // end $(document).ready
});

function calendar() {
    var count = $('.calendar').attr('data-countDay');
    count++;
    var day,month;
    if((day = count%6) == 0) {day = 6;}
    if((month = Math.ceil(count/6)%4) == 0) {month=4;}
    var year = Math.ceil(count/24);
    $('.calendar').attr('data-countDay', count);
    $('#day').text(day);
    $('#month').text(month);
    $('#year').text(year);
    $.post({
        url: '/ajaxRequest',
        data: { count: count },
        success: function(result){
            console.log(result);
        }
    });
}

function buyFood() {

}

function eatFood() {

}

function mainAction() {
    calendar();
}

function addHuman(count) {
    // console.log('dobavit', count, '4elov' );
    $.post('/addHuman',{
        count: count
    }, function (data) {
        console.log('vjvo', data);
    }, "json");
}