<?php
require_once 'rb.php';

R::setup('mysql:host=localhost; dbname=Fabrica','root','');
 if (!R::testConnection() )
 {
 exit ('Нет соединения с базой данных');
 }  

session_start();

if (!isset($_SESSION['username']) && isset($_COOKIE['username'])) {
    $_SESSION['username'] = $_COOKIE['username'];
    }
    $username = $_SESSION['username'];
    
    if (!isset($_SESSION['grants']) && isset($_COOKIE['grants'])) {
    $_SESSION['grants'] = $_COOKIE['grants'];
    }
    $grants = $_SESSION['grants'];
    
    if (!isset($_SESSION['id']) && isset($_COOKIE['id'])) {
    $_SESSION['id'] = $_COOKIE['id'];
    }
    $id = $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="icon" href="favicon.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="script.js"></script>
    <title>ЛАБОРАТОРНАЯ №5</title>
</head>

<body>

<div class="zapr1_2">

<?php
$vid = ($_GET['vid']);
$min = ($_GET['min']);
$max = ($_GET['max']);
if ($min>$max){
    echo 'ДИАПАЗОН ВЫБРАН НЕ ВЕРНО, выберите его еще раз';
}  

$result = R::getAll("SELECT naimenovanie_modeli,cena_modeli FROM  modeli_odejdi, vid_tovara WHERE vid_tovara.id = id_tovara 
AND naimenovanie_tovara='$vid' AND cena_modeli<=$max AND cena_modeli>=$min;");
// $result = R::find('naimenovanie_modeli','id_tovara= :vid AND cena_modeli<= :max AND cena_modeli>= :min',[':vid' => $vid,':max' => $max,':min' => $min]);

                    $title = "ВИД ТОВАРА - $vid ";
                    
                    echo "<p class='title'><b> $title </b></p>";

                    $head = "<table border='1'> <tr> 
                    <th> Наименование модели </th>
                    <th> Цена модели </th>
                    </tr>";

                    echo $head;
                    
                    foreach ($result as $row){
                        $param = $row['naimenovanie_modeli'];
                        $param2 = $row['cena_modeli'];
                        echo "<td>$param</td><td>$param2</td> </tr>";
                    }
                    echo "<form class='backform' action='./zapr1_1.php' method='post' enctype='multipart/form-data'>
                         <input type='submit' value='Назад'>
                        </form>";
?>