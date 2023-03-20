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
    <link rel="stylesheet" href="styles/info.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Магазин спортивной обуви - Joys</title>
</head>

<body>
    <?php include('include/header.php'); ?>

    <!--Content-->
    <section class="info">
        <div class="block-information">
            <div class="block-information-content">
                <?php
                require_once "php/bd.php";
                $colors = mysqli_query($connection, "SELECT * FROM info");
                $data_from_d = [];
                while ($result = mysqli_fetch_assoc($colors)) {
                    $data_from_d[] = $result;
                }

                # var_dump($data_from_db);
                ?> <?php foreach ($data_from_d as $color) : ?>
                    <img src="images/logo-light.png" alt="">
                    <h2 class="block-information-inner-title"><b><?= nl2br($color['slog']) ?></b></h2>

                    <p class="block-information-text"><?= nl2br($color['desk']) ?></p>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="container">
            <div class="block">
                <div class="block-items">
                    <div class="block-items-contacts">
                        <?php
                        require_once "php/bd.php";
                        $colors = mysqli_query($connection, "SELECT * FROM info");
                        $data_from_d = [];
                        while ($result = mysqli_fetch_assoc($colors)) {
                            $data_from_d[] = $result;
                        }

                        # var_dump($data_from_db);
                        ?> <?php foreach ($data_from_d as $color) : ?>
                            <p class="block-items-contacts-text"><b>Наш адрес:&nbsp;&nbsp;</b> <a href="https://www.google.com/maps/place/%D1%83%D0%BB.+8+%D0%9C%D0%B0%D1%80%D1%8
                    2%D0%B0,+46,+%D0%95%D0%BA%D0%B0%D1%82%D0%B5%D1%80%D0%B8%D0%BD%D0%B1%D1%83%D1%80%D0%B3,+%D0%A1%D0%B2%D0%B5%D1%80%D0%B4%D0%B
                    B%D0%BE%D0%B2%D1%81%D0%BA%D0%B0%D1%8F+%D0%BE%D0%B1%D0%BB.,+620014/@56.8289898,60.5966482,17z/data=!3m1!4b1!4m5
                    !3m4!1s0x43c16ef257304547:0x7484825b07cede7f!8m2!3d56.8289869!4d60.5988368?hl=ru" target="_blank"><?= $color['addr'] ?></a></p>
                            <p class="block-items-contacts-text"><b>Наш номер телефона:</b>&nbsp;&nbsp;<a href="tel:<?= $color['tel'] ?>"><?= $color['tel'] ?></a>&nbsp;&nbsp;&nbsp;<a href="<?= $color['tel2'] ?>"><?= $color['tel2'] ?></a></p>
                            <p class="block-items-contacts-text"><b>Наша электронная почта:&nbsp;&nbsp;</b> <a href="https://mail.google.com/mail/u/0/#inbox" target="_blank"><?= $color['email'] ?></a></p>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="block-map">
                    <p class="block-map-text">Местоположение магазина</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2182.988308755759!2d60.596648216119
                    49!3d56.8289898159431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43c16ef257304547%3A0x7484825b07
                    cede7f!2z0YPQuy4gOCDQnNCw0YDRgtCwLCA0Niwg0JXQutCw0YLQtdGA0LjQvdCx0YPRgNCzLCDQodCy0LXRgNC00LvQvtCy0YHQutCw0Y
                    8g0L7QsdC7LiwgNjIwMDE0!5e0!3m2!1sru!2sru!4v1675920587804!5m2!1sru!2sru" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <?php include('include/footer.php'); ?>

    <script type="text/javascript" src="js/menu.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/3037fe6c63.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>