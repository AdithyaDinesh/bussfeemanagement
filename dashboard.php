<?php 
session_start();
if (! isset($_SESSION['user'])) {
  header("location: index.php");  
}
?>
<!DOCTYPE html>
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
        $_SESSION['year'] = $row['yoj'];
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Hello , <?= $_SESSION['user'] ?></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="dashboard.php">Profile</a></li>
      <li><a href="feedetails.php?year=<?= $row['yoj'] ?>">Fee details</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="includes/logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <div class="col-md-3"></div>
  <div class="profile col-md-6">
    <div class="col-md-12" style="padding: 40px 100px 100px 100px;">

      <h2 class="text-center">Student Profile</h2>
      <form id="update-form" action="includes/update.php" method="POST"> 
      <table class="table form-group">
        <tr>
          <td><h4>Name</h4></td>
          <td id="name" style="line-height: 3em;"><span class="before"><?= $row['name'] ?></span>
            <span class="after"><input type="text" class="form-control" name="name" value="<?= $row['name'] ?>"></span>
          </td>
        </tr>
        <tr>
          <td><h4>USN</h4></td>
          <td  id="usn" style="line-height: 3em;"><span class="before"><?= $row['usn'] ?></span>
          <span class="after"><input type="text" class="form-control" name="usn" value="<?= $row['usn'] ?>"></span>
        </td>
        </tr>
        <tr><td><h4>Locality</h4></td>
        <td id="location" style="line-height: 3em;"> <span class="before"><?= $row['destination'] ?></span>
        <span class="after"><input type="text" class="form-control" name="destination" value="<?= $row['destination'] ?>"></span>
      </td>
         </tr>
         <tr>
           <td><h4>Distance</h4> </td>
           <td style="line-height: 3em;"><?= $row['distance'] ?> Km</td>

         </tr>
         <tr>
           <td style="width: 60%;"><h4>Fees Per annum </h4> </td>
           <td style="line-height: 3em;"> &#8377; <?= $row['fees'] ?> /- </td>

         </tr>
      </form>
         <tr>
           <td><span style="display: block;" class="btn btn-primary" id="edit" onclick="callEdit()">Edit</span>
            <span style="display: none;" class="btn btn-success" id="update" onclick="callSubmit()">Update</span>
            </td>
           <td><span style="display: none;" class="btn btn-danger" id="cancel" onclick="callCancel()">Cancel</span> </td>

         </tr>
           <tr>
            <td colspan="2" style="color: #fff; text-align: center;">
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

  </div>
</div>

</body>
</html>
<script type="text/javascript">
  function callEdit(){
    var hide = document.getElementsByClassName("before");
    var show = document.getElementsByClassName("after");
    document.getElementById("edit").style.display = "none";
    document.getElementById("cancel").style.display = "block";
    document.getElementById("update").style.display = "block";
    hide[0].style.display = "none";
    show[0].style.display = "inline-block";
    hide[1].style.display = "none";
    show[1].style.display = "inline-block";
    hide[2].style.display = "none";
    show[2].style.display = "inline-block";
  }
  function callCancel(){
    var hide = document.getElementsByClassName("after");
    var show = document.getElementsByClassName("before");
    document.getElementById("edit").style.display = "block";
    document.getElementById("cancel").style.display = "none";
    document.getElementById("update").style.display = "none";
    hide[0].style.display = "none";
    show[0].style.display = "inline-block";
    hide[1].style.display = "none";
    show[1].style.display = "inline-block";
    hide[2].style.display = "none";
    show[2].style.display = "inline-block";
  }
  function callSubmit(){
    document.getElementById("update-form").submit();
  }
</script>