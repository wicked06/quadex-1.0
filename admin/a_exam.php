<?php
include "include/header.php";
include "../connection.php";

$id=$_GET["id"];
$exam_category='';
$res=mysqli_query($link,"SELECT * FROM exam_category WHERE id=$id");
while($row=mysqli_fetch_array($res))
{
    $exam_category= $row["category"];
}
?>
<div class="text-center">
    <h1><?php echo $exam_category ?></h1>
</div>
<div class="container">
    <table class="table table-striped">
        <tr>
            <th>Question</th>
            <th>Option 1</th>
            <th>Option 2</th>
            <th>Option 3</th>
            <th>Option 4</th>
            <th>Answer</th>
            <th>Exam</th>
            <th>Date</th>
            <th></th>
        </tr>

        





    <?php
        
        $res = mysqli_query($link,"SELECT * FROM a_exam WHERE category = '$exam_category'");
        while($row = mysqli_fetch_array($res)){
    ?>
        <tr>
            
            <td><?php echo $row["question"];?></td>
            <td><?php echo $row["opt1"];?></td>
            <td><?php echo $row["opt2"];?></td>
            <td><?php echo $row["opt3"];?></td>
            <td><?php echo $row["opt4"];?></td>
            <td><?php echo $row["answer"];?></td>
            <td><?php echo $row["category"];?></td>
            <td><?php echo $row["date"];?></td>
            <td><button class="btn btn-success">Retrieve Questions</button></td>
        </tr>
    <?php
        }
    ?>

    </table>
</div>


<?php
include "include/footer.php";
?>