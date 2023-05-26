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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>


<body>

<header></header>
<!-- Вывести список моделей выбранного вида, цена которых находится в выбранном диапазоне цен -->
<main>

<div class="queryForm">
<p class="formTitle">ЗАПРОС 1</p>
<form action="l6_1.php" method="get" enctype="multipart/form-data">

<?php
echo "Выберите наименование товара";
$result = mysqli_query($connect, "SELECT naimenovanie_tovara,id FROM vid_tovara");
echo "<select name = 'vid'>";
foreach ($result as $row) {
echo "<option value = '$row[id]'> $row[naimenovanie_tovara] </option>";
}
echo "</select>";
?>

<br>
<input type="submit" name="submit" value="Выполнить запрос" />
</form>

<?php
echo "<form class='backform' action='menu.php' method='post' enctype='multipart/form-data'>
    <input type='submit' value='Назад'>
</form>";
?>
</div>