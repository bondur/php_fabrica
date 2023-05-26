<?php

require_once 'connect.php';

$id = $_POST['id'];
$naimenovanie_tovara = $_POST['naimenovanie_tovara'];

// mysqli_query($connect, $query= "UPDATE `vid_tovara` SET `naimenovanie_tovara`= 'naimenovanie_tovara' WHERE id = $id");
mysqli_query($connect, $query= "UPDATE `vid_tovara` SET `naimenovanie_tovara`= '$naimenovanie_tovara' WHERE id = $id");


header('Location: table1.php');