<?php
require_once '../../../php/bd.php';

$id = $_GET['id'];



 
	mysqli_query($connection, "DELETE FROM `prod_size` WHERE `id_pt` = '$id'");
	mysqli_query($connection, "DELETE FROM `product` WHERE `id_pt` = '$id'");
 		

 header('Location: ../tovar.php');