<?php 
session_start();
if (! isset($_SESSION['admin'])) {
  header("location: index.php");  
}
?><!DOCTYPE html>
<html>
<head>
  <title>college bus fees management</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="assets/dashboard.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
    body{
  /*background: linear-gradient(60deg , #90caf9 , #2979ff);*/
  background-image: linear-gradient(60deg , #90caf9 , #2979ff);
  height: 100vh;
}
  </style>
</head>
<body>
<?php 
if (isset($_POST['usn'])) {
  $_SESSION['usn'] = $_POST['usn'];
  $usn = $_SESSION['usn'];

include('../includes/conn.php');
$sql="SELECT * FROM  students WHERE usn='$usn'";
$result=$db->query($sql) or die($db->error);
$row = $result->fetch_assoc();
$yoj = $row['yoj'];
$id = $row['id'];
$sql="SELECT * FROM fee_payment f , location l , students s WHERE f.student_id='$id' AND l.id=s.destination AND f.student_id=s.id";
        $result=$db->query($sql) or die($db->error);
}elseif(isset($_SESSION['usn'])){
  $usn = $_SESSION['usn'];

include('../includes/conn.php');
$sql="SELECT * FROM  students WHERE usn='$usn'";
$result=$db->query($sql) or die($db->error);
$row = $result->fetch_assoc();
$yoj = $row['yoj'];
$id = $row['id'];
$sql="SELECT * FROM fee_payment f , location l , students s WHERE f.student_id='$id' AND l.id=s.destination AND f.student_id=s.id";
        $result=$db->query($sql) or die($db->error);

}
        
        
?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Hello , <?= $_SESSION['admin'] ?></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="dashboard.php">Add Student</a></li>
      <li><a href="addlocation.php">Add Location</a></li>
      <li class="active"><a href="fee.php">Update Fees</a></li>
      <li><a href="../includes/logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <div class="col-md-3">
    <form class="input-group" action="fee.php" method="POST" id="search">
   <input name="usn" style="" type="text" class="form-control" placeholder="Enter student USN to search!">
   <span class="input-group-btn">
        <button onclick="sub()" class="btn btn-default" type="button">Go!</button>
   </span>
</form>
<table class="table">
  <tr>
    <td>
      
    Student Name :  
    </td>
    <td>
     <?php if (isset($_POST['usn'])) { ?> 
    <?= $row['name'] ?>  
  <?php }elseif(isset($_SESSION['usn'])){ ?>
      <?= $row['name'] ?>  
  <?php } ?>
    </td>
  </tr>
  <tr>
    <td>
      
      <?php

             if (isset($_SESSION['message'])) {
              echo $_SESSION['message'];
             }
             unset($_SESSION['message']);
              ?>
    </td>
  </tr>
</table>
  </div>
  <div class="profile col-md-7 "  style="overflow-y: scroll;">

<?php if (isset($_POST['usn']) || isset($_SESSION['usn'])) { ?>
    <div class="col-md-12">
      <table class="table" >
      <tr>
        <th>Month</th>
        <th>Year</th>
        <th>Bus Number</th>
        <th>Fees</th>
        <th>Status</th>
      </tr>
      <?php 
        $month = [
          '1' => 'January' , 
          
          '2' => 'February' , 
          
          '3' => 'March' , 
          
          '4' => 'April' , 
          
          '5' => 'May' , 
          
          '6' => 'June' , 
          
          '7' => 'July' , 
          
          '8' => 'August' , 
          
          '9' => 'September' , 
          
          '10' => 'October' , 
          
          '11' => 'November' , 
          
          '12' => 'December' 

        ];
       ?>
      <?php $i = 0;
      while($row = $result->fetch_assoc()) { ?>
      <tr>
        <?php $m = $row['month']; ?>
        <td><?= $month[$m] ?></td>
        <td><?= $row['year'] ?></td>
        <td><?= $row['bus_no'] ?></td>
        <td><?= $row['price'] ?></td>
        <td><?php if($row['status']==1){ echo '<div style="background-color : #4caf50; text-align : center;">Paid</div>';}else{echo '<button onclick="payIt('.$row['id'].','.$row['month'].','.$row['year'].')" class="btn btn-danger" style=" text-align : center;">Mark Paid</button>';}  ?></td>
      </tr>
      <?php } ?>

    </table>
    
    </div>

<?php } ?>
  </div>
</div>

</body>
</html>
<form id="payIt" action="includes/pay.php" method="POST">
  <input type="hidden" name="id" id="id">
  <input type="hidden" name="month" id="month">
  <input type="hidden" name="year" id="year">
</form>

<style type="text/css">
 .Btnyear{
  /*background: linear-gradient(to right, #FF4B2B, #FF416C);*/
  border: 1px solid #fff;
  background-color: #FF4B2B;
 }

.navbar2 {
  overflow: hidden;
  /*background-color: #333;*/
  position: fixed;
  /*top: 0;*/
  /*width: 100%;*/
}
</style>
<script type="text/javascript">

  function sub(){

    document.getElementById('search').submit();
  }
function payIt(id, month , year){
  document.getElementById('id').value = id;
  document.getElementById('month').value = month;
  document.getElementById('year').value = year;
  document.getElementById('payIt').submit();
}
</script>
