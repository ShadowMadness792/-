<?php
require 'configDB.php';

$doctor = filter_var(trim($_POST['doctor']),
FILTER_SANITIZE_STRING);
$date = filter_var(trim($_POST['date']),
FILTER_SANITIZE_STRING);
$time = filter_var(trim($_POST['time']),
FILTER_SANITIZE_STRING);
$start = $date." ".$time;


$client_cook =  $_COOKIE['user'];
$query = $pdo->query("SELECT * FROM `users` WHERE `name` = '$client_cook'");
$row = $query->fetch(PDO::FETCH_OBJ);
$user_id=$row->user_id;

$query1 = $pdo->query("SELECT * FROM `doctors` WHERE `name`='$doctor'");
$row1 = $query1->fetch(PDO::FETCH_OBJ);
$doctor_id=$row1->doctor_id;

$query2 = $pdo->query("SELECT * FROM `shifts` WHERE `doctor_id`='$doctor_id' AND `date`='$date'");
$row2 = $query2->fetch(PDO::FETCH_OBJ);
$shift_id=$row2->shift_id;
$shift_start=$row2->start;
$shift_finish=$row2->finish;

$query3 = $pdo->query("SELECT * FROM `sessions` WHERE `shift_id`='$shift_id'");



$query4 = $pdo->query("INSERT INTO `sessions` (`user_id`, `shift_id`,`start`,`finish`)
VALUES('$user_id','$shift_id','$start','$start'+INTERVAL 2700 SECOND)");

$query5 = $pdo->query("SELECT * FROM `sessions` WHERE `shift_id`='$shift_id' AND `user_id`='$user_id' AND `start`='$start'");
$row5 = $query5->fetch(PDO::FETCH_OBJ);
$newstart = $row5->start;
$newfinish = $row5->finish;
$k=0;
while($row3 = $query3->fetch(PDO::FETCH_OBJ))
{
    $oldstart = $row3->start;
    $oldfinish = $row3->finish;
    if(($newstart>$oldstart && $newstart<$oldfinish)||($newfinish>$oldstart && $newfinish<$oldfinish)||($newstart<$oldstart && $newfinish>$oldfinish))
    {
        $query6 = $pdo->query("DELETE FROM `sessions` WHERE `shift_id`='$shift_id' AND `user_id`='$user_id' AND `start`='$start'");
        echo "Пожалуйста, выберите свободное время";
        exit();
    }
    else if($newstart=$oldstart || $newfinish=$oldfinish)
    {
        $k+=1;
    }
}
if(!($k==1))
{
    $query7 = $pdo->query("DELETE FROM `sessions` WHERE `shift_id`='$shift_id' AND `user_id`='$user_id' AND `start`='$start' ORDER BY `session_id` DESC LIMIT 1");
    echo "Пожалуйста, выберите свободное время";
    exit();
}

header('Location: /session.php');
?>