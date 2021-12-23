<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Стоматология VivaSmile</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1>Стоматология VivaSmile</h1>
    <form action="/registration.php" method="post">
      <button type="submit" name="sendTask" class="btn btn-success">Регистрация</button>
    </form>
    <form action="/account.php" method="post">
      <button type="submit" name="sendTask" class="btn btn-success">Войти</button>
    </form>

<?php
require 'configDB.php';


if($_COOKIE['user']=='' and $_COOKIE['admin']==''):?>
  <?php elseif($_COOKIE['admin']!=''): ?>
  <div class="hi" style="color: black">Здравствуйте, <?=$_COOKIE['admin']?></div>
  <a class="btn btn-primary" href="/doctors.php">Список врачей</a>
  <a class="btn btn-primary" href="/session.php">Записи</a>
  <a class="btn btn-primary" href="/shifts.php">Смены</a>
  <a class="btn btn-primary" href="/exit.php">Выход</a>
  <?php else: ?>
  <div class="hi" style="color: black">Здравствуйте, <?=$_COOKIE['user']?></div>
  <a class="btn btn-primary" href="/session.php">Записаться</a>
  <a class="btn btn-primary" href="/exit.php">Выход</a>
  
<?php endif;?>

</div>
</body>
</html>
