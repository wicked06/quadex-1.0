
<?php
include "../connection.php";
include "include/header.php";

    $id=$_GET["id"];
   
    $exam_category='';
    $res=mysqli_query($link,"SELECT * FROM exam_category WHERE id=$id");
    while($row=mysqli_fetch_array($res))
    {
        $exam_category=$row["category"];
    }
?>


<center> <h1 class="fw-bold" style="color:#630000;">  <?php echo $exam_category ?> Examination</h1></center>

<div class="container-fluid">
  <div class="row align-items-start">
    <div class="col-4">
        <div class="container">
            <img src="../img/Exam.svg" width="90%" style="margin-left:20px;">
        </div>
    </div>
    <div class="col-8">
      <!-- Content -->
<!-- buttons -->
<div class="container">
    <div class="d-flex justify-content-end" style="margin-bottom: 20px;">



    <button type="button" class=" btn btn-success" data-bs-toggle="modal" data-bs-target="#add_question" style="margin-right:20px;">
    <i class="fa-solid fa-file-circle-plus"></i>
</button>


    <!-- Full screen modal -->


    <!-- Button trigger modal -->
    
    <button type="button" class="archive  btn btn-warning" data-bs-toggle="modal" data-bs-target="#archive"  style="margin-right:20px;">
    <i class="fa-solid fa-box-archive"></i>
    </button>

    <a href="p_exam.php?id=<?php echo $id ?>" class="btn btn-dark"><i class="fa-solid fa-print"></i></a>

    </div>
</div>



                    

<div class="container">

    <div style=" background:#E8EEF1; padding:20px; border-radius:5px;">
    
  <table class="table table-bordered table-striped table-hovered table-light" id="questions" style="margin-top:10px;">
                    <thead>
                       <tr>
                       <th>Number</th>
                          <th>Questions</th>
                          <th>1st Choice</th>
                          <th>2nd Choice</th>
                          <th>3rd Choice</th>
                          <th>4th Choice</th>
                          <th>Answer</th>
                          <th colspan=""></th>
                       </tr>
                    </thead>
                    <tbody>
                       <?php
                            $sql = "SELECT * FROM exam WHERE category = '$exam_category'";
                            $res = $link->query($sql) or die($link->error);
                            while($row=$res->fetch_assoc())
                           {
                       ?>
                       <tr>
                          <td>  <?= $row['questions_no']?></td>
                          <td> <?= $row['question']?></td>
                          <td> <?= $row['opt1']?></td>
                          <td> <?= $row['opt2']?></td>
                          <td> <?= $row['opt3']?></td>
                          <td> <?= $row['opt4']?></td>
                          <td> <?= $row['answer']?></td>
                          
                         
               
                         
                          <td>
                             <div class="d-flex justify-content-center">
                             <a href="view_questions.php?id=<?php echo $row["id"];?>&id1=<?php echo $id;?>" type="button" class=" btn btn-warning"  style="margin-right:20px;"><i class="fa-solid fa-pen-to-square"></i></a>
                             <!-- <i class="fa-solid fa-pen-to-square"></i> -->
                             <button type="button" class="del_question btn btn-danger" id=<?=$row['id']?>><i class=" fa-solid fa-trash"></i></button>
                             </div>
                          </td>
                       </tr>
                       <?php
                           }
                       ?>
                    </tbody>
      </table>
       
  </div>
    </div>
    </div>
   
  </div>
</div>









<!-- modals -->
<!-- Modal add questions-->
<div class="modal fade" id="add_question" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Updating Question Number 1</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form  method="POST">

  

<div class="container">
<div class="row gy-5">
<div class="col-4">
  <div class="p-3">
      <label class="fw-bold"> Question: <input type="text" value="2x - 2y" class="form-control"></label>
      <input  class="insert form-control" type="file">
      <textarea type="text" name="question" id="" ></textarea>
     
      <label class="fw-bold" style="margin-top:10px;">Option 2: <input type="text" value="2xy" class="form-control"></label>
        <input  class="insert form-control" type="file" >
        <textarea type="text" name="opt2" id=""></textarea>
      
    
    

  </div>
</div>
<!-- end of row 1 -->
<div class="col-4">
  <div class="p-3">
  <label class="fw-bold"> Answer: <input type="text" value="2(x - y)" class="form-control"></label>
      <input   class="insert form-control" type="file" style=" ">
      <textarea type="text" name="answer" id=""></textarea>

      <label class="fw-bold" style="margin-top:10px;">Option 3: <input type="text" value="2x - y" class="form-control"></label>
        <input  class="insert form-control" type="file" >
        <textarea type="text" name="opt3" id=""></textarea> 

       
        
   
        
  </div>
</div>
<!-- end of row 2 -->
<div class="col-4">
  <div class="p-3">
  <label class="fw-bold">Option 1: <input type="text" value="2x2y" class="form-control"></label>
        <input  class="insert form-control" type="file" >
        <textarea type="text" name="opt1" id=""></textarea>
    
        
        <label class="fw-bold" style="margin-top:10px;">Option 4: <input type="text" value="x - y" class="form-control"></label>
        <input  class="insert form-control" type="file" >
        <textarea type="text" name="opt4" id=""></textarea>
        
  </div>
</div>
<!-- end of row 3 -->
</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning" name="add">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
             



<?php

