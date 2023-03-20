<?php
$name = trim($_POST['name']); // Удаляет все лишнее и записываем значение в переменную //$login
$phone = trim($_POST['phone']);

if (mb_strlen($name) < 3 || mb_strlen($name) > 90) {
    echo "Недопустимая длина логина";
    exit();
} else if (mb_strlen($phone) < 17) {
    echo "Недопустимая длина номера телефона";
    exit();
} // Проверяем длину имени 

include 'bd.php';

$connection->query("INSERT INTO `feedback` (`name`, `phone`)
	VALUES('$name', '$phone')");
$connection->close();

/*перенаправление на вход*/
$redirect = isset($_SERVER['HTTP_REFERER'])? $_SERVER['HTTP_REFERER']:'redirect-form.html';
header("Location: $redirect");
exit();
