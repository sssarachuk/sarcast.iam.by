<?php
//окончание адреса страницы
define('К_СУФФИКС_СТРАНИЦЫ', '/');

//<page_name> - название страницы категории
define('К_АДРЕС_СТРАНИЦЫ_КАТЕГОРИИ', '<slug>');


define('К_ИМЯ_САЙТА', 'Свадебный и портретный фотограф Сергей Сарачук с любовью к путешествиям');
define('К_ДОМЕН_САЙТА', 'SARACHUK.COM');
define('АВТОРЫ_КОНТЕНТА', 'Сергей Сарачук');
define('TWITTER_АККАУНТ', '@sarachuk_sergey');


define('К_ЕМЭЙЛ_АДМИНИСТРАТОРА', 'sssarachuk@yandex.ru');
define('К_ЕМЭЙЛ_МЕНЕДЖЕРА', 'ded48@inbox.ru');

define('К_ПОДАРКИ_НА_ЭМЕЙЛ', 'https://drive.google.com/open?id=1BawVGaCiRb5Nf-_yJr6rDrIPR59Oh-Ff');


//Заголовок Title
//Должен быть уникальным для всего сайта, равным 60-70 символов, содержащим основной поисковый запрос + дополнительные если влезут. Без точек и знаков препинания, стараться все уместить в понятное читабельное предложение. В начале самые главные слова, не упоминать название компании
define('К_ЗАГОЛОВОК_ГЛАВНОЙ_СТРАНИЦЫ',
       'Свадебный и портретный фотограф в Гомеле Минске Мозыре');
//Заголовок H1
//Отличается от Заголовка Title, основной короткий запрос, без слов аля -купить-
define('К_ЗАГОЛОВОК2_ГЛАВНОЙ_СТРАНИЦЫ',
       'Фотограф Сергей Сарачук');
//Описание Descripton
//Должно быть уникальным для всего сайта, вмещать ровно до 120-135 символов с пробелами, с содержанием осн. или доп.запроса. Рекомендуется использовать скобки [], цифры, значки, символы, чтобы поднять CTR. И добавить призыв переходить на сайт в конце. Есть генераторы для помощи составления, например Saney.ru для кириллицы и Spotibo.com лат.
define('К_ОПИСАНИЕ_ГЛАВНОЙ_СТРАНИЦЫ',
       '[Нужен фотограф?] ⬤➤ 100% живые фото. ★ Натуральная обработка. ★ 5 лет опыта. ✈ Выезд по РБ и Европе. ★ Цены на сайте. ✔ Заходите!');
//Ключевые слова рекомендуется не заполнять
define('К_КЛЮЧЕВЫЕ_СЛОВА_ГЛАВНОЙ_СТРАНИЦЫ',
       '');


define('К_ЗАГОЛОВОК_СТРАНИЦЫ_ОТЗЫВОВ',
       'Отзывы о свадебном фотографе Сергей Сарачук в Минске Гомеле Мозыре');
define('К_ЗАГОЛОВОК2_СТРАНИЦЫ_ОТЗЫВОВ',
       'Отзывы клиентов');
define('К_ОПИСАНИЕ_СТРАНИЦЫ_ОТЗЫВОВ',
       '[Хорошие отзывы] ⬤ Профессионализм ⬤ Внимательность ⬤ Натуральная обработка ⬤ Сроки отдачи 15 дней ⬤ Качество ➤ Заходите!');
define('К_КЛЮЧЕВЫЕ_СЛОВА_СТРАНИЦЫ_ОТЗЫВОВ',
       '');

$config_title_date = 'Цена фотографа на свадьбу в Минске Гомеле Мозыре и Беларуси '.date('Y').'-'.date('Y', strtotime('+1 year'));
define('К_ЗАГОЛОВОК_СТРАНИЦЫ_ЦЕН', $config_title_date);
define('К_ЗАГОЛОВОК2_СТРАНИЦЫ_ЦЕН',
       'Фотограф цена');
define('К_ОПИСАНИЕ_СТРАНИЦЫ_ЦЕН',
       '[Нужен фотограф?] Цены от 30уе/час ☆ 5 лет опыта ☆ 3 подарка ✈ Выезд по городам Беларуси и Европы ☎ Онлайн-чат ✓ Заходите!');
define('К_КЛЮЧЕВЫЕ_СЛОВА_СТРАНИЦЫ_ЦЕН',
       '');


//url одним словом на латинице и без пробелов
//при изменении поменять вручную также в robots.txt в корне сайта
define('К_СКРЫТАЯ_КАТЕГОРИЯ_АЛЬБОМОВ',
       'hialbums1');


define('К_ЗАГОЛОВОК_СКРЫТЫХ_СТРАНИЦ',
       'Архивные свадебные семейные портретные фотосессии в Беларуси и Европе');
define('К_ЗАГОЛОВОК2_СКРЫТЫХ_СТРАНИЦ',
       'Архив фотосессий');
define('К_ОПИСАНИЕ_СКРЫТЫХ_СТРАНИЦ',
       '[Архив фото] Заказать фотографа ➤ Гарантия хранения 5 лет ➤ Полные серии всех фотографий ✰ Красивые фотосессии прошлых лет ✓ Смотрите!');
define('К_КЛЮЧЕВЫЕ_СЛОВА_СКРЫТЫХ_СТРАНИЦ',
       '');