<?php
require_once "../../../php/bd.php";


$product = mysqli_query($connection, "SELECT * FROM `product`");
$product = mysqli_fetch_assoc($product);
$polz=$connection->real_escape_string($_POST["products"]);
$ss= $connection->real_escape_string($_POST["size"]);
 $phone = $connection->real_escape_string($_POST["count"]);

  $sqll = "INSERT INTO `prod_size` (`id_pt`, `id_se`, `count`) VALUES('$polz', '$ss', '$phone')"; 
 
        if($connection->query($sqll)){ 
        header('Location: /adm/content/tovar.php');
    } 
      
     else{
        echo "Ошибка: " . $connection->error;
    }	