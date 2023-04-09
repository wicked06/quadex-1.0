<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>    
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="../css/style.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head> 
<body>
    <?php require '../connection.php'; 
      
      $id=$_GET["id"];
       $exam_category='';
       $res=mysqli_query($link,"SELECT * FROM exam_category WHERE id=$id");
       while($row=mysqli_fetch_array($res))
       {
           $exam_category=$row["category"];
       }
    
    ?>


  <!-- navbar -->
  <nav class="navbar navbar-expand-md navbar-dark" >
    <div class="container-fluid">

      <!-- off canvas trigger -->
      <button class="btn btn-light"  type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        <i class="fa-solid fa-bars"></i>
      </button> 
      <!-- off canvas trigger -->
      
      <a class="navbar-brand fw-bold" href="#">QUADEX</a>
      <button class="toggle navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        <form class="d-flexp ms-auto" role="search">
          <div class="input-group ">
            <button class="btn btn-outline-light" type="button" id="button-addon1"><i class="fa-solid fa-magnifying-glass"></i></button>
            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
          </div>
        </form>
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fa-solid fa-gear"></i> 
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="update_admin.php?id=<?php echo $id;?>">Update Account</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- end of navbar -->

  <!-- offcanvas -->

  
  <div class="offcanvas offcanvas-start sidebar-nav " tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasExampleLabel">QUADEX</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
   <!-- inside navbar 1 -->
   <nav class="navbar-dark">
    <ul class="navbar-nav">
      <li class="">
        <div class="text-light small fw-bold  text-uppercase px-3 text-center">
           Admin
        </div>
      </li>
      <li class="mt-3">
        <a href="dashboard.php?id=<?php echo $id;?>" class="nav-link px-3 active ">
          <span class=""><i class="fa-solid fa-chart-simple" ></i>Dashboards</span>
        </a>
      </li>
    
      <li class="my-4"> <hr></li>
    

      <div class="text-light small fw-bold  text-uppercase px-3 text-center">
        Examination  Category
     </div>
   </li>
   <li>
     <a href="exam.php?id=<?php echo $id;?>" class="nav-link px-3 ">
       <span class="me-2"><i class="fa-solid fa-file-circle-plus" ></i>Exams</span>
     </a>
   </li>

   <li>
    <a href="student_account.php?id=<?php echo $id;?>" class="nav-link px-3">
      <span class="me-2"><i class="fa-solid fa-user"></i>Student Accounts</span>
    </a>
  </li>


  <li class="my-4"> <hr></li>
  <li>
    <a class="nav-link px-3 sidebar-link " data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
      <span><i class="fa-solid fa-box-archive" ></i></span><span>Archived Data</span> <span class="right-icon ms-auto"><i class="fa-solid fa-caret-down"></i></span>
    </a>
    <div class="collapse" id="collapseExample">
      <div class="card card-body bg-dark">
        <ul class="navbar-nav ">
          <li>
            <a href="#" class="nav-link">
              <span><i class="fa-solid fa-file-circle-question" ></i></span>
              <span>Questions</span>
            </a>
          </li>
          <li>
            <a href="#" class="nav-link">
              <span><i class="fa-solid fa-file-circle-question" ></i></span>
              <span>Results</span>
            </a>
          </li>
          <li>
            <a href="student-account.php?id=<?php echo $row["id"];?>" class="nav-link">
              <span><i class="fa-solid fa-file-circle-question" ></i></span>
              <span>Student Accounts</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </li>
    </ul>
      
   </nav>
   <!-- inside navbar 1 end -->
    </div>
  </div>  
  <!-- end of offcanvas -->
  <main class="mt-5 pt-3 justify-content-center">

  


<div class="row" >

<div class="col-lg-10 col-lg-push-1" >
<h3>Questions</h3>
<table class="table table-bordered border-warning" >
    <tr >
        <th>Question</th>
        <th>Option1</th>
        <th>>Option2</th>
        <th>Option3</th>
        <th>>Option4</th>
        <th>Answer</th>
        <th>Exam</th>
        <th>date</th>
    </tr>
    <tbody>
    <?php
    
    $res = mysqli_query($link,"SELECT * FROM archive_questions ");
    while($row = mysqli_fetch_array($res)){
?>
        <tr>
            <td><?php echo $row["questions_no"];?></td>
            <td><?php echo $row["question"];?></td>
            <td><?php echo $row["opt1"];?></td>
            <td><?php echo $row["opt2"];?></td>
            <td><?php echo $row["opt3"];?></td>
            <td><?php echo $row["opt4"];?></td>
            <td><?php echo $row["answer"];?></td>
            <td><?php echo $row["category"];?></td>
            <td><?php echo $row["date"];?></td>
<?php
    }
?>
    </tbody>

</table>


</div>
</div>


</main>

</body>
</html>