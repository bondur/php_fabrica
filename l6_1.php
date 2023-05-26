
<?php
include ("connect.php");


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

$result = mysqli_query($connect, "SELECT naimenovanie_tovara FROM vid_tovara WHERE
vid_tovara.id='$vid'");


$res = mysqli_query($connect, "CALL `6.3`($vid);");

                    foreach ($result as $row){
                    $title1 = $row['naimenovanie_tovara'];
                    $title = "ВИД ТОВАРА - $title1 ";
                    
                    echo "<p class='title'><b> $title </b></p>";
}
                    $head = "<table border='1'> <tr> 
                    <th> Наименование модели </th>
                    </tr>";

                    echo $head;
                    
                    foreach ($res as $row){
                        $param = $row['naimenovanie_modeli'];
                        echo "<tr><td>$param</td></tr>";
                    }
                    echo "<form class='backform' action='./l6.php' method='post' enctype='multipart/form-data'>
                         <input type='submit' value='Назад'>
                        </form>";
?>