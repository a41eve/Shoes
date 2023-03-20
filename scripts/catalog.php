<?php

// Объявляем нужные константы
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'shoesmain');

// Подключаемся к базе данных
function connectDB() {
    $errorMessage = 'Невозможно подключиться к серверу базы данных';
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$conn)
        throw new Exception($errorMessage);
    else {
        $query = $conn->query('set names utf8');
        if (!$query)
            throw new Exception($errorMessage);
        else
            return $conn;
    }
}

// Получение данных из массива _GET
function getOptions() {
    // Категория, цены и дополнительные данные
   
    $minPrice = (isset($_GET['min_price'])) ? (int)$_GET['min_price'] : 0;
    $maxPrice = (isset($_GET['max_price'])) ? (int)$_GET['max_price'] : 1000000;

    return array(
       
        'min_price' => $minPrice,
        'max_price' => $maxPrice
    );
}

// Получение товаров
function getGoods($options, $conn) {
    // Обязательные параметры
    $minPrice = $options['min_price'];
    $maxPrice = $options['max_price'];
   

    // Необязательные параметры

    $query = "
        select
            p.id_pt as pt_id,
            p.price as price
        from
            product as p
        where
            p.price between $minPrice and $maxPrice
    
    ";

    $data = $conn->query($query);
    return $data->fetch_all(MYSQLI_ASSOC);
}

// Получаем бренды по категории
// Получаем минимальную и максимальную цену
function getPrices($categoryId, $conn) {
    $query = "
        select
            min(price) as min_price,
            max(price) as max_price
        from
            product
    ";
 
    $data = $conn->query($query);
    return $data->fetch_assoc();
}

// Получение всех данных
function getData($options, $conn) {
    $result = array(
        'product' => getGoods($options, $conn)
    );

    
    if (in_array('prices', $needsData)) {
        $result['prices'] = getPrices($options['pt_id'], $conn);
    }

    return $result;
}


try {
    // Подключаемся к базе данных
    $conn = connectDB();

    // Получаем данные от клиента
    $options = getOptions();

    // Получаем товары
    $data = getData($options, $conn);

    // Возвращаем клиенту успешный ответ
    echo json_encode(array(
        'code' => 'success',
        'data' => $data
    ));
}
catch (Exception $e) {
    // Возвращаем клиенту ответ с ошибкой
    echo json_encode(array(
        'code' => 'error',
        'message' => $e->getMessage()
    ));
}
