<?php
include ("connect.php");

/*session_start();

if (!isset($_SESSION['login']) && isset($_COOKIE['login'])) {
    $_SESSION['login'] = $_COOKIE['login'];
    }
    $username = $_SESSION['login'];
    
    if (!isset($_SESSION['grants']) && isset($_COOKIE['grants'])) {
    $_SESSION['grants'] = $_COOKIE['grants'];
    }
    $grants = $_SESSION['grants']; */
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
    
    <title>AAAAAAa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <form class="guruweba_example_form">
    <table>
    <p class="formTitle">Выберите таблицу</p>
    <div class="sub">
       <button type="button" class="Button"><a href="table1.php">Виды товаров</a></button>
	   <button type="button" class="Button"><a href="table2.php">Модели одежды</a></button>
       <button type="button" class="Button"><a href="table3.php">Поступления</a></button>
 
    </div>
    </form>
    
    <a href="/menu.php" class="btn btn-primary">На главную</a>

    
   

</body>
</html>