<?php
/* Все варианты сортировки */
$sort_list = array(
    'all'       => "", 
	'man'       => "`product`.`gender`='1' AND",
    'girl'       => "`product`.`gender`='2' AND", 
    'kid'       => "`product`.`gender`='3' AND",
    'sport'       => "`product`.`gender`='4' AND", 
    'sneak'       => "`product`.`category`='11' AND",
    'boot'       => "`product`.`category`='12' AND", 
    'sn'       => "`product`.`category`='13' AND",
	
);
 
/* Проверка GET-переменной */
$sort = @$_GET['sort'];
if (array_key_exists($sort, $sort_list)) {
	$sort_sql = $sort_list[$sort];
} else {
	$sort_sql = reset($sort_list);
}

/* Запрос в БД */
$connection = new PDO('mysql:dbname=shoesmain;host=localhost','root','');
$sth = $connection->prepare("SELECT * FROM `product`, `size`, `prod_size`, `gender`, `category`, `color` WHERE {$sort_sql} `product`.`id_pt`=`prod_size`.`id_pt` AND `size`.`id_se`=`prod_size`.`id_se` AND `product`.`gender` = `gender`.`id_gr` AND `product`.`category` = `category`.`id_cy`  AND `product`.`color` = `color`.`id_cr`");
$sth->execute();
$list = $sth->fetchAll(PDO::FETCH_ASSOC);

?>

