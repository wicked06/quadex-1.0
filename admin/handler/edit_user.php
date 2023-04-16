<?php
include '../connection.php';

$row = $query->fetch_assoc();
        $id = $row['id'];

$name = $_POST['name'];
$email = $_POST['email'];
$lrn = $_POST['lrn'];
$password= $_POST['password'];



$sql = "UPDATE student SET name ='$name', email = '$email', lrn='$lrn' password='$password' WHERE id = '$id'  ";
$query = $link->query($sql) or die($link->error);
?>