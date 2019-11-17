<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>college bus fees management</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style type="text/css">
  	body{
  /*background: linear-gradient(60deg , #90caf9 , #2979ff);*/
  background-image: linear-gradient(60deg , #90caf9 , #2979ff);
}
  </style>
</head>
<body>
<div class="container" id="container">
  <div class="form-container sign-in-container">
    <form action="includes/login.php" method="POST">
      <h1>Sign in </h1>
      <br><br>
      <input type="text" name="usn" placeholder="Enter your USN" required="true" />
      <input type="password" name="password" placeholder="Password" required="true" />
      <!-- <button name="submit" onclick="submitIt()">Sign In</button> -->
      <input id="loginBtn" value="Sign In" type="submit" name="submit">
      <?php if (isset($_SESSION['message'])) { ?>
    <p style="color: red; position: absolute; top: 75%;">
    	<?= $_SESSION['message'] ?>

    	</p>
    	<?php unset($_SESSION['message']);    } ?>
    </form>
  </div>
  <div class="overlay-container">
    <div class="overlay">
      <div class="overlay-panel overlay-right">
        <h1>Hello, Friend!</h1>
        <p>Enter your personal details and start journey with us</p>
        
      </div>
    </div>
  </div>
</div>
</body>
</html>