<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/info.css">
    <title>Админ панель - О компании</title>
</head>

<body>
    <div class="wrapper">
        <!-- header -->
        <?php include 'include/panel.php';
        require_once 'php/sortNew.php'
        ?>

        <div class="wrapper-content">
            <div class="section__info-inner">
                <div class="section__info-inner_block">
                    <h3 class="section__info-inner_block-title">О компании</h3>

                    <?php
                    require_once "../../php/bd.php";

                    $info = mysqli_query($connection, "SELECT * FROM `info`");
                    $info = mysqli_fetch_assoc($info);
                    ?>
                    <div class="section__info-inner_block-card">
                        <h2 class="slog"><?= $info['slog'] ?></h2>
                        <p class="desk"><?= nl2br($info['desk']) ?></p>
                        <div class="section__info-inner_block-card-contacts">
                            <p class="addr"><b>Наш адрес:&ensp;</b><?= $info['addr'] ?></p>
                            <p class="tel"><b>Наш номер телефона:&ensp;</b><?= $info['tel'] ?></p>
                            <p class="email"><b>Наша электронная почта:&ensp;</b><?= $info['email'] ?></p>
                        </div>
                    </div>

                    <div class="section__info-inner_block-form">
                        <img src="../../images/<?= $info['img'] ?>" class="header__img" alt="logo">
                        <h3 class="section__info-inner_block-form-title">Редактирование информации о компании</h3>

                        <form action="../../server_img/upload-one-file-admInfUP.php" method="POST" enctype="multipart/form-data">
                            <div class="section__info-inner_block-form-input">
                                <label for="file_img" class="form-label">Сменить логотип</label>
                                <input class="form-control" type="file" name="file_img" id="file_img">
                            </div>

                            <div class="section__info-inner_block-form-input">
                                <input type="text" name="slog" value="<?= $info['slog'] ?>">
                            </div>

                            <div class="section__info-inner_block-form-input">
                                <textarea name="desk"><?= $info['desk'] ?></textarea>
                            </div>

                            <div class="section__info-inner_block-form-input">
                                <input name="addr" type="text" value="<?= $info['addr'] ?>">
                            </div>

                            <div class="section__info-inner_block-form-input">
                                <input name="tel" type="text" value="<?= $info['tel'] ?>">
                            </div>

                            <div class="section__info-inner_block-form-input">
                                <input name="email" type="text" value="<?= $info['email'] ?>">
                            </div>

                            <div class="section__info-inner_block-form-btn">
                                <input type="submit" name="upload_image" value="Редактировать">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>