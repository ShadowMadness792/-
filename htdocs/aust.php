<?php
require 'configDB.php';

$name = filter_var(trim($_POST['name']),
 FILTER_SANITIZE_STRING);
 $password = filter_var(trim($_POST['password']),
 FILTER_SANITIZE_STRING);


 $password =md5($password."wasdwasd1337");


$query = $pdo->query("SELECT * FROM `users` WHERE 
`name` ='$name' AND `password`='$password'");
$user = $query->fetch(PDO::FETCH_OBJ);


if($name == $user->name and $password == $user->password)
{
if($user->admin=='0')
    {setcookie('user',$user->name, time()+3600, "/");}
    else {setcookie('admin',$user->name, time()+3600, "/");}
    header('Location: /');
}
else{
    echo "Такой пользователь не найден";
    exit();
}

 ?>