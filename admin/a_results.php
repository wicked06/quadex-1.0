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
    <div class="container" style=" background:#E8EEF1; padding:20px; border-radius:5px;">
    <table class="table table-striped table-light" id="results">
    <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Exam_Category</th>
                <th scope="col">Total Question</th>
                <th scope="col">Correct Answer</th>
                <th scope="col">Wrong Answer</th>
                
                <th scope="col">Archive Date</th>
                <th colspan=></th>
                
            </tr>
    </thead>

  


 




    <?php
    
    $res = mysqli_query($link,"SELECT * FROM a_results WHERE category = '$exam_category'");
    while($row = mysqli_fetch_array($res)){
?>
        
    
            
    <tbody>
            <tr>
                <td><?php echo $row["name"];?></td>
                <td><?php echo $row["category"];?></td>
                <td><?php echo $row["tota_questions"];?></td>
                <td><?php echo $row["corrects_answer"];?></td>
                <td><?php echo $row["wrong_asnwer"];?></td>
                
                <td><?php echo $row["date"];?></td>
                <td><button class= " archive btn btn-success">Retrieve Questions</button></td>
            </tr>
    </tbody>
        
        

            
<?php
    }
?>
</table>
    </div>
    
    </div>

    <script>
        $('#results').DataTable();
    </script>

<?php
    include "include/footer.php";
?>