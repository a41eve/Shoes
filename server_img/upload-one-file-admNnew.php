<?php
require_once "../php/bd.php";

session_start();

$protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
$address_site = '/adm/content/news.php'; // Адрес сайта
$extension_file =  pathinfo($_FILES['file_img']['name'], PATHINFO_EXTENSION);
$file_name =  pathinfo($_FILES['file_img']['name'], PATHINFO_FILENAME);

$file_name = md5($file_name . "fvgvgg4r57878ytreg3e");
$img = $file_name . '.' . $extension_file;

$extension_files =  pathinfo($_FILES['file_imgs']['name'], PATHINFO_EXTENSION);
$file_names =  pathinfo($_FILES['file_imgs']['name'], PATHINFO_FILENAME);

$file_names = md5($file_names . "fvgvgg4r57878ytreg3e");
$imgs = $file_names . '.' . $extension_files;

$title = $connection->real_escape_string($_POST["title"]);
$descr = $connection->real_escape_string($_POST["descr"]);
$author = $connection->real_escape_string($_POST["author"]);
$description1 = $connection->real_escape_string($_POST["description1"]);
 $dd = date('Y.m.d');


if (isset($_POST['upload_images'])) {


    $sql = "INSERT INTO `news` (`title`, `descr`, `date`, `img`, `img1`, `author`, `description1`) VALUES('$title', '$descr', '$dd', '$img', '$imgs','$author', '$description1')";

    if ($connection->query($sql)) {
        header('Location: /adm/content/news.php');
    } else {
        echo "Ошибка: " . $connection->error;
    }
}


$connection->close();



/*$('#review-file').on('change', function (e) {
    $(this).prev('span').html(e.target.files[0].name);
});*/

//Проверяем была ли отправлена форма, то есть была ли нажата кнопка “Загрузить изображение”. Если да, то идём дальше, если нет, то выведем пользователю сообщение об ошибке.
if (!isset($_POST['upload_images'])) {

    if (isset($_GET['flag']) || !empty($_SERVER['HTTP_REFERER'])) {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["server_messages"] = "<p class='text-danger font-weight-bold'>Ошибка! Размер загруженного изображения превышает 3MB </p>";
    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["server_messages"] = "<p class='text-danger font-weight-bold'>Ошибка! Вы зашли в обработчик формы напрямую, поэтому нет данных для обработки. </p>";
    }

    //Возвращаем пользователя обратно на страницу загрузки изображения
    header("Location: " . $address_site);

    exit();
}

// (1) метка: Место для следующего куска кода

// указываем какие MIME-типы разрешены для загрузки
$allow_types = ['image/jpeg', 'image/png', 'image/jpg'];

// проверяем MIME-тип загруженного файла и если данный тип не находятся в массиве с разрешенными типами,
// то, возвращаем пользователя обратно на страницу загрузки и выводим ему соответствующее сообщение об ошибке
if (!in_array($_FILES['file_img']['type'], $allow_types)) {

    // Сохраняем в сессию сообщение об ошибке.
    $_SESSION["server_messages"] = "<p class='text-danger font-weight-bold'>Ошибка! Выбранный вами файл не является изображением </p>";

    //Возвращаем пользователя обратно на страницу загрузки изображения
    header("Location: " . $address_site);

    //Останавливаем скрипт
    exit();
}

// (2) метка: Место для следующего куска кода

// Массив с разрешенными расшерениями
$allow_extensions = ['jpg', 'jpeg', 'png'];

// Узнаем расширение загруженного файла

if (!in_array($extension_file, $allow_extensions)) {
    // Если расширение загруженного файла не находится в массиве с разрешенными расшерениями,
    // то, останавливаем скрипт
    exit();
}


// (3) метка: Место для следующего куска кода
if ($_FILES['file_img']['size'] > return_bytes('3M')) {
    // Если размер загруженного изображения превышает 3MB то возвращаем ошибку

    // Сохраняем в сессию сообщение об ошибке.
    $_SESSION["server_messages"] = "<p class='text-danger font-weight-bold'>Ошибка! Размер загруженного изображения превышает 3MB</p>";

    //Возвращаем пользователя обратно на страницу загрузки изображения
    header("Location: " . $address_site);

    //Останавливаем скрипт
    exit();
}

// Узнаем название загруженного файла

// Перемещаем изображение в нужную папку
$result_move = move_uploaded_file($_FILES['file_img']['tmp_name'], '../images/news/' . $file_name . '.' . $extension_file);

if (!$result_move) {

    // В случае возникновения какой-то ошибки при загрузке файла

    // Сохраняем в сессию сообщение об ошибке.
    $_SESSION["server_messages"] = "<p class='text-danger font-weight-bold'> Ошибка! Не удалось загрузить файл </p>";

    //Возвращаем пользователя обратно на страницу загрузки изображения
    header("Location: " . $address_site);

    //Останавливаем скрипт
    exit();
}

// Если загрузка файла было выполнено успешно, выводим пользователю соответствующее сообщение

// Сохраняем в сессию сообщение об ошибке.
$_SESSION["server_messages"] = "<p class='text-success font-weight-bold'> Файл загружен успешно! </p>";

//Возвращаем пользователя обратно на страницу загрузки изображения









if (!isset($_POST['upload_images'])) {

    if (isset($_GET['flag']) || !empty($_SERVER['HTTP_REFERER'])) {
        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["server_messages"] = "<p class='text-danger font-weight-bold'>Ошибка! Размер загруженного изображения превышает 3MB </p>";
    } else {

        // Сохраняем в сессию сообщение об ошибке.
        $_SESSION["server_messages"] = "<p class='text-danger font-weight-bold'>Ошибка! Вы зашли в обработчик формы напрямую, поэтому нет данных для обработки. </p>";
    }

    //Возвращаем пользователя обратно на страницу загрузки изображения
    header("Location: " . $address_site);

    exit();
}

// (1) метка: Место для следующего куска кода

// указываем какие MIME-типы разрешены для загрузки
$allow_typess = ['image/jpeg', 'image/png', 'image/jpg'];

// проверяем MIME-тип загруженного файла и если данный тип не находятся в массиве с разрешенными типами,
// то, возвращаем пользователя обратно на страницу загрузки и выводим ему соответствующее сообщение об ошибке
if (!in_array($_FILES['file_imgs']['type'], $allow_typess)) {

    // Сохраняем в сессию сообщение об ошибке.
    $_SESSION["server_messages"] = "<p class='text-danger font-weight-bold'>Ошибка! Выбранный вами файл не является изображением </p>";

    //Возвращаем пользователя обратно на страницу загрузки изображения
    header("Location: " . $address_site);

    //Останавливаем скрипт
    exit();
}

// (2) метка: Место для следующего куска кода

// Массив с разрешенными расшерениями
$allow_extensions = ['jpg', 'jpeg', 'png'];

// Узнаем расширение загруженного файла

if (!in_array($extension_files, $allow_extensions)) {
    // Если расширение загруженного файла не находится в массиве с разрешенными расшерениями,
    // то, останавливаем скрипт
    exit();
}


// (3) метка: Место для следующего куска кода
if ($_FILES['file_imgs']['size'] > return_bytes('3M')) {
    // Если размер загруженного изображения превышает 3MB то возвращаем ошибку

    // Сохраняем в сессию сообщение об ошибке.
    $_SESSION["server_messages"] = "<p class='text-danger font-weight-bold'>Ошибка! Размер загруженного изображения превышает 3MB</p>";

    //Возвращаем пользователя обратно на страницу загрузки изображения
    header("Location: " . $address_site);

    //Останавливаем скрипт
    exit();
}

// Узнаем название загруженного файла

// Перемещаем изображение в нужную папку
$result_moves = move_uploaded_file($_FILES['file_imgs']['tmp_name'], '../images/news/' . $file_names . '.' . $extension_files);

if (!$result_moves) {

    // В случае возникновения какой-то ошибки при загрузке файла

    // Сохраняем в сессию сообщение об ошибке.
    $_SESSION["server_messages"] = "<p class='text-danger font-weight-bold'> Ошибка! Не удалось загрузить файл </p>";

    //Возвращаем пользователя обратно на страницу загрузки изображения
    header("Location: " . $address_site);

    //Останавливаем скрипт
    exit();
}

// Если загрузка файла было выполнено успешно, выводим пользователю соответствующее сообщение

// Сохраняем в сессию сообщение об ошибке.
$_SESSION["server_messages"] = "<p class='text-success font-weight-bold'> Файл загружен успешно! </p>";

//Возвращаем пользователя обратно на страницу загрузки изображения

header("Location: " . $address_site);

//Останавливаем скрипт
exit();


function return_bytes($val)
{
    $val = trim($val);
    $last = strtolower($val[strlen($val) - 1]);
    switch ($last) {
            // Модификатор 'G' доступен с PHP 5.1.0
        case 'g':
            $val *= 1024;
        case 'm':
            $val *= 1024;
        case 'k':
            $val *= 1024;
    }

    return $val;
}

