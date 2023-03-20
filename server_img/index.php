<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Как загрузить файл на сервер</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<?php 
include("head.php");
?>
    <div class="container">

        <div class="row mb-3">

            <div class="col-md-12">
                <form action="upload-one-file.php?flag" method="POST" enctype="multipart/form-data" class="form-inline md-form">

                  <input type="text" placeholder="Название заяки" name="name" required>
<textarea placeholder="Описание заявки" rows="3" name="com"
required></textarea>
<select name="kat" required="required">
  <option value="" style="font-size: 2vh;">Выберите категорию заявки</option>
  <option>Бюджетное учреждение</option>
  <option>Водный объект</option>
  <option>Двор</option>
  <option>Дом</option>
  <option>Квартира</option>
  <option>Кладбище</option>
    <option>Коммерческое строительство</option>
  <option>Мост</option>
  <option>Общественный транспорт</option>
  <option>Остановка обществ. транспорта</option>
  <option>Парк, сад, бульвар, сквер</option>
  <option>Рекламные или инфор-е кострукции</option>
   <option>Сооружение</option>
  <option>Строительная площадка</option>
  <option>Территория Санкт-Петербурга</option>
  <option>Торговый объект</option>
  <option>улица</option>
</select>

                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="file_img" id="file_img" required>
                        </div>
                    </div>
                    
<input type="hidden" name="stat" value="Новая">
<input type="hidden" name="login" value="<?=$_COOKIE['user'] ?>">
                    <input type="submit" name="upload_image" class="btn btn-primary" value="Отправить">
                </form>
               

                <?php
                    if(isset($_SESSION["server_messages"])){
                ?>
                        <div class="server_messages">
                            <?php echo $_SESSION["server_messages"] ?>
                        </div>
                <?php
                        //Уничтожаем ячейку с сообщением, чтобы не появилось заново при обновлении страницы
                        unset($_SESSION["server_messages"]);
                    }
                ?>
            </div>
        </div>

        <?php

            // Получаем список изображений из папки images
            // отсортированные по имени, в альфабетном порядке
            $uploaded_files = scandir('images');

            // избавляемся от точек в результате
            $uploaded_files = array_diff($uploaded_files, ['.', '..']);

            if(count($uploaded_files) > 0){
                // Если в папке находятся какие-то изображения, то выводим их на страницу
        ?>
                <h2 class="mb-3">Загруженные изображения</h2>

                <div class="row mb-3">
        <?php
                $i = 1;
                foreach($uploaded_files as $file){
        ?>
                    <div class="col-md-4 text-center">
                        <img src="images/<?=$file?>" alt="Image" width="300" class="img-responsive" />
                    </div>
        <?php
                    if($i % 3 === 0){
        ?>
                </div>
                <div class="row mb-3">
        <?php
                    }
                    $i++;
                }
        ?>
                </div>
        <?php
            }
        ?>

    </div>

    <!-- Bootstrap CDN -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <?php 
include("footer.php");
?>
</body>
</html>

images/<?=$file?>