<?php

require_once 'connect.php';

$id = $_POST['id'];
$naimenovanie_modeli = $_POST['naimenovanie_modeli'];
$data_postypleniya = $_POST['data_postypleniya'];
$kolichestvo = $_POST['kolichestvo'];
$prinimayschiy = $_POST['prinimayschiy'];



// mysqli_query($connect, $query= "UPDATE `vid_tovara` SET `naimenovanie_tovara`= 'naimenovanie_tovara' WHERE id = $id");
mysqli_query($connect, $query= "UPDATE `Postypleniya` SET `id_modeli`= '$naimenovanie_modeli', `data_postypleniya`= '$data_postypleniya', 
`kolichestvo` = '$kolichestvo', `prinimayschiy`= '$prinimayschiy' WHERE id = $id");


header('Location: table3.php');