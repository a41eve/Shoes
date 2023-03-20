<?php
require_once '../../../php/bd.php';

$id = $_GET['id'];

 mysqli_query($connection, "DELETE FROM `users` WHERE `id_users` = '$id' ");
 header('Location: ../user.php');