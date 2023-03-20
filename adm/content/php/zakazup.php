<?php
require_once "../../../php/bd.php";
$id = $_GET['id'];
$product = mysqli_query($connection, "SELECT * FROM `orders` WHERE `id_or` = '$id'");
$product = mysqli_fetch_assoc($product);
$fio = $connection->real_escape_string($_POST["fio"]);
$tel = $connection->real_escape_string($_POST["tel"]);
$email = $connection->real_escape_string($_POST["email"]);
$price = $connection->real_escape_string($_POST["price"]);
$city = $connection->real_escape_string($_POST["city"]);
$dp = $connection->real_escape_string($_POST["dp"]);
$stat = $connection->real_escape_string($_POST["stat"]);
if($stat=='0'){
$stat = $product["status"];
}else{
 $stat = $connection->real_escape_string($_POST["stat"]);
}
   
  
    
    $sql = "UPDATE `orders` SET `fio`='$fio', `tel`='$tel', `email`='$email', `price`='$price', `city`='$city', `date_p`='$dp', `status`='$stat' WHERE `id_or` = '$id'"; 
  
    if($connection->query($sql)){
        header('Location: /adm/content/order.php');
      
        
    } 
      
     else{
        echo "Ошибка: " . $connection->error;
    }
    
   
    $connection->close();