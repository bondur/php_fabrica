<?php

require_once 'connect.php';

$id = $_POST['id'];
$grants = $_POST['grants'];





mysqli_query($connect, $query= "UPDATE `users` SET `grants`= '$grants'
 WHERE id = $id");


header('Location: menu.php');