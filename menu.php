<?php
include ("connect.php")
?>

<?php
session_start();

if (!isset($_SESSION['login']) && isset($_COOKIE['login'])) {
    $_SESSION['login'] = $_COOKIE['login'];
    }
    $username = $_SESSION['login'];
    
    if (!isset($_SESSION['grants']) && isset($_COOKIE['grants'])) {
    $_SESSION['grants'] = $_COOKIE['grants'];
    }
    $grants = $_SESSION['grants'];
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Меню</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <br>
    <br>
    <p class="formTitle"><h1>Меню управления</h1></p>
    <div class="queryForm">
    <?php
    if ($grants == 'admin') {
    echo "<form class='backform' action='lab3/index.php'>
    <input type='submit' value='Панель управления БД'>
        </form>";
    echo "<form class='backform' action='lab2/index.php'>
    <input type='submit' value='Формирование отчёта'>
        </form>";
    echo "<form class='backform' action='grants.php'>
    <input type='submit' value='Права'>
        </form>";
     echo "<form class='backform' action='lab5/index.php'>
    <input type='submit' value='ORM'>
        </form>";
    echo "<form class='backform' action='l6.php'>
    <input type='submit' value='Сохраненный запрос'>
        </form>";
    echo "<form class='backform' action='aut.php'>
    <input type='submit' value='Выйти'>
        </form>";
    }
    elseif ($grants == 'operator') {
    
    echo "<form class='backform' action='lab2/index.php'>
    <input type='submit' value='Формирование отчёта'>
        </form>";
    echo "<form class='backform' action='aut.php'>
    <input type='submit' value='Выйти'>
        </form>";
    }
    elseif ($grants == 'guest') {
   
    echo "<form class='backform' action='aut.php'>
    <input type='submit' value='Выйти'>
        </form>";
    }
    
    else{
        header('Location: .aut.php');
        exit();
    }
?>



    </div>   
</body>
</html>