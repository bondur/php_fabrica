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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>


<body>

<header></header>
<!-- Вывести модели с указанием их типа, поступившие в выбранном месяце -->
<main>

<div class="queryForm">
<p class="formTitle">ЗАПРОС 3</p>
<form action="zapr3_2.php" method="get" enctype="multipart/form-data">

<?php
echo "Выберите месяц: ";
echo "<select name = 'month'>";
$A=[];
$A[0]='January';
$A[1]='February';
$A[2]='March';
$A[3]='April';
$A[4]='May';
$A[5]='June';
$A[6]='July';
$A[7]='August';
$A[8]='September';
$A[9]='October';
$A[10]='November';
$A[11]='December';
for ($i = 0; $i <= 11; $i++) {
echo "<option value = {$A[$i]}> {$A[$i]} </option>";
}
echo "</select>";

?>
<br>
<input type="submit" name="submit" value="Выполнить запрос" />
</form>
<?php
echo "<form class='backform' action='index.php' method='post' enctype='multipart/form-data'>
    <input type='submit' value='Назад'>
</form>";
?>
</div>