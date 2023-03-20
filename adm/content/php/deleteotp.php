<?php
require_once '../../../php/bd.php';

$id = $_GET['id'];

	mysqli_query($connection, "DELETE FROM `orders` WHERE `id_or` = '$id'");
 		

 header('Location: ../order.php');