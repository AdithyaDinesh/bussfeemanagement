<?php 
session_start();
if (! isset($_SESSION['user'])) {
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
$id = $_SESSION['userId'];
$year = $_GET['year'];
$yoj = $_SESSION['year'];
include('includes/conn.php');
$sql="SELECT * FROM fee_payment f , location l , students s WHERE f.student_id='$id' AND f.year = '$year' AND l.id=s.destination AND f.student_id=s.id";
        $result=$db->query($sql) or die($db->error);
        
        
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Hello , <?= $_SESSION['user'] ?></a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="dashboard.php">Profile</a></li>
      <li class="active"><a href="feedetails.php?year=<?= $row['yoj'] ?>">Fee details</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="includes/logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <div class="col-md-3"></div>
  <div class="profile col-md-6">

  	<div class="col-md-12" style="padding: 10px;">
  		<span> Choose a year : </span>
  			<?php for ($i=0; $i < 4 ; $i++) { ?>
  			<span><a style="text-decoration: none; color: #fff;" href="feedetails.php?year=<?= ($yoj + $i) ?>"><button  class="Btnyear"  style="<?php if($yoj+$i == $year){ echo 'background-color: #4caf50'; } ?>"> <?= ($yoj + $i) ?></button></a></span>
  			<?php } ?>
  			
  	</div>
  	<table class="table">
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
  			<td><?php if($row['status']==1){ echo '<div style="background-color : #4caf50; text-align : center;">Paid</div>';}else{echo '<div style="background-color : #d50000; text-align : center;">Pending</div>';}  ?></td>
  		</tr>
  		<?php } ?>

  	</table>
    

  </div>
</div>

</body>
</html>

<style type="text/css">
 .Btnyear{
 	/*background: linear-gradient(to right, #FF4B2B, #FF416C);*/
  border: 1px solid #fff;
  background-color: #FF4B2B;
 }
</style>
