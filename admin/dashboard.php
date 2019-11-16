<?php 
session_start();
if (! isset($_SESSION['admin'])) {
  header("location: index.php");  
}
    include('../includes/conn.php');
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
table{
  margin-top : 30px;
}

table tr {
  height: 5em;
  line-height: 7em;
}

#loginBtn {
  border-radius: 20px;
  border: 1px solid #FF4B2B;
  background-color: #FF4B2B;
  color: #FFFFFF;
  font-size: 12px;
  font-weight: bold;
  padding: 12px 45px;
  letter-spacing: 1px;
  outline: none;
  text-transform: uppercase;
  transition: transform 80ms ease-in;
}



  </style>
</head>
<body>
<?php 
// $id = $_SESSION['userId'];
// include('includes/conn.php');
// $sql="SELECT * FROM students WHERE id='$id'";
//         $result=$db->query($sql) or die($db->error);
//         $row = $result->fetch_assoc();
//         $_SESSION['year'] = $row['yoj'];
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Hello , <?= $_SESSION['admin'] ?></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="dashboard.php">Add Student</a></li>
      <li><a href="addlocation.php">Add Location</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="../includes/logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <div class="col-md-3"></div>
  <div class="profile col-md-6">
    <h3 class="text-center">Add Student</h3>
    <form action="includes/addstudent.php" method="POST">
      
    <table class="table form-group">
      <tbody>
        <tr>
          <td>Name</td>
          <td>
            <input type="text" name="name" class="form-control">
          </td>
        </tr>
        <tr>
          <td>USN</td>
          <td>
            <input type="text" name="usn" class="form-control">
          </td>
        </tr>
        <tr>
          <td>Password</td>
          <td>
            <input type="Password" name="password" class="form-control">
          </td>
        </tr>
        <tr>
          <td>Year of Joining</td>
          <td>
            <input type="text" name="yoj" class="form-control">
          </td>
        </tr>
        <tr>
          <td>Location</td>
          <td>
            <select class="form-control" name="destination">
            <?php 

        $sql="SELECT * FROM location ";
        $res=$db->query($sql) or die($db->error);
        while($ret = $res->fetch_assoc()) { ?>
            <option value="<?= $ret['id']?>"><?= $ret['place']?></option>
          <?php } ?>
          </select>
          </td>
        </tr>
        <tr>
          <td colspan="2" class="text-center">
           <input id="loginBtn" type="submit" name="submit" value="Add"> 
          </td>
        </tr>
      </tbody>
    </table>
    <div style="position: absolute; top: 20px; left: 50px;">
      <?php

             if (isset($_SESSION['message'])) {
              echo $_SESSION['message'];
             }
             unset($_SESSION['message']);
              ?>

    </div>
    </form>

  </div>
</div>

</body>
</html>
