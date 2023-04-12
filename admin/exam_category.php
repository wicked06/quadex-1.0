

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Welcome to QuaDEX</title>

<!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>

<!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css link -->
    <link rel="stylesheet" href="design/exam_category.css">

<!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>
    <?php 
require_once('../connection.php');

  if(isset($_POST["post"]))
  {
      
      $exam_name= $_POST["exam_name"];
      $exam_time= $_POST["exam_time"];
      $res=mysqli_query($link,"SELECT * FROM exam_category WHERE category='$exam_name' ");
      $count=mysqli_num_rows($res);
      if ($count==1) {
  ?>
        <script>
    Swal.fire({
    position: 'center',
    icon: 'warning',
    title: 'Exam has been Already Posted',
    showConfirmButton: false,
    timer: 2000
  })
        </script>
  <?php
      }else{
        $sql = "INSERT INTO exam_category(`category`,`exam_time_in_minutes`) VALUES ('$exam_name','$exam_time')";
        $query = $link->query($sql) or die($link->error); 
      }
  }
?>
    
    
    <!-- Custom styles for this template -->
    <link href="" rel="stylesheet">
  </head>

  <body style="background:#FAECD6;" >

  <nav class="navbar" >
  
  <img src="../img/quadex.png"  height="40" style="margin-left:40px;">
  
  
  
    

  <div class="d-flex justify-content-end ">
      <a href="logout.php" style="margin-right:20px;"><i class="logout fa-solid fa-right-from-bracket"></i></a>
   
     
    </div>
  
</nav>

<?php
$res=mysqli_query($link,"SELECT * FROM exam_category");
while($row=mysqli_fetch_array($res))
{
    $category=$row["category"];
    $time = $row["exam_time_in_minutes"];

}
?>

 
<main class="form w-100 m-auto" >
<div class="container">
<form id="category" method="POST" >

    <div class="d-flex justify-content-center">
      <img class="sac mb-4" src="../img/sac.png" alt="" width="100" height="100" style=" margin-top: 15%">
    </div>
    
    <div class="container text-center ">
    
  <div class="row g-2 justify-content-center">
    <div class="col-4">
      <div class="p-3">
      <select class="form-select" aria-label="Default select example" name="exam_name" id="exam_name">
  <option selected disabled>Select Exam</option>
  <option value="Diagnostic">Diagnostic</option>
  <option value="Qualifying">Qualifying</option>

</select>
      </div>
    </div>
    <div class="col-4">
      <div class="p-3">
      <select class="form-select" aria-label="Default select example" name="exam_time" id="exam_time" required>
  <option selected disabled>Time</option>
  <option value="60">1 hour</option>
  <option value="90">1 hour and 30 mins</option>
  <option value="120">2 hours</option>
</select>
      </div>
      
    </div>
    <div class="col-2">
      <div class="p-3">
      <center><button type="submit" name="post" class="btn btn-success mb-3">Post Exam</button></center>
      </div>
      
      
    </div>
    
  </div>
</div>
  
  
 <div class="container">
 <table class="table  table-bordered" style="background:#f5e0c0; border:#760a04;">
  <thead >
    <tr style="background:#760a04; color:#f5e0c0;" class="text-center">
      <th>Exam Name</th>
      <th >Exam Time(Minutes)</th>
      <th colspan="2"></th>
    </tr>
  </thead>
  <tbody>
<?php
    $count=0;
    $res = mysqli_query($link,"SELECT * FROM exam_category");
    while($row = mysqli_fetch_array($res)){
?>
        <tr>
           
            <td><center><?php echo $row["category"];?></center></td>
            <td><center><?php echo $row["exam_time_in_minutes"];?>  Minutes</center></td>
            <td>
            <div class="d-flex justify-content-center">
            <a href="student_account.php?id=<?php echo $row["id"];?>" type="button" style="margin-right:20px;" class=" btn btn-success"><i class="fa-solid fa-eye"></i></a> 
            <button type="button" style="margin-right:20px;" class="update btn btn-warning " id="<?= $row['id']?>"><i class="fa-solid fa-pen-to-square"></i></button>
            <button type="button" class="del_category btn btn-danger" id=<?=$row['id']?>><i class="fa-solid fa-file-circle-xmark"></i></button>
            </div>
              
            </td>  
        </tr>

<?php
    }
?>
       
       </form>
    </tbody>
</table>
 </div>
</div>

<div id="display_category"></div>



</main>


<script>
    $(document).ready(function(){

      //edit
      $(document).on('click','.update',function(){
        var id = $(this).attr('id');
       
        $("#display_category").html('');
        // alert(id);
        $.ajax({
          url: 'view_category.php',
          type:'POST',
          cache: false,
          data: {id:id},
          success:function(data){
            $("#display_category").html(data);
            $("#update_category_modal").modal('show');
          }
        })
      });
   
        //delete category
        $(document).on('click','.del_category',function(){
            var id = $(this).attr('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "The Examination will be removed",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'handler/delete_category.php',
                    type: 'POST',
                    data: {id:id},
                    success:function(data){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Exam has been Removed',
                            showConfirmButton: false,
                            timer: 2000
                        }).then(()=>{
                            window.location.reload();
                        })
                    }
                })
            }
            })
        })



//end of document 
    });
</script>
  </body>
</html>
