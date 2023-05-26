<!DOCTYPE html>
<html lang="ru">
<head>
<link rel="icon" href="favicon.ico">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<script type="text/javascript" src="script.js"></script>
<title>ЛАБОРАТОРНАЯ №2</title>
</head>

<body>

<div class="report">

<?php
include("connect.php")
?>

<?php
$quarter = !empty($_GET['quarter']) ? $_GET['quarter'] : 'all';
$year = !empty($_GET['year']) ? $_GET['year'] : 'all';

$query = "SELECT vid_tovara.naimenovanie_tovara as `vid tovara`, modeli_odejdi.naimenovanie_modeli as `model`, Postypleniya.data_postypleniya,
modeli_odejdi.cena_modeli, Postypleniya.kolichestvo, Postypleniya.kolichestvo*modeli_odejdi.cena_modeli as `sum`
FROM modeli_odejdi,vid_tovara,Postypleniya
WHERE modeli_odejdi.id = Postypleniya.id_modeli AND vid_tovara.id = modeli_odejdi.id_tovara";

$head = "<table border='1'> <tr>
<th> model </th>
<th> data_postypleniya </th>
<th> cena_modeli,руб </th>
<th> kolichestvo </th>
<th> sum, руб. </th>
</tr>";

$title = "Ведомость поступлений товаров на склад готовой продукции фабрики по пошиву одежды за ";

if ($quarter == 'all' and $year == 'all') {
$title .= " всё время.";
}

if ($quarter == 'all' and $year != 'all') {
$query .= " AND YEAR(Postypleniya.data_postypleniya) = '$year' ";
$title .= "  $year год. ";
}
   
if ($quarter != 'all' and $year != 'all') {
$query .= " AND QUARTER(Postypleniya.data_postypleniya) = '$quarter' ";
$title .= "$quarter квартал";
$query .= " AND YEAR(Postypleniya.data_postypleniya) = '$year' ";
$title .= "  $year года. ";
}

echo "<p class='title'><b> $title </b></p>";

$query_for_count = "SELECT COUNT(vid_tovara.id) FROM vid_tovara;";
$result = mysqli_query($connect, $query_for_count);
$row=mysqli_fetch_array($result);
$count_of_vidov = $row[0];

$allsum = 0;
$allsum1 = 0;
$errorMsg = 0;

for ($i = 1; $i <= $count_of_vidov; $i++) {

$sum = 0;
$sum1 = 0;

$new_query = $query . " AND vid_tovara.id = '$i' ;";

$result = mysqli_query($connect, $new_query);

if (!$result) {
printf("Ошибка запроса к базе данных: %s\n", mysqli_error($connect));
exit();
}

$rowCount = mysqli_num_rows($result);

if ( $rowCount == 0 ) {  
    $errorMsg++;
    
    continue;    
}
else {echo $head;}

$result = mysqli_query($connect, $new_query);

while ($row=mysqli_fetch_array($result))
{


$param1 = $row['model'];
$param2 = $row['data_postypleniya'];
$param3 = $row['cena_modeli'];
$param4 = $row['kolichestvo'];
$param5 = $row['sum'];

$sum += $param5;
$sum1 += $param4;
$dep_name = $row['vid tovara'];

echo "<tr><td>$param1</td><td>$param2</td><td>$param3</td><td>$param4</td><td>$param5</td></tr>";
}

echo '</table><br>';
echo "<p><b>Товар: $dep_name </b><p>";
echo "<p><b>Итого по Товару:<p class='inner1'>$sum1</p> <p class='inner'>$sum</p> </b><p>";
$allsum += $sum;
$allsum1 += $sum1;

}
if ($errorMsg == $count_of_vidov) {
    printf("Для данной даты нет поступлений");
}
else {
echo "<hr style='border-top: dotted 3px;'/>";
echo "<b><p style='margin-bottom: 10px'>Итого по фабрике:<p class='inner1'>$allsum1 </p> <p class='inner'>$allsum </p><p></b>";
}
?>

</div>

<form class="backform" action="index.php" method="post" enctype="multipart/form-data">
<input type="submit" value="Назад">
</form>

</main>

<footer></footer>

</body>
</html>