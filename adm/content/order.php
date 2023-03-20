<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/order.css">
    <title>Админ панель - Заказы</title>
</head>

<body>
    <div class="wrapper">

        <!-- header -->
        <?php include 'include/panel.php'; ?>

        <div class="wrapper-content">
            <div class="section_orderinner">
                <div class="section_order-inner_block">
                    <h3 class="section_order-inner_block-title">Все заказы</h3>
                    <?php
                    require_once "../../php/bd.php";


                    $sizes = mysqli_query($connection, "SELECT *,`orders`.`price` as 'pr',`product`.`name` as 'na', `orders`.`email` as 'em' FROM `orders`, `product`, `users`, `color`, `gender`  WHERE `orders`.`id_pt` = `product`.`id_pt` AND `orders`.`id_us`=`users`.`id_users` AND `product`.`gender`=`gender`.`id_gr` AND `product`.`color`=`color`.`id_cr` ORDER BY `id_or` DESC");
                    $data_from_d = [];
                    while ($result = mysqli_fetch_assoc($sizes)) {
                        $data_from_d[] = $result;
                    }
                    ?>

                    <?php foreach ($data_from_d as $size) : ?>
                        <div class="section_order-inner_block-item">
                            <div class="section_order-inner_block-item-action-edit">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $size['id_or'] ?>"><img src="/images/private/update.png" alt="icon" title="Редактировать"></a>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop<?= $size['id_or'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Редактировать профиль</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form action="php/zakazup.php?id=<?= $size['id_or'] ?>" method="POST" class="form-inline md-form">

                                                    <div class="modal-body-input">
                                                        <input type="text" name="fio" placeholder="ФИО" value="<?= $size['fio'] ?>">
                                                    </div>

                                                    <div class="modal-body-input">
                                                        <input type="text" name="tel" placeholder="Номер телефона" value="<?= $size['tel'] ?> ">
                                                    </div>

                                                    <div class="modal-body-input">
                                                        <input type="text" name="email" placeholder="Эл. почта" value="<?= $size['em'] ?>">
                                                    </div>

                                                    <div class="modal-body-input">
                                                        <input type="text" name="price" placeholder="Цена" value="<?= $size['pr'] ?>">
                                                    </div>

                                                    <div class="modal-body-input">
                                                        <input type="text" name="city" placeholder="Город" value="<?= $size['city'] ?>">
                                                    </div>

                                                    <div class="modal-body-input">
                                                        <input type="date" name="dp" placeholder="Приблизительная дата доставки" value="<?= $size['date_p'] ?>">
                                                    </div>

                                                    <div class="modal-body-input">
                                                        <select name="stat">
                                                            <option value="0">Выберите чтобы изменить статус</option>
                                                            <option value="В обработке">В обработке</option>
                                                            <option value="В пути">В пути</option>
                                                            <option value="Доставлен">Доставлен</option>
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" name="nn" value="Отмена" data-bs-dismiss="modal">
                                                <input type="submit" name="upload_image" placeholder="jnnn" value="Редактировать">
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="section_order-inner_block-item-order">

                                <div class="section_order-inner_block-item-order-user">
                                    <!-- аватар -->
                                    <div class="section_order-inner_block-item-order-user-img">
                                        <img src="../../../server_img/images/<?= $size['img_us'] ?>" alt="img">
                                    </div>
                                    <div class="section_order-inner_block-item-order-user-text">
                                        <div class="section_order-inner_block-item-order-user-text-top">
                                            <p class="section_order-inner_block-item-order-user-text-top-text"><b><?= $size['id_us'] ?></b></p>
                                            <p class="section_order-inner_block-item-order-user-text-top-text"><b><?= $size['login'] ?></b></p>
                                            <p class="section_order-inner_block-item-order-user-text-top-text"><?= $size['fio'] ?></p>
                                        </div>

                                        <div class="section_order-inner_block-item-order-user-text-bottom">
                                            <p class="section_order-inner_block-item-order-user-text-bottom-text"><?= $size['tel'] ?></p>
                                            <p class="section_order-inner_block-item-order-user-text-bottom-text"><?= $size['email'] ?></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- block-tovar-to-modal -->
                                <div class="section_order-inner_block-item-order-tovar">
                                    <div class="section_order-inner_block-item-order-tovar-top">
                                        <!-- ссылка на карточку товара -> модальное окно -->
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdropCard<?= $size['id_or'] ?>" class="section_order-inner_block-item-order-tovar-top-text"><?= $size['na'] ?></a>

                                        <!-- модальное окно с карточкой товара -->
                                        <div class="modal fade" id="staticBackdropCard<?= $size['id_or'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel"><?= $size['na'] ?></h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card-tovar">
                                                            <div class="card-tovar-item">
                                                                <div class="card-tovar-item-image">
                                                                    <img src="/images/special/<?= $size['img'] ?>" alt="image-tovar">
                                                                </div>

                                                                <div class="card-tovar-item-details">
                                                                    <p class="title"><?= $size['na'] ?></p>
                                                                    <span class="article">Артикул:&nbsp;<?= $size['id_pt'] ?></span>
                                                                    <p class="price"><?= $size['price'] ?>&nbsp;₽</p>

                                                                    <p class="size">Размер:&nbsp;<b><?= $size['id_se'] ?></b></p>

                                                                    <p class="two-title"><b>Характеристика</b></p>
                                                                    <p class="category">Категория:&nbsp;<b><?= $size['name_gr'] ?></b></p>
                                                                    <p class="color">Цвет:&nbsp;<span style="background-color: #<?= $size['code'] ?>;"></span></p>
                                                                    <p class="country">Страна:&nbsp;<b><?= $size['countries'] ?></b></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="button" data-bs-dismiss="modal" value="Понятно">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="section_order-inner_block-item-order-tovar-bottom">
                                        <p class="section_order-inner_block-item-order-tovar-bottom-text"><b><?= $size['pr'] ?>&nbsp;₽</b></p>
                                        <p class="count">Количество:&nbsp;<b><?= $size['counts'] ?></b></p>
                                    </div>
                                </div>

                                <!-- block-detail- -->
                                <div class="section_order-inner_block-item-order-detail">
                                    <div class="section_order-inner_block-item-order-detail-top">
                                        <p class="section_order-inner_block-item-order-detail-top-text"><?= $size['city'] ?></p>
                                        <p class="section_order-inner_block-item-order-detail-top-text"><?= $size['address'] ?></p>
                                        <p class="section_order-inner_block-item-order-detail-bottom-text"><b><?= $size['oplata'] ?></b></p>
                                    </div>

                                    <div class="section_order-inner_block-item-order-detail-status">
                                        <p class="section_order-inner_block-item-order-detail-bottom-text"><?= $size['status'] ?></p>
                                    </div>
                                </div>

                                <div class="section_order-inner_block-item-action-delete">
                                    <a href="php/deleteotp.php?id=<?= $size['id_or'] ?>"><img src="images/delete.png" alt="icon" title="Удалить"></a>
                                </div>
                            </div>

                            <div class="section_order-inner_block-item-block-date">
                                <div class="section_order-inner_block-item-block-date-line">
                                    <p><b><?= $size['date_z'] ?></b><img src="/images/private/delivery.png" alt="icon"><b><?= $size['date_p'] ?></b></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>