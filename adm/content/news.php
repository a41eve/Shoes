<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/news.css">
    <title>Админ панель - Новости</title>
</head>

<body>
    <div class="wrapper">

        <!-- header -->
        <?php include 'include/panel.php';
        require_once 'php/sortNew.php'
        ?>

        <div class="wrapper-content">
            <div class="section_cart-inner">
                <div class="section_cart-inner_block">
                    <h3 class="section_cart-inner_block-three-title">Все новости</h3>

                    <div class="section_cart-inner_block-filter">
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

                    <div class="section_cart-inner_block-out">
                        <?php

                        require_once "../../php/bd.php";


                        # var_dump($data_from_db);
                        ?> <?php foreach ($list as $color) : ?>
                            <div class="section_cart-inner_block-item2">
                                <div class="section_cart-inner_block-item2-delete">
                                    <a href="php/deleteNew.php?id=<?= $color['id_ns'] ?>"><img src="images/delete.png" alt="icon-delete"></a>
                                </div>
                                <div class="section_cart-inner_block-item2-all">
                                    <!-- image-item-news -->
                                    <div class="section_cart-inner_block-item2-all-image">
                                        <img class="news__img" src="/images/news/<?= $color['img'] ?>" alt="image-news">

                                        <div class="section_cart-inner_block-item2-all-image-inner">
                                            <img src="/images/news/<?= $color['img'] ?>" alt="image-news">
                                            <img src="/images/news/<?= $color['img1'] ?>" alt="image-news">
                                        </div>
                                    </div>

                                    <div class="section_cart-inner_block-item2-all-text">
                                        <p class="section_cart-inner_block-item2-all-text-title" name="title"><b><?= $color['title'] ?></b></p>
                                        <p class="section_cart-inner_block-item2-all-text-desc" name="desc"><?= $color['descr'] ?></p>
                                        <p class="section_cart-inner_block-item2-all-text-data" name="data"><?= $color['date'] ?> | <span name="name"><?= $color['author'] ?></span></p>
                                        <!-- редактирование -->
                                        <div class="section_cart-inner_block-item2-all-text-update">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $color['id_ns'] ?>">Редактировать</a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="staticBackdrop<?= $color['id_ns'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Редактировать новость <?= $color['title'] ?></h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../../server_img/upload-one-file-admNnewup.php" method="POST" class="section_cart-inner_block-item2-all-text-update-form" enctype="multipart/form-data">
                                                                <!-- image -->
                                                                <div class="section_cart-inner_block-item2-all-text-update-form-input">
                                                                    <label for="file_img" class="form-label"> Сменить изображение</label>
                                                                    <input class="form-control" type="file" name="file_img" id="file_img">
                                                                </div>

                                                                <div class="section_cart-inner_block-item2-all-text-update-form-input">
                                                                    <input type="text" name="title" placeholder="Заголовок новости" value="<?= $color['title'] ?>">
                                                                </div>
                                                                <div class="section_cart-inner_block-item2-all-text-update-form-input">
                                                                    <input type="text" name="descr" placeholder="Подзаголовок новости" value="<?= $color['descr'] ?>">
                                                                </div>
                                                                <div class="section_cart-inner_block-item2-all-text-update-form-input">
                                                                    <input type="text" name="author" placeholder="Автор новости" value="<?= $color['author'] ?>">
                                                                </div>
                                                                <div class="section_cart-inner_block-item2-all-text-update-form-input">
                                                                    <textarea name="description1" placeholder="Текст новости"> <?= $color['description1'] ?></textarea>
                                                                </div>
                                                                <input type="hidden" name="id" placeholder="Автор новости" value="<?= $color['id_ns'] ?>">
                                                                <!-- image -->
                                                                <div class="section_cart-inner_block-item2-all-text-update-form-input">
                                                                    <label for="file_imgs" class="form-label">Сменить второе изображение</label>
                                                                    <input class="form-control" type="file" name="file_imgs" id="file_imgs">
                                                                </div>

                                                                <div class="section_cart-inner_block-item2-all-text-update-form-input-btn">
                                                                    <input type="submit" name="upload_images" value="Редактировать">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>


                    </div>
                </div>

                <!-- form add -->
                <div class="section_cart-inner_block-two">
                    <h3 class="section_cart-inner_block-two-upper-title">Добавление новости</h1>

                        <div class="section_cart-inner_block-two-forms">
                            <!-- insert -->
                            <form action="../../server_img/upload-one-file-admNnew.php" method="POST" class="section_cart-inner_block-two-forms-form" enctype="multipart/form-data">
                                <!-- image -->
                                <div class="section_cart-inner_block-two-forms-form-input">
                                    <label for="file_img" class="form-label">Добавить изображение</label>
                                    <input class="form-control" type="file" name="file_img" id="file_img">
                                </div>

                                <div class="section_cart-inner_block-two-forms-form-input">
                                    <input type="text" name="title" placeholder="Заголовок новости">
                                </div>
                                <div class="section_cart-inner_block-two-forms-form-input">
                                    <input type="text" name="descr" placeholder="Подзаголовок новости">
                                </div>
                                <div class="section_cart-inner_block-two-forms-form-input">
                                    <input type="text" name="author" placeholder="Автор новости">
                                </div>
                                <div class="section_cart-inner_block-two-forms-form-input">
                                    <textarea name="description1" placeholder="Текст новости"></textarea>
                                </div>

                                <!-- image -->
                                <div class="section_cart-inner_block-two-forms-form-input">
                                    <label for="file_imgs" class="form-label">Добавить второе изображение</label>
                                    <input class="form-control" type="file" name="file_imgs" id="file_imgs">
                                </div>

                                <div class="section_cart-inner_block-two-forms-form-input-btn">
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