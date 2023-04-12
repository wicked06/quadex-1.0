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
  <div class="text-center" >
      <h1>Diagnostic Archived Accounts <?php echo $exam_category?></h1>
  </div>

<div class="container" style=" background:#E8EEF1; padding:20px; border-radius:5px;">
  <table class="table table-light table-striped" id="accounts">
      <thead>
      <tr>
      <th >Name</th>
      <th >Email</th>
      <th >LRN</th>
      <th >Password</th>
      <th >Category</th>
      <th >Date</th>
      <th>Action</th>
  </tr>
      </thead>

  <?php
      
      $res = mysqli_query($link,"SELECT * FROM a_accounts WHERE category = '$exam_category'");
      while($row = mysqli_fetch_array($res)){
  ?>
          
      <tbody>
          <tr>
          <td><?php echo $row["name"];?></td>
          <td><?php echo $row["email"];?></td>
          <td><?php echo $row["lrn"];?></td>
          <td><?php echo $row["password"];?></td>
          <td><?php echo $row["category"];?></td>
          <td><?php echo $row["date"];?></td>
          <td><button class="btn btn-success" id="<?= $row['id']?>"> Retrieve Account</button></td>
        </tr>
      </tbody>
        
    

              
  <?php
      }
  ?>
  </table>
  
</div>




        
<script>
    $('#accounts').DataTable();
</script>



<?php
include "include/footer.php";
?>