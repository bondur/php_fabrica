<?php

require_once 'connect.php';
$id = $_GET['id'];

mysqli_query($connect, $query = " DELETE FROM vid_tovara WHERE `vid_tovara`.`id` = $id");

header('Location: table1.php');