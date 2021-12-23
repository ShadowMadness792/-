<?php 
require 'configDB.php';
$id = $_GET['id'];
$query1 = $pdo->query("DELETE FROM `doctors` WHERE `doctor_id`= '$id'");

header('Location: /doctors.php');
?>