//add questions
    if(isset($_POST["add"])){
        $question=$_POST['question'];
        $opt1=$_POST['opt1'];
        $opt2=$_POST['opt2'];
        $opt3=$_POST['opt3'];
        $opt4=$_POST['opt4'];
        $answer=$_POST['answer'];
        $loop=0;
        $count=0;
        $res=mysqli_query($link,"SELECT *FROM exam WHERE question='$question' ") or die(mysqli_error($link));
        $count=mysqli_num_rows($res);
        if ($count==1){
            ?>
            <script>
                Swal.fire({
      position: 'center',
      icon: 'warning',
      title: 'questions already existing',
      showConfirmButton: false,
      timer: 1500
    })
            </script>
           
    <?php
        }else{
          while($row=mysqli_fetch_array($res))
          {
              $loop=$loop+1;
              mysqli_query($link,"UPDATE exam SET questions_no='$loop' WHERE id=$row[id]");
          }
        }
        $loop=$loop+1;
        mysqli_query($link,"INSERT INTO exam(questions_no,question,opt1,opt2,opt3,opt4,answer,category)VALUES('$loop','$question','$opt1','$opt2','$opt3','$opt4','$answer','$exam_category')") or die(mysqli_error($link));
        ?>
        
        <?php
        ?>
        <script>
            Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'questions added',
  showConfirmButton: false,
  timer: 1500
})
        </script>
        <?php
      }
        ?>
<?php

?>
<!-- end Content -->
<script>
    $(document).ready(function(){
// datatables
      $('#questions').DataTable();


// Delete
        $(document).on('click','.del_question ',function(){
            var id = $(this).attr('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "The Questions will be deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
      
              $.ajax({
                    url: 'handler/delete_question.php',
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

//Start Archive Function
      $(document).on('click', '.archive', function(e){
             var id = $(this).attr('id');
             Swal.fire({
                title: 'Are you sure?',
                text: 'The details will be saved to archive!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d44',
                confirmButtonText: 'Confirm',
             }).then((result) => {
               if(result.isConfirmed){
                  $.ajax({
                     url: 'handler/archive_questions.php',
                     type: 'POST',
                     data: {id:id},
                     success:function(data){
                        Swal.fire({
                           position: 'center',
                           icon: 'success',
                           title: 'Data saved to archive successfully',
                           showConfirmButton: false,
                           timer: 2000
                        }).then(() => {
                           window.location.reload();
                        })
                     }
                  })
               }
             })
         });
//End Archive Function


    })

//ck editor
     CKEDITOR.replace( 'question',{
                            removeButtons: 'Anchor,Source,Preview,Templates,Cut,Copy,Paste,PasteText,PasteCode,PasteFromWord,Undo,Redo,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Image,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Strike,CopyFormatting,RemoveFormat,BulletedList,NumberedList,Outdent,Indent,CreateDiv,Blockquote,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Link,Unlink,Styles,Format,Font,FontSize,spacingsliders,TextColor,BGColor,ShowBlocks,Maximize,About',
                            
                        } );
    CKEDITOR.replace( 'opt1',{
        removeButtons: 'Anchor,Source,Preview,Templates,Cut,Copy,Paste,PasteText,PasteCode,PasteFromWord,Undo,Redo,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Image,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Strike,CopyFormatting,RemoveFormat,BulletedList,NumberedList,Outdent,Indent,CreateDiv,Blockquote,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Link,Unlink,Styles,Format,Font,FontSize,spacingsliders,TextColor,BGColor,ShowBlocks,Maximize,About',
        
    } );

    CKEDITOR.replace( 'opt2',{
        removeButtons: 'Anchor,Source,Preview,Templates,Cut,Copy,Paste,PasteText,PasteCode,PasteFromWord,Undo,Redo,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Image,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Strike,CopyFormatting,RemoveFormat,BulletedList,NumberedList,Outdent,Indent,CreateDiv,Blockquote,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Link,Unlink,Styles,Format,Font,FontSize,spacingsliders,TextColor,BGColor,ShowBlocks,Maximize,About',
        
    } );
    CKEDITOR.replace( 'opt3',{
        removeButtons: 'Anchor,Source,Preview,Templates,Cut,Copy,Paste,PasteText,PasteCode,PasteFromWord,Undo,Redo,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Image,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Strike,CopyFormatting,RemoveFormat,BulletedList,NumberedList,Outdent,Indent,CreateDiv,Blockquote,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Link,Unlink,Styles,Format,Font,FontSize,spacingsliders,TextColor,BGColor,ShowBlocks,Maximize,About',
        
    } );
    CKEDITOR.replace( 'opt4',{
        removeButtons: 'Anchor,Source,Preview,Templates,Cut,Copy,Paste,PasteText,PasteCode,PasteFromWord,Undo,Redo,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Image,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Strike,CopyFormatting,RemoveFormat,BulletedList,NumberedList,Outdent,Indent,CreateDiv,Blockquote,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Link,Unlink,Styles,Format,Font,FontSize,spacingsliders,TextColor,BGColor,ShowBlocks,Maximize,About',
        
    } );
    CKEDITOR.replace( 'answer',{
        removeButtons: 'Anchor,Source,Preview,Templates,Cut,Copy,Paste,PasteText,PasteCode,PasteFromWord,Undo,Redo,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Image,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Strike,CopyFormatting,RemoveFormat,BulletedList,NumberedList,Outdent,Indent,CreateDiv,Blockquote,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Link,Unlink,Styles,Format,Font,FontSize,spacingsliders,TextColor,BGColor,ShowBlocks,Maximize,About',
        
    } );


    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<?php include "include/footer.php";?>

   