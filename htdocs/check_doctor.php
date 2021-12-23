<?php
 $name = filter_var(trim($_POST['name']),
 FILTER_SANITIZE_STRING);
 $specialization = filter_var(trim($_POST['specialization']),
 FILTER_SANITIZE_STRING);



 
//  if(mb_strlen($password)<4 || mb_strlen($password)>16)
//  {
//      echo "Длина пароля недопустима(от 4 до 16)";
// exit();
//  }
//  else if(mb_strlen($phone)!=11)
//  {
//      echo "Некоректный телефон";
// exit();
// }
require 'configDB.php';
$query = $pdo->query("INSERT INTO `doctors` (`name`, `specialization`) 
VALUES('$name','$specialization')");
  
header('Location: /doctors.php');
?>