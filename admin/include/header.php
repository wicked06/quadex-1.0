<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to QUADEX</title>
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
<!--Datatables-->
    <link type="text/css" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css"/>
    

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" /> 
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
</head> 
<body style="background-color: #F2DEBA;">
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
  <nav class="top navbar navbar-expand-lg" >
    <div class="container-fluid">

      <!-- off canvas trigger -->
      <button class="btn btn-light"  type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        <i class="fa-solid fa-bars"></i>
      </button>  

      <img src="../img/quadex.png" class="offcanvas-title" id="offcanvasExampleLabel" style="height: 40px; margin-left:20px;">
      <!-- off canvas trigger -->
      
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
        <span class="navbar-toggler-icon" style ="color:#F2DEBA;"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
       
    
          
        
      </div>
    </div>
  </nav>
  <!-- end of navbar -->

  <!-- offcanvas -->
  
  
  <div class="offcanvas offcanvas-start sidebar-nav " tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
      <!-- <h5 class="offcanvas-title" id="offcanvasExampleLabel">QUADEX</h5> -->
      <div class="d-flex align-items-center">
          <img src="../img/quadex.png" class="offcanvas-title" id="offcanvasExampleLabel" style="height:64px; ">
      </div>
      
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
   <!-- inside navbar 1 -->
   <nav class="navbar-dark">
    <ul class="navbar-nav">
      <li class="">
        <div class="text-light small fw-bold  text-uppercase px-3">
           Admin
        </div>
      </li>
      <!-- <li class="mt-3">
        <a href="dashboard.php?id=<?php echo $id;?>" class="nav-link px-3 ">
          <span><i class="fa-solid fa-chart-simple" style="margin-right:20px;"></i>Dashboards</span>
        </a>
      </li> -->
      <li class="mt-3">
        <a href="custom_email.php?id=<?php echo $id;?>" class="nav-link px-3 ">
          <span class="me-2"><i class="inside fa-solid fa-envelope" style="margin-right:20px;"></i>Send Email</span>
        </a>
      </li>
    
      <li class="my-4"> <hr></li>
    

      <div class="text-light small fw-bold  text-uppercase px-3">
        Examination  Category
     </div>
   </li>
   <li>
     <a href="exam.php?id=<?php echo $id;?>" class="nav-link px-3 ">
       <span class="me-2"><i class="fa-solid fa-file-circle-plus" style="margin-right:20px;"></i>Exams</span>
     </a>
   </li>

   <li>
    <a href="student_account.php?id=<?php echo $id;?>" class="nav-link px-3">
      <span class="me-2"><i class="fa-solid fa-user" style="margin-right:20px;"></i>Student Accounts</span>
    </a>
  </li>
  <li>
    <a href="result.php?id=<?php echo $id;?>" class="nav-link px-3">
      <span class="me-2" ><i class=" fa-solid fa-square-poll-horizontal" style="margin-right:20px;"></i>Student Results</span>
    </a>
  </li>

  <li class="my-4"> <hr></li>
  <li>
    <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
      <span><i class="fa-solid fa-box-archive" style="margin-right: 20px;"></i></span><span>Archived Data</span> <span class="right-icon ms-auto"><i class="fa-solid fa-caret-down"></i></span>
    </a>
    <div class="collapse" id="collapseExample">
      <div class="card card-body bg-dark">
        <ul class="navbar-nav ">
          <li>
            <a href="a_exam.php?id=<?php echo $id;?>" class="nav-link">
              <span><i class="fa-solid fa-file-circle-question" style="margin-right: 20px; margin-left: 40px;"></i></span>
              <span>Questions</span>
            </a>
          </li>
          <li>
            <a href="a_results.php?id=<?php echo $id;?>" class="nav-link">
              <span><i class="fa-solid fa-file-circle-question" style="margin-right: 20px; margin-left: 40px;"></i></span>
              <span>Results</span>
            </a>
          </li>
          <li>
            <a href="a_accounts.php?id=<?php echo $id;?>" class="nav-link">
              <span><i class="fa-solid fa-file-circle-question" style="margin-right: 20px; margin-left: 40px;"></i></span>
              <span>Student Accounts</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </li>
    </ul>


    <li class="my-4 nav-link"> <hr></li>
    

    <div class="text-light small fw-bold  text-uppercase px-3 " style="margin-bttom:20px;">
     Account Settings
   </div>
 </li>
<ul class="navbar-nav">
  
<li class="nav-link">
          <a class="nav-link" href="update_admin.php?id=<?php echo $id;?>">
          <span><i class="fa-solid fa-user" style="margin-right: 20px;   margin-left: 20px;"></i></i></span>
          <span>Update Admin Account</span>
          </a>
          </li>
              

              <li class="nav-link">
                <a class="nav-link" href="logout.php">
              <span><i class="fa-sharp fa-solid fa-right-from-bracket" style="margin-left: 20px; "></i></span>
              <span>Logout</span>
              </a></li>
</ul>

      
   </nav>
   <!-- inside navbar 1 end -->
    </div>
  </div>  
  <!-- end of offcanvas -->
  <main class="mt-5 pt-3 justify-content-center" >