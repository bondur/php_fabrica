<?php
include ("connect.php");

$naimenovanie_modeli = $_POST['naimenovanie_modeli'];

$cena_modeli = $_POST['cena_modeli'];

$naimenovanie_tovara = $_POST['naimenovanie_tovara'];

$kolichestvo = $_POST['kolichestvo'];



mysqli_query($connect, $query = " INSERT INTO vid_tovara (id, naimenovanie_tovara)
VALUES (NULL,'$naimenovanie_tovara')");

$id = mysqli_query ($connect, $query = "SELECT  id
FROM vid_tovara WHERE (naimenovanie_tovara = '$naimenovanie_tovara');");

$id_newtovar = mysqli_fetch_array ($id);
$iddd = $id_newtovar[0];

mysqli_query($connect, $query = " INSERT INTO modeli_odejdi (id, naimenovanie_modeli, id_tovara, cena_modeli)
VALUES (NULL, '$naimenovanie_modeli',$iddd, $cena_modeli)");

header ( 'Location: table2.php');

?>
