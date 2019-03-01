<?php
header('Content-Type: text/html; charset=utf-8');




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

$stmt = $pdo->prepare("
    SELECT
         `Rests`.*,
         `cuisines`.`name` AS `cuisines-name`
    FROM
         `Rests`
    LEFT JOIN
        `rest_cuisine`
        ON `rest_cuisine`.`id_rest` = `Rests`.`id`
        LEFT JOIN
        `cuisines`
        ON `rest_cuisine`.`id_cuisine` = `cuisines`.`id`
    WHERE 

         (`price_min` + `price_max`) /2 < :price AND `cuisines`.`id` = 3 OR `cuisines`.`id` = 5
                 
     ");


$stmt->execute([
':price' => 10000
]);


$result = $stmt->fetchAll();
var_dump($result);

