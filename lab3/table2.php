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
            <th>Наименование модели</th>
            <th>Цена модели</th>
            <th>Наименование товара</th>
            <th>Обновление</th>
            <th>Удаление</th>
        </tr>

        <?php
      /*  $modeli = mysqli_query ($connect, $query = "SELECT naimenovanie_modeli, cena_modeli, naimenovanie_tovara
        FROM  modeli_odejdi, vid_tovara
        WHERE modeli_odejdi.id_tovara= vid_tovara.id ");
        $modeli = mysqli_fetch_all ($modeli); */
        $modeli = mysqli_query ($connect, $query = "SELECT *
        FROM  modeli_odejdi, vid_tovara
        WHERE modeli_odejdi.id_tovara= vid_tovara.id ");
        $modeli = mysqli_fetch_all ($modeli);
        foreach ($modeli as $model) {
            ?>
             <tr>
               
                <td> <?=$model[1] ?> </td>
                <td> <?=$model[3] ?> </td>
                <td> <?=$model[5] ?> </td>

                <td><a id="update" href="update2.php?id=<?= $model[0]  ?>">Update</a></td>
                <td><a id="delete" href="delete2.php?id=<?= $model[0]  ?>">Delete</a></td>
            </tr>
        <?php      
        }
        ?>
    </table>

        

    <button class="open-button" onclick="openForm()">Добавить модель</button>
    <form class="aas" action="index.php">
   <button>Главная форма>>>>>>></button>
    </form>
    <div class="form-popup" id="myForm">
    <form  action = "create2.php" method = "post" class="form-container">
            <p>Наименование модели  <input type="text" placeholder="Введите модель" name="naimenovanie_modeli" > </p>

            <p>Цена модели  <input type="text" placeholder="Введите цену модели" name="cena_modeli" ></p>
            
            <p>Наименование товара 
            <?php
            $naimenovanie_tovara= mysqli_query($connect, $query= "SELECT naimenovanie_tovara FROM `vid_tovara`");
            $naimenovanie_tovara= mysqli_fetch_all($naimenovanie_tovara);
            ?>
            <select id="naimenovanie_tovara" name="naimenovanie_tovara">
            <?php
            foreach($naimenovanie_tovara as $naimenovanie_tovara){ 
                echo "<option value='$naimenovanie_tovara[0]'>$naimenovanie_tovara[0]</option>";
                }
            echo "</select>"
            ?>
            </p>

            <button type="submit" class="btn">Сохранить</button>
                 
    </form>
    <button class="btn cancel" onclick="closeForm()">Закрыть</button>
    </div>
     
    <script>
        function openForm() {
        document.getElementById("myForm").style.display = "block"; }
        function closeForm() {
        document.getElementById("myForm").style.display = "none";
        } </script>
    
    

   

</body>
</html>