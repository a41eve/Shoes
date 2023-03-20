<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/main.css">
    <title>Админ панель - Главная</title>
</head>

<body>
    <?php
    require_once "../../php/bd.php";
    ?>
    <div class="wrapper">
        <!-- header -->
        <?php include 'include/panel.php'; ?>

        <div class="wrapper-content">
            <section>
                <div class="counter">
                    <div class="counter-item1">
                        <div class="counter-item1-img">
                            <div class="counter-item2-img-icon">
                                <img src="images/user.png" alt="icon">
                            </div>
                            <div class="counter-item1-img-counter">
                                <div class="counter-item2-img-counter-num">
                                    <?php
                                    $a = mysqli_query($connection, "SELECT COUNT(1) FROM users");
                                    $b = mysqli_fetch_array($a); ?>
                                    <p class="counter-item1-img-counter-num-number"><?= $b[0]; ?></p>
                                    <p class="counter-item1-img-counter-num-text">Пользователи</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="counter-item2">
                        <div class="counter-item2-img">
                            <div class="counter-item2-img-icon">
                                <img src="images/news.png" alt="icon">
                            </div>
                            <div class="counter-item2-img-counter">
                                <div class="counter-item2-img-counter-num">
                                    <?php
                                    $c = mysqli_query($connection, "SELECT COUNT(1) FROM news");
                                    $d = mysqli_fetch_array($c); ?>
                                    <p class="counter-item2-img-counter-num-number"><?= $d[0]; ?></p>
                                    <p class="counter-item2-img-counter-num-text">Новости</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="counter-item3">
                        <div class="counter-item3-img">
                            <div class="counter-item2-img-icon">
                                <img src="images/tovar.png" alt="icon">
                            </div>
                            <div class="counter-item3-img-counter">
                                <div class="counter-item2-img-counter-num">
                                    <?php
                                    $e = mysqli_query($connection, "SELECT COUNT(1) FROM product");
                                    $f = mysqli_fetch_array($e); ?>
                                    <p class="counter-item3-img-counter-num-number"><?= $f[0]; ?></p>
                                    <p class="counter-item3-img-counter-num-text">Товары</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="counter-item4">
                        <div class="counter-item4-img">
                            <div class="counter-item2-img-icon">
                                <img src="images/user.png" alt="icon">
                            </div>
                            <div class="counter-item4-img-counter">
                                <div class="counter-item2-img-counter-num">
                                    <?php
                                    $g = mysqli_query($connection, "SELECT COUNT(1) FROM review");
                                    $i = mysqli_fetch_array($g); ?>
                                    <p class="counter-item4-img-counter-num-number"><?= $i[0]; ?></p>
                                    <p class="counter-item4-img-counter-num-text">Отзывы</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="counter-down">
                    <div class="counter-down-items">
                        <div class="counter-down-items-item">
                            <div class="counter-down-items-item-icon_text">
                                <ion-icon name="analytics"></ion-icon>
                                <p>Всего оформлено заказов</p>
                            </div>
                            <div class="counter-down-items-item-num">
                                <?php
                                $zak = mysqli_query($connection, "SELECT COUNT(1) FROM orders");
                                $zakaz = mysqli_fetch_array($zak); ?>
                                <h2><?= $zakaz[0]; ?></h2>
                            </div>
                        </div>

                        <div class="counter-down-items-item">
                            <div class="counter-down-items-item-icon_text">
                                <ion-icon name="analytics"></ion-icon>
                                <p>Всего продаж компании</p>
                            </div>
                            <div class="counter-down-items-item-num">
                                <?php
                                $zak = mysqli_query($connection, "SELECT COUNT(1) FROM orders");
                                $zakaz = mysqli_fetch_array($zak); ?>
                                <h2><?= $zakaz[0]; ?></h2>
                            </div>
                        </div>

                        <div class="counter-down-items-item">
                            <div class="counter-down-items-item-icon_text">
                                <ion-icon name="eye-outline"></ion-icon>
                                <p>Пользователи в сети</p>
                            </div>
                            <div class="counter-down-items-item-num">
                                <h2>4</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="section_table">
                    <div class="section_table-item">
                        <h3 class="section_table-item-title">Последние заказы</h3>

                        <div class="section_table-item-block">
                            <div class="section_table-item-block-content">
                                <div class="section_table-item-block-content-top">
                                    <p><b>Minaru</b></p>
                                    <p>Рязанский Дмитрий Эдуардович</p>
                                </div>
                                <div class="section_table-item-block-content-bottom">
                                    <img src="/images/special/03.jpg" alt="img">

                                    <div class="section_table-item-block-content-bottom-text">
                                        <p class="desc">Детские баскетбольные кроссовки ADIDAS DEEP THREAT J</p>
                                        <div class="section_table-item-block-content-bottom-text-inner">
                                            <div class="section_table-item-block-content-bottom-text-inner-color">
                                                <label for="color" style="background-color: #000;"></label>
                                                <input type="checkbox" id="color">
                                            </div>

                                            <p class="size">Размер:&nbsp;<b>38</b></p>
                                            <p class="counter-number">Кол-во:&nbsp;<b>1</b></p>
                                            <p class="price"><b>9690&nbsp;₽</b></p>
                                            <p class="date">Заказ:&nbsp;<b>01.03.2023</b></p>
                                            <p class="status" style="color: #00701e;"><b>Доставлен</b></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- update -->
                                <div class="section_table-item-block-update">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><img src="/images/private/update.png" alt="icon"></a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Редактировать профиль</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="text" name="fio" placeholder="Введите ФИО">
                                                    <input type="text" name="login" placeholder="Введите логин">
                                                    <input type="text" name="phone" placeholder="Введите номер телефона">
                                                    <input type="text" name="email" placeholder="Введите электронную почту">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" data-bs-dismiss="modal">Отмена</button>
                                                    <button type="submit">Редактировать</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="section_table-item-block-delete">
                                    <a href="#"><img src="/images/private/delete.png" alt="icon"></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- reviews -->
                    <div class="section_reviews-item">
                        <h3 class="section_reviews-item-title">Последние отзывы</h3>

                        <div class="section_reviews-item-block">
                            <?php
                            $category = mysqli_query($connection, "SELECT * FROM `review` ORDER BY `id_rw` ASC LIMIT 4");

                            $data_from_cat = [];
                            while ($resultcat = mysqli_fetch_assoc($category)) {
                                $data_from_cat[] = $resultcat;
                            }
                            foreach ($data_from_cat as $categor) :
                            ?>
                                <div class="section_reviews-item-block-content">
                                    <div class="section_reviews-item-block-content-top">
                                        <p><b><?= $categor['date'] ?></b></p>
                                        <p><?= $categor['name'] ?></p>
                                    </div>
                                    <div class="section_reviews-item-block-content-bottom">
                                        <img src="/server_img/images/avatar.png" alt="img">

                                        <div class="section_reviews-item-block-content-bottom-text">
                                            <p class="comment"><?= $categor['text'] ?></p>
                                        </div>
                                    </div>

                                    <!-- update -->
                                    <div class="section_reviews-item-block-update">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><img src="/images/private/update.png" alt="icon"></a>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Редактировать профиль</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="text" name="fio" placeholder="Введите ФИО">
                                                        <input type="text" name="login" placeholder="Введите логин">
                                                        <input type="text" name="phone" placeholder="Введите номер телефона">
                                                        <input type="text" name="email" placeholder="Введите электронную почту">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-bs-dismiss="modal">Отмена</button>
                                                        <button type="submit">Редактировать</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="section_reviews-item-block-delete">
                                        <a href="#"><img src="/images/private/delete.png" alt="icon"></a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</body>

</html>