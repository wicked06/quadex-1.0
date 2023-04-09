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
      <th scope="col">Name</th>
      <th scope="col">Exam_Category</th>
      <th scope="col">Total Question</th>
      <th scope="col">Correct Answer</th>
      <th scope="col">Wrong Answer</th>
      <th scope="col">Exam Date</th>
      <th scope="col">Archive Date</th>
      <th colspan=2></th>
      
</tr>

  


 




    <?php
    
    $res = mysqli_query($link,"SELECT * FROM a_result WHERE category = '$exam_category'");
    while($row = mysqli_fetch_array($res)){
?>
        
    
        
<tr>
    <td><?php echo $row["name"];?></td>
    <td><?php echo $row["category"];?></td>
    <td><?php echo $row["total_question"];?></td>
    <td><?php echo $row["correct_answer"];?></td>
    <td><?php echo $row["wrong_answer"];?></td>
    <!-- <td><?php echo $row["exam_time"];?></td> -->
    <td><?php echo $row["date"];?></td>
    <td><button class= "btn btn-success">Retrieve Questions</button></td>
</tr>
        
        

            
<?php
    }
?>
</table>
    </div>

<?php
    include "include/footer.php";
?>