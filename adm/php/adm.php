<?php
$login = trim($_POST['login']);
$password = trim($_POST['password']);

if (mb_strlen($login) < 3 || mb_strlen($login) > 100) {
    echo "Недопустимая длина логина";
    exit();
} else if (mb_strlen($password) < 2 || mb_strlen($password) > 32) {
    echo "Недопустимая длина пароля (от 2 до 32 символов)";
    exit();
}

/*подключение к БД*/
require "bd.php";

/*выборка из БД*/
$result = $connection->query("SELECT * FROM `admin` WHERE `login` = '$login' AND `password` = '$password' ");

/*конвертация в массив*/
$user = $result->fetch_assoc();

if (empty($user) or count($user) == 0) {
    header('Location: error.php');
    exit();
}

setcookie('user', $user['login'], time() + 3600 * 24 * 30, "/");

$connection->close();

/*перенаправление на вход*/
header('Location: ../content/main.php');
