<?php
include "include/header.php";
include "connection.php";

?>
<center> <h3 class="fw-bold">  <?php echo $exam_category ?> Accounts</h3></center>
<div class="container">
<div class="d-flex justify-content-end">
    <button type="button" style="margin-right:20px;" class="btn btn-success icon" data-bs-toggle="modal" data-bs-target="#add">
      <i class=" fa-solid fa-user-plus"></i>
    </button>
    <button type="button" style="margin-right:20px;" class="icon btn btn-warning" data-bs-toggle="modal" data-bs-target="#archive">
      <i class="fa-solid fa-box-archive"></i>
    </button>
    <a href="print_accounts.php?id=<?php echo $id ?>" class="btn btn-dark">
      <i class="fa-solid fa-print"></i>
    </a>
   
      
   



<div class="modal fade" id="archive" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Warning!</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form method="POST">
        <h3>Are you sure you want to save all data to the archive!</h3>
      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-warning" name="archive"><i class="icon fa-solid fa-box-archive"></i>Confirm </button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end -->

<!-- Modal add account-->
<div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="#" method="POST">
      <div class="form-floating">
        <input type="email" class="form-control mb-3" id="floatingInput" name="email" placeholder="StudentEmail@sac.edu.ph">
        <label for="floatingInput">Enter Student Email</label>
      </div>
      <div class="form-floating">
      <input type="text" class="form-control mb-3" id="floatingInput" name="name"placeholder="Student Name">
      <label for="floatingInput">Enter Student Name</label>
    </div>
    <div class="form-floating ">
      <input type="text" class="form-control mb-3" id="floatingInput" name="lrn" placeholder="Enter Student LRN">
      <label for="floatingInput">Enter Student LRN</label>
    </div>
    <div class="form-floating ">
      <input type="text" class="form-control mb-3" id="floatingInput" name="password" placeholder="Enter Generated Code">
      <label for="floatingInput">Enter Generated Code</label>
    </div>
        
      </div>
      <div class="modal-footer">
        
        <button type="submit" name="student" class="btn btn-success"><i class="fa-solid fa-user-plus mb"></i> Add Student</button>
      </div>
        </form>
    </div>
  </div>
</div>

  
 
    <form class=""   method="POST" >  
    <div class="container px-4 text-center">
  <div class="row ">
        <div class="col-9">
        <input class="form-control"type="text" name="result" value="<?php echo(@$result);?>" disabled placeholder="Copy Generated Code"></div>
        
    <div class="col">
          <button class="form-control btn btn-outline-success" type="submit" name="gen" value="Generate" class="generate btn-warning" ><i class="fa-sharp fa-solid fa-lock"></i></button>        
    </div>
  </div>
</div>
 </form>
</div>


</div>
</div>
</div>


<div class="container">

<table class="table table-bordered table-striped table-hovered table-light" id="student_data">
                    <thead>
                       <tr>
                          <th scope="col">Email</th>
                          <th scope="col">Name</th>
                          <th scope="col">LRN</th>
                          <th scope="col">Password</th>
                          <th scope="col">Action</th>
                       </tr>
                    </thead>
                    <tbody>
                       <?php
                            $conn = new mysqli('localhost','root','','quadex');
                            $sql = "SELECT * FROM student WHERE category = '$exam_category'";
                            $res = $conn->query($sql) or die($conn->error);
                            while($row=$res->fetch_assoc())
                           {
                       ?>
                       <tr>
                          <td>  <?= $row['email']?></td>
                          <td> <?= $row['name']?></td>
                          <td> <?= $row['lrn']?></td>
                          <td> <?= $row['password']?></td>

                         
               
                         
                          <td>
                             <div class="d-flex justify-content-center">
                             <button type="button" class="icon btn btn-warning update_user" style="margin-right:20px;" id= "<?= $row['id'] ?>" ><i class="fa-solid fa-pen-to-square"></i></button>
                              <button type="button" class="del_code btn btn-danger" id=<?=$row['id']?>><i class=" fa-solid fa-trash"></i></button>
                             </div>
                          </td>
                       </tr>
                       <?php
                           }
                       ?>
                    </tbody>
                 </table>

</div>

<?php
// add student
if(isset($_POST["student"]))
{

    
    $email= $_POST["email"];
    $name= $_POST["name"];
    $lrn= $_POST["lrn"];
    $password= $_POST["password"];
    $res=mysqli_query($link,"SELECT * FROM student WHERE name='$name'");
    $count=mysqli_num_rows($res);
    if ($count == 1) {
?>
      <script>
  Swal.fire({
  position: 'center',
  icon: 'warning',
  title: 'Student already existed',
  showConfirmButton: false,
  timer: 2000
})
      </script>
<?php
    }else{
      $sql = "INSERT INTO student(email,name,lrn,password,category)VALUES('$email','$name','$lrn','$password','$exam_category')";
      $query = $link->query($sql) or die($link->error); 
    }
}


if (isset($_POST['gen'])) {
  $result='';
if (isset($_POST['chkone'])) {
  PassGenerator(6);

}elseif (isset($_POST['chktwo'])) {
 PassGenerator(10);
}elseif (isset($_POST['chkthree'])){
  PassGenerator(12);
}else{
  PassGenerator(8);
}


}
function PassGenerator($lenght)
{
  global $result;
  $_ValidChar='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
  while (0 <$lenght--) {
      $result.=$_ValidChar[random_int(0,strlen($_ValidChar)-1)];
  }
}


if (isset($_POST['archive'])) {
  date_default_timezone_set("Etc/GMT+8");
$query = mysqli_query($link, "SELECT * FROM students WHERE category='$exam_category'");
$date = date("Y-m-d");
while($fetch = mysqli_fetch_array($query)){
    mysqli_query($link, "INSERT INTO archive_code VALUES( '','$fetch[email]','$fetch[name]','$fetch[lrn]','$fetch[code]','$date','$fetch[category]')")or die(mysqli_error($link));
    mysqli_query($link, "DELETE FROM students WHERE category = '$fetch[category]'") or die(mysqli_error($conn));	
}
}
?>
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>

<div id="display_user"></div>

<script>
    $(document).ready(function(){
//datatables
      $('#student_data').DataTable();
// Delete
        $(document).on('click','.del_code',function(e){
            var id = $(this).attr('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "The account will be Deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'view_user.php',
                    type: 'POST',
                    data: {id:id},
                    success:function(data){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'code has been Deleted',
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

    

      // edit user
      $(document).on('click','.update_user',function(){
        var id = $(this).attr('id');
       
        $("#display_user").html('');
        // alert(id);
        $.ajax({
          url: 'view_user.php',
          type:'POST',
          cache: false,
          data: {id:id},
          success:function(data){
            $("#display_user").html(data);
            $("#update_user_modal").modal('show');
          }
        })
      });
   
    }); 
</script>

<?php  include "include/footer.php";?>
