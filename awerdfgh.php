<?php                  
                    $query = "SELECT *
                        FROM `users`
                        WHERE users.id = $id;";
                        $result = mysqli_query($connect, $query);
                        $row=mysqli_fetch_array($result);

                        $param1 = $row['full_name'];
                        $param2 = $row['login'];
                        $param3 = $row['email'];
                        $param4 = $row['grants'];
                        $p[0] = "admin";
                        $p[1] = "operator";
                        $p[2] = "user";

                        echo "<div class='editString'>Фио: "; 
                        echo "<input type='text' name='param1' value='$param1'></div>";                    

                        echo "<div class='editString'>Логин: "; 
                        echo "<input type='text' name='param2' value='$param2'></div>";

                        echo "<div class='editString'>Email: "; 
                        echo "<input class='text' type='text' name='param3' value=$param3></div>";

                        
                        echo "<div class='editString'>Права:"; 
                        $result = mysqli_query($connect, "SELECT Наименование, id FROM Отделы" );
                        echo "<select name = 'param4'>";

                        for($i=0;$i<3;$i++) {
                            if ($param4 != $p[$i]){
                                echo "<option value = $p[$i] > $p[$i]</option>";
                            }
                            else {echo "<option selected value = $param4> $param4 </option>";
                            }   
                        }



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
                    

    ?>