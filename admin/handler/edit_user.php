<?php
include '../connection.php';

$name = $_POST['name'];
$email = $_POST['email'];
$lrn = $_POST['lrn'];
$password= $_POST['password'];
$id2 = $_POST['user_id'];


$sql = "UPDATE student SET name ='$name', email = '$email', lrn='$lrn' password='$password' WHERE id = '$id2'  ";
$query = $link->query($sql) or die($link->error);
?>