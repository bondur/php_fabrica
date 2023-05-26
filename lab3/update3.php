<?php
    require_once 'connect.php';
    $id = $_GET['id'];
    $postypleniya= mysqli_query($connect, $query= "SELECT * FROM `Postypleniya` WHERE id = $id");
    $postyplenies= mysqli_fetch_assoc($postypleniya);
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8"> 
        <link rel="stylesheet" href="upstyle.css">
        <title>Update postypleniya</title>
    </head>
    <body>
        <h3 id="text">Изменение поступления</h3>
        <div id="form">
            <form action="update3_1.php" method="post">
                <input type="hidden" name="id" value="<?= $postyplenies['id'] ?>">
                <p>Наименование модели</p>
                <?php
                    $naimenov= mysqli_query($connect, $query= "SELECT id, naimenovanie_modeli FROM `modeli_odejdi`");
                    echo "<select name = 'naimenovanie_modeli'>";
                  
                    while ($row = mysqli_fetch_array ($naimenov)){
                        if ($postyplenies['id_modeli'] != $row['id'] ){
                            echo "<option value='$row[0]'>$row[1]</option>";}
                            else {
                        echo "<option value = $row[0] selected > $row[1]</option> ";
                            }
                        }
                    echo "</select>"
                 ?>
                
                <p>Дата поступления</p>
                <input type="date" name="data_postypleniya" value="<?= $postyplenies['data_postypleniya'] ?>">
                <p>Количество</p>
                <input type="number" name="kolichestvo" value="<?= $postyplenies['kolichestvo'] ?>">
                <p>Принимающий</p>
                <input type="text" name="prinimayschiy" value="<?= $postyplenies['prinimayschiy'] ?>">
                
                <button class="third" type="submit">Обновить</button>
                
                
                </form> 
            <form class="aas" action="table3.php">
            <button>Закрыть</button>
                </form>
        </div>
    </body>
</html>

