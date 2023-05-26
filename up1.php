<?php
    require_once 'connect.php';
    $id = $_GET['id'];
    $naimenovanie = mysqli_query($connect, $query= "SELECT * FROM `users` WHERE id = $id");
    $naimenovanies= mysqli_fetch_assoc($naimenovanie);
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8"> 
        <link rel="stylesheet" href="upstyle.css">
        <title>Update users</title>
    </head>
    <body>
        <h3 id="text">Измение прав</h3>
        <div id="form">
            <form action="up1_1.php" method="post">
           
            <input type="hidden" name="id" value="<?= $naimenovanies['id'] ?>">
                <p>ФИО</p>
                <input type="text" name="full_name" value="<?= $naimenovanies['full_name'] ?>">
                <p>Логин</p>
                <input type="text" name="login" value="<?= $naimenovanies['login'] ?>">
                <p>Почта</p>
                <input type="email" name="email" value="<?= $naimenovanies['email'] ?>">
                <p>Права</p>
                <?php
                        $naimenov= mysqli_query($connect, $query= "SELECT id, grants FROM `users` WHERE id = $id");
                        echo "<select name = 'grants'>";
    
                        $row=mysqli_fetch_array($naimenov);
                        $grants = $row['grants'];
    
    
                        $p[0] = "admin";
                        $p[1] = "operator";
                        $p[2] = "guest";
    
                        for($i=0;$i<3;$i++) {
                            if ($grants != $p[$i]){
                                echo "<option value = '$p[$i]' > $p[$i]</option>";
                            }
                            else {echo "<option  value = '$grants' selected> $grants </option>";
                            }   
                        } 
                       echo "</select>"
    
                     ?>
                <button class="third" type="submit">Обновить</button>
                <button>Закрыть</button>
            </form>
        </div>
    </body>
</html>