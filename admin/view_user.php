<?php
    include_once 'connection.php';

    if(isset($_REQUEST['id'])){
        $id1 = $_REQUEST['id'];

        $sql = "SELECT * FROM student WHERE id = '$id1'";
        $query = $link->query($sql) or die ($link->error);

        $row = $query->fetch_assoc();
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $lrn = $row['lrn'];
        $password = $row['password'];
    }
   
    
    
?>

<div class="modal fade" id="update_user_modal">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit User Information</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
            <div class="modal-body">
<form method="POST" id="edit_user">
                <div class="row">
                    <div class="col-sm-12 mb-4">
                            <input type="hidden" name="user_id" value="<?= $id?>">
                        <div class="form-group">
                                <label> Name</label>
                                <input type="text" class="form-control" name="name" value="<?= $name?>">
                        </div>
                    </div>
                    <div class="col-sm-12 mb-4">
                        <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="<?= $email?>">
                        </div>
                    </div>

                    <div class="col-sm-12 mb-4">
                        <div class="form-group">
                                <label>LRNl</label>
                                <input type="text" class="form-control" name="lrn" value="<?= $lrn?>">
                        </div>
                    </div>

                    <div class="col-sm-12 mb-4">
                        <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password" value="<?= $password?>">
                        </div>
                    </div>

                    
                </div>
                
                <div class="modal-footer">
        <button type="submit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i>Update</button>
      </div>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#edit_user").submit(function(e){
            e.preventDefault();
            Swal.fire({
  title: 'Are you sure?',
  text: "You want to update this exam!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Confirm Update'
}).then((result) => {
  if (result.isConfirmed) {
  $.ajax({
    url: 'handler/edit_user.php',
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
