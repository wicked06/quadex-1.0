<?php
        include 'include/header.php';

        $connect = new PDO("mysql:host=localhost; dbname=quadex", "root", "");
        $query = "SELECT * FROM student ORDER BY id";
        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();

        $sql = "SELECT * FROM student";
        $count = $link->query($sql)->num_rows;
        $users = $link->query($sql);

        $id=$_GET["id"];
        $exam_category='';
        $res=mysqli_query($link,"SELECT * FROM exam_category WHERE id=$id");
        while($row=mysqli_fetch_array($res))
        {
            $exam_category=$row["category"];
        }
?>
 
<div class="text-center fw-bold"> 
<h1>Send Custom Email</h1>
</div>
    <!-- START OF ROW TABLE--> 
        <div class="row">
            <div class="col" style="margin-top:2%;">
                   <div  style=" background:#E8EEF1; padding:10px; border-radius:5px;">
                       <div class="">
                      <!--START OF TABLE-->
                      <table class="table table-bordered table-striped table-hovered table-light" id="customer_data">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>LRN</th>
                                    <th>
                                        <input type="checkbox" id="mcheck"> Select All
                                    </th>
                                </tr>
                            </thead>

                             <tbody id="allUsers">
                                 <?php
                                      $conn = new mysqli('localhost','root','','quadex');
                                      $sql = "SELECT * FROM student WHERE category = '$exam_category'";
                                      $res = $conn->query($sql) or die($conn->error);
                                      while($row=$res->fetch_assoc())
                                     {
                                 ?>

                                 <tr> 
                                     <td><?= $row['name'] ?></td>
                                     <td class="get"><?= $row['email'] ?></td>            
                                     <td class="get"><?= $row['lrn'] ?></td>
                                                  
                                  
                                  <td >  
                                      
                                      <input type="checkbox" 
                                                 name="single_select"
                                                 id="single_select"
                                                 data-email="<?=$row["email"]?>"
                                                 data-name="<?=$row["name"]?>"
                                                 value="<?=$row["email"] ?>"
                                                 onclick="updateTextArea();"
                                         />   
                                                
                                    </td>
                                
                                </tr>
                                  <?php
                                      }
                                  ?>
                              </tbody>                
                         </table>
                    <!-- END OF TABLE-->
                </div>
            </div>
        </div>
    
            <div class="col">
                    <div class="">
                         <!--Adding Successful Message -->
                             <?php 
                                 if(isset($_GET["status"]) && $_GET["status"] == "1") { ?>
                                    <div class="alert alert-success">Email Sent Successfully</div>
                              <?php } ?>
                           <!--Start Form Action with POST Method-->
                           <!--Using POST Method (the sender name will not showed in url and it is hidden)-->
                            <form action="send.php?id=<?php echo $id?>" class="msg_container" method="post" enctype="multipart/form-data">
                              
                              <p id="multi-response"></p>
                                <div class="row">  
                                <!--First Input for Sender Name-->
                                     <div class="col-6 mb-3">
                                        <label for="sender_name" class="form-label">Sender Name</label>
                                        <input type="text" class="form-control" id="sender_name" name="sender_name" placeholder="Sender Name"  required>
                                     </div>
                                <!--Second Input for Sender Email-->
                                    <div class="col-6 mb-3">
                                       <label for="sender_email" class="form-label">Sender Email</label>
                                       <input type="email" class="form-control" id="sender_email" name="sender_email" placeholder="Sender Email" required>
                                    </div>
                                <!--Third Input for Message-->
                                    <div class="col-6 mb-3">
                                       <label for="subject" class="form-label">Subject</label>
                                       <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" required>
                                    </div>
                                <!--Fourth Input for Files(png, jpeg, videos)-->
                                    <div class="col-5">
                                      <label for="attachments" class="form-label">Attachments (Multiple)</label>
                                      <input type="file" class="form-control" multiple id="attachments" name="attachments[]" placeholder="Input Files">
                                    </div>
                               </div>
                                <!--Fifth Input for Recipient Emails-->
                                   <div class="mb-3">
                                       <label for="recipient" class="form-label" >Recipient Emails</label>
                                       <textarea class="form-control" id="emails" name="emails" rows="3" required disabled >
                                       </textarea>
                                   </div> 
                               <!--Six Input for Body-->
                                  <div class="mb-3">
                                      <label for="body" class="form-label">Message</label>
                                         <textarea class="form-control" id="message" name="message" placeholder="Enter a message" rows="5" required>
                                         </textarea>
                                  </div>
                                <!--Buttons-->
                                <div class="d-flex flex-row-reverse">
                                      <button class="btn btn-success me-2" name="send" type="submit" onclick="multi_email();" >Send Email</button>
                                      <button class="btn btn-danger" name="reset" type="reset">Reset Form</button>
                                  </div>
                           </form>
                           <!--End Form Action with POST Method-->
                 </div>
            </div>
        </div>
  

<script src="main.js" type="text/javascript"></script>

<!-- START SINGLE EMAIL-->
<!--Using JQUERY-->
<script>
    $(document).ready(function(){
        
        // DATA TABLE
        $('#customer_data').DataTable();

        $('.email_button').click(function(){
            $(this).attr('disabled', 'disabled');
            var id = $(this).attr("id");
            var action = $(this).data("action");
            var email_data = [];
            if(action == 'single')
            {
                email_data.push({
                    email: $(this).data("email"),
                    name: $(this).data("name")
                });
            } 
            else 
            {
               $('.single_select').each(function(){
                   if($(this).prop("checked") == true)
                   {
                      email_data.push({
                         email: $(this).data("email"),
                         name: $(this).data('name')
                      });
                   }
               });
            }

            //Starting AJAX
            $.ajax({
                url: "send_mail.php",
                method: "POST",
                data: {email_data:email_data},
                beforeSend:function(){
                     $('#'+id).html('Sending...');
                     $('#'+id).addClass('btn-danger');
                },
                success:function(data){
                    if(data == 'ok')
                    {
                        $('#'+id).text('Success');
                        $('#'+id).removeClass('btn-danger');
                        $('#'+id).removeClass('btn-info');
                        $('#'+id).addClass('btn-success');
                    }
                    else
                    {
                       $('#'+id).text(data);
                    }
                    $('#'+id).attr('disabled', false);
                }
            })
        }); 

            // CHECKBOX TO TEXT AREA 
            $("#single_select").change(function(){
            var select = $(this).is(":checked") ? 1:0;
            var email = $(this).closest('tr').find('.get').text();
            if(select == true)
            {
                document.getElementById("emails").value = email;
                if(select == 10)
                {
                
                }
            }
            else
            {
                document.getElementById("emails").value = null;
            }
             });


             
        //SELECT ALL OPTION QUERY
            $("#mcheck").click(function(){
                $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
            })


             //Adding CKEDITOR
             CKEDITOR.replace( 'message',{
                removeButtons: 'Anchor,Source,Preview,Templates,Cut,Copy,Paste,PasteText,PasteCode,PasteFromWord,Undo,Redo,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Image,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Iframe,Strike,CopyFormatting,RemoveFormat,BulletedList,NumberedList,Outdent,Indent,CreateDiv,Blockquote,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,BidiLtr,BidiRtl,Link,Unlink,Styles,Format,Font,FontSize,spacingsliders,TextColor,BGColor,ShowBlocks,Maximize,About',
            });
    });
</script>
<!-- END SINGLE EMAIL-->



<?php
    include 'include/footer.php';
?>