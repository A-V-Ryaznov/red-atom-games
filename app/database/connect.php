<?php 

$driver = 'mysql';
$host = 'localhost';
$db_name = 'red-atom';
$db_user = 'root';
$db_pass = 'mysql';
$charset = 'utf8mb4';
$option = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
           PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

try{
    $pdo = new PDO(
        "$driver:host=$host;dbname=$db_name;charset=$charset", $db_user,$db_pass,$option
    );
}
catch (PDOException $i){
    die("Ошибка подключения к базе данных");
}

?>