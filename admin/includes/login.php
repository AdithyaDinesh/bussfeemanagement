<?php
if (isset($_POST['submit'])) {
    include('../../includes/conn.php');
    session_start();
        $username=$_POST['username'];
        $password=$_POST['password'];
        $x=md5($password);
        $sql="SELECT * FROM admin WHERE username='$username'";
        $result=$db->query($sql) or die($db->error);
        $row = $result->fetch_assoc();
        if ($row) {
        if ($x===$row['password']) {
                $_SESSION['admin']=$row['username'];
                // $_SESSION['userId']=$row['id'];
                header("location: ../dashboard.php");             
            }else{
                $_SESSION['message'] = "Wrong password!";
                header("location:../index.php");  

            }
        }else{
                $_SESSION['message'] = "Username not registered!";
                header("location:../index.php"); 

        }
        }


?>