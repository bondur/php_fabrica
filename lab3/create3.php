<?php
include ("connect.php");

$naimenovanie_modeli = $_POST['naimenovanie_modeli'];
$data_postypleniya = $_POST['data_postypleniya'];
$kolichestvo = $_POST['kolichestvo'];
$prinimayschiy = $_POST['prinimayschiy'];

mysqli_query($connect, $query = " INSERT INTO modeli_odejdi (id, naimenovanie_modeli)
VALUES (NULL, '$naimenovanie_modeli')");

$id = mysqli_query ($connect, $query = "SELECT  id
FROM modeli_odejdi WHERE (naimenovanie_modeli = '$naimenovanie_modeli');");

$id_newmodel = mysqli_fetch_array ($id);
$iddd = $id_newmodel[0];

mysqli_query($connect, $query = " INSERT INTO  Postypleniya (id, id_modeli, data_postypleniya, kolichestvo, prinimayschiy)
VALUES (NULL, $iddd, '$data_postypleniya', '$kolichestvo', '$prinimayschiy')");



header ( 'Location: table3.php');

?>
