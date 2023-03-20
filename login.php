<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">

    <link rel="stylesheet" href="styles/login.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Магазин спортивной обуви SHOES - Вход/Регистрация</title>
</head>

<body>
    <?php include('include/header.php'); ?>

    <div class="container">
        <div class="register">
            <!--Успешная решистрация-->
            <?php if (isset($_GET['formsubmit'])) echo "<p>Вы успешно зарегестрировались, теперь войдите в аккаунт!</p>"; ?>
        </div>
    </div>

    <!--block autorization & registration-->
    <section>
        <div class="container">
            <div class="block-autorization">

                <!--autorization-->
                <form action="php/log.php" method="POST" class="block-autorization__form" id="form_log" name="form_log" data-aos="fade-right" data-aos-delay="300">
                    <h1 class="block-autorization__form__title" data-aos="fade-up" data-aos-delay="550">Авторизация</h1>

                    <div class="block-autorization__form__input-container" data-aos="fade-right" data-aos-delay="300">
                        <span class="block-autorization__form__span"><ion-icon name="person-outline"></ion-icon></span>
                        <input type="text" class="block-autorization__form__input" name="login" id="login" data-reg="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required>
                        <label>Логин</label>
                    </div>

                    <div class="block-autorization__form__input-container" data-aos="fade-right" data-aos-delay="300">
                        <span class="block-autorization__form__span"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <input type="password" class="block-autorization__form__input" name="password" id="password" required>
                        <label>Пароль</label>
                    </div>


                    <button type="submit" class="block-autorization__form__btn" data-aos="fade-right" data-aos-delay="300">Авторизоваться</button>
                </form>

                <!--center-line-->
                <div class="center-line" data-aos="fade-up" data-aos-delay="550"></div>

                <!--registration-->
                <form action="php/reg.php" method="POST" class="block-autorization__form" id="form_reg" name="form_reg" data-aos="fade-left" data-aos-delay="300">
                    <h1 class="block-autorization__form__title" data-aos="fade-up" data-aos-delay="550">Регистрация</h1>
                    <input type="hidden" class="block-autorization__form__input" name="img" value="avatar.png">

                    <div class="block-autorization__form__input-container" data-aos="fade-left" data-aos-delay="300">
                        <span class="block-autorization__form__span"><ion-icon name="person-outline"></ion-icon></span>
                        <input type="text" class="block-autorization__form__input" name="login" id="login" title="Разрешена только латиница" data-reg="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" required>
                        <label>Логин</label>
                    </div>

                    <div class="block-autorization__form__input-container" data-aos="fade-left" data-aos-delay="300">
                        <span class="block-autorization__form__span"><ion-icon name="person-outline"></ion-icon></span>
                        <input type="text" class="block-autorization__form__input" name="surname" id="surname" title="Разрешена только кириллица" data-reg="^[А-ЯЁ][а-яё]*$" required>
                        <label>Фамилия</label>
                    </div>

                    <div class="block-autorization__form__input-container" data-aos="fade-left" data-aos-delay="300">
                        <span class="block-autorization__form__span"><ion-icon name="person-outline"></ion-icon></span>
                        <input type="text" class="block-autorization__form__input" name="name" id="name" title="Разрешена только кириллица" data-reg="^[А-ЯЁ][а-яё]*$" required>
                        <label>Имя</label>
                    </div>

                    <div class="block-autorization__form__input-container" data-aos="fade-left" data-aos-delay="300">
                        <span class="block-autorization__form__span"><ion-icon name="person-outline"></ion-icon></span>
                        <input type="text" class="block-autorization__form__input" name="patronymic" id="patronymic" title="Разрешена только кириллица" data-reg="^[А-ЯЁ][а-яё]*$" required>
                        <label>Отчество</label>
                    </div>

                    <div class="block-autorization__form__input-container" data-aos="fade-left" data-aos-delay="300">
                        <span class="block-autorization__form__span"><ion-icon name="mail-outline"></ion-icon></span>
                        <input type="text" class="block-autorization__form__input" name="email" id="email" data-reg="^[-\w.]+@([A-z0-9][-A-z0-9]+\.)+[A-z]{2,4}$" required>
                        <span class="error" aria-live="polite"></span>
                        <label>E-mail</label>
                    </div>

                    <div class="block-autorization__form__input-container" data-aos="fade-left" data-aos-delay="300">
                        <span class="block-autorization__form__span"><ion-icon name="phone-portrait-outline"></ion-icon></span>
                        <input type="text" class="block-autorization__form__input" name="phone" id="phone" data-reg="^((\+7|7|8)+([0-9]){10})$" required>
                        <label>Номер телефона</label>
                    </div>

                    <!-- скрипт на повтор пароля -->
                    <script type="text/javascript" src="js/jscripass.js"></script>
                    <div class="block-autorization__form__input-container" data-aos="fade-left" data-aos-delay="300">
                        <span class="block-autorization__form__span"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <input type="password" class="block-autorization__form__input" name="pass1" id="pass1" onKeyUp="passValid('form_reg','pass1','pass12','submit'),isRavno('form','pass1','pass2','pass22','submit')" required>
                        <label>Пароль</label>
                    </div>

                    <div class="block-autorization__form__input-container" data-aos="fade-left" data-aos-delay="300">
                        <span class="block-autorization__form__span"><ion-icon name="lock-closed-outline"></ion-icon></span>
                        <input type="password" class="block-autorization__form__input" name="pass2" id="pass2" onKeyUp="isRavno('form_reg','pass1','pass2','pass22','submit')" required>
                        <label>Повторите пароль</label>
                    </div>

                    <span id="pass22"></span><br />

                    <button type="submit" class="block-autorization__form__btn" data-aos="fade-left" data-aos-delay="300">Зарегистрироваться</button>
                </form>
            </div>
        </div>
    </section>

    <?php include('include/footer.php'); ?>

    <script type="text/javascript" src="js/reg.js"></script>
    <script type="text/javascript" src="js/log.js"></script>
    <script src="https://kit.fontawesome.com/3037fe6c63.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>