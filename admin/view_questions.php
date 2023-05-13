<?php
include_once "include/header.php";
include_once "connection.php";



?>
<?php
$id=$_GET["id"];
$id1=$_GET["id1"];
$question="";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$answer="";
$res=mysqli_query($link,"SELECT * FROM exam WHERE id=$id1");
while($row=mysqli_fetch_array($res))
{
    $question=$row["question"];
    $opt1=$row["opt1"];
    $opt2=$row["opt2"];
    $opt3=$row["opt3"];
    $opt4=$row["opt4"];
    $answer=$row["answer"];
?>

<form  method="POST" name="form1">

    
   <center> <table class="table table-bordered" >
        <thead>
            <th> <center><label>Question:</label>  <label ><?php echo $question ?></label> </th></center>
           
            <th><center><label>Answer:  <label ><?php echo $answer ?></label> </label></center></th>
            
       
   

        </thead>
        <tbody>
           
            <td> <textarea type="text" name="question"  id="" ></textarea></td>
            <td> <textarea type="text" name="answer" value="<?php echo $answer; ?>" id=""></textarea></td>
            
            
        </tbody>
    </table></center>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th><center>Choice 1:  <label ><?php echo $opt1 ?></label></center></th>
            <th><center>Choice 2: <label ><?php echo $opt2 ?></label></center></th>
            <th><center>Choice 3: <label ><?php echo $opt3 ?></label></center></th>
            <th><center>Choice 4: <label ><?php echo $opt4 ?></label></center></th>
        </tr>
      
        
        </thead>
        
            <tbody>
    
            <td><textarea type="text" name="opt1" value="<?php echo $opt1; ?>" id=""></textarea></td>
            <td><textarea type="text" name="opt2" value="<?php echo $opt2; ?>" id=""></textarea></td>   
            <td> <textarea type="text" name="opt3" value="<?php echo $opt3; ?>" id=""></textarea></td>
            <td><textarea type="text" name="opt4" value="<?php echo $opt4; ?>" id=""></textarea></td>
       
            </tbody>
        
    </table>

    <div class="container-fluid d-flex justify-content-end " >
            
            <button type="submit" name="update" class="btn btn-warning fw-bold" style="margin: right 10px;">Update</button>
    </div>
  <?php  
}
?>
 </form>
 <?php
 if (isset($_POST["update"])){
    mysqli_query($link,"UPDATE exam SET question='$_POST[question]',opt1='$_POST[opt1]',opt2='$_POST[opt2]',opt3='$_POST[opt3]',opt4='$_POST[opt4]',answer='$_POST[answer]' ");
?>
<script type="text/javascript">
    window.location="exam.php?id=<?php echo $id1 ?>";
</script>
<?php
}
 ?>

 <script>
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
 </script>

 <?php
include_once "include/footer.php";
?>

