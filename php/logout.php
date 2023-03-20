<?php 
setcookie('user', $user['login'], time() - 3600 * 24 * 30, "/");
header('Location: ../index.php');
?>