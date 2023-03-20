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
    <link rel="stylesheet" href="styles/review.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Магазин спортивной обуви - Joys</title>
</head>

<body>
    <?php include('include/header.php'); ?>

    <section class="section-review">
        <div class="container">
            <div class="section-review-block-title">
                <h1 class="section-review-block-title__title">Отзывы</h1>
                <a href="#form">Оставьте свой отзыв</a>
            </div>

            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="indicators active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" class="indicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" class="indicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="block-review">
                            <?php
                            require_once "php/bd.php";
                            $colors = mysqli_query($connection, "SELECT * FROM `review` ORDER BY `date` DESC LIMIT 4 ");
                            $data_from_d = [];
                            while ($result = mysqli_fetch_assoc($colors)) {
                                $data_from_d[] = $result;
                            }

                            # var_dump($data_from_db);
                            ?> <?php foreach ($data_from_d as $color) : ?>



                                <div class="revi" data-aos="fade-left" data-aos-delay="200">
                                    <div class="revi-content">
                                        <img src="images/avatars/mention-avatar-01.png" alt="Avatar" style="width:90px">
                                        <p><span><?= $color['name'] ?></span><br><?= $color['date'] ?></p>
                                        <span class="stars">
                                            <img src="images/reviews/star.png" alt="stars">
                                            <img src="images/reviews/star.png" alt="stars">
                                            <img src="images/reviews/star.png" alt="stars">
                                            <img src="images/reviews/star.png" alt="stars">
                                            <img src="images/reviews/zero-star.png" alt="stars">
                                        </span>
                                    </div>
                                    <div class="revi-text">
                                        <p><?= $color['text'] ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>

                    <div class="carousel-item">
                        <div class="block-review">
                            <?php
                            require_once "php/bd.php";
                            $colors = mysqli_query($connection, "SELECT * FROM `review` ORDER BY `date` DESC LIMIT 4, 4 ");
                            $data_from_d = [];
                            while ($result = mysqli_fetch_assoc($colors)) {
                                $data_from_d[] = $result;
                            }

                            # var_dump($data_from_db);
                            ?> <?php foreach ($data_from_d as $color) : ?>



                                <div class="revi" data-aos="fade-left" data-aos-delay="200">
                                    <div class="revi-content">
                                        <img src="images/avatars/mention-avatar-01.png" alt="Avatar" style="width:90px">
                                        <p><span><?= $color['name'] ?></span><br><?= $color['date'] ?></p>
                                        <span class="stars">
                                            <img src="images/reviews/star.png" alt="stars">
                                            <img src="images/reviews/star.png" alt="stars">
                                            <img src="images/reviews/star.png" alt="stars">
                                            <img src="images/reviews/star.png" alt="stars">
                                            <img src="images/reviews/zero-star.png" alt="stars">
                                        </span>
                                    </div>
                                    <div class="revi-text">
                                        <p><?= $color['text'] ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>


                    <div class="carousel-item ">
                        <div class="block-review">
                            <?php
                            require_once "php/bd.php";
                            $colors = mysqli_query($connection, "SELECT * FROM `review` ORDER BY `date` DESC LIMIT 8, 4 ");
                            $data_from_d = [];
                            while ($result = mysqli_fetch_assoc($colors)) {
                                $data_from_d[] = $result;
                            }

                            # var_dump($data_from_db);
                            ?> <?php foreach ($data_from_d as $color) : ?>



                                <div class="revi" data-aos="fade-left" data-aos-delay="200">
                                    <div class="revi-content">
                                        <img src="images/avatars/mention-avatar-01.png" alt="Avatar" style="width:90px">
                                        <p><span><?= $color['name'] ?></span><br><?= $color['date'] ?></p>
                                        <span class="stars">
                                            <img src="images/reviews/star.png" alt="stars">
                                            <img src="images/reviews/star.png" alt="stars">
                                            <img src="images/reviews/star.png" alt="stars">
                                            <img src="images/reviews/star.png" alt="stars">
                                            <img src="images/reviews/zero-star.png" alt="stars">
                                        </span>
                                    </div>
                                    <div class="revi-text">
                                        <p><?= $color['text'] ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>



                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"></span>
                    <img src="images/reviews/arrow-prev.png" alt="arrow">
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden"></span>
                    <img src="images/reviews/arrow-next.png" alt="arrow">
                </button>
            </div>
        </div>
    </section>

    <hr>


    <a name="form"></a>

    <section>
        <div class="container">
            <div class="form" data-aos="fade-left" data-aos-delay="450">
                <form action="php\client_form\review.php" method="POST" class="review">
                    <h1 class="review__title">Поделись своей оценкой</h1>
                    <h1 class="review__title">Напиши отзыв</h1>

                    <input name="name" type="text" class="review__input" id="name" placeholder="Ваше имя" required>

                    <textarea name="com" class="review__textarea" id="com" placeholder="Комментарий" required></textarea>
                    <?php
                    $a = date('Y.m.d');

                    ?>
                    <input name="date" type="hidden" class="review__input" id="name" placeholder="Ваше имя" value="<? echo $a ?>">
                    <button type="submit" class="review__btn">Отправить отзыв</button>
                </form>
            </div>
        </div>
    </section>

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