<?php
session_start();
require_once "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-sweetalert/1.1.2/SweetAlert.min.js" integrity="sha512-msqkOPPpSZ4NGao7CW5ZnrOG9+Y32vM5sjqZET4Ch0enXSyQesyrRbg+DG1OUTyLH87/qR3CbtPeCaizDvY6Ww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/index.css">


    <script src="js\sweetalert\jquery-3.6.1.min.js"></script>
    <script src="js\sweetalert\sweetalert2.all.min.js"></script>
    
</head>
<body>
<img src="img/wave.png" class="wave">
  <div class="container">
      <div class="img">
            <img src="img/admin_login.svg">
      </div>
      <div class="login-content">
          <form method="POST">
              <img src="img/sac.png">
              <h2 class="title">Admin</h2>
              <!-- <a href="index.php"><i class="fa-solid fa-house"></i></a> -->

              
                  <div class="input-div one focus">
                      <div class="i">
                          <i class="fas fa-user"></i>
                      </div>
                      <div class="div">
                          <h5>Username</h5>
                          <input type="text" class="form-control" name="Aid" >
                      </div>
                  </div>

                <div class="input-div pass focus">
                      <div class="i">
                          <i class="fas fa-lock"></i>
                      </div>
                      <div class="div">
                          <h5>Password</h5>
                          <input type="password" class="form-control" name="Apass">
                      </div>
                  </div>
                  <a href="admin/change_pass.php">Forget Password?</a>
                  <input type="submit" class="btn" value="Login" name="login">
          </form>
      </div>
  </div>
  <?php
if(isset($_POST["login"]))
{
    $count=0;
    $Aid=mysqli_real_escape_string($link,$_POST["Aid"]);
    $Apass=mysqli_real_escape_string($link,$_POST["Apass"]);
    $res=mysqli_query($link,"SELECT * FROM admin WHERE Aid='$Aid' && Apass='$Apass'");
    $count=mysqli_num_rows($res);
    if ($count==0) {
?>
      <script>
  Swal.fire({
  position: 'center',
  icon: 'warning',
  title: 'Account is not registered',
  showConfirmButton: false,
  timer: 2000
})
      </script>
<?php
    }else{
        echo "<script> window.location='admin/exam_category.php'</script>";
    }
}?>
  <!-- <script type="text/javascript" src="main.js"></script> -->
</body>
</html>