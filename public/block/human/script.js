$(document).ready(function () {
    // Выводим модальное окно с добавлением
   $('.generate_human').click(function () {
       $('#myModal').find('.modal-header').html('<span>Добавить человечков</span>');
       $('#myModal').find('.modal-body').html('' +
           '<div class="form-wrap">'+
           '<input class="form-info human_count" type="number" value="20">'+
           '<span class="form-title form_button human_generate">Сгенерировать</span>'+
           '</div>'
       );
       $('#myModal').find('.modal-footer').html('<button class="add_human">Добавить</button>');

       $('#myModal').modal('show');
   });
   // кнопка генерации имен человечков
    var data = {};
    $('#myModal').on('click', '.human_generate', function () {
        $('#myModal').find('.human_alert').remove();
        var count = parseInt($(this).parent().find('.human_count').val(),10);
        if(count){
            for(var i=0;i<count;i++){
                var item = {
                    name: '',
                    city: ''
                };
                item['name'] = generateName('human');
                item['city'] = $.cookie('CityID');
                data[i] = item;
                $('#myModal').find('.modal-body').append('<div class="human_prewiev">'+data[i]['name']+'</div>');
            }
        } else {
            $('#myModal').find('.modal-body').append('<span class="btn-danger alert-danger human_alert">Введите количество</span>');
            $('#myModal').find('button').attr('disabled');
        }
    });
    // убираем валидацию
    $('#myModal').on('keyup', '.human_generate', function () {
        $('#myModal').find('.human_alert').remove();
    });
    // передаем массив имен через аякс
    $('#myModal').on('click', '.add_human', function () {
        console.log('data', data);
        if(data[0]){
            $.post('/addHuman',{
                data: data
            }, function (data) {
                $('#myModal').find('.modal-body').html('<span class="alert alert-success">Население увеличено</span>');
                $('#myModal').find('.modal-footer').html('');
            }, "json");
        } else {
            $('#myModal').find('.modal-body').append('<span class="btn-danger alert-danger human_alert">нажмите Сгенерировать</span>');
        }
    });

});