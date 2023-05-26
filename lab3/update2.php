<?php
    require_once 'connect.php';
    $id = $_GET['id'];
    $modeli = mysqli_query($connect, $query= "SELECT * FROM `modeli_odejdi` WHERE id = $id");
    $modelies= mysqli_fetch_assoc($modeli);
   
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8"> 
        <link rel="stylesheet" href="upstyle.css">
        <title>Update modeli </title>
    </head>
    <body>
        <h3 id="text">Изменение модели</h3>
        <div id="form">
            <form action="update2_1.php" method="post">
                <input type="hidden" name="id" value="<?= $modelies['id'] ?>">
                <p>Наименование модели</p>
                <input type="text" name="naimenovanie_modeli" value="<?= $modelies['naimenovanie_modeli'] ?>">
                <p>Цена</p>
                <input type="text" name="cena_modeli" value="<?= $modelies['cena_modeli'] ?>">
                <p>Наименование товара</p>
                <?php
                    $naimenov= mysqli_query($connect, $query= "SELECT id, naimenovanie_tovara FROM `vid_tovara`");
                    echo "<select name = 'naimenovanie_tovara'>";
                   
                    while ($row = mysqli_fetch_array ($naimenov)){
                        if ($modelies['id_tovara'] != $row['id'] ){
                            echo "<option value='$row[0]'>$row[1]</option>";}
                            else {
                        echo "<option value = $row[0] selected > $row[1]</option> ";
                            }
                        }
                    echo "</select>"
                 ?>

                <button class="third" type="submit">Обновить</button>
            </form>
            </form> 
            <form class="aas" action="table2.php">
            <button>Закрыть</button>
                </form>
        </div>
    </body>
</html>

