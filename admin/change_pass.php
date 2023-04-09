<?php

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
    <link rel="stylesheet" href="../css/index.css">


    <script src="js\sweetalert\jquery-3.6.1.min.js"></script>
    <script src="js\sweetalert\sweetalert2.all.min.js"></script>
    
</head>
<body>
<img src="../img/wave.png" class="wave">
  <div class="container">
      <div class="img">
            <img src="../img/email.svg">
      </div>
      <div class="login-content">
            <?php
                if (isset($_SESSION['alert'])) {
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Alert!</strong> <?php echo $_SESSION['alert'];?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                unset($_SESSION['alert']);
                }
            ?>
          <form action="resetPasswordCode.php" method="POST">
              <!-- <img src="../img/sac.png"> -->
              <a href="../admin_login.php"><i class="fa-solid fa-house"></i></a>

              <h3>Change password</h3>
              
                

                <div class="input-div pass">
                      <div class="i">
                          <i class="fas fa-envelope"></i>
                      </div>
                      <div class="div">
                          <h5>Enter Your Email</h5>
                          <input type="email" name="email" class="form-control" >
                      </div>
                  </div>
                  <input type="submit" class="btn" name="sendbtn" value="Send email">
          </form>
      </div>
  </div>
  <script type="text/javascript" src="main.js"></script>
</body>
</html>