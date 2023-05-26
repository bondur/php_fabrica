<?php

require_once 'connect.php';
$id = $_GET['id'];

mysqli_query($connect, $query = " DELETE FROM modeli_odejdi WHERE `modeli_odejdi`.`id` = $id");

header('Location: table2.php');