<?php
require_once 'php/bd.php';
$polz = $_COOKIE['user'];
$product = mysqli_query($connection, "SELECT * FROM `users` WHERE `id_users` = '$polz'");
$product = mysqli_fetch_assoc($product);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/order-form.css">
    <title>Магазин спортивной обуви - Оформление заказа</title>
</head>

<body>
    <!-- header -->
    <?php include('include/header.php'); ?>

    <section class="section__order">
        <div class="container">
            <div class="section__order-form">
                <h2 class="section__order-form-title">Оформление заказа</h2>


                <div class="section__order-wrapper">
                    <form action="php/zakaz.php" method="POST" class="section__order-form-item">
                        <div class="section__order-form-item-input">
                            <label>ФИО</label>
                            <br>
                            <input type="text" name="fio" value="<?= $product['surname'] ?> <?= $product['name'] ?> <?= $product['patronymic'] ?>" placeholder="ФИО" required>
                        </div>


                        <div class="section__order-form-item-input">
                            <label>Населённый пункт</label>
                            <br>
                            <select name="city" required>
                                <option disabled selected>Выберите город</option>
                                <option value="Екатеринбург">Екатеринбург</option>
                                <option value="Челябинск">Челябинск</option>
                                <option value="Миасс">Миасс</option>
                                <option value="Чебаркуль">Чебаркуль</option>
                                <option value="Златоуст">Златоуст</option>
                                <option value="Магнитогорск">Магнитогорск</option>
                            </select>
                        </div>
                        <div class="section__order-form-item-input">
                            <label>Адрес</label>
                            <br>
                            <input type="text" name="addr" placeholder="Ваш адрес" required>
                        </div>

                        <div class="section__order-form-item-input">
                            <label>Номер телефона</label>
                            <br>
                            <input type="tel" name="phone" value="<?= $product['phone'] ?>" id="inputPhone" value="+7(___)-___-__-__" required>

                            <script>
                                let inputPhone = document.getElementById("inputPhone");
                                inputPhone.oninput = () => phoneMask(inputPhone)

                                function phoneMask(inputEl) {
                                    let patStringArr = "+7(___)-___-__-__".split('');
                                    let arrPush = [3, 4, 5, 8, 9, 10, 12, 13, 15, 16]
                                    let val = inputEl.value;
                                    let arr = val.replace(/\D+/g, "").split('').splice(1);
                                    let n;
                                    let ni;
                                    arr.forEach((s, i) => {
                                        n = arrPush[i];
                                        patStringArr[n] = s
                                        ni = i
                                    });
                                    inputEl.value = patStringArr.join('');
                                    n ? inputEl.setSelectionRange(n + 1, n + 1) : inputEl.setSelectionRange(17, 17)
                                }
                            </script>
                        </div>
                        <div class="section__order-form-item-input">
                            <label>Электронная почта</label>
                            <br>
                            <input type="email" name="email" value="<?= $product['email'] ?>" placeholder="example@gmail.com" required>
                        </div>

                        <div class="section__order-form-item-input-price">
                            <?php
                            require_once "php/bd.php";
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
                            <p>К оплате:&ensp;<span><b><?= $pric ?> ₽</b></span></p>
                        </div>

                        <div class="section__order-form-item-oplata">
                            <label>Способ оплаты</label>

                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" required>
                                <li class="nav-item" role="presentation">
                                    <input type="radio" name="oplata" class="section__order-form-item-oplata-input active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true" value="Наличные">
                                    <label for="pills-home-tab" class="oplata">Наличные</label>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <input type="radio" name="oplata" class="section__order-form-item-oplata-input" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false" value="Безналичные">
                                    <label for="pills-profile-tab" class="oplata">Безналичные</label>
                                </li>
                            </ul>
                        </div>
                        <div class="section__order-form-item-accept">
                            <input type="checkbox" id="accept" required="">
                            <label for="accept">Я соласен на <a href="personal-data.php">обработку персональных данных</a></label>
                        </div>
                        <div class="section__order-form-item-btn">
                            <a href=""> <button type="submit">Оформить заказ</button></a>
                        </div>
                    </form>


                    <div class="section_cart">
                        <div class="section_cart-title">
                            <h3>Ваш заказ</h3>
                        </div>
                        <?php
                        require_once "php/bd.php";
                        $polz = $_COOKIE['user'];
                        $category = mysqli_query($connection, "SELECT *, `product`.`name` as 'ns' FROM `back`, `users`, `product`, `size`, `color` WHERE `back`.`id_us`=`users`.`id_users` AND `back`.`id_pt`=`product`.`id_pt` AND `back`.`id_se`=`size`.`id_se` AND `back`.`id_us`='$polz' AND `product`.`color`=`color`.`id_cr`");
                        $data_from_cat = [];
                        while ($resultcat = mysqli_fetch_assoc($category)) {
                            $data_from_cat[] = $resultcat;
                        }
                        foreach ($data_from_cat as $categor) : ?>
                            <div class="section_cart-inner_block-item">
                                <div class="section_cart-inner_block-item-all section_cart-inner_block-item-img">
                                    <img src="images/special/<?= $categor['img'] ?>" alt="img">
                                </div>
                                <div class="section_cart-inner_block-item-all-text">
                                    <div class="section_cart-inner_block-item-all section_cart-inner_block-item-text">
                                        <p><?= $categor['ns'] ?></p>
                                    </div>
                                    <div class="section_cart-inner_block-item-all section_cart-inner_block-item-size_color">
                                        <div class="section_cart-inner_block-item-size_color-size">
                                            <span>Размер:&ensp;</span><label><?= $categor['s_size'] ?></label>
                                        </div>
                                        <div class="section_cart-inner_block-item-size_color-color">
                                            <span>Цвет:&ensp;</span><label style="background-color: #<?= $categor['code'] ?>;"></label>
                                        </div>
                                        <div class="section_cart-inner_block-item-size_color-count">
                                            <span>Количество:&ensp;</span><b><?= $categor['counts'] ?></b>
                                        </div>
                                    </div><?php $pr = $categor['price'] * $categor['counts'] ?>
                                    <div class="section_cart-inner_block-item-all section_cart-inner_block-item-price">
                                        <p><?= $pr ?>&ensp;₽</p>
                                        <span>В наличии</span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <?php include('include/footer.php'); ?>

    <script src="https://kit.fontawesome.com/3037fe6c63.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>