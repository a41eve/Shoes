<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tovar.css">
    <title>Админ панель - Товары</title>
</head>

<body>
    <div class="wrapper">

        <!-- header -->
        <?php include 'include/panel.php';
        require_once 'php/sortTov.php';
        ?>

        <div class="wrapper-content">
            <div class="section_tovar-inner">
                <div class="section_tovar-inner_block">
                    <h3 class="section_tovar-inner_block-three-title">Все товары</h3>

                    <div class="section_tovar-inner_block-filter">
                        <p>Сортировка:&ensp;</p>
                        <form action="" method="get">
                            <select name="sort" id="js-sort">
                                <option value="all" <?php if (@$_GET['sort'] == 'all') echo 'selected'; ?>>Все</option>
                                <option value="man" <?php if (@$_GET['sort'] == 'man') echo 'selected'; ?>>Мужчины</option>
                                <option value="girl" <?php if (@$_GET['sort'] == 'girl') echo 'selected'; ?>>Женщины</option>
                                <option value="kid" <?php if (@$_GET['sort'] == 'kid') echo 'selected'; ?>>Дети</option>
                                <option value="sport" <?php if (@$_GET['sort'] == 'sport') echo 'selected'; ?>>Спорт</option>
                                <option value="sneak" <?php if (@$_GET['sort'] == 'sneak') echo 'selected'; ?>>Кроссовки</option>
                                <option value="boot" <?php if (@$_GET['sort'] == 'boot') echo 'selected'; ?>>Ботинки</option>
                                <option value="sn" <?php if (@$_GET['sort'] == 'sn') echo 'selected'; ?>>Кеды</option>

                            </select>
                        </form>
                        <script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script>

                        <script>
                            $('#js-sort').change(function() {
                                $(this).closest('form').submit();
                            });
                        </script>
                    </div>

                    <?php
                    require_once "../../php/bd.php";


                    ?>
                    <?php foreach ($list as $product) : ?>
                        <div class="tovar_<?= $product['nn'] ?>_<?= $product['nn_cy'] ?> section_tovar-inner_block-item2">
                            <div class="section_tovar-inner_block-item2-delete">
                                <a href="php/deleteTov.php?id=<?= $product['id_pt'] ?>&ss=<?= $product['id_se'] ?>"><img src="images/delete.png" alt="icon-delete"></a>
                            </div>
                            <!-- Картинка товара -->
                            <div class="section_tovar-inner_block-item2-all section_tovar-inner_block-item2-tovar__image">
                                <img src="../../images/special/<?= $product['img'] ?>" alt="img">
                            </div>

                            <div class="section_tovar-inner_block-item2-text">
                                <div class="section_tovar-inner_block-item2-text-block">
                                    <p><?= $product['name'] ?></p>
                                    <p>Артикул:&nbsp;<b><?= $product['id_pt'] ?></b></p>

                                    <div class="section_tovar-inner_block-item2-text-block-characteristic">
                                        <p>В наличии:&nbsp;<b><?= $product['count'] ?></b></p>

                                        <div class="section_tovar-inner_block-item2-text-block-characteristic-color">
                                            <!--ЦВЕТ пропиши ему css-->
                                            <input type="checkbox" class="katalog-filter__color-color-checkbox checkbox--<?= $product['name_cr'] ?>" id="<?= $product['id_cr'] ?>" name="<?= $product['name_cr'] ?>" value="<?= $product['id_cr']; ?>" style="background-color:#<?= $color['code'] ?> " />
                                            <label for="<?= $product['id_cr'] ?>" style="background-color:#<?= $product['code'] ?> "></label>
                                        </div>

                                        <div class="section_tovar-inner_block-item2-text-block-characteristic-size">
                                            <!--Размер. пропиши ему css-->
                                            <input type="checkbox" class="katalog-filter__size-size-checkbox checkbox--size" id="size<?= $product['s_size'] ?>" name="size<?= $product['s_size'] ?>">
                                            <label for="size<?= $product['s_size'] ?>">Размер:&nbsp;<b><?= $product['s_size'] ?></b></label>
                                        </div>
                                    </div>

                                    <div class="section_tovar-inner_block-item2-text-block-price-update">
                                        <div class="section_tovar-inner_block-item2-text-block-price-update-text">
                                            <p class="price"><?= $product['price'] ?>&nbsp;₽</p>
                                            <p class="country"><?= $product['countries'] ?></p>
                                            <p class="category"><?= $product['name_gr'] ?></p>

                                            <div class="update">
                                                <a href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $product['id_pt'] ?>">Редактировать</a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="staticBackdrop<?= $product['id_pt'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">

                                                        <div class="modal-content">
                                                            <div class="modal-header">

                                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Редактировать товар <?= $product['id_pt'] ?></h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="../../server_img/upload-one-file-admT.php" method="POST" class="form-inline md-form" enctype="multipart/form-data">

                                                                    <div class="modal-body-input">
                                                                        <!--Сменить фото -->
                                                                        <label for="file_img" class="form-label">Сменить фотографию</label>
                                                                        <input class="form-control" type="file" name="file_img" id="file_img">
                                                                    </div>

                                                                    <div class="modal-body-input">
                                                                        <input type="hidden" name="id" placeholder="Название" value="<?= $product['id_pt'] ?>">
                                                                    </div>

                                                                    <div class="modal-body-input">
                                                                        <input type="text" name="name" placeholder="Название" value="<?= $product['name'] ?>">
                                                                    </div>

                                                                    <div class="modal-body-input">
                                                                        <input type="text" name="price" placeholder="Цена" value="<?= $product['price'] ?>">
                                                                    </div>

                                                                    <div class="modal-body-input">
                                                                        <p class="price">Категория: <?= $product['name_gr'] ?> </p>

                                                                        <select name="gen">
                                                                            <option value="0" selected>Выберите чтобы изменить категорию</option>
                                                                            <?php $gen = mysqli_query($connection, "SELECT * FROM `gender`");
                                                                            $data_from = [];
                                                                            while ($resul = mysqli_fetch_assoc($gen)) {
                                                                                $data_from[] = $resul;
                                                                            }
                                                                            foreach ($data_from as $gender) : ?>
                                                                                <option value="<?= $gender['id_gr'] ?>"><?= $gender['name_gr'] ?></option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="modal-body-input">
                                                                        <input type="text" name="countries" placeholder="Страна производитель" value="<?= $product['countries'] ?>">
                                                                    </div>

                                                                    <div class="modal-body-input">
                                                                        <input type="text" name="count" placeholder="Количество в наличии" value="<?= $product['count'] ?>">
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="submit" name="nn" value="Отмена" data-bs-dismiss="modal">
                                                                <input type="submit" name="upload_image" placeholder="jnnn" value="Редактировать">
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="section_tovar-inner_block-item2-text-block-price-update-delete">
                                            <a href="php/deleteTovAll.php?id=<?= $product['id_pt'] ?>">Удалить товар полностью</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>


                <!-- form add -->
                <div class="section_tovar-inner_block-two">
                    <h3 class="section_tovar-inner_block-two-upper-title">Добавление товара</h1>

                        <div class="section_tovar-inner_block-two-forms">
                            <!-- insert -->
                            <form action="../../server_img/upload-one-file-admTnew.php" method="POST" class="section_tovar-inner_block-two-forms-form" enctype="multipart/form-data">
                                <div class="section_tovar-inner_block-two-forms-form-input">
                                    <label for="file_img" class="form-label">Добавить фотографию</label>
                                    <input class="form-control" type="file" name="file_img" id="file_img">
                                </div>
                                <div class="section_tovar-inner_block-two-forms-form-input">
                                    <input type="text" name="name" placeholder="Название товара">
                                </div>
                                <div class="section_tovar-inner_block-two-forms-form-input">
                                    <input type="text" name="price" placeholder="Цена товара">
                                </div>

                                <div class="section_tovar-inner_block-two-forms-form-input">
                                    <select name="gen" required>
                                        <option value="0">Выберите категорию товара</option>
                                        <?php $gen = mysqli_query($connection, "SELECT * FROM `gender`");
                                        $data_from = [];
                                        while ($resul = mysqli_fetch_assoc($gen)) {
                                            $data_from[] = $resul;
                                        }
                                        foreach ($data_from as $gender) : ?>
                                            <option value="<?= $gender['id_gr'] ?>"><?= $gender['name_gr'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="section_tovar-inner_block-two-forms-form-input">
                                    <select name="cat" required>
                                        <option value="0">Выберите тип обуви</option>
                                        <?php $cat = mysqli_query($connection, "SELECT * FROM `category`");
                                        $data_from_cat = [];
                                        while ($resul_cat = mysqli_fetch_assoc($cat)) {
                                            $data_from_cat[] = $resul_cat;
                                        }
                                        foreach ($data_from_cat as $categ) : ?>
                                            <option value="<?= $categ['id_cy'] ?>"><?= $categ['cr_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="section_tovar-inner_block-two-forms-form-input">
                                    <select name="color" required>
                                        <option disabled selected>Выберите цвет</option>
                                        <?php $cvets = mysqli_query($connection, "SELECT * FROM `color`");
                                        $data_from_cr = [];
                                        while ($resulcr = mysqli_fetch_assoc($cvets)) {
                                            $data_from_cr[] = $resulcr;
                                        }
                                        foreach ($data_from_cr as $cvet) : ?>
                                            <option value="<?= $cvet['id_cr'] ?>" style="background-color: #<?= $cvet['code'] ?>;"></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="section_tovar-inner_block-two-forms-form-input">
                                    <input type="text" name="countries" placeholder="Страна производитель">
                                </div>

                                <div class="section_tovar-inner_block-two-forms-form-input-btn">
                                    <input type="submit" name="upload_images" value="Добавить">
                                </div>
                            </form>
                        </div>

                        <!--Добавление размеров-->
                        <h3 class="section_tovar-inner_block-two-title">Добавление размера к товару</h3>

                        <div class="section_tovar-inner_block-two-forms">
                            <form action="php/size.php" method="POST">

                                <div class="section_tovar-inner_block-two-forms-form-input">
                                    <select name="products">
                                        <option disabled selected>Выберите товар</option>
                                        <?php $ssp = mysqli_query($connection, "SELECT * FROM `product`");
                                        $data_from_sp = [];
                                        while ($resulsp = mysqli_fetch_assoc($ssp)) {
                                            $data_from_sp[] = $resulsp;
                                        }
                                        foreach ($data_from_sp as $sp) : ?>
                                            <option value="<?= $sp['id_pt'] ?>"><?= $sp['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="section_tovar-inner_block-two-forms-form-input">
                                    <select name="size">
                                        <option disabled selected>Выберите размер</option>
                                        <?php $ss = mysqli_query($connection, "SELECT * FROM `size`");
                                        $data_from_s = [];
                                        while ($resuls = mysqli_fetch_assoc($ss)) {
                                            $data_from_s[] = $resuls;
                                        }
                                        foreach ($data_from_s as $s) : ?>
                                            <option value="<?= $s['id_se'] ?>"><?= $s['s_size'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="section_tovar-inner_block-two-forms-form-input">
                                    <input type="text" name="count" placeholder="Количество в наличии">
                                </div>

                                <div class="section_tovar-inner_block-two-forms-form-input-btn">
                                    <input type="submit" name="upload_images" value="Добавить">
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>