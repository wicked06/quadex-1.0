<?php
require "../connection.php";
include "include/header.php";
?>
<!-- Content -->
<?php
    
    $id=$_GET["id"];
    $exam_category='';
    $res=mysqli_query($link,"SELECT * FROM exam_category WHERE id=$id");
    while($row=mysqli_fetch_array($res))
    {
        $exam_category=$row["category"];
    }
?>


<div class="text-center">
<h1 class="title fw-bold " style="color:#630000;"><?php echo $exam_category ?>  Exam Results</h1>
</div>

<div class="container-fluid ">
  <div class="row ">
    <div class="col-4">
     <div class="container">
     <img src="../img/results.svg" alt="" style="margin-top: 30%;">
     </div>
    </div>
    <div class="col-8">
        <div class="container">
        <div class="d-flex justify-content-end" style="margin-bottom: 20px;">
   
   <a href="p_result.php?id=<?php echo $id ?>" style="margin-right:20px;" class=" btn btn-dark"><i class="fa-solid fa-print"></i></a>

   <button type="button" name="archive" class="archive btn btn-warning">
       <i class="fa-solid fa-box-archive"></i>
   </button>

   </div>

       <?php
       $count=0;
       $res=mysqli_query($link,"SELECT * FROM a_results WHERE category = '$exam_category'");
       // WHERE name='$_SESSION[name]' ORDER by id desc
       $count=mysqli_num_rows($res);



       if ($count==0) 
       {
           ?>
           <div class="text-center">
               <h1 style="margin-top:10px;">No Results Available</h1>
           </div>
           <?php
       }else {
           ?>
           <div style=" background:#E8EEF1; padding:10px; border-radius:5px;">
           <table class="table table-bordered table-striped table-hovered table-light" id="results" style="margin-top:10px;">
                   <thead>
                      <tr>
                         <th>Name</th>
                         <th>Exam</th>
                         <th>Total Score</th>
                         <th>Correct Answer</th>
                         <th>Mistakes</th>
                         <th>Examinatin Date</th>
                         
                         <th colspan=""></th>
                      </tr>
                   </thead>
                   <tbody>
                      <?php
                          
                           $sql = "SELECT * FROM a_results WHERE category = '$exam_category' ";
                           $res = $link->query($sql) or die($link->error);
                           while($row=$res->fetch_assoc())
                          {
                      ?>
                      <tr>
                         <td>  <?= $row['name']?></td>
                         <td> <?= $row['category']?></td>
                         <td> <?= $row['tota_questions']?></td>
                         <td> <?= $row['corrects_answer']?></td>
                         <td> <?= $row['wrong_asnwer']?></td>
                         <td> <?= $row['date']?></td>
                         
                         
                        
              
                        
                         <td>
                            <div class="d-flex justify-content-center">
                             <button type="button" class="del_result btn btn-danger" id=<?=$row['id']?>><i class=" fa-solid fa-trash"></i></button>
                            </div>
                         </td>
                      </tr>
                      <?php
                          }
                      ?>
                   </tbody>
     </table>
           <?php
       }
          ?>
        </div>
        </div>



    </div>
   
  </div>
</div>
   

<script>
        $(document).ready(function(){
// datatables
      $('#results').DataTable();


// Delete
        $(document).on('click','.del_result ',function(){
            var id = $(this).attr('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "The Result will be deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm Delete'
            }).then((result) => {
            if (result.isConfirmed) {
      
              $.ajax({
                    url: 'handler/delete_result.php',
                    type: 'POST',
                    data: {id:id},
                    success:function(data){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Question has been Deleted',
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


//archive
        $(document).on('click','.archive ',function(){
                    var id = $(this).attr('id');
                    Swal.fire({
                        title: 'Archive Results?',
                        text: "The Result will be saved to archive",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Confirm!'
                    }).then((result) => {
                    if (result.isConfirmed) {
            
                    $.ajax({
                            url: 'handler/delete_result.php',
                            type: 'POST',
                            data: {id:id},
                            success:function(data){
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Question has been Deleted',
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
//
    })
</script>

    <?php
    include "include/footer.php";
    ?>