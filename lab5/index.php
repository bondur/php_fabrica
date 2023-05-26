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
    <p class="formTitle"><h1>ORM</h1></p>
    <div class="queryForm">
    <?php
    if ($grants == 'admin') {
    echo "<form class='backform' action='orm.php'>
    <input type='submit' value='Модели'>
        </form>";
    echo "<form class='backform' action='zapr1_1.php'>
    <input type='submit' value='Запрос1'>
        </form>";
    echo "<form class='backform' action='zapr2_1.php'>
    <input type='submit' value='Запрос2'>
        </form>";
    echo "<form class='backform' action='zapr3_1.php'>
    <input type='submit' value='Запрос3'>
        </form>";
    echo "<form class='backform' action='/menu.php'>
    <input type='submit' value='Назад'>
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