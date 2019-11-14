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
include('includes/conn.php');
$sql="SELECT * FROM students WHERE id='$id'";
        $result=$db->query($sql) or die($db->error);
        $row = $result->fetch_assoc();
$year = $_GET['year'];
$yoj = $_SESSION['year'];
        
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
  			<span><button class="Btnyear"  style="<?php if($yoj == $year){ echo 'background-color: #4caf50'; } ?>"> <?= ($yoj + $i) ?></button></span>
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
  		<tr>
  			<td>January</td>
  			<td></td>
  			<td></td>
  			<td></td>
  			<td></td>
  		</tr>
  		<tr>
  			<td>February</td>
  			<td></td>
  			<td></td>
  			<td></td>
  			<td></td>
  		</tr>
  		<tr>
  			<td>March</td>
  			<td></td>
  			<td></td>
  			<td></td>
  			<td></td>
  		</tr>
  		<tr>
  			<td>April</td>
  			<td></td>
  			<td></td>
  			<td></td>
  			<td></td>
  		</tr>
  		<tr>
  			<td>May</td>
  			<td></td>
  			<td></td>
  			<td></td>
  			<td></td>
  		</tr>
  		<tr>
  			<td>June</td>
  			<td></td>
  			<td></td>
  			<td></td>
  			<td></td>
  		</tr>
  		<tr>
  			<td>July</td>
  			<td></td>
  			<td></td>
  			<td></td>
  			<td></td>
  		</tr>
  		<tr>
  			<td>August</td>
  			<td></td>
  			<td></td>
  			<td></td>
  			<td></td>
  		</tr>
  		<tr>
  			<td>September</td>
  			<td></td>
  			<td></td>
  			<td></td>
  			<td></td>
  		</tr>
  		<tr>
  			<td>October</td>
  			<td></td>
  			<td></td>
  			<td></td>
  			<td></td>
  		</tr>
  		<tr>
  			<td>November</td>
  			<td></td>
  			<td></td>
  			<td></td>
  			<td></td>
  		</tr>
  		<tr>
  			<td>December</td>
  			<td></td>
  			<td></td>
  			<td></td>
  			<td></td>
  		</tr>
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
