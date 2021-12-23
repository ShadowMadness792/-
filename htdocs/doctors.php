<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Список врачей</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Список врачей</h1>
<?php
require 'configDB.php';



echo '<table class="table table-bordered">
<thead>
<tr>
<th>Имя врача:</th>
<th>Специализация: </th>
<th></th>
</tr>
</thead>
<tbody>';


$query1 = $pdo->query("SELECT * FROM `doctors`");
while($row1 = $query1->fetch(PDO::FETCH_OBJ)){
echo' <tr>
<td>'.$row1->name.'</td>
<td>'.$row1->specialization.'</td>';
echo '<td><div class="but"><a href="delete_doctor.php?id='.$row1->doctor_id.'"<button class="gradient-button">Удалить</button></a></div></td>';
echo '</tr>';
}
echo ' </tbody>
</table>';




?>

  <div class="hi" style="color:black">Привет <?=$_COOKIE['admin']?></div>
  <a class="btn btn-primary" href="/add_doctor.php">Добавить врача</a>
  <a class="btn btn-primary" href="/exit.php">Выход</a>
</div>
</body>
</html>





