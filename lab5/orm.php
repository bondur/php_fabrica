<?php
require_once 'rb.php';

R::setup('mysql:host=localhost; dbname=Fabrica','root','');
 if (!R::testConnection() )
 {
 exit ('Нет соединения с базой данных');
 }  
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>AAAAAAa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <h1> Модели одежды </h1>
     <table>
        <tr>
            <th>Наименование модели</th>
            <th>Наименование товара</th>
            <th>Цена модели</th>
            <th>Обновление</th>
            <th>Удаление</th>
        </tr>

        <?php
    //$ids = [1,2,3,4,5,6,7,8,9,10];
   

    $ids = R::getAll("SELECT * FROM  modeli_odejdi, vid_tovara WHERE modeli_odejdi.id_tovara= vid_tovara.id ");
    foreach ($ids as $model){

       // echo $model['naimenovanie_modeli'].'<br>';
       // echo $model['naimenovanie_tovara'].'<br>';
       // echo $model['cena_modeli'].'<br>';
    //  }
    ?>
            <tr>
               <td> <?=$model['naimenovanie_modeli'] ?> </td>
               <td> <?= $model['naimenovanie_tovara'] ?> </td>
               <td> <?= $model['cena_modeli'] ?> </td>
               <td><a id="update" href="update2.php?id=<?= $model['id'] ?>">Update</a></td>
               <td><a id="delete" href="delete2.php?id=<?= $model[0]  ?>">Delete</a></td>
           </tr>
           <?php      
        }
        ?>
    </table>


    <button class="open-button" onclick="openForm()">Добавить модель</button>
    <div class="form-popup" id="myForm">
    <form  action = "create.php" method = "post" class="form-container">
            <p>Наименование модели  <input type="text" placeholder="Введите модель" name="naimenovanie_modeli" > </p>

            <p>Цена модели <input type="text" placeholder="Введите цену модели" name="cena_modeli" ></p>
            
            

            <p>Наименование товара

            <?php
            $queries = R::getAll('SELECT id, naimenovanie_tovara FROM vid_tovara');
            $zxc =  $query[0]['naimenovanie_tovara']
            ?>

            <select id="naimenovanie_tovara" name="naimenovanie_tovara">
            <?php
            foreach($queries as $naimenovanie_tovara) {
                  echo "<option value='$naimenovanie_tovara[naimenovanie_tovara]'>$naimenovanie_tovara[naimenovanie_tovara]</option>";
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
        } 
    </script>

</body>
</html>