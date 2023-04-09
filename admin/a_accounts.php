<?php
include "include/header.php";

$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"quadex");

$id=$_GET["id"];
$exam_category='';
$res=mysqli_query($link,"SELECT * FROM exam_category WHERE id=$id");
while($row=mysqli_fetch_array($res))
{
    $exam_category=$row["category"];
}

?>

<div class="container">
  <table class="table table-striped">
  <tr>
      <th >Email</th>
      <th >Name</th>
      <th >LRN</th>
      <th >Password</th>
      <th >Date</th>
      <th >Category</th>
      <th></th>
  </tr>

  <?php
      
      $res = mysqli_query($link,"SELECT * FROM a_accounts WHERE category = '$exam_category'");
      while($row = mysqli_fetch_array($res)){
  ?>
          
    <tr>
      <td><?php echo $row["email"];?></td>
      <td><?php echo $row["name"];?></td>
      <td><?php echo $row["lrn"];?></td>
      <td><?php echo $row["password"];?></td>
      <td><?php echo $row["category"];?></td>
      <td><?php echo $row["date"];?></td>
      <td><button class="btn btn-success" id="<?= $row['id']?>"> Retrieve Account</button></td>
    </tr>
        
    

              
  <?php
      }
  ?>
  </table>
</div>




        




<?php
include "include/footer.php";
?>