
<?php
include "include/header.php"
?>

<div class="row ">
  <div class="col-md-12">
    <div class="col-md-12 fw-bold fs-3">
      <center><h1><?php echo $exam_category ?></h1></center>
    </div>
    <div class="container">
    <div class="row text-center">
      <div class="col-md-3">
        <div class="card text-bg-primary mb-3" style="max-width: 18rem;">
          <div class="card-header fw-bold fs-5">Student Accounts</div>
          <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text fw-bold fs-3">10</p>
          </div>
      </div>
    </div>

    <!-- card2 -->
    <div class="col-md-3">
      <div class="card text-bg-danger mb-3" style="max-width: 18rem;">
        <div class="card-header fw-bold fs-5" >Archived Accounts</div>
        <div class="card-body">
          <h5 class="card-title"></h5>
          <p class="card-text fw-bold fs-3">30</p>
        </div>
    </div>
  </div>

  <!-- end of card 2 -->
  <!-- card3 -->
  <div class="col-md-3">
    <div class="card text-bg-warning mb-3" style="max-width: 18rem;">
      <div class="card-header fw-bold fs-5">Achived Questions</div>
      <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text fw-bold fs-3">5</p>
      </div>
  </div>
</div>
  <!-- end of card 3 -->
  <!-- card4 -->
  <div class="col-md-3">
    <div class="card text-bg-secondary mb-3" style="max-width: 18rem;">
      <div class="card-header fw-bold fs-5 fw-bold">Archived Results</div>
      <div class="card-body">
        <h5 class="card-title"></h5>
        <p class="card-text fw-bold fs-3">10</p>
      </div>
  </div>
</div>
  <!-- end of card 4 -->
  </div>
</div>
</div>  
    </div>
<!-- table -->
<div class="row">
  <div class="col-md-6">
  <table class="table table-bordered text-center">
    <?php include "../connection.php"?>
  <thead>
    <tr style="background:#760a04; color:#f5e0c0;">
      <th scope="col">Email</th>
      <th scope="col">Name</th>
      <th scope="col">LRN</th>
      <th scope="col">Code</th>
      <th scope="col">Category</th>
      
    </tr>
  </thead>
  <tbody>
  <?php
             $res=mysqli_query($link,"SELECT * FROM students  ORDER BY id asc");
             while($row=mysqli_fetch_array($res))
             {
            ?>
    <tr style="background:#fff; color:#333">
      
      <td>  <?= $row['email']?></td>
      <td> <?= $row['name']?></td>
      <td> <?= $row['lrn']?></td>
      <td> <?= $row['code']?></td>
      <td> <?= $row['category']?></td>
      
    </tr>
 
    <?php
           }
           ?>
  </tbody>
</table>
  </div>
  <div class="col-md-6">
  <table class="table table-bordered text-center">
    
  <thead>
    <tr style="background:#760a04; color:#f5e0c0;">
      <th scope="col">Name</th>
      <th scope="col">Subject</th>
      <th scope="col">Total Question</th>
      <th scope="col">Correct Answer</th>
      <th scope="col">Wrong Answer</th>
      <th scope="col">Date</th>
      
    </tr>
  </thead>
  <tbody>
  <?php
             $res=mysqli_query($link,"SELECT * FROM exam_results  ORDER BY id asc");
             while($row=mysqli_fetch_array($res))
             {
            ?>
    <tr style="background:#fff; color:#333">
      
      <td>  <?= $row['name']?></td>
      <td> <?= $row['total_question']?></td>
      <td> <?= $row['total_question']?></td>
      <td> <?= $row['correct_answer']?></td>
      <td> <?= $row['wrong_answer']?></td>
      <td> <?= $row['exam_time']?></td>
      
    </tr>
 
    <?php
           }
           ?>
  </tbody>
</table>
  </div>
</div>
<!-- end of table -->

<?php include "include/footer.php"?>