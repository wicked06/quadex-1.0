<?php
include '../connection.php';

$exam_name = $_POST['exam_name'];
$time = $_POST['exam_time'];
$id1 = $_POST['exam_id'];

$sql = "UPDATE exam_category SET category='$exam_name', exam_time_in_minutes = '$time' WHERE id = $id1  ";
$query = $link->query($sql) or die($link->error);
?>