<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/backsv.css">
    <title>SHOES - Обратная связь</title>
</head>

<body>
    <div class="wrapper">
        <!-- header -->
        <?php include('include/header.php');
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); ?>

        <section>
            <div class="container">
                <div class="content">
                    <!-- Левая колонка: адрес, телефоны, email. Можете добавить свое -->
                    <div class="left-side">
                        <?php
                        require_once "php/bd.php";
                        $colors = mysqli_query($connection, "SELECT * FROM info");
                        $data_from_d = [];
                        while ($result = mysqli_fetch_assoc($colors)) {
                            $data_from_d[] = $result;
                        }

                        # var_dump($data_from_db);
                        ?> <?php foreach ($data_from_d as $color) : ?>
                            <div class="address details">
                                <!-- Вместо классов: название шрифтовых иконок (fontawesome.com) -->
                                <i class="fas fa-map-marker-alt"></i>
                                <!-- topic - заголовок, text-one, text-two - текст -->
                                <div class="topic">Адрес</div>
                                <div class="text-two"><?= $color['addr'] ?></div>
                            </div>
                            <div class="phone details">
                                <i class="fas fa-phone-alt"></i>
                                <div class="topic">Телефон</div>
                                <div class="text-one"><?= $color['tel'] ?></div>
                                <div class="text-two"><?= $color['tel2'] ?></div>
                            </div>
                            <div class="email details">
                                <i class="fas fa-envelope"></i>
                                <div class="topic">Email</div>
                                <div class="text-one"><?= $color['email'] ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <!-- Правая колонка: сама форма -->
                    <div class="right-side">
                        <!-- Заголовок для формы -->
                        <div class="topic-text">Отправьте нам сообщение</div>
                        <!-- Какой-то дополнительный текст -->
                        <p>
                            Если у вас есть какие-то вопросы или предложения по сотрудничеству -
                            заполните форму ниже
                        </p>
                        <!-- Форма обратной связи -->
                        <form action="php/send_backsv.php" method="POST" id="form" name="form">
                            <!-- Каждый input для выравнивания вкладываем в блок input-box -->
                            <div class="input-box">
                                <input type="text" placeholder="Ваше имя" id="name" name="name" data-reg="^[А-ЯЁ][а-яё]*$" />
                                <label for="name">Только латиница</label>
                            </div>
                            <div class="input-box">
                                <input type="text" placeholder="Введите email" id="email" name="email" data-reg="^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$" />
                                <label for="name">В формате: example@gmail.com</label>
                            </div>
                            <div class="input-box">
                                <input type="text" placeholder="Введите телефон" id="phone" name="phone" data-reg="^((\+7|7|8)+([0-9]){10})$" />
                                <label for="name">В формате: +79000000000, 79000000000, 89000000000</label>
                            </div>
                            <div class="input-box message-box">
                                <textarea placeholder="Сообщение" required name="message"></textarea>
                            </div>
                            <div class="button">
                                <input type="submit" value="Отправить" id="button" name="button" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- footer -->
        <?php include('include/footer.php'); ?>
    </div>

    <script type="text/javascript" src="js/backsv.js"></script>
    <script src="https://kit.fontawesome.com/fce9a50d02.js" crossorigin="anonymous"></script>
</body>

</html>