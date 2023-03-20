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
    <link rel="stylesheet" href="styles/katalog.css">
    <link rel="stylesheet" href="js/libs/nouislider.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Каталог - Joys</title>
</head>

<body>
    <!-- шапка -->
    <?php
    include('include/header.php');
    require_once "php/bd.php";
    ?>

    <!-- каталог -->
    <section class="section">
        <div class="container">
            <div class="section__katalog">
                <h2 class="section__katalog-title" data-aos="fade-right" data-aos-delay="200">Каталог</h2>
            </div>
            <div class="block-katalog" data-aos="fade-right" data-aos-delay="200">
                <form action="" method="GET">
                    <div class="katalog-filter">
                        <!-- btn-show -->
                        <div class="katalog-filter-btn">
                            <button type="submit" class="katalog-filter-btn-open">Показать</button>
                        </div>

                        <div class="katalog-filter__link">

                            <!--фильтр категорий-->
                            <?php
                            $brand_query = "SELECT * FROM gender";
                            $brand_query_run  = mysqli_query($connection, $brand_query);

                            if (mysqli_num_rows($brand_query_run) > 0) {
                                foreach ($brand_query_run as $brandlist) {
                                    $checked = [];
                                    if (isset($_GET['brands'])) {
                                        $checked = $_GET['brands'];
                                    }
                            ?>
                                    <input type="checkbox" class="katalog-filter__link-link-checkbox checkbox--link" id="<?= $brandlist['id_gr']; ?>" name="brands[]" value="<?= $brandlist['id_gr']; ?>" <?php if (in_array($brandlist['id_gr'], $checked)) {
                                                                                                                                                                                                                echo "checked";
                                                                                                                                                                                                            } ?> />
                                    <label for="<?= $brandlist['id_gr']; ?>"><?= $brandlist['name_gr']; ?></label> <?php
                                                                                                                }
                                                                                                            } else {
                                                                                                                echo "Нет категорий";
                                                                                                            }
                                                                                                                    ?>

                            <p class="katalog-filter__text"><b>Подкатегория</b></p>
                            <!--фильтр подкатегорий-->
                            <?php
                            $bbrand_query = "SELECT * FROM category";
                            $bbrand_query_run  = mysqli_query($connection, $bbrand_query);

                            if (mysqli_num_rows($bbrand_query_run) > 0) {
                                foreach ($bbrand_query_run as $bbrandlist) {
                                    $bchecked = [];
                                    if (isset($_GET['bbrand'])) {
                                        $bchecked = $_GET['bbrand'];
                                    }
                            ?>
                                    <input type="checkbox" class="katalog-filter__link-link-checkbox checkbox--link" id="<?= $bbrandlist['id_cy']; ?>" name="bbrand[]" value="<?= $bbrandlist['id_cy']; ?>" <?php if (in_array($bbrandlist['id_cy'], $bchecked)) {
                                                                                                                                                                                                                echo "checked";
                                                                                                                                                                                                            } ?> />
                                    <label for="<?= $bbrandlist['id_cy']; ?>"><?= $bbrandlist['cr_name']; ?></label>
                            <?php
                                }
                            } else {
                                echo "Нет категорий";
                            }
                            ?>
                        </div>

                        <p class="katalog-filter__text"><b>Цвет</b></p>
                        <!--фильтр цвета-->


                        <div class="katalog-filter__color">
                            <?php
                            $color_query = "SELECT * FROM color";
                            $color_query_run  = mysqli_query($connection, $color_query);

                            if (mysqli_num_rows($color_query_run) > 0) {
                                foreach ($color_query_run as $colorlist) {
                                    $cchecked = [];
                                    if (isset($_GET['color'])) {
                                        $cchecked = $_GET['color'];
                                    }
                            ?>
                                    <input type="checkbox" class="katalog-filter__color-color-checkbox checkbox--<?= $colorlist['name_cr'] ?>" id="<?= $colorlist['id_cr'] ?>" name="color[]" value="<?= $colorlist['id_cr']; ?>" style="background-color:#<?= $color['code'] ?> " <?php if (in_array($colorlist['id_cr'], $cchecked)) {
                                                                                                                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                                                                                                                    } ?> />
                                    <label for="<?= $colorlist['id_cr'] ?>" style="background-color:#<?= $colorlist['code'] ?> "></label>

                            <?php
                                }
                            } else {
                                echo "Нет цвета";
                            }
                            ?>
                        </div>

                        <p class="katalog-filter__text"><b>Цена</b></p>
                        <!--фильтр цены-->
                        <div class="filters-price__slider" id="range-slider"></div>
                        <div class="filters-price__inputs">
                            <div class="filters-price__label">
                                <span class="filters-price__text">от</span>
                                <input type="number" min="500" max="99999" placeholder="500" class="filters-price__input" id="input-0" name="in1">

                                <span class=" filters-price__text" id="demo">₽</span>
                            </div>
                            <div class="filters-price__label" id="prices-label">
                                <span class="filters-price__text">до</span>
                                <input type="number" min="500" max="99999" placeholder="99999" class="filters-price__input" id="input-1">
                                <span class="filters-price__text">₽</span>
                                <div id="prices"></div>
                            </div>
                        </div>

                        <div class="katalog-filter__link">
                            <p class="katalog-filter__text"><b>Бренды</b></p>
                            <!--фильтр подкатегорий-->
                            <?php
                            $bbbrand_query = "SELECT * FROM brands";
                            $bbbrand_query_run  = mysqli_query($connection, $bbbrand_query);

                            if (mysqli_num_rows($bbbrand_query_run) > 0) {
                                foreach ($bbbrand_query_run as $bbbrandlist) {
                                    $bbchecked = [];
                                    if (isset($_GET['bbbrand'])) {
                                        $bbchecked = $_GET['bbbrand'];
                                    }
                            ?>
                                    <input type="checkbox" class="katalog-filter__link-link-checkbox checkbox--link" id="<?= $bbbrandlist['id_brand']; ?>" name="bbbrand[]" value="<?= $bbbrandlist['id_brand']; ?>" <?php if (in_array($bbbrandlist['id_brand'], $bbchecked)) {
                                                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                                                        } ?> />
                                    <label for="<?= $bbbrandlist['id_brand']; ?>"><?= $bbbrandlist['name_brand']; ?></label>
                            <?php
                                }
                            } else {
                                echo "Нет брендов";
                            }
                            ?>
                        </div>
                    </div>
                </form>

                <div class="katalog">
                    <?php
                    if (isset($_GET['brands']) or isset($_GET['bbrand']) or isset($_GET['color']) or isset($_GET['size'])) {
                        if (isset($_GET['brands'])) {
                            $branchecked = [];
                            $branchecked = $_GET['brands'];
                        } else  if (isset($_GET['bbrand'])) {
                            $branchecked = [];
                            $branchecked = $_GET['bbrand'];
                        } else if (isset($_GET['color'])) {
                            $branchecked = [];
                            $branchecked = $_GET['color'];
                        } else if (isset($_GET['size'])) {
                            $branchecked = [];
                            $branchecked = $_GET['size'];
                        }

                        foreach ($branchecked as $rowbrand) {
                            if (isset($_GET['brands'])) {
                                // echo $rowbrand;
                                $products = "SELECT * FROM product WHERE gender IN ($rowbrand)";
                                $products_run = mysqli_query($connection, $products);
                            } else if (isset($_GET['bbrand'])) {
                                $products = "SELECT * FROM product WHERE category IN ($rowbrand)";
                                $products_run = mysqli_query($connection, $products);
                            } else if (isset($_GET['color'])) {
                                $products = "SELECT * FROM product WHERE color IN ($rowbrand)";
                                $products_run = mysqli_query($connection, $products);
                            } else if (isset($_GET['size'])) {
                                $products = "SELECT * FROM `product`, `prod_size`, `size` WHERE `prod_size`.`id_pt`=`product`.`id_pt` AND `prod_size`.`id_se`=`size`.`id_se` AND `prod_size`.`id_se` IN ($rowbrand)";
                                $products_run = mysqli_query($connection, $products);
                            }
                            if (mysqli_num_rows($products_run) > 0) {
                                foreach ($products_run as $product) :
                    ?>
                                    <div class="katalog-item" data-aos="fade-up" data-aos-delay="200">
                                        <a href="card.php?id=<?= $product['id_pt']; ?>">
                                            <div class="katalog-header">
                                                <div class="katalog-info scale">
                                                    <img class="katalog__img scale" src="images/special/<?= $product['img']; ?>" alt="">
                                                    <p class="katalog__text"><?= $product['name']; ?></p>
                                                    <div class="scale-price-cart">
                                                        <p class="katalog__price"><?= $product['price']; ?> ₽</p>

                                                        <a href="#" class="scale-price-cart-add-to-cart"><ion-icon name="heart-outline" id="heartout"></ion-icon><ion-icon name="heart" id="heart"></ion-icon></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php
                                endforeach;
                            }
                        }
                    } else {
                        $products = "SELECT * FROM product";
                        $products_run = mysqli_query($connection, $products);
                        if (mysqli_num_rows($products_run) > 0) {
                            foreach ($products_run as $product) :
                                ?>
                                <div class="katalog-item" data-aos="fade-up" data-aos-delay="200">
                                    <a href="card.php?id=<?= $product['id_pt']; ?>">
                                        <div class="katalog-header">
                                            <div class="katalog-info scale">
                                                <img class="katalog__img scale" src="images/special/<?= $product['img']; ?>" alt="">
                                                <p class="katalog__text"><?= $product['name']; ?></p>
                                                <div class="scale-price-cart">
                                                    <p class="katalog__price"><?= $product['price']; ?> ₽</p>

                                                    <a href="#" class="scale-price-cart-add-to-cart"><ion-icon name="heart-outline" id="heartout"></ion-icon><ion-icon name="heart" id="heart"></ion-icon></a>
                                                    <script>
                                                        document.getElementById('heartout').onclick = function heartout() {
                                                            document.getElementById('heartout').style.display = 'none';
                                                            document.getElementById('heart').style.display = 'block';
                                                            document.getElementById('heart').style.marginBottom = '0.7rem';
                                                        }
                                                        document.getElementById('heart').onclick = function heartout() {
                                                            document.getElementById('heartout').style.display = 'block';
                                                            document.getElementById('heartout').style.marginBottom = '0.7rem';
                                                            document.getElementById('heart').style.display = 'none';
                                                        }
                                                    </script>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                    <?php
                            endforeach;
                        } else {
                            echo "No Items Found";
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <?php include('include/footer.php'); ?>

    <!-- подключение скриптов -->
    <script type="text/javascript" src="js/menu.js"></script>
    <script type="text/javascript" src="js/libs/nouislider.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="js/range-slider.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/3037fe6c63.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>