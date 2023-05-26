<?php
include ("connect.php");

$naimenovanie_tovara = $_POST['naimenovanie_tovara'];

$naimenovanie_modeli = $_POST['naimenovanie_modeli'];

// if ($naimenovanie_modeli = 'zw'){
//     echo '<script> alert ("error")</script>';
    
// }
// else{
    mysqli_query($connect, $query = " INSERT INTO vid_tovara (id, naimenovanie_tovara)
VALUES (NULL,'$naimenovanie_tovara')");
header ( 'Location: table1.php');
// }


?>
