<?php
include_once 'connection.php';

if(isset($_REQUEST['id'])){
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM exam_category WHERE id = '$id'";
    $query = $link->query($sql) or die ($link->error);

    $row = $query->fetch_assoc();
    $category = $row['category'];
    $time = $row['exam_time_in_minutes'];
}
?>

<div class="modal fade" id="update_category_modal">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Exam Category</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
            <div class="modal-body">
<form method="POST" id="edit_category">
                <div class="row">
                    <div class="col-sm-12 mb-4">
                            <input type="hidden" name="exam_id" value="<?= $id?>">
                        <div class="form-group">
                                <label> Select Exam</label>

                                <select class="form-select" name="exam_name" id="exam_name">
                                <option value="Diagnostic">Diagnostic</option>
                                <option value="Qualifying">Qualifying</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-sm-12 mb-4">
                        <div class="form-group">
                            <label> Select Time</label>
                                <select class="form-select"  name="exam_time" id="exam_time" >
                                
                                <option value="60">1 hour</option>
                                <option value="90">1 hour and 30 mins</option>
                                <option value="120">2 hours</option>
                                </select>
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
        $("#edit_category").submit(function(e){
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
    url: 'handler/edit_category.php',
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
