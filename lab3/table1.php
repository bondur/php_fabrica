<?php
include ("connect.php")
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>AAAAAAa</title>
</head>
<body>

    <table>
        <tr>
            
            <th>Наименование товара</th>
            <th>Обновление</th>
            <th>Удаление</th>
            
        </tr>

        <?php
     /* $tovaru = mysqli_query ($connect, $query = "SELECT vid_tovara.id, naimenovanie_tovara, naimenovanie_modeli
        FROM vid_tovara, modeli_odejdi WHERE vid_tovara.id = modeli_odejdi.id_tovara");
        $tovaru = mysqli_fetch_all ($tovaru); */
        $tovaru = mysqli_query ($connect, $query = "SELECT *
        FROM vid_tovara ");
        $tovaru = mysqli_fetch_all ($tovaru);
        foreach ($tovaru as $tovar) {
            ?>
             <tr>
                <td> <?=$tovar[1] ?> </td>
               
                <td><a id="update" href="update1.php?id=<?= $tovar[0]  ?>">Update</a></td>
                <td><a id="delete" href="delete1.php?id=<?= $tovar[0]  ?>">Delete</a></td>
                
            </tr>
        <?php      
        }
        ?>

    </table>

    <button class="open-button" onclick="openForm()">Добавить товар</button><form class="aas" action="index.php">
   <button>Главная форма>>>>>>></button>
    </form>
    <div class="form-popup" id="myForm">
    <form  action = "create1.php" method = "post" class="form-container">
            <p>Наименование товара  <input type="text" placeholder="Введите товар" name="naimenovanie_tovara" > </p>

            
            <button type="submit" class="btn">Сохранить</button>      
    </form>
    <button class="btn cancel" onclick="closeForm()">Закрыть</button>
    </div>

    <script>
        function openForm() {
        document.getElementById("myForm").style.display = "block"; }
        function closeForm() {
        document.getElementById("myForm").style.display = "none";
        } 
    </script>
 
</body>
</html>