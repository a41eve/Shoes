<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/news.css">
    <title>Магазин спортивной обуви - Joys</title>
</head>

<body>
    <?php
    include('include/header.php');
    require_once 'php/sortNew.php';
    ?>

    <section class="section">
        <div class="container">
            <div class="section__news">
                <h2 class="section__news-title" data-aos="fade-right" data-aos-delay="200">Новости</h2>

                <div class="section__news-filter">
                    <p>Сортировка:&ensp;</p>
                    <form action="" method="get">
                        <div class="select-sort">
                            <select name="sort" id="js-sort">
                                <option value="date" <?php if (@$_GET['sort'] == 'date') echo 'selected'; ?>>Сначала старые</option>
                                <option value="date_desc" <?php if (@$_GET['sort'] == 'date_desc') echo 'selected'; ?>>Сначала новые</option>
                            </select>
                        </div>
                    </form>

                    <script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>

                    <script>
                        $('#js-sort').change(function() {
                            $(this).closest('form').submit();
                        });
                    </script>
                </div>
            </div>

            <div class="news">

                <?php

                require_once "php/bd.php";

                $dd = date('Y.m.d');

                # var_dump($data_from_db);
                ?> <?php foreach ($list as $color) : ?>
                    <div class="news-item" data-aos="fade-up" data-aos-delay="200">

                        <a href="card-news.php?id=<?= $color['id_ns'] ?>">
                            <div class="news-item-header">
                                <div class="news-item-header-info">
                                    <div class="news-item-header-info-img">
                                        <img class="news-item-header-info__img" src="images/news/<?= $color['img'] ?>" alt="">
                                    </div>

                                    <div class="news-item-header-info-text">
                                        <h3 class="news__text" name="title"><b><?= $color['title'] ?></b></h3>
                                        <p class="news__text" name="desc"><?= $color['descr'] ?></p>
                                        <p class="news__data" name="data"><?= $color['date'] ?> | <?= $color['author'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>

                <?php endforeach; ?>


            </div>
        </div>
    </section>

    <?php include('include/footer.php'); ?>

    <script type="text/javascript" src="js/select.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
    <script src="https://kit.fontawesome.com/3037fe6c63.js" crossorigin="anonymous"></script>
</body>

</html>