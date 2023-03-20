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

$product = mysqli_query($connection, "SELECT * FROM `product`, `color`, `gender` WHERE `product`.`color` = `color`.`id_cr`AND `product`.`gender` = `gender`.`id_gr` AND `id_pt` = '$product_id'");

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
    <link rel="stylesheet" href="styles/card.css">
    <title>SHOES - <?= $product['name'] ?></title>
</head>

<body>
    <!-- header -->
    <?php include('include/header.php'); ?>

    <section>
        <div class="container">
            <div class="section_card">
                <div class="section_card-item">
                    <div class="section_card-item-img">
                        <!-- image -->
                        <img src="images/special/<?= $product['img'] ?>" alt="image">
                    </div>
                    <div class="section_card-item-content">
                        <h3 class="section_card-item-content-title"><?= $product['name'] ?></h3>
                        <span>Артикул: <?= $product['id_pt'] ?></span>

                        <div class="section_card-item-content-price">
                            <h1 class="count_price section_card-item-content-price-item" data-price="<?= $product['price'] ?>"><?= $product['price'] ?> </h1>
                            <h2>₽</h2>
                        </div>

                        <p class="section_card-item-content-available"><ion-icon name="checkmark-done-outline"></ion-icon> <span>В наличии</span></p>
                        <form action="php/card.php?id=<?= $product_id ?>" method="POST">
                            <!-- size -->
                            <div class="section_card-item-content-size">
                                <p class="section_card-item-content-size-text">Выберите размер:</p>

                                <div class="katalog-filter__size">

                                    <?php
                                    $sizes = mysqli_query($connection, "SELECT * FROM `product`, `size`, `prod_size` WHERE `product`.`id_pt` = `prod_size`.`id_pt`AND `prod_size`.`id_se` = `size`.`id_se` AND `product`.`id_pt` = '$product_id'");
                                    $data_from_d = [];
                                    while ($result = mysqli_fetch_assoc($sizes)) {
                                        $data_from_d[] = $result;
                                    }
                                    ?>

                                    <?php foreach ($data_from_d as $size) : ?>

                                        <a href="?s=<?= $size['id_se'] ?>"><input type="radio" class="katalog-filter__size-size-checkbox checkbox--size" id="size<?= $size['s_size'] ?>" name="size" value="<?= $size['id_se'] ?>" oninvalid="setCustomValidity('Выберите размер')" oninput="setCustomValidity('')" required>
                                            <label for="size<?= $size['s_size'] ?>" name="size"><?= $size['s_size'] ?></label></a>

                                    <?php endforeach; ?>
                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                </div>

                                <div class="section_card-item-content-count-input">
                                    <label for="button_minus"><ion-icon name="remove-outline"></ion-icon></label>
                                    <input type="button" class="minus" value="" id="button_minus">

                                    <input type="number" class="quantity" step="1" min="1" max="10" id="num_count" name="quantity" value="1" title="Qty">

                                    <label for="button_plus"><ion-icon name="add-outline"></ion-icon></label>
                                    <input type="button" class="plus" value="+" id="button_plus">

                                    <script type="text/javascript">
                                        $(document).ready(function() {


                                            function change($div, val) {
                                                var $input = $div.find('.quantity');
                                                var count = parseInt($input.val()) + val;
                                                count = count < 1 ? 1 : count;
                                                $input.val(count);
                                                var $price = $div.find('.count_price');
                                                $price.text(count * $price.data('price'));
                                            }
                                            $('.minus').click(function() {
                                                change($(this).closest('.section_card-item-content'), -1);
                                            });
                                            $('.plus').click(function() {
                                                change($(this).closest('.section_card-item-content'), 1);
                                            });
                                            $('.quantity').on("input", function() {
                                                var $price = $(this).closest('.section_card-item-content').find('.count_price');
                                                $price.text(this.value * $price.data('price'));

                                            });
                                        });
                                    </script>
                                </div>
                            </div>

                            <!-- link to basket -->
                            <div class="section_card-item-content-btn">
                                <?php if (empty($_COOKIE['user'])) : ?>
                                    <a href="/login.php"><button type="button">Добавить в корзину</button></a>
                                <?php else : ?>
                                    <a href=""><button type="submit">Добавить в корзину</button></a>
                                    <a href="order-form.php"><button type="button" id="btn-now">Купить сейчас</button></a>
                                <?php endif; ?>
                            </div>
                        </form>
                        <!-- characteristic -->
                        <div class="section_card-item-content-characteristic">
                            <p class="section_card-item-content-characteristic-title">Характеристика</p>

                            <div class="section_card-item-content-characteristic-block__text">
                                <p class="section_card-item-content-characteristic-block__text-text">Категория: <?= $product['name_gr'] ?></p>
                                <p class="section_card-item-content-characteristic-block__text-color">Цвет: <span style="background-color: #<?= $product['code'] ?>;"></span></p>
                                <p class="section_card-item-content-characteristic-block__text-text">Страна: <?= $product['countries'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <?php include('include/footer.php'); ?>
</body>

</html>