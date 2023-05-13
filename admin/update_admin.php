<?php
include "include/header.php";
$id=$_GET["id"];
$exam_category='';
$res=mysqli_query($link,"SELECT * FROM exam_category WHERE id=$id");
while($row=mysqli_fetch_array($res))
{
    $exam_category=$row["category"];
}

$sql = "SELECT * FROM Admin ";
$res = $link->query($sql) or die($link->error);
while($row=$res->fetch_assoc())
{
  $id = $row['Aid'];
  $Aid = $row['Aid'];
  $pass = $row['Apass'];
}

?>

 

  <div class="container-fluid" style="margin-top:2%;">
  <div class="row ">
    <div class="col-7">
     
     <img src="../img/edit.svg" style="margin-left:200px;">
     
    </div>
    <div class="col-3">
      
    <div class="updateadd" style="background:#E8EEF1; padding: 50px; border-radius:10px;">
    <form method="POST" id="update">
              <div class="text-center">
              <img src="../img/sac.png">
              <h2 class="title">Admin</h2>
              
              </div>

              
                  <div class="">
                    
                      <div class="edit-input">
                          <h5 class="editst" style="color:#630000;"><i class="icon fas fa-user"></i>Username</h5>
                          <input type="text" class="form-control" name="Aid" value="<?php  echo $Aid ?>">
                      </div>
                  </div>

                
                      <div class="edit-input">
                          <h5 class="editst" style="color:#630000;"><i class="icon fas fa-lock"></i>Password</h5>
                          <input type="text" class="form-control" name="Apass" value="<?php  echo $pass ?>">
                      </div>
                  
                 
                <div class="d-flex flex-row-reverse">
                <button class="update" style="background: #630000; color:#FAECD6; border-radius:5px; margin-top:20px; width:100px; height:35px; border:none;">Update</button>
                </div>
                 
                  
          </form>
    </div>
            
      </div>
      </div>
    </div>
  </div>
</div>



<script>
  $(document).ready(function(){
        $("#update").submit(function(e){
            e.preventDefault();
            Swal.fire({
  title: 'Are you sure?',
  text: "You want to update your credentials?",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Update'
}).then((result) => {
  if (result.isConfirmed) {
  $.ajax({
    url: 'handler/edit_admin.php',
    type: 'POST',
    cache: false,
    data: $(this).serialize(),
    success: function(data){
Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Update Successfull',
  showConfirmButton: false,
  timer: 1500
}).then(()=>{
    window.location.reload();
})
    }
  })
  }
})
            
        })
    });
</script>
<?php
include "include/footer.php";
?>