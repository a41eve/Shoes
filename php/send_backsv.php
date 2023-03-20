<?php
$name = trim($_POST['name']); // Удаляет все лишнее и записываем значение в переменную //$login
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$message = trim($_POST['message']);

include 'bd.php';

$connection->query("INSERT INTO `backsv` (`name`, `email`, `phone`, `message`)
	VALUES('$name', '$email', '$phone', '$message')");
$connection->close();

/*перенаправление на вход*/
$redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'redirect-form.html';
header("Location: $redirect");
exit();
