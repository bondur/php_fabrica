<?php
    require_once 'connect.php';
    $id = $_GET['id'];
    $naimenovanie = mysqli_query($connect, $query= "SELECT * FROM `vid_tovara` WHERE id = $id");
    $naimenovanies= mysqli_fetch_assoc($naimenovanie);
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8"> 
        <link rel="stylesheet" href="upstyle.css">
        <title>Update naimenovanie tovara</title>
    </head>
    <body>
        <h3 id="text">Введите наименование товара</h3>
        <div id="form">
            <form action="update1_1.php" method="post">
                <input type="hidden" name="id" value="<?= $naimenovanies['id'] ?>">
                <input type="text" name="naimenovanie_tovara" value="<?= $naimenovanies['naimenovanie_tovara'] ?>">
                <button class="third" type="submit">Обновить</button>
                <button>Закрыть</button>
            </form>
        </div>
    </body>
</html>

