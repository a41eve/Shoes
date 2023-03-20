<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/styles/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="../styles/header.css">
</head>

<body>
    <!-- arrow up -->
    <div class="btn-up btn-up_hide"></div>
    <?php
    require_once "php/bd.php";

    $info = mysqli_query($connection, "SELECT * FROM `info`");
    $info = mysqli_fetch_assoc($info);
    session_start();
    if (!empty($_COOKIE['user'])) {
        # code...      
        $polz = $_COOKIE['user'];
        $us = mysqli_query($connection, "SELECT * FROM `users` WHERE `id_users`='$polz'");
        $us = mysqli_fetch_assoc($us);
    }

    ?>
    <header>
        <div id="header" class="header" data-aos="fade-up">
            <a href="index.php"><img src="images/<?= $info['img'] ?>" class="header__img" alt="logo"></a>
            <nav class="dws-menu">
                <div class="hamb">
                    <div class="hamb__field" id="hamb">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </div>
                </div>
                <ul class="nav" id="nav">
                    <li class="nav__item">
                        <a href="katalog.php" class="nav__link">Каталог</a>
                        <ul class="submenu" id="submenu">
                            <li><a href="http://shoesmain/katalog.php?brands%5B%5D=1&in1=500">Мужские</a></li>
                            <li><a href="http://shoesmain/katalog.php?brands%5B%5D=2&in1=500">Женские</a></li>
                            <li><a href="http://shoesmain/katalog.php?brands%5B%5D=3&in1=500">Детские</a></li>
                            <li><a href="http://shoesmain/katalog.php?brands%5B%5D=4&in1=500">Спорт</a></li>
                        </ul>
                    </li>
                    <li class="nav__item">
                        <a href="info.php" class="nav__link">О компании</a>
                    </li>
                    <li class="nav__item">
                        <a href="news.php" class="nav__link">Новости</a>
                    </li>
                    <li class="nav__item">
                        <a href="review.php" class="nav__link">Отзывы</a>
                    </li>
                    <li class="nav__item">
                        <a href="backsv.php" class="nav__link">Обратная связь</a>
                    </li>

                    <?php if (empty($_COOKIE['user'])) : ?>
                        <li class="nav__item">
                            <a href="login.php" class="nav__btn">Войти<ion-icon name="person"></ion-icon></a>
                        </li>
                    <?php else : ?>
                        <div class="nav__item-mobile">
                            <h3>Данные пользователя</h3>
                            <li>
                                <a href="private.php" class="nav__link">Личный кабинет</a>
                            </li>
                            <li>
                                <a href="l.php" class="nav__link">Избранное</a>
                            </li>
                        </div>
                        <li class="nav__item nav__item-user">
                            <p>
                                <img src="../server_img/images/<?= $us['img_us'] ?>" alt="">
                                <a href="php/logout.php" class="nav__link">Выйти</a>
                            <div class="liquid"></div>
                            <?php
                            $category = mysqli_query($connection, "SELECT *, `product`.`name` as 'ns' FROM `back`, `users`, `product`, `size`, `color` WHERE `back`.`id_us`=`users`.`id_users` AND `back`.`id_pt`=`product`.`id_pt` AND `back`.`id_se`=`size`.`id_se` AND `back`.`id_us`='$polz' AND `product`.`color`=`color`.`id_cr`");
                            $data_from_cat = [];
                            while ($resultcat = mysqli_fetch_assoc($category)) {
                                $data_from_cat[] = $resultcat;
                            }
                            $pric = 0;
                            $cou = 0;
                            foreach ($data_from_cat as $categor) {
                                $pri = $categor['price'] * $categor['counts'];
                                $pric = $pric + $pri;
                                $cou = $cou + $categor['counts'];
                            }
                            ?>
                            <?php
                            if ($cou != 0) {
                                echo "<span>$cou</span>";
                            }
                            ?>
                            </p>
                        </li>

                        <li class="nav__item submenu-icon">
                            <ion-icon name="ellipsis-vertical" class="subm" id="submenu_btn"></ion-icon>
                            <ion-icon name="ellipsis-vertical" class="subm submenu_btn_two" id="submenu_btn_two"></ion-icon>
                            <ul class="submenu_private" id="modal_submenu">
                                <div class="submenu_private-inner">
                                    <li>
                                        <a href="private.php">
                                            <ion-icon name="person-outline"></ion-icon>
                                            <a href="private.php" class="nav__link">Личный кабинет</a>
                                            <?php
                                            if ($cou != 0) {
                                                echo "<span>$cou</span>";
                                            }
                                            ?>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="private.php">
                                            <ion-icon name="heart-outline"></ion-icon>
                                            <a href="private.php" class="nav__link">Избранное</a>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="php/logout.php">
                                            <ion-icon name="power-outline"></ion-icon>
                                            <a href="php/logout.php" class="nav__link">Выйти</a>
                                        </a>
                                    </li>
                                </div>
                            </ul>

                            <script>
                                document.getElementById('submenu_btn').onclick = function submenu_btn() {
                                    document.getElementById('modal_submenu').style.opacity = '1';
                                    document.getElementById('modal_submenu').style.marginTop = '-4.4rem';
                                    document.getElementById('submenu_btn_two').style.display = 'block';
                                    document.getElementById('submenu_btn').style.display = 'none';
                                }
                                document.getElementById('submenu_btn_two').onclick = function submenu_btn_two() {
                                    document.getElementById('modal_submenu').style.opacity = '0';
                                    document.getElementById('modal_submenu').style.marginTop = '-37rem';
                                    document.getElementById('submenu_btn').style.display = 'block';
                                    document.getElementById('submenu_btn_two').style.display = 'none';
                                }
                            </script>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </header>

    <div class="popup" id="popup"></div>

    <!-- icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script type="text/javascript" src="js/up.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>