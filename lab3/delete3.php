<?php

require_once 'connect.php';
$id = $_GET['id'];

mysqli_query($connect, $query = " DELETE FROM Postypleniya WHERE `Postypleniya`.`id` = $id");

header('Location: table3.php');