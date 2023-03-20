<?php
/* Все варианты сортировки */
$sort_list = array(
    'date'       => '`date`',
    'date_desc'       => '`date` DESC',
);

/* Проверка GET-переменной */
$sort = @$_GET['sort'];
if (array_key_exists($sort, $sort_list)) {
    $sort_sql = $sort_list[$sort];
} else {
    $sort_sql = reset($sort_list);
}

/* Запрос в БД */
$connection = new PDO('mysql:dbname=shoesmain;host=localhost', 'root', '');
$sth = $connection->prepare("SELECT * FROM `news` ORDER BY {$sort_sql}");
$sth->execute();
$list = $sth->fetchAll(PDO::FETCH_ASSOC);
