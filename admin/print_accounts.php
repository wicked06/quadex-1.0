<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Accounts</title>
    <!-- bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    
<!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <!-- css link    -->
    <link rel="stylesheet" href="design/admin.css">
<!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- ckeditor -->
    <script src="https://cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
<!-- sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="design/print.css">  
</head>
<body>
    
<?php
include "connection.php";

$id=$_GET["id"];
$exam_category='';
$res=mysqli_query($link,"SELECT * FROM exam_category WHERE id=$id");
while($row=mysqli_fetch_array($res))
{
    $exam_category=$row["category"];
}
?>

<table class="table table-bordered text-center">
  <thead>
    <tr style="background:#760a04; color:#f5e0c0;">
      <th scope="col">Email</th>
      <th scope="col">Name</th>
      <th scope="col">LRN</th>
      <th scope="col">Password</th>
      <th scope="col">Category</th>
     
    </tr>
  </thead>
  <tbody>
  <?php
             $res=mysqli_query($link,"SELECT * FROM student WHERE category='$exam_category' ORDER BY id asc");
             while($row=mysqli_fetch_array($res))
             {
            ?>
    <tr style="background:#fff; color:#333">
      
      <td>  <?= $row['email']?></td>
      <td> <?= $row['name']?></td>
      <td> <?= $row['lrn']?></td>
      <td> <?= $row['password']?></td>
      <td> <?= $row['category']?></td>
     
    </tr>
 
    <?php
           }
           ?>
  </tbody>
</table>


<div class="d-flex justify-content-end">
    <button onclick="window.print();" class="icon btn btn-outline-primary" id="print-btn"><i class="fa-solid fa-print"></i></button>
    <a href="student_account.php?id=<?php echo $id ?>" class="btn btn-outline-success" id="print-btn" style="margin-right: 20px;"><i class="fa-solid fa-house"></i></a>
</div>
        



</body>
</html>