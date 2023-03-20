<?php
$login = trim($_POST['login']); // Удаляет все лишнее и записываем значение в переменную //$login
$name = trim($_POST['name']);
$img = trim($_POST['img']);
$surname = trim($_POST['surname']);
$patronymic = trim($_POST['patronymic']);
$phone = trim($_POST['phone']);
$email = trim($_POST['email']); // Удаляет все лишнее и записываем значение в переменную //$login
$password = trim($_POST['pass1']);
$re_password = trim($_POST['pass2']);

if (mb_strlen($login) < 3 || mb_strlen($login) > 90) {
    echo "Недопустимая длина логина";
    exit();
} else if (mb_strlen($name) < 2) {
    echo "Недопустимая длина имени.";
    exit();
} // Проверяем длину имени 

$password = md5($password . "thisisforhabr");
$re_password = md5($re_password . "thisisforhabr"); // Создаем хэш из пароля

include 'bd.php';

$result1 = $connection->query("SELECT * FROM `users` WHERE `login` = '$login'");
$user1 = $result1->fetch_assoc(); // Конвертируем в массив
if (!empty($user1)) {
    echo "Данный логин уже используется!";
    exit();
}

$connection->query("INSERT INTO `users` (`img_us`, `login`, `name`, `surname`, `patronymic`, `phone`, `email`, `password`, `re_password`)
	VALUES('$img', '$login', '$name', '$surname', '$patronymic', '$phone', '$email', '$password', '$re_password')");
$connection->close();

/*перенаправление на вход*/
header('Location: ../login.php?formsubmit');
