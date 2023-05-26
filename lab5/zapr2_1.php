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
<!-- ,Подсчитать количество моделей каждого вида. Виды, в которых более 2 моделей выделить -->
<body>

<div class="zapr2_1">

<?php

$result = R::getAll("SELECT COUNT(naimenovanie_modeli) as col,naimenovanie_tovara FROM  modeli_odejdi, vid_tovara WHERE vid_tovara.id = id_tovara
 GROUP BY naimenovanie_tovara ");


                    $title = "Не надо";
                    
                    echo "<p class='title'><b> $title </b></p>";

                    $head = "<table border='1'> <tr> 
                    <th> Наименование товара </th>
                    <th> Кол-во моделий </th>
                    </tr>";

                    echo $head;
                    
                    foreach ($result as $row){
                        if ($row['col']<2){
                        $param = $row['naimenovanie_tovara'];
                        $param2 = $row['col'];
                        echo "<td>$param</td><td>$param2</td> </tr>";
                        }
                    else{
                        $param = $row['naimenovanie_tovara'];
                        $param2 = $row['col'];
                        echo "<td><b>$param</b></td><td><b>$param2</b></td> </tr>";
                    }
                }
                    echo "<form class='backform' action='./zapr1_1.php' method='post' enctype='multipart/form-data'>
                         <input type='submit' value='Назад'>
                        </form>";
?>