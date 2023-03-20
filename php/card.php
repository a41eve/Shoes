<?php
require 'bd.php';
$redicet = $_SERVER['HTTP_REFERER'];
$idpt = $_GET['id'];
$idus = $_COOKIE["user"];
$cou = trim($_POST['quantity']);
$se = trim($_POST['size']);
$category = mysqli_query($connection, "SELECT * FROM `back` WHERE `id_se`='$se' AND `id_pt`='$idpt' AND `id_us`='$idus'");
$category = mysqli_fetch_assoc($category);
if (empty($category)) {
    $sql = "INSERT INTO `back` (`id_us`, `id_pt`, `id_se`, `counts`) VALUES('$idus', '$idpt', '$se', '$cou')";
    if ($connection->query($sql)) {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'redirect-form.html';
        header("Location: $redirect");
        /*echo "Данные успешно добавлены  <a href=/cms/ctovar.php> Вернуться обратно</a>";*/
    } else {
        echo "Ошибка: " . $connection->error;
    }
} else if (!empty($category)) {
    $sql = "UPDATE `back` SET  `counts`= '$cou' WHERE `id_se`='$se' AND `id_pt`='$idpt' AND `id_us`='$idus'";
    if ($connection->query($sql)) {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'redirect-form.html';
        header("Location: $redirect");
        /*echo "Данные успешно добавлены  <a href=/cms/ctovar.php> Вернуться обратно</a>";*/
    } else {
        echo "Ошибка: " . $connection->error;
    }
}
