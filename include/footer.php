<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../styles/footer.css">
</head>

<body>
    <footer>
        <div id="footer" class="footer">
            <div class="container">
                <a href="index.html"><img src="images/logo.png" class="footer__img" alt="logo"></a>
                <div class="footer-block">
                    <div class="footer-block-01">
                        <h5 class="footer-block-title">Бренды</h5>
                        <a href="" class="footer-block-link">Adidas</a>
                        <a href="" class="footer-block-link">Asics</a>
                        <a href="" class="footer-block-link">Converse</a>
                        <a href="" class="footer-block-link">Jordan</a>
                        <a href="" class="footer-block-link">Nike</a>
                        <a href="" class="footer-block-link">Puma</a>
                        <a href="" class="footer-block-link">Reebok</a>
                        <a href="" class="footer-block-link">New balance</a>
                    </div>
                    <div class="footer-block-04">
                        <h5 class="footer-block-title">Меню</h5>
                        <a href="katalog.php" class="footer-block-link">Каталог</a>
                        <a href="private.php" class="footer-block-link">Личный кабинет</a>
                        <a href="news.php" class="footer-block-link">Новости</a>
                        <a href="info.php" class="footer-block-link">О компании</a>
                        <a href="reviews.php" class="footer-block-link">Отзывы</a>
                    </div>
                    <div class="footer-block-02">
                        <h5 class="footer-block-title">Категория</h5>
                        <a href="http://shoesmain/katalog.php?brands%5B%5D=1&in1=500" class="footer-block-link">Мужчины</a>
                        <a href="http://shoesmain/katalog.php?brands%5B%5D=2&in1=500" class="footer-block-link">Женщины</a>
                        <a href="http://shoesmain/katalog.php?brands%5B%5D=3&in1=500" class="footer-block-link">Дети</a>
                        <a href="http://shoesmain/katalog.php?brands%5B%5D=4&in1=500" class="footer-block-link">Спорт</a>
                    </div>
                    <div class="footer-block-03">
                        <h5 class="footer-block-title">Типы обуви</h5>
                        <a href="http://shoesmain/katalog.php?bbrand%5B%5D=11&in1=500" class="footer-block-link">Кроссовки</a>
                        <a href="http://shoesmain/katalog.php?bbrand%5B%5D=12&in1=500" class="footer-block-link">Ботинки</a>
                        <a href="http://shoesmain/katalog.php?bbrand%5B%5D=13&in1=500" class="footer-block-link">Кеды</a>
                    </div>
                    <div class="footer-block-connect">
                        <h5 class="footer-block-connect-title">Связаться с нами</h5>

                        <form class="footer-block-form" action="../php/feedback.php" method="POST">
                            <!-- name -->
                            <input type="text" class="footer-block-form__input" name="name" id="name" placeholder="Ваше имя" pattern="[а-яА-ЯёЁ]+" required title="Разрешена только кириллица" />
                            <script>
                                (function() {
                                    var inputs = document.getElementsByTagName('name');

                                    for (var i = 0, input; input = inputs[i]; i++) {
                                        if (input.type == 'text') {
                                            input.oninput = oninput;
                                            // input['oninput' in input ? 'oninput' : 'onpropertychange'] = oninput; // for IE8
                                        }
                                    }

                                    function oninput() {
                                        var valid = true;
                                        if ('required' in this.attributes) {
                                            valid = valid && this.value != '';
                                        }
                                        if ('pattern' in this.attributes) {
                                            var pattern = new RegExp('^' + this.getAttribute('pattern') + '$', 'gi');
                                            valid = valid && pattern.test(this.value);
                                        }

                                        if (!valid) {
                                            alert(this.title);
                                        }
                                    }
                                })();
                            </script>

                            <!-- number phone -->
                            <input type="tel" class="footer-block-form__input" name="phone" id="inputPhone" value="+7(___)-___-__-__" required>
                            <script>
                                let inputPhone = document.getElementById("inputPhone");
                                inputPhone.oninput = () => phoneMask(inputPhone)

                                function phoneMask(inputEl) {
                                    let patStringArr = "+7(___)-___-__-__".split('');
                                    let arrPush = [3, 4, 5, 8, 9, 10, 12, 13, 15, 16]
                                    let val = inputEl.value;
                                    let arr = val.replace(/\D+/g, "").split('').splice(1);
                                    let n;
                                    let ni;
                                    arr.forEach((s, i) => {
                                        n = arrPush[i];
                                        patStringArr[n] = s
                                        ni = i
                                    });
                                    inputEl.value = patStringArr.join('');
                                    n ? inputEl.setSelectionRange(n + 1, n + 1) : inputEl.setSelectionRange(17, 17)
                                }
                            </script>

                            <button type="submit" class="footer-block-form__btn">Отправить</button>
                            <a href="tel:+79823207406" class="footer-block-form__tel"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                </svg>&#8199+7(982)-320-74-06</a>
                        </form>
                    </div>
                </div>
                <div class="last">
                    <p class="last-text">© Магазин спортивной обуви Joys, 2022</p>
                    <div class="icon">
                        <i class="fa-brands fa-vk icon__item"></i>
                        <i class="fa-brands fa-telegram icon__item"></i>
                        <i class="fa-brands fa-github icon__item"></i>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/3037fe6c63.js" crossorigin="anonymous"></script>
</body>

</html>