<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Регистрация</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="css/stulesaccount.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid w-75">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="btn btn-primary" href="/">Главная</a>
        </li>
      </ul>
          <a class="btn btn-primary" href="/account.php">Вернуться назад</a>
    </div>
  </div>
</nav>

<!-- 
<div class="container">
    <img src="https://dwstroy.ru/lessons/les3373/demo/img/men.png">
		<form action="/session.php" method="POST">
			<div class="dws-input">
              <input type="text" name="doctor" placeholder="Выберите врача">
            </div>
            <div class="dws-input">
              <input type="text" name="date" placeholder="Выберите дату">
            </div>
            <input class="dws-submit" type="submit" name="submit" value="Открыть список записей"><br />
		</form>
</div> -->

<div class="container">
		<form action="/check_session.php" method="POST">
    <div class="dws-input">
      <!-- <?php
      echo'
              <input type="hidden" name="doctor" value="'.$doctor.'">
            </div>
            <div class="dws-input">
              <input type="hidden" name="date" value="'.$date.'">
            </div>
            ';
            ?> -->
            			<div class="dws-input">
              <input type="text" name="doctor" placeholder="Выберите врача">
            </div>
            <div class="dws-input">
              <input type="text" name="date" placeholder="Выберите дату">
            </div>
            <div class="dws-input">
              <input type="text" name="time" placeholder="Выберите время">
            </div>
            <input class="dws-submit" type="submit" name="submit" value="Записаться"><br />
		</form>
</div>


<?php
require 'configDB.php';

$doctor = filter_var(trim($_POST['doctor']),
FILTER_SANITIZE_STRING);
$date = filter_var(trim($_POST['date']),
FILTER_SANITIZE_STRING);
$time = filter_var(trim($_POST['time']),
FILTER_SANITIZE_STRING);

echo '<table class="table table-bordered">
 <thead>
 <tr>
 <th>Начало записи:</th>
 <th>Конец записи: </th>
 </tr>
 </thead>
 <tbody>';

 $query1 = $pdo->query("SELECT * FROM `doctors` WHERE `name`='$doctor'");
 $row1 = $query1->fetch(PDO::FETCH_OBJ);
 
 $query2 = $pdo->query("SELECT * FROM `shifts` WHERE `doctor_id`='$row1->doctor_id' AND `date`='$date'");
 $row2 = $query2->fetch(PDO::FETCH_OBJ);
 
 $query3 = $pdo->query("SELECT * FROM `sessions` WHERE `shift_id`='$row2->shift_id'");

 while($row3 = $query3->fetch(PDO::FETCH_OBJ))
 {   
     echo' <tr>
     <td>'.date("h:i",$row3->start).'</td>
     <td>'.date("h:i",$row3->finish).'</td>';
    //  echo '<td><div class="but"><a href="delete_doctor.php?id='.$row1->doctor_id.'"<button class="gradient-button">Удалить</button></a></div></td>';
     echo '</tr>';
    }
     echo ' </tbody>
     </table>';



?>

</body>
</html>