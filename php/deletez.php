<?php
require_once '../php/bd.php';

$id = $_GET['id'];

	mysqli_query($connection, "DELETE FROM `back` WHERE `id_bk` = '$id'");
 		

 header('Location: ../private.php');