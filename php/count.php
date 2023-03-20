<?php
require 'bd.php' ;

$idus = $_COOKIE["user"];

    $category = mysqli_query($connection, "SELECT *, `product`.`name` as 'ns' FROM `back`, `users`, `product`, `size`, `color` WHERE `back`.`id_us`=`users`.`id_users` AND `back`.`id_pt`=`product`.`id_pt` AND `back`.`id_se`=`size`.`id_se` AND `back`.`id_us`='$idus' AND `product`.`color`=`color`.`id_cr`");
                $data_from_cat = [];
                while ($resultcat = mysqli_fetch_assoc($category)) {
                     $data_from_cat[] = $resultcat;
                }
                 foreach($data_from_cat as $categor){  
                 	$bk=$categor['id_bk'];
                 	$idpt=$_POST['id'];
                  $cou = $_POST['quantity'];

    $sql = "UPDATE `back` SET `id_us`='$idus', `counts`='$cou' WHERE `id_bk`='$idpt'";
    if($connection->query($sql)){
        header('Location: /order-form.php');
        /*echo "Данные успешно добавлены  <a href=/cms/ctovar.php> Вернуться обратно</a>";*/
    } else{
        echo "Ошибка: " . $connection->error;
    }}
?>	