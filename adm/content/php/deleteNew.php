<?php
require_once '../../../php/bd.php';

$id = $_GET['id'];

	mysqli_query($connection, "DELETE FROM `news` WHERE `id_ns` = '$id' ");
 		

 header('Location: ../news.php');
