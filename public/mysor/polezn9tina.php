<?php
// определение времени выполнения операции
    //перед операцией
$start = microtime(true);
    //после операции
$finish = microtime(true);
$delta = $finish - $start;
echo $delta . ' сек.';

//Гоород 2.0(реализации сохранений)
//4 варианта реализаци
//Аякс при каждом запросе
//
//Выгрузка при начале игры всех данных в соответствующие массивы и аякс при любом изменении
//
//Выгрузка всех данных и аякс раз в 2-5 минут всего
//
//Выгрузка всех данных и при изменении элемента - создание массива с исправлениями, для записи автосейва по конкретным изменениям
//
//Функция автосейв(создание массива изменений){
//    Проверка на наличие подобного изменения по айди и параметру методом сравнения
//Проверка наличия массива - клона основным массивов(люди, компании)
//Добавление изменения с указанием айди элемента и параметра изменения(возможно с сохранением старого значения в элементе имя_параметра_олд для проведения сравнения)
//
//}
//
//Функция автосейв(залив изменений){
//    Фореич по всем элементам с апдейтом
//    (Создание новых элементов заливать непосредственно в базу аяксом)
//}
//Город2.0
//Функция проверки приобретена ли еда{
//    Устанавливает флаг дата-фуд = 1
//}
//Функция потребления пищи{снимает флаг }
//Функция проверки состояния счета
//Функция взятия в кредит
//Функция оплаты между любыми контрагентами
//
//Функция проверки для выплаты процентов
//
//Функция производства по нормативам в день
//Функция начисления получки
//Функция сбора экономической статистики
//Функция трудоустройства
//
//Функция выбора товара/услуги исходя из рекламных рейтингов
//
//Функция рекламного рейтинга
//
//Функция износа вещи
//
//Функция оплаты услуг жкх
//
//Функция определения надобности в определенных компаниях
//
//Функция определения потребности в ресурсах/товарах
//
//Функция статистики потребляемых ресурсов
//
//Функция первой половины дня{
//}
//Функция второй половины дня{
//    Потребление пищи
//Закупка сырья для производства
//}