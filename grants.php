<?php
include("connect.php")
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="icon" href="favicon.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lab3/style.css">
    <script type="text/javascript" src="script.js"></script>
    <title>ЛАБОРАТОРНАЯ №4</title>
    
</head>

<body>
<table>
<table>
        <tr>
            
            <th>ФИО </th>
            <th>Логин</th>
            <th>email</th>
            <th>Права</th>
            <th>Обновить</th>
            <th>Удалить</th>

        </tr>

        <?php
     /* $tovaru = mysqli_query ($connect, $query = "SELECT vid_tovara.id, naimenovanie_tovara, naimenovanie_modeli
        FROM vid_tovara, modeli_odejdi WHERE vid_tovara.id = modeli_odejdi.id_tovara");
        $tovaru = mysqli_fetch_all ($tovaru); */
        $users = mysqli_query ($connect, $query = "SELECT *
        FROM users ");
        $users = mysqli_fetch_all ($users);
        foreach ($users as $user) {
            ?>
             <tr>
                <td> <?=$user[1] ?> </td>
                <td> <?=$user[2] ?> </td>
                <td> <?=$user[3] ?> </td>
                <td> <?=$user[5] ?> </td>
               
                <td><a id="update" href="up1.php?id=<?= $user[0]  ?>">Update</a></td>
                <td><a id="delete" href="delete1.php?id=<?= $user[0]  ?>">Delete</a></td>
                
            </tr>
        <?php      
        }
        ?>

    </table>

  
    
    <form class='backform' action='/menu.php'>
    <input type='submit' value='На главную'>
    </form>

    <script>
        function openForm() {
        document.getElementById("myForm").style.display = "block"; }
        function closeForm() {
        document.getElementById("myForm").style.display = "none";
        } 
    </script>
 
</body>
</html>