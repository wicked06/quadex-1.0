<?php
require_once "connection.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/index.css">
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
<?php
if(isset($_POST["login"]))
{
    $count=0;
    $name=mysqli_real_escape_string($link,$_POST["name"]);
    $password=mysqli_real_escape_string($link,$_POST["password"]);
    $res=mysqli_query($link,"SELECT * FROM student WHERE password='$password' && name='$name'");
    $count=mysqli_num_rows($res);

    $res=mysqli_query($link,"SELECT * FROM student WHERE password='$password' && name='$name'");
    while($row=mysqli_fetch_array($res))
    {
        $id=$row["id"];
    }
    if ($count==0) {
        ?>
        <script>
            Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'Please Check Your Full Name and Examination Code',
            showConfirmButton: false,
            timer: 1500
            })
        </script>

        <?php

    }else{
        ?>
        <script>
        window.location='student/select_exam.php'
        </script>

        <?php
        $_SESSION["passoword"]=$_POST["password"];
        $_SESSION["name"]=$_POST["name"];
    }
}



?>  
</head>
<body>
<img src="img/wave.png" class="wave">
  <div class="container">
      <div class="img">
            <img src="img/index.svg">
      </div>
      <div class="login-content">
          <form method="POST">
              <img src="img/sac.png">
              <h2 class="title">Welcome To Quadex</h2>
              
                  <div class="input-div one focus">
                      <div class="i">
                          <i class="fas fa-user"></i>
                      </div>
                      <div class="div">
                          <h5>Students Full Name</h5>
                          <input type="text" class="form-control" name="name" placeholder="">
                      </div>
                  </div>

                <div class="input-div pass focus">
                      <div class="i">
                          <i class="fas fa-lock"></i>
                      </div>
                    <div class="div">
                          <h5>Examination Code</h5>
                          <input type="password" class="form-control" name="password" placeholder="">
                    </div>
                  </div>
                  <!-- <a href="admin_login.php">Admin</a> -->
                  <input type="submit" class="btn" value="Start Exam" name="login">
          </form>

      </div>
  </div>
  
  <!-- <script type="text/javascript" src="main.js"></script> -->
</body>
</html>