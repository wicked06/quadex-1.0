<?php
include '../connection.php';


$sql = "SELECT * FROM Admin ";
$res = $link->query($sql) or die($link->error);
while($row=$res->fetch_assoc())
{
  $id = $row['Aid'];
  
}

$Aid= $_POST['Aid'];
$Apass = $_POST['Apass'];



$sql = "UPDATE admin SET Aid ='$Aid', Apass = '$Apass'  ";
$query = $link->query($sql) or die($link->error);
?>