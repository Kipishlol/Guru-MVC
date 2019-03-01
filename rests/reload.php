<?php

include 'functions.php';

$maxPage = getMaxPage(20);
$rests = [];
for ($i=1; $i<=$maxPage; $i++) {
    $pageRests = getRestaurantsFromPage($i);
    $rests = array_merge($rests,$pageRests);
}
var_dump($rests);
$cuisines = [];
foreach ($rests as $rest) {
    $cuisines = array_merge($cuisines,$rest['cuisine']);
}
$cuisines = array_unique($cuisines);
var_dump($cuisines);



$host = '127.0.0.1';
$db   = 'Restaurants';
$user = 'Kristina';
$pass = 'mama2018';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $opt);

#очистка таблицы рестс
$stmt = $pdo->prepare('TRUNCATE TABLE `Rests`');
$stmt->execute();

#очистка таблицы кузинс
$stmt = $pdo->prepare('TRUNCATE TABLE `cuisines`');
$stmt->execute();
 
#очистка таблицы 
$stmt = $pdo->prepare('TRUNCATE TABLE `rest_cuisine`');
$stmt->execute();


# запрос на вставку кухонь
$stmt = $pdo->prepare('
     INSERT INTO 
     `cuisines` (
         `name`  
         ) VALUES (
             :name
        )
');

$cuisinesMap = [];
foreach ($cuisines as $cuisine){
    $stmt->execute([
        ':name' => $cuisine
    ]);
    $cuisinesMap[$cuisine] = $pdo->lastInsertId();

}
var_dump($cuisinesMap);

#запрос на вставку ресторанов
$stmt = $pdo->prepare('
    INSERT INTO 
        `Rests` (
            `name`,
            `link`,
           `price_min`,
           `price_max`,
            `worktime`,
            `address`
        )  VALUES (
            :name,
            :link,
            :price_min,
            :price_max,
            :worktime,
            :address

        )
');


foreach ($rests as $value){
    $stmt->execute([
        ':name' => $value['name'] ,
        ':link' => $value['link'],
        ':price_min' => $value['price']['price_min'],
        ':price_max' => $value['price']['price_max'],
        ':worktime' => $value['worktime'],
        ':address' => $value['address'] 
    
    ]);
    $restaurantId= $pdo->LastInsertId();

     #выставляем связи кухня-ресторaн
    $stmtRC = $pdo->prepare("
        INSERT INTO
          `rest_cuisine` (
              `id_rest`,
              `id_cuisine`
              ) VALUES (
              :id_rest,
              :id_cuisine
              )
    ");
    foreach ($value['cuisine'] as $cuisine) {
        $stmtRC->execute([
            ':id_rest' => $restaurantId,
            ':id_cuisine' => $cuisinesMap[$cuisine],
        ]);

    
    }
    
}

