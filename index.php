<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>SHOES -Главная</title>
</head>

<body>
    <div class="wrapper">
        <!-- header -->
        <?php include('include/header.php');
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); ?>

        <section class="banner">
            <div class="container">
                <h1 class="banner__title" data-aos="fade-up">Интернет-магазин спортивной обуви</h1>
                <p class="banner__text" data-aos="fade-up" data-aos-delay="200">У нас вы найдете от стильной повседневной
                    обуви до обуви самых лучших игроков мира!</p>
                <div class="btn-group" data-aos="fade-up" data-aos-delay="300">
                    <a class="btn-group__btn-main" href="/katalog.php" data-aos="fade-left" data-aos-delay="200">
                        <span>Смотреть больше</span>
                        <div class="liquid-btn"></div>
                    </a>
                    <?php if (empty($_COOKIE['user'])) : ?>
                        <a href="/login.php" class="btn-group__btn btn-group__btn-view">Заказать сейчас</a>
                    <?php else : ?>
                        <a href="/private.php" class="btn-group__btn btn-group__btn-view"><button class="bubbly-button">Заказать сейчас</button></a>

                        <script>
                            var animateButton = function(e) {
                                e.preventDefault;
                                //reset animation
                                e.target.classList.remove('animate');

                                e.target.classList.add('animate');
                                setTimeout(function() {
                                    e.target.classList.remove('animate');
                                }, 700);
                            };

                            var bubblyButtons = document.getElementsByClassName("bubbly-button");

                            for (var i = 0; i < bubblyButtons.length; i++) {
                                bubblyButtons[i].addEventListener('mouseover', animateButton, false);
                            }
                        </script>
                    <?php endif; ?>
                </div>
                <img src="images/main-shoe.png" class="banner__img" alt="banner" data-aos="fade-up" data-aos-delay="350">
                <div class="liquid"></div>
            </div>
        </section>

        <section class="section" data-aos="fade-up" data-aos-delay="300">
            <div class="container">
                <h2 class="section__content-title">Выбрать категорию</h2>
                <div class="tarif">
                    <div class="tarif-item">
                        <a href="http://shoesmain/katalog.php?brands%5B%5D=1&in1=500">
                            <div class="tarif-header">
                                <img src="images/category/man.png" alt="">

                                <div class="tarif-info">
                                    <h3 class="tarif-info__title">МУЖСКИЕ</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="tarif-item">
                        <a href="http://shoesmain/katalog.php?brands%5B%5D=2&in1=500">
                            <div class="tarif-header">
                                <img src="images/category/girl.png" alt="">

                                <div class="tarif-info">
                                    <h3 class="tarif-info__title">ЖЕНСКИЕ</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="tarif-item">
                        <a href="http://shoesmain/katalog.php?brands%5B%5D=3&in1=500">
                            <div class="tarif-header">
                                <img src="images/category/kid.png" alt="">

                                <div class="tarif-info">
                                    <h3 class="tarif-info__title">ДЕТСКИЕ</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <h2 class="section__content-title" data-aos="fade-up" data-aos-delay="200">Виды спорта</h2>
                <div class="kinds">
                    <div class="kinds-item" data-aos="fade-up" data-aos-delay="200">
                        <a href="http://shoesmain/katalog.php?bbrand%5B%5D=11&in1=500">
                            <div class="kinds-header">
                                <img src="images/kinds/basket2.png" alt="">

                                <div class="kinds-info">
                                    <h3 class="kinds-info__title">КРОССОВКИ</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="kinds-item" data-aos="fade-up" data-aos-delay="300">
                        <a href="http://shoesmain/katalog.php?bbrand%5B%5D=12&in1=500">
                            <div class="kinds-header">
                                <img src="images/kinds/voleyball2.png" alt="">

                                <div class="kinds-info">
                                    <h3 class="kinds-info__title">БОТИНКИ</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="kinds-item" data-aos="fade-up" data-aos-delay="400">
                        <a href="http://shoesmain/katalog.php?bbrand%5B%5D=13&in1=500">
                            <div class="kinds-header">
                                <img src="images/kinds/football2.png" alt="">

                                <div class="kinds-info">
                                    <h3 class="kinds-info__title">КЕДЫ</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-slider">
            <div class="container">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="indicators active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" class="indicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="block-slider">
                                <div class="block-slider-revi" data-aos="fade-left" data-aos-delay="200">
                                    <div class="block-slider-revi-left">
                                        <h2 class="block-slider-revi-left-title">НОВАЯ КОЛЛЕКЦИЯ</h2>
                                        <h3 class="block-slider-revi-left-title-name">Nike Black History Month</h3>
                                        <p class="block-slider-revi-left-text">Коллекция Nike Black History Month поступит в продажу 15 января, в день Мартина Лютера Кинга.
                                            У каждой модели "BHM", понятное дело, свой ценник: Nike Kyrie 4 - 8590 ₽, Nike LeBron 15 - 13240 ₽, Nike KD 10 - 10740 ₽.</p>
                                    </div>
                                    <div class="block-slider-revi-right">
                                        <img src="images/slider/1.png" alt="image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="block-slider">
                                <div class="block-slider-revi" data-aos="fade-left" data-aos-delay="300">
                                    <div class="block-slider-revi-left">
                                        <h2 class="block-slider-revi-left-title">НОВАЯ КОЛЛЕКЦИЯ</h2>
                                        <h3 class="block-slider-revi-left-title-name">Air Jordan 5 «Neymar»</h3>
                                        <p class="block-slider-revi-left-text">Эта цветовая гамма Air Jordan 5 вдохновлена ​​​​одним из самых молодых и лучших футболистов в мире на данный момент Неймаром.
                                            Звезде бразильского футбола всего 24 года, и он уже является одним из самых узнаваемых лиц в спорте.</p>
                                    </div>
                                    <div class="block-slider-revi-right">
                                        <img src="images/slider/2.png" alt="image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden"></span>
                    </button>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="section__popular">
                    <h2 class="section__popular-title" data-aos="fade-right" data-aos-delay="200">Новинки</h2>
                </div>
                <div class="popular">
                    <?php
                    $category = mysqli_query($connection, "SELECT * FROM `product` ORDER BY `id_pt` DESC LIMIT 4");

                    $data_from_cat = [];
                    while ($resultcat = mysqli_fetch_assoc($category)) {
                        $data_from_cat[] = $resultcat;
                    }
                    foreach ($data_from_cat as $categor) :
                    ?>
                        <div class="popular-item">
                            <a href="card.php?id=<?= $categor['id_pt'] ?>">
                                <div class="popular-header" data-aos="fade-up" data-aos-delay="200">
                                    <div class="popular-info scale">
                                        <img class="popular__img scale" src="images/special/<?= $categor['img'] ?>" alt="">
                                        <p class="popular__text"><?= $categor['name'] ?></p>
                                        <a class="popular__price" href=""><?= $categor['price'] ?> ₽</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="section__special">
                    <h2 class="section__special-title" data-aos="fade-right" data-aos-delay="200">Новинки Спорт</h2>
                </div>
                <div class="special">
                    <?php
                    $category = mysqli_query($connection, "SELECT * FROM `product` WHERE `gender` = '4' ORDER BY `id_pt` DESC LIMIT 4");

                    $data_from_cat = [];
                    while ($resultcat = mysqli_fetch_assoc($category)) {
                        $data_from_cat[] = $resultcat;
                    }
                    foreach ($data_from_cat as $categor) :
                    ?>
                        <div class="special-item" data-aos="fade-up" data-aos-delay="200">
                            <a href="card.php?id=<?= $categor['id_pt'] ?>">
                                <div class="special-header">
                                    <div class="special-info scale">
                                        <img class="special__img scale" src="images/special/<?= $categor['img'] ?>" alt="">
                                        <p class="special__text"><?= $categor['name'] ?></p>
                                        <a class="special__price" href=""><?= $categor['price'] ?> ₽</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="brand-item" data-aos="zoom-out" data-aos-delay="200">
                    <div class="brand">
                        <a class="brand__item" href=""><img class="brand__item-img" src="images/brand/adidas.png" alt="adidas">
                            <p class="brand__item-text">Adidas</p>
                        </a>
                        <a class="brand__item" href=""><img class="brand__item-img" src="images/brand/asics.png" alt="asics">
                            <p class="brand__item-text">Asics</p>
                        </a>
                        <a class="brand__item" href=""><img class="brand__item-img" src="images/brand/converse.png" alt="converse">
                            <p class="brand__item-text">Converse</p>
                        </a>
                        <a class="brand__item" href=""><img class="brand__item-img" src="images/brand/jordan.png" alt="jordan">
                            <p class="brand__item-text">Jordan</p>
                        </a>
                        <a class="brand__item" href=""><img class="brand__item-img" src="images/brand/nike.png" alt="nike">
                            <p class="brand__item-text">Nike</p>
                        </a>
                        <a class="brand__item" href=""><img class="brand__item-img" src="images/brand/puma.png" alt="puma">
                            <p class="brand__item-text">Puma</p>
                        </a>
                        <a class="brand__item" href=""><img class="brand__item-img" src="images/brand/reebok.png" alt="reebok">
                            <p class="brand__item-text">Reebok</p>
                        </a>
                        <a class="brand__item" href=""><img class="brand__item-img" src="images/brand/newbal.png" alt="newbal">
                            <p class="brand__item-text">New balance</p>
                        </a>
                    </div>
                </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="section__news">
                    <h2 class="section__news-title" data-aos="fade-right" data-aos-delay="200">Новости</h2>
                    <a class="section__news-button" href="news.php" data-aos="fade-left" data-aos-delay="200">
                        <span>Смотреть все..</span>
                        <div class="liquid"></div>
                    </a>
                </div>
                <div class="news">
                    <?php
                    require_once "php/bd.php";
                    $colors = mysqli_query($connection, "SELECT * FROM `news` ORDER BY `id_ns` DESC LIMIT 4");
                    $data_from_d = [];
                    while ($result = mysqli_fetch_assoc($colors)) {
                        $data_from_d[] = $result;
                    }

                    # var_dump($data_from_db);
                    ?> <?php foreach ($data_from_d as $color) : ?>
                        <div class="news-item" data-aos="fade-up" data-aos-delay="200">
                            <a href="card-news.php?id=<?= $color['id_ns'] ?>">
                                <div class="news-header">
                                    <div class="news-info scale">
                                        <img class="news__img scale" src="images/news/<?= $color['img'] ?>" alt="">
                                        <p class="news__text" name="title"><b><?= $color['title'] ?></b></p>
                                        <p class="news__text" name="desc"><?= $color['descr'] ?></p>
                                        <p class="news__data" name="data"><?= $color['date'] ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- footer -->
        <?php include('include/footer.php'); ?>
    </div>

    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>