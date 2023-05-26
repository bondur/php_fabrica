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

<div class="zapr3_2">

<?php
$month =$_GET['month'];

    $result = R::getAll("SELECT naimenovanie_modeli, naimenovanie_tovara FROM  modeli_odejdi, vid_tovara, Postypleniya
    WHERE vid_tovara.id = modeli_odejdi.id_tovara 
    AND modeli_odejdi.id = Postypleniya.id_modeli AND (DATE_FORMAT(data_postypleniya, '%M') = '$month');");

                    $title = "Товары поступившие ";
                    $query .= " AND DATE_FORMAT(data_postypleniya, '%M') = '$month' ";
                    $title .= "за месяц $month ";
                    

                    echo "<p class='title'><b> $title </b></p>";

                    $head = "<table border='1'> <tr> 
                    <th> Наименование модели </th>
                    <th> Вид товара </th>
                    </tr>";

                    echo $head;
                    if ($result){
                    foreach ($result as $row){
                        $param1 = $row['naimenovanie_modeli'];
                        $param2 = $row['naimenovanie_tovara'];

                        echo "<td>$param1</td><td>$param2</td> </tr>";
                    }
                }
                else{
                    echo "<td>ТОВАРЫ В ЭТОМ МЕСЯЦЕ НЕ ПОСТУПАЛИ</td><td>выберите другой месяц</td> </tr>";
                }
                    echo "<form class='backform' action='./zapr3_1.php' method='post' enctype='multipart/form-data'>
                         <input type='submit' value='Назад'>
                        </form>";
?>