<?php session_start();
if (!isset($_SESSION["code"])) {
    ?>
    <!-- <script type="text/javascript">
        window.location="index.php";
    </script> -->
<?php
}
include "../connection.php";

$exam_category='';
$res=mysqli_query($link,"SELECT * FROM exam_category");
while($row=mysqli_fetch_array($res))
{
    $exam_category=$row["category"];
}

?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="design/style.css">
</head>
<body style="background-color: #F2DEBA;">

<nav class="header" >
  <div class="container-fluid">
    
  
  

    

    <div class=" content container-fluid text-center">
  <div class="row">
<!-- start -->
    <div class=" col-4" style="margin-top:10px;">
     <div> <h4>Student Name:<?php echo $_SESSION["name"];?></h4></div>
    </div>
<!-- end -->

<!-- start -->
    <div class="col-4" style="margin-top:10px;">
      <div class="">  <center><h4><?php echo $exam_category?></h4></center></div>
    </div>
<!-- end -->
  

  <!-- start -->
  <div class="col-4" style="margin-top:10px;">
      <div class=""><h4 id="countdowntimer" ></h4></div>
    </div>
<!-- end -->
</div>
  </div>


  
</nav>

  



 







  

  </div>


</nav>






<!-- 
<script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script> -->






        <script type="text/javascript">
    setInterval(function(){
        timer();
    },1000);
    
    function timer()
    {
        var xmlhttp= new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
                if(xmlhttp.responseText=="00:00:01")
                {
                    window.location="result.php";
                }
                document.getElementById("countdowntimer").innerHTML=xmlhttp.responseText;
            }

        };
        xmlhttp.open("GET", "forajax/load_timer.php",true);
        xmlhttp.send(null);
    }
</script>