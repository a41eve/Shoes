<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/src/Exception.php";
require "PHPMailer/src/PHPMailer.php";

$mail = new PHPMailer(true); /* Создаем объект MAIL */
$mail->CharSet = "UTF-8"; /* Задаем кодировку UTF-8 */
$mail->IsHTML(true); /* Разрешаем работу с HTML */

$name = $_POST["name"]; /* Принимаем имя пользователя с формы .. */
$email = $_POST["email"]; /* Почту */
$phone = $_POST["phone"]; /* Телефон */
$message = $_POST["message"]; /* Сообщение с формы */

$body = $name . ' ' . $email . ' ' . $phone . ' ' . $message;
$theme = "[Заявка с формы]";

$mail->addAddress("veter.210703@gmail.com");
$mail->Subject = $theme;
$mail->Body = $body;

$mail->send();
