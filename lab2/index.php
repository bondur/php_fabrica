<?php
include("connect.php")
?>

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

<header></header>

<main>
<!— Создание формы с параметрами для выбора из базы данных (опции для выбора создаются на основе результата SQL запроса)-->
<div class="queryForm">
<p class="formTitle">Создание ведомости поступлений<br>товаров на склад готовой продукции фабрики</p>
<form action="report.php" method="get" enctype="multipart/form-data">

Квартал
<?php
 $result = mysqli_query($connect, "SELECT DISTINCT QUARTER(data_postypleniya) as quarter FROM Postypleniya" );
 echo "<select name = 'quarter'>";
 echo "<option value = 'all' selected> Все кварталы </option>";

 while ($row=mysqli_fetch_array($result)) {
     $resultDate = $row[quarter];
         echo "<option value = $resultDate> $resultDate </option>";   
 }
 echo "</select>";
?>
<br>

Год
<?php
$result = mysqli_query($connect, "SELECT DISTINCT DATE_FORMAT(data_postypleniya, '%Y') as data_postypleniya FROM Postypleniya" );
echo "<select name = 'year'>";
echo "<option selected = 'all' value = 'all'> Всё время </option>";
while ($row=mysqli_fetch_array($result)) {
echo "<option value = $row[data_postypleniya]> $row[data_postypleniya] </option>";
}
echo "</select>";
?>

<br>
<input type="submit" name="submit" value="Создать отчёт" />

</form>
<a href="/menu.php" class="btn btn-primary">На главную</a>
</div>
