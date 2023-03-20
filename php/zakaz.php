<?php
require 'bd.php' ;

$idus = $_COOKIE["user"];

$oplata = trim($_POST['oplata']);
$email = trim($_POST['email']);
$tel = trim($_POST['phone']);
$address = trim($_POST['addr']);
$city = trim($_POST['city']);
$fio = $_POST['fio'];
$status = "В обработке";
$a = time() + 3600 * 24 * 5;
$date = date('Y.m.d');
$datep = date('Y.m.d', $a);

  $category = mysqli_query($connection, "SELECT *, `product`.`name` as 'ns' FROM `back`, `users`, `product`, `size`, `color` WHERE `back`.`id_us`=`users`.`id_users` AND `back`.`id_pt`=`product`.`id_pt` AND `back`.`id_se`=`size`.`id_se` AND `back`.`id_us`='$idus' AND `product`.`color`=`color`.`id_cr`");
                $data_from_cat = [];
                while ($resultcat = mysqli_fetch_assoc($category)) {
                     $data_from_cat[] = $resultcat;
                }
                 foreach($data_from_cat as $categor){
                 	$se = $categor['s_size'];
                 	
                 	$cou = $categor['counts'];
                 	$price = $categor['price'] * $cou;
                 	$idpt = $categor['id_pt'];
                    $idbk = $categor['id_bk'];

                 	$sql = "INSERT INTO `orders` (`fio`, `city`, `address`, `tel`, `email`, `oplata`, `id_us`, `id_pt`, `id_se`, `counts`, `price`, `date_z`, `date_p`, `status`) VALUES('$fio', '$city', '$address', '$tel', '$email', '$oplata', '$idus', '$idpt', '$se', '$cou', '$price', '$date', '$datep', '$status')";
                    mysqli_query($connection, "DELETE FROM `back` WHERE `id_bk` = '$idbk'");
    if($connection->query($sql)){
        header('Location: /private.php');
        /*echo "Данные успешно добавлены  <a href=/cms/ctovar.php> Вернуться обратно</a>";*/
    } else{
        echo "Ошибка: " . $connection->error;
    }
                 }

?>	