<?php

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once 'php/bd.php';

/*
 * Получаем ID продукта из адресной строки - /product.php?id=1
 */

$product_id = $_GET['id'];

/*
 * Делаем выборку строки с полученным ID выше
 */

$product = mysqli_query($connection, "SELECT * FROM `news` WHERE `id_ns` = '$product_id'");

/*
 * Преобразовывем полученные данные в нормальный массив
 * Используя функцию mysqli_fetch_assoc массив будет иметь ключи равные названиям столбцов в таблице
 */

$product = mysqli_fetch_assoc($product);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/card-news.css">
    <title>SHOES - <?= $product['title'] ?> - </title>
</head>

<body>
    <!-- header -->
    <?php include('include/header.php'); ?>

    <section>
        <div class="container">
            <div class="section_card">
                <div class="section_card-news">
                    <div class="section_card-news-item">
                        <div class="section_card-news-item-title__inner" data-aos="fade-right" data-aos-delay="100">
                            <p><?= $product['date'] ?> | <?= $product['author'] ?></p>
                        </div>
                        <div class="section_card-news-item-block">
                            <div class="section_card-news-item-block-illustration">
                                <div class="section_card-news-item-block-illustration-img" style="background-image: url(images/news/<?= $product['img'] ?>); background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">
                                </div>

                                <div class="section_card-news-item-block-text" data-aos="fade-zoom" data-aos-delay="250">
                                    <!-- Внутри <b> выводим название новости(обуви) -->
                                    <h1><?= $product['title'] ?></h1>
                                    <h2><?= $product['descr'] ?></h2>
                                </div>

                                <div class="section_card-news-item-arrow">
                                    <span><ion-icon name="chevron-down"></ion-icon></span>
                                </div>

                                <div class="section_card-news-item-block-description">
                                    <p><?= nl2br($product['description1']) ?></p>
                                </div>
                            </div>
                            <div class="section_card-news-item-arrow">
                                <span><ion-icon name="chevron-down"></ion-icon></span>
                            </div>
                            <div class="section_card-news-item-illustration-down">
                                <img src="images/news/<?= $product['img'] ?>" alt="illustration" data-aos="fade-up" data-aos-delay="100">
                                <img src="images/news/<?= $product['img1'] ?>" alt="illustration" data-aos="fade-up" data-aos-delay="250">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- footer -->
    <?php include('include/footer.php'); ?>

    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/3037fe6c63.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>