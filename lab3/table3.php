<?php
include ("connect.php")
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Поступления</title>
</head>
<body>

    <table>
        <tr>
            
            <th>Наименование модели</th>
            <th>Дата поступления</th>
            <th>Количество</th>
            <th>prinimayschiy</th>
            <th>Обновление</th>
            <th>Удаление</th>
        </tr>

        <?php
       /* $postavki = mysqli_query ($connect, $query = "SELECT  naimenovanie_modeli, data_postypleniya, kolichestvo, prinimayschiy
        FROM  modeli_odejdi, Postypleniya  WHERE modeli_odejdi.id = Postypleniya.id_modeli");
        $postavki = mysqli_fetch_all ($postavki); */
        $postavki = mysqli_query ($connect, $query = "SELECT  *
        FROM   Postypleniya, modeli_odejdi  WHERE modeli_odejdi.id = Postypleniya.id_modeli");
        $postavki = mysqli_fetch_all ($postavki);
        foreach ($postavki as $postavka) {
            ?>
             <tr>
                <td> <?=$postavka[6] ?> </td>
                <td> <?=$postavka[2] ?> </td>
                <td> <?=$postavka[3] ?> </td>
                <td> <?=$postavka[4] ?> </td>

                <td><a id="update" href="update3.php?id=<?= $postavka[0]  ?>">Update</a></td>
                <td><a id="delete" href="delete3.php?id=<?= $postavka[0]  ?>">Delete</a></td>
            </tr>
        <?php      
        }
        ?>

    </table>

    <button class="open-button" onclick="openForm()">Добавить поступление</button>
    <div class="form-popup" id="myForm">
    <form  action = "create3.php" method = "post" class="form-container">
            <p>Наименование модели 
            <?php
            $naimenovanie_modeli= mysqli_query($connect, $query= "SELECT DISTINCT naimenovanie_modeli FROM `modeli_odejdi`");
            $naimenovanie_modeli= mysqli_fetch_all($naimenovanie_modeli);
            ?>
            <select id="naimenovanie_modeli"  name="naimenovanie_modeli">
            <?php

            foreach($naimenovanie_modeli as $naimenovanie_modeli){ 
                echo "<option value='$naimenovanie_modeli[0]'>$naimenovanie_modeli[0]</option>";
                }
            echo "</select>"
            ?>
            </p>
            <p>Дата поступления <input type="date" placeholder="Введите дату" name="data_postypleniya" ></p>
            <p>Количество <input type="number" placeholder="Введите количество" name="kolichestvo" ></p>
            <p>Принимающий <input type="text" placeholder="Введите принимающего" name="prinimayschiy" ></p>
        
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
   
   

   <form action="index.php" stile=alient:centre>
   <button>Главная форма>>>>>>></button>

   <style>
       .form-popup{
          position: relative;
          left: 50px;
       }
   </style>

</body>
</html>