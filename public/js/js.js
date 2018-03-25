/**
 * Created by Мусяус on 22.08.2017.
 */
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function validateForm(selector,array) {
    var flag = true;
    console.log('value selector', selector);
    $.each(array, function (key, value) {
        console.log('value validate', value);
        if(!value){
            $(selector).children('[data='+key+']').addClass('alert-danger');
            console.log('key', key);
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

    // сброс базы на 0
    $('.reset').click(function () {
        $.post({
            url: '/reset',
            success: function(result){
                location.reload();
            }
        });
    });

    // добавление человечков по кнопке
    $('.addHuman').click(function () {
        addHuman(20);
    });

    // $('.gameSettings').click(function () {
    //     $('#myModal').modal('show');
    // });

    // buildList({ bindBlock: '.companyLibBox'} , [0,2,4,2]);
    // function buildList(setting, array) {
    //     var Prop = {
    //         bindBlock : 'body',
    //         box : 'itemBox',
    //         name1 : '#',
    //         tag1 : 'div',
    //         class1 : 'col1',
    //     };
    //     Prop = $.extend(Prop,setting);
    //
    //     var content = '';
    //     content = '<'+Prop.tag1+' class="'+Prop.class1+'"></'+Prop.tag1+'>';
    //     $(Prop.class1).text(Prop.name1);
    //     $(Prop.bindBlock).append('<div class="'+Prop.box+'">'+content+'</div>');
    //     // console.log('defaultProp',Prop);
    // }

    // вывод шаблонов компаний из базы
    $('.companyLibrary').click(function () {
        $('.companyLibBox').children().remove();
        $('.companyLibBox').append('');
        $.post('/companyLibGet',
            function(result){
                var nextID='';
                $.each(result.companyLib, function (key, value) {
                    addContent(value,result);
                    nextID = value.id;
                });
                var value = {id : nextID+1,
                    name: '',
                };
                addContent(value,result);
            }, "json"
        );
        $('.companyLibBox').toggle();
    });

    // включение контента
    function addContent(value,result) {
        if(value.sector){ var select = result.sector[value.sector-1].id; var disabled = 'disabled'}
        var content = '';
        content = content + '<input type="text" class="companyLibName badge" data="name" value="'+value.name+'" '+disabled+'>';
        content = content + '<input type="number" class="companyLibWorkplace badge" data="workplace" value="'+value.workplace+'" '+disabled+'>';
        content = content + selectFilling(result.sector, select);
        if(value.name) {content = content + '<div class="delete"></div><div class="edit"></div>';}
        else {content = content + '<div class="setCompanyLib">Сохранить</div>';}
        $('.companyLibBox').append('<div class="companyLibRow" data-id="'+value.id+'">'+content+'</div>');
    }

    // установка элемента селект
    function selectFilling(array, selected) {
        var option ='';
        var disabled = 'disabled';
        if (!selected) {option = option + '<option value="">Выбрать</option>'; disabled = '';}
        $.each(array, function (key, value) {
            var select = '';
            if (value.id == selected) {select = 'selected';}
            option = option + '<option value="' + value.id + '" '+select+' >' + value.name + '</option>';
        });
        option = '<select data="sector" class="badge" '+disabled+'>'+option+'</select>';
        return option;
    }

    /*это можно попробовать оптимизировать под любые шаблоны*/
    // удаление шаблона компании
    $('.companyLibBox').on('click', '.delete', function () {
        var $this = $(this);
        var id = $this.parent().data('id');
        var data = {
            id: id
        };
        $.post(
            '/companyLibDelete', data, function (result) {
                $this.parent().remove();
            }
        );
    });

    // Редактирование записи
    $('.companyLibBox').on('click', '.edit', function () {
        var $this = $(this);
        var disabled = $this.parent().find(':disabled').prop('disabled',false);
        $this.parent().append('<div class="confirm"></div>');
        $this.parent().find('.edit').remove();
    });
    // подтверждение изменений
    $('.companyLibBox').on('click', '.confirm', function () {
        var $this = $(this);
        var value = {};
        value.id = $this.parent().data('id');
        $this.parent().find(':input').each(function () {
            value[$(this).attr('data')] = $(this).val();
        });
        console.log('izmeneni9', value);
        if(validateForm($this.parent(),value) == true){
            $.post('/companyLibUpdate', value, function (result) {
                $this.parent().append('<div class="edit"></div>');
                $this.parent().find('.confirm').remove();
            });
        }
    });


    /*это можно попробовать оптимизировать под любые шаблоны
    попробовать запилить все селекторы по БЭМ*/

    // запись шаблона компании
    $('.companyLibBox').on('click', '.setCompanyLib', function () {
        var $this = $(this);
        var value = {};
        $this.parent().find(':input').each(function () {
            value[$(this).attr('data')] = $(this).val();
        });
        $this.parent().children('[data=sector]').each(function(key,value){
            console.log('select value' ,value.value);
        });
        // console.log('sector',sector);
        if(validateForm($this.parent(),value) == true){
            $.post('/companyLibSet', value, function (result) {
                addContent(value, { 0: 'выбрать'});
            });
        }

       //  var data ={}, validate ={};
       //  validate.companyLibName = data.name = $(this).parent().find('#companyLibName').val();
       //  validate.companyLibWorkplace = data.workplace = $(this).parent().find('#companyLibWorkplace').val();
       //  validate.sectorCompany = data.sector = $(this).parent().find('#sectorCompany').val();
       //
       // var child = $(this).parent().children();
       // console.log('data', data);

            // валидация заполнения полей
       // if(validateForm(validate) == true){
       //     $.post('/companyLibSet', data, function (result) {
       //         console.log('result', result);
       //     });
       // }
    });
    // убираем выделение красным
    $('.companyLibBox').on('change', '.alert-danger', function () {
        $(this).removeClass('alert-danger');
    });

    // end $(document).ready
});

// function calendar() {
//     var count = $('.calendar').attr('data-countDay');
//     count++;
//     var day,month;
//     if((day = count%6) == 0) {day = 6;}
//     if((month = Math.ceil(count/6)%4) == 0) {month=4;}
//     var year = Math.ceil(count/24);
//     $('.calendar').attr('data-countDay', count);
//     $('#day').text(day);
//     $('#month').text(month);
//     $('#year').text(year);
//     $.post({
//         url: '/ajaxRequest',
//         data: { count: count },
//         success: function(result){
//             console.log(result);
//         }
//     });
// }

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

