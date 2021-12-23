<?php
 $name = filter_var(trim($_POST['name']),
 FILTER_SANITIZE_STRING);
 $password = filter_var(trim($_POST['password']),
 FILTER_SANITIZE_STRING);
 $phone = filter_var(trim($_POST['phone']),
 FILTER_SANITIZE_STRING);
 $birth_date = filter_var(trim($_POST['birth_date']),
 FILTER_SANITIZE_STRING);


 
 if(mb_strlen($password)<4 || mb_strlen($password)>16)
 {
     echo "Длина пароля недопустима(от 4 до 16)";
exit();
 }
 else if(mb_strlen($phone)!=11)
 {
     echo "Некоректный телефон";
exit();
}
require 'configDB.php';
$password =md5($password."wasdwasd1337");
$query = $pdo->query("INSERT INTO `users` (`name`, `phone`, `birth_date`, `password`) 
VALUES('$name','$phone','$birth_date','$password')");
  
header('Location: /account.php');
?>