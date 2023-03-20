<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adm-form.css">
    <title>Админ панель</title>
</head>

<body>
    <div class="admin-form">
        <div class="admin-form-inner">
            <p class="admin-form-inner-title">АДМИН ПАНЕЛЬ</p>

            <form action="php/adm.php" method="POST">
                <div class="admin-form-inner-input">
                    <input type="text" placeholder="Введите логин" name="login">
                </div>
                <div class="admin-form-inner-input">
                    <input type="text" placeholder="Введите пароль" name="password">
                </div>
                <div class="admin-form-inner-btn">
                    <button type="submit">Войти в админ панель</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>