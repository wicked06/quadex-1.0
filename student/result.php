<?php
session_start();
?>
<?php
include("connection.php");
$date=date("Y-m-d H:i:s");
$_SESSION["end_time"]=date("Y-m-d H:i:s", strtotime($date."+ $_SESSION[exam_time] minutes"));
include("result_header.php");
?>

<!-- content Area -->
    <center>
    <div class="container" >

<div class="col-lg-6 col-lg-push-3" style="min-height: 200px; background-color: white;">
<?php
$correct=0;
$wrong=0;
if (isset($_SESSION["answer"])) {
    for ($i=1; $i<=sizeof($_SESSION["answer"]);$i++) 
    { 
        $answer="";
        $res=mysqli_query($link,"SELECT * FROM questions WHERE category='$_SESSION[exam_category]' && questions_no=$i");
        while($row=mysqli_fetch_array($res))
        {
            $answer=$row["answer"];
        }
        if(isset($_SESSION["answer"][$i]))
        {
            if($answer==$_SESSION["answer"][$i])
            {
                $correct=$correct+1;
            }else{
                $wrong=$wrong+1;
            }
        }else{
            $wrong=$wrong+1;
        }
    }
}
$count=0;
$res=mysqli_query($link,"SELECT * FROM exam WHERE category='$_SESSION[exam_category]'");
$count=mysqli_num_rows($res);
$wrong=$count-$correct;

?>
<table class="table " style="margin:50px;">
    <tr>
        <th>Echo Total Questions</th>
        <td> <?php echo $count;?></td>
    </tr>
    <tr>
        <th>Correct Answer</th>
        <td> <?php echo $correct;?></td>
    </tr>
    <tr>
        <th>Wrong Answer</th>
        <td> <?php echo $wrong;?></td>
    </tr>
        <tr>
        <td>                
                <center>
                        
                    <a href="logout.php" type="button" class="btn btn-success"><i class="fa-solid fa-envelope" style="margin-right:10px;"></i> Send Results</a>
                </center>
</td>
        </tr>
</table>
</div>

</div>
    </center>
<?php
if (isset($_SESSION["exam_start"])) {
    $date=date("d-m-Y");
    mysqli_query($link,"INSERT INTO results(id,name,category,total_questions,correct_answer,wrong_answer,date) VALUES(NULL,'$_SESSION[name]','$_SESSION[exam_category]','$count','$correct','$wrong','$date')")or die(mysqli_error($link));
}
if (isset($_SESSION["exam_start"])) {
   unset($_SESSION["exam_start"]);
   ?>
   <script type="text/javascript">
        window.location.href=window.location.href;
   </script>
   <?php
}


if ($correct) {
    
}
?>



<?php-
include("footer.php");
?>