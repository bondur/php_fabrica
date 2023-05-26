<?php
                    $naimenovanie_tovara= mysqli_query($connect, $query= "SELECT id, naimenovanie_tovara FROM `vid_tovara`");
                    $naimenovanie_tovara= mysqli_fetch_all($naimenovanie_tovara);
                    ?>
                    <select id="naimenovanie_tovara" name="naimenovanie_tovara">
                    <?php
                    foreach($naimenovanie_tovara as $naimenovanie_tovara){ 
                        echo "<option value='$naimenovanie_tovara[0]'>$naimenovanie_tovara[1]</option>";
                        }
                    echo "</select>"
                 ?>



<?php
                    $naimenov= mysqli_query($connect, $query= "SELECT id, naimenovanie_tovara FROM `vid_tovara`");
                    echo "<select name = 'naimenovanie_tovara'>";
                   
                    while ($row = mysqli_fetch_array ($naimenov)){
                        $value = $row ['naimenovanie_tovara'];
                        $naimenovanie_tovara = ['id'];
                        if ($value != $naimenovanie_tovara ){
                            echo "<option value='$naimenovanie_tovara[0]'>$naimenovanie_tovara[1]</option>";}
                        echo "<option selected value = $naimenovanie_tovara> $value </option> ";
                        }
                    echo "</select>"
                 ?>


<?php
                    echo "<select id='naimenovanie_modeli' name='naimenovanie_modeli'>";

                    while ($row=mysqli_fetch_array($naimenovanie_modeli)) {
                    $id = $row['id'];
                    if ($id != $postyplenies['id_modeli']) {
                    echo "<option value='$postyplenies['id_modeli']'>$naimenovanie_modeli['naimenovanie_modeli']</option>";
                    }
                    else {"<option select value='$postyplenies['id_modeli']'>$naimenovanie_modeli['naimenovanie_modeli']</option>";}
                    }
                    echo "</select>";
                 ?>
