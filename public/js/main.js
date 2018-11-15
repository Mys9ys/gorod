$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.CitySelect').click(function () {
       console.log($(this).data('city'));
    });
    $('.gosZP').click(function(){
        var data = {
            employer: {
                buyer: 'Treasury',
                buyerID: $(this).data('country')
            },
            money: 20,
            target: 'jobless'
        };
        payday(data);
        console.log('mi tyt', data);
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
    //вывод меню
    $('.menu_btn').click(function () {
       $('.menu_container').toggle();
    });

    $('.add_btn').on('mouseenter mouseleave',function () {
        $(this).find('.hidden-title').fadeToggle(400);
    });
    // обработчики событий для всплывающего окна select <--- BEGIN
    $('.select_wrap').on('click', '.select_close', function () {
        console.log('mi tyt');
        $(this).parent().parent().hide();
    });
    $('.select_wrap').on('click', '.select_box_add_button', function () {
        console.log('mi tyt', $(this).data('itemid'));
    });

    // обработчики событий для всплывающего окна select <--- END
});
// функция вызова функции на часть дня
function partDays() {
    var part = $('.calendar-block').attr('data-part');
    console.log('part', parseInt(part,10));
    switch (parseInt(part,10)) {
        case 1:
            ytro();
            break;
        case 2:
            den();
            break;
        case 3:
            vecher();
            break;
    }
}
// функция подключения функций выполяемых утром
function ytro(){
    console.log('ytro');
}
// функция подключения функций выполяемых днем
function den() {
    console.log('den');
}
// функция подключения функций выполяемых вечером
function vecher(){
    console.log('vecher');
}
// генерация имен (городов, стран, людей)
function generateName(value) {
    var consonant_letter = ['б', 'в', 'г', 'д', 'ж', 'з', 'к', 'л', 'м', 'н', 'п', 'р', 'с', 'т', 'ф', 'х', 'ц', 'ч', 'ш'];
    var vowels_letter = ['а', 'е', 'и', 'о', 'у', 'э', 'ю', 'я'];
    var cityEnd = ['поль', 'ск', 'град', 'вилль', 'бург', 'дорф' , 'лэнд'];
    var countryEnd = ['ия','оя','ая'];
    var content='';
    switch (value) {
        case "city":
            for (i=0; i<Math.random()*2; i++){
                content = content + slog();
            }
            content = content+cityEnd[Math.floor(Math.random()*7)];
            break;
        case "country":
            for (i=0; i<Math.random()*2; i++){
                content = content + slog();
            }
            content = content+consonant_letter[Math.floor(Math.random()*19)]+countryEnd[Math.floor(Math.random()*3)];
            break;
        case "human":
            for (i=0; i<Math.random()*2+1; i++){
                content = content + slog();
            }
            break;
    }
    content = content.charAt(0).toUpperCase() + content.substr(1);
    return content;
}

//генерация слогов//
function slog() {
    var consonant_letter ={
        '3':'б', '11':'в', '14':'г', '19':'д', '21':'ж', '24':'з', '30':'к', '38':'л', '44':'м', '56':'н', '61':'п', '70':'р', '80':'с', '92':'т', '93':'ф', '95':'х', '96':'ц', '98':'ч', '99':'ш', '100':'щ'
        };
    var vowels_letter = {
        '20':'а', '41':'е', '59':'и', '86':'о', '92':'у', '93':'э', '95':'ю', '100':'я'
    };
    var letter1 = '';
    var randomKey1 = (Math.random()*(100-1)+1);
    $.each(consonant_letter,function (key, value) {
        if(!letter1 && randomKey1<key){
            letter1 = value;
        }
    });
    var letter2 = '';
    var randomKey2 = (Math.random()*(100-1)+1);
    $.each(vowels_letter,function (key, value) {
        if(!letter2 && randomKey2<key){
            letter2 = value;
        }
    });
    return letter1+letter2;
}

// платежи с запросом через аякс
function paymentFunc(seller, sellerID, buyer, buyerID, money) {
    var data = {
        seller:seller,
        sellerID:sellerID,
        buyer:buyer,
        buyerID:buyerID,
        money:money
    };


    if(sellerID.length>1){
        $.post({
            url: '/paysOTM',
            data:data,
            success: function(result){
                console.log('result', result);
            }
        });
    }

    if(buyerID.length>1){
        $.post({
            url: '/paysMTO',
            data:data,
            success: function(result){
                console.log('result', result);
            }
        });
    }

    if($.isNumeric(sellerID)&&$.isNumeric(buyerID)){
        $.post({
            url: '/paysOTO',
            data:data,
            success: function(result){
                console.log('result', result);
            }
        });
    }
}

//выплата зарплаты(пособия)
function payday(arrPay) {
    console.log('arrPay', arrPay);
    if(arrPay['target'] == 'jobless'){
        var data = {
            props1:{
                name:'job',
                value: 0
            },
            props2:{
                name:'born_country',
                value: arrPay['employer']['buyerID']
            }
        }
    }
    $.post({
        url: '/getHumanCountry',
        data:data,
        success: function(result){
            paymentFunc('Human', JSON.parse(result), arrPay['employer']['buyer'],arrPay['employer']['buyerID'], arrPay['money']);
        }
    });
}

