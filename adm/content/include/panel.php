<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="css/panel.css">
</head>

<body>
    <div class="header-content">
        <div class="header-content-logo">
            <img src="images/logo-light.png" alt="logo">
            <?php if (empty($_COOKIE['user'])) : ?>
            <?php else : ?>
                <p><?= $_COOKIE['user'] ?></p>
            <?php endif; ?>
        </div>

        <div class="header-content-nav">
            <p class="header-content-nav-title">НАВИГАЦИЯ</p>

            <ul class="header-content-nav__list">
                <a href="main.php">
                    <li class="header-content-nav__link"><ion-icon name="home"></ion-icon>Общая статистика</li>
                </a>
                <a href="user.php">
                    <li class="header-content-nav__link"><ion-icon name="person"></ion-icon>Пользователи</li>
                </a>
                <a href="tovar.php">
                    <li class="header-content-nav__link"><ion-icon name="layers"></ion-icon>Товары</li>
                </a>
                <a href="news.php">
                    <li class="header-content-nav__link"><ion-icon name="newspaper"></ion-icon>Новости</li>
                </a>
                <a href="order.php">
                    <li class="header-content-nav__link"><ion-icon name="reorder-three"></ion-icon>Заказы</li>
                </a>
                <a href="info.php">
                    <li class="header-content-nav__link"><ion-icon name="information-circle"></ion-icon>О компании</li>
                </a>
            </ul>
        </div>

        <div class="header-content-out">
            <a href="../../php/logout.php">
                <div class="header-content-out-leave">
                    <p class="header-content-leave-text">Выйти</p>
                </div>
            </a>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>

</html>