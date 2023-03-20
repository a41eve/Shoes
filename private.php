<?php
require_once 'php/bd.php';
$polz = $_COOKIE['user'];
$prod = mysqli_query($connection, "SELECT * FROM `users` WHERE `id_users` = '$polz'");
$prod = mysqli_fetch_assoc($prod);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/private.css">
    <title>Магазин спортивной обуви - Личный кабинет</title>
</head>

<body>
    <!-- header -->
    <?php include('include/header.php'); ?>

    <section>
        <div class="container">
            <div class="information__user">
                <div class="information__user-desc">
                    <div class="information__user-desc-img">
                        <img src="server_img/images/<?= $prod['img_us'] ?>" alt="img-user">
                    </div>
                    <div class="information__user-desc-text">
                        <h2 class="information__user-desc-text-name">
                            <?= $prod['surname'] ?> <?= $prod['name'] ?> <?= $prod['patronymic'] ?>
                            <!-- Кнопка редактиварония -->
                            <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <ion-icon name="pencil"></ion-icon>
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Редактировать профиль</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>


                                        <div class="modal-body">
                                            <form action="server_img/upload-one-file.php?flag" method="POST" class="form-inline md-form" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label for="file_img" class="form-label">Сменить фотографию</label>
                                                    <input class="form-control" type="file" name="file_img" id="file_img">
                                                </div>

                                                <input type="hidden" name="id" placeholder="Введите Фамилию" value="<?= $prod['id_users'] ?>">
                                                <input type="text" name="surname" placeholder="Введите Фамилию" value="<?= $prod['surname'] ?>">
                                                <input type="text" name="name" placeholder="Введите Имя" value="<?= $prod['name'] ?>">
                                                <input type="text" name="patronymic" placeholder="Введите Отчество" value="<?= $prod['patronymic'] ?>">
                                                <input type="text" name="login" placeholder="Введите логин" value="<?= $prod['login'] ?>">
                                                <input type="text" name="phone" placeholder="Введите номер телефона" value="<?= $prod['phone'] ?>">
                                                <input type="text" name="email" placeholder="Введите электронную почту" value="<?= $prod['email'] ?>">
                                        </div>
                                        <div class="modal-footer">

                                            <input type="submit" class="btn btn-primary" name="nn" value="Отмена" data-bs-dismiss="modal">
                                            <input type="submit" class="btn btn-primary" name="upload_image" placeholder="jnnn" value="Редактировать">
                                        </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                        </h2>
                        <p class="information__user-desc-text-login">Логин:&ensp;<b> <?= $prod['login'] ?> </b></p>
                        <p class="information__user-desc-text-text">Телефон:&ensp; <?= $prod['phone'] ?> </p>
                        <p class="information__user-desc-text-text">Электронная почта:&ensp; <?= $prod['email'] ?> </p>
                    </div>
                </div>
            </div>
            <div class="section_cart">
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
                <h2 class="section_cart-title">Корзина <span><?= $cou ?> товара</span></h2>

                <div class="section_cart-inner">
                    <div class="section_cart-inner_block">
                        <!-- кнопка перейти к оформлению -->
                        <div class="section_cart-inner-order">
                            <div class="section_cart-inner-order-item-block">
                                <div class="section_cart-inner-order-item-block_item">
                                    <div class="section_cart-inner-order-item-block_item-price">
                                        <p>Количество:<span>&ensp;<?= $cou ?></span>&ensp;&ensp;&ensp;&ensp;&ensp;Итого:&ensp;<span><?= $pric ?> ₽</span></p>
                                    </div>
                                    <div class="section_cart-inner-order-item-block-modal">

                                        <div class="section_cart-inner-order-item-block-btn">
                                            <a href="order-form.php">Перейти к оформлению</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- заказы левый блок -->
                        <div class="wrapper-left-right-item">
                            <div class="left-section_cart-inner_block">

                                <?php
                                if ($cou == 0) {
                                    echo '<p class="empty-cart">Корзина пуста..</p>';
                                } else if ($cou != 0) {
                                    $categor;
                                }
                                foreach ($data_from_cat as $categor) : ?>
                                    <input type="hidden" name="id" value="<?= $categor['id_bk'] ?>">
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
                                                    <span>Цвет:&ensp;</span><label style="background-color:#<?= $categor['code'] ?>;"></label>
                                                </div>
                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                                                <!-- delete-tovar -->
                                                <div class="section_cart-inner_block-item-all section_cart-inner_block-item-delete">
                                                    <div class="section_cart-inner_block-item-delete-btn">
                                                        <!-- Button trigger modal -->

                                                        <a href="php/deletez.php?id=<?= $categor['id_bk'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $categor['id_bk'] ?>">
                                                            <p>Удалить из корзины&ensp;<ion-icon name="trash-outline"></ion-icon></p>
                                                        </a>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal<?= $categor['id_bk'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-body">
                                                                        <p>Товар будет удален из корзины, удалить?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" data-bs-dismiss="modal">Нет</button>

                                                                        <a href="php/deletez.php?id=<?= $categor['id_bk'] ?>">
                                                                            <button type="submit" name="upload_image">Да</button>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="qq<?= $categor['id_bk'] ?>">
                                                <div class="section_cart-inner_block-item-all section_cart-inner_block-item-count">
                                                    <div class="section_cart-inner_block-item-count-input">

                                                        <p class="quantity<?= $categor['id_bk'] ?>" id="num_count" title="Qty">Количество: <b><?= $categor['counts'] ?></b></p>

                                                    </div>
                                                </div>
                                                <div class="section_cart-inner_block-item-all section_cart-inner_block-item-price">
                                                    <?php $pr = $categor['price'] * $categor['counts'] ?>
                                                    <p class="count_price<?= $categor['id_bk'] ?>"><?= $pr ?>&ensp;₽</p>

                                                    <span>В наличии</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                <?php endforeach; ?>

                            </div>
                            <!-- уже совершенные заказы -->
                            <div class="right-section_cart-inner_block">
                                <h3 class="right-section_cart-inner_block-title">Мои заказы</h3>
                                <?php
                                $sizes = mysqli_query($connection, "SELECT *,`orders`.`price` as 'pr' FROM `orders`, `product` WHERE `orders`.`id_pt` = `product`.`id_pt` AND `orders`.`id_us`='$polz' ORDER BY `id_or` DESC");
                                $data_from_d = [];
                                while ($result = mysqli_fetch_assoc($sizes)) {
                                    $data_from_d[] = $result;
                                }
                                ?>

                                <?php foreach ($data_from_d as $size) : ?>
                                    <div class="section_cart-inner_block-item2">
                                        <!-- крестик для удаления заказа -->
                                        <?php
                                        if ($size['status'] == 'В обработке') : ?>
                                            <div class="section_cart-inner_block-item2-delete-icon">
                                                <a href="php/deleteotp.php?id=<?= $size['id_or'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $size['id_or'] ?>"><img src="images/private/delete.png" alt="icon"></a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal<?= $size['id_or'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <p>Заказ будет отменен, удалить?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" data-bs-dismiss="modal">Нет</button>

                                                                <a href="php/deleteotp.php?id=<?= $size['id_or'] ?>">
                                                                    <button type="submit" name="upload_image">Да</button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else : ?>

                                        <?php endif; ?>

                                        <div class="section_cart-inner_block-item-all section_cart-inner_block-item2-img-price">
                                            <img src="images/special/<?= $size['img'] ?>" alt="img">
                                            <p><?= $size['pr'] ?>&ensp;₽</p>
                                        </div>
                                        <div class="section_cart-inner_block-item2-all-text">
                                            <div class="section_cart-inner_block-item2-all section_cart-inner_block-item2-text">
                                                <p><?= $size['name'] ?></p>
                                            </div>
                                            <div class="section_cart-inner_block-item2-all section_cart-inner_block-item2-count-status">
                                                <p>Количество: <b><?= $size['counts'] ?></b></p>
                                                <p><b><?= $size['status'] ?></b></p>
                                            </div>
                                            <!-- data -->
                                            <div class="section_cart-inner_block-item2-all section_cart-inner_block-item2-data">
                                                <p><?= $size['date_z'] ?></p>
                                                <img src="images/private/order.png" alt="icon-delivery" title="Доставка">
                                                <p><?= $size['date_p'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <?php include('include/footer.php'); ?>

    <script type="text/javascript" src="js/menu.js"></script>
    <script src="https://kit.fontawesome.com/3037fe6c63.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>