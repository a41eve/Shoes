<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/user.css">
    <title>Админ панель - Пользователи</title>
</head>

<body>
    <div class="wrapper">

        <!-- header -->
        <?php include 'include/panel.php'; ?>

        <div class="wrapper-content">
            <div class="section_user-inner">
                <div class="section_user-inner_block">
                    <h3 class="section_user-inner_block-title">Все пользователи</h3>
                    <?php
                    require_once "../../php/bd.php";

                    $colors = mysqli_query($connection, "SELECT * FROM users");
                    $data_from_d = [];
                    while ($result = mysqli_fetch_assoc($colors)) {
                        $data_from_d[] = $result;
                    }
                    ?> <?php foreach ($data_from_d as $color) : ?>
                        <div class="section_user-inner_block-item">
                            <div class="section_user-inner_block-item-action-edit">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $color['id_users'] ?>"><img src="/images/private/update.png" alt="icon" title="Редактировать"></a>

                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop<?= $color['id_users'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header"><?php $product_id = $color['id_users'];
                                                                        $product = mysqli_query($connection, "SELECT * FROM `users` WHERE `id_users` = '$product_id'");

                                                                        $product = mysqli_fetch_assoc($product)


                                                                        ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form action="../../server_img/upload-one-file-adm.php" method="POST" class="form-inline md-form" enctype="multipart/form-data">
                                                    <div class="modal-body-input">
                                                        <label for="file_img" class="form-label">Сменить фотографию</label>
                                                        <input class="form-control" type="file" name="file_img" id="file_img">
                                                    </div>
                                                    <div class="modal-body-input">
                                                        <input type="hidden" name="id" placeholder="Введите Имя" value="<?= $product['id_users'] ?> ">
                                                    </div>
                                                    <div class="modal-body-input">
                                                        <input type="text" name="surname" placeholder="Введите Фамилию" value="<?= $product['surname'] ?>">
                                                    </div>
                                                    <div class="modal-body-input">
                                                        <input type="text" name="name" placeholder="Введите Имя" value="<?= $product['name'] ?> ">
                                                    </div>
                                                    <div class="modal-body-input">
                                                        <input type="text" name="patronymic" placeholder="Введите Отчество" value="<?= $product['patronymic'] ?>">
                                                    </div>
                                                    <div class="modal-body-input">
                                                        <input type="text" name="login" placeholder="Введите логин" value="<?= $product['login'] ?>">
                                                    </div>
                                                    <div class="modal-body-input">
                                                        <input type="text" name="phone" placeholder="Введите номер телефона" value="<?= $product['phone'] ?>">
                                                    </div>
                                                    <div class="modal-body-input">
                                                        <input type="text" name="email" placeholder="Введите электронную почту" value="<?= $product['email'] ?>">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" name="nn" value="Отмена" data-bs-dismiss="modal">
                                                <input type="submit" name="upload_image" placeholder="jnnn" value="Редактировать">
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Картинка товара -->
                            <div class="section_user-inner_block-item-all section_user-inner_block-item-img">
                                <img src="../../../server_img/images/<?= $color['img_us'] ?>" alt="img">
                            </div>
                            <div class="section_user-inner_block-item-text">
                                <div class="section_user-inner_block-item-text-all">
                                    <p class="section_user-inner_block-item-text-all-text"><b><?= $color['id_users'] ?></b></p>
                                    <p class="section_user-inner_block-item-text-all-text"><b><?= $color['login'] ?></b></p>
                                    <p class="section_user-inner_block-item-text-all-text"><?= $color['surname'] ?> <?= $color['name'] ?> <?= $color['patronymic'] ?></p>
                                    <p class="section_user-inner_block-item-text-all-text"><?= $color['phone'] ?></p>
                                    <p class="section_user-inner_block-item-text-all-text"><?= $color['email'] ?></p>
                                    <p class="section_user-inner_block-item-text-all-text"><?= $color['password'] ?></p>
                                </div>
                            </div>
                            <div class="section_user-inner_block-item-action-delete">
                                <a href="php/deleat.php?id=<?= $color['id_users'] ?>"><img src="images/delete.png" alt="icon" title="Удалить"></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>