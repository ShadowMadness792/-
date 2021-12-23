<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Добавление врача</title>
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
          <a class="btn btn-primary" href="/doctors.php">Вернуться назад</a>
    </div>
  </div>
</nav>

<div class="container">
    <img src="https://dwstroy.ru/lessons/les3373/demo/img/men.png">
		<form action="/check_doctor.php" method="POST">
			<div class="dws-input">
              <input type="text" name="name" placeholder="Введите ФИО врача">
            </div>
			<div class="dws-input">
              <input type="text" name="specialization" placeholder="Введите специализацию">
            </div>
            <input class="dws-submit" type="submit" name="submit" value="Добавить специалиста"><br />

		</form>
</div>



</body>
</html>