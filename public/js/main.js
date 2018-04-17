$(document).ready(function () {
    // сброс базы на 0
    $('.reset').click(function () {
        $.post({
            url: '/reset',
            success: function(result){
                location.reload();
            }
        });
    });
    $('.add_btn').on('mouseenter mouseleave',function () {
        $(this).find('.hidden-title').fadeToggle(400);
    });
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

