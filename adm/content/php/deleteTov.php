<?php
require_once '../../../php/bd.php';

$id = $_GET['id'];
$ss = $_GET['ss'];

 
	mysqli_query($connection, "DELETE FROM `prod_size` WHERE `id_pt` = '$id' AND `id_se`='$ss'");
 		

 header('Location: ../tovar.php');
