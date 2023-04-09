

<?php
include("connection.php");
include("header.php");
?>


<!-- content Area -->


<div class="container mt-5">
    <center><img src="../img/sac.png" alt=""></center>
  
</div>
  

<div class="content container-fluid text-center" style="margin-top:5%;">
  <div class="row ">
<!-- start of section 1 -->
    <div class="col">
    <div class="container-fluid">
    <h1 class="fw-bold m-3">Important Things to Remember</h5>
    <ul>
        <li><h6 class="m-3">After Clicking the Examination type  the timer will start</h6></li>
        <li>  <h6 class="m-3">Select the Examination that you required to take</h6></li>
        <li>  <h6 class="m-3">Take the exam seriously</h6></li>
        <li>  <h6 class="m-3">Avoid Cheating</h6></li>
    </ul>
    
  
</div>
<!-- end of section1  -->
<div class="container-fluid ">
<h1 class="fw-bold ">Instructions</h2>  
<ul>
<li>  <h6 class="mb-3">Click the circle when selecting your answer</h6></li>
<li>  <h6 class="mb-3">After selecting your answer click next to proceed to the next answer</h6></li>
<li>  <h6 class="mb-3">Click previous to go back to the last question</h6></li>
</ul>

</div>
    </div>
<!-- section 2 -->
    <div class="col">
    <h3 >Select Examination To Start</h3>
    <div class="text-center" style="margin-top:10%;">

</div>




<?php
$res=mysqli_query($link,"SELECT * FROM exam_category");
$count=mysqli_num_rows($res);
while ($row=mysqli_fetch_array($res)){
if($count=2){
    
        ?>
                <center><input type="button" class="btn btn-danger form-control" value="<?php echo $row["category"];?>" onclick="set_exam_type_session(this.value);" style="margin-top:30px; width:100px;"></center>

        <?php
    
    


}
else
{

    ?>
    
    <center><input type="button" class="btn btn-danger form-control" value="Start Exam" onclick="set_exam_type_session(this.value);" style="margin-top:30px; width:100px;"></center>
    <?php
    }
}
?>
</div>
    </div>
<!-- end of section 2 -->
  </div>
</div>
        


</div>

      



<?php
include("footer.php");
?>
<script type="text/javascript">
    function set_exam_type_session(exam_category) 
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if(xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                window.location="dashboard.php";
            }
        };
        xmlhttp.open("GET", "forajax/set_exam_type_session.php?exam_category="+ exam_category,true);
        xmlhttp.send(null);

    }
</script>