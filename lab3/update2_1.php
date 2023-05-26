<?php

require_once 'connect.php';

$id = $_POST['id'];
$naimenovanie_modeli = $_POST['naimenovanie_modeli'];
$cena_modeli = $_POST['cena_modeli'];
$naimenovanie_tovara = $_POST['naimenovanie_tovara'];



// mysqli_query($connect, $query= "UPDATE `vid_tovara` SET `naimenovanie_tovara`= 'naimenovanie_tovara' WHERE id = $id");
mysqli_query($connect, $query= "UPDATE `modeli_odejdi` SET `naimenovanie_modeli`= '$naimenovanie_modeli', 
`cena_modeli`= '$cena_modeli', `id_tovara`= '$naimenovanie_tovara' WHERE id = $id");


header('Location: table2.php');