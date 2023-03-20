<?php
$login = trim($_POST['name']); // Удаляет все лишнее и записываем значение в переменную //$login
$name = trim($_POST['com']);
$surname = trim($_POST['date']);
include '../bd.php';
$connection->query("INSERT INTO `review` (`name`, `text`, `date`)
	VALUES('$login', '$name', '$surname')");
$connection->close();

/*перенаправление на вход*/
header('Location: ../../review.php');
