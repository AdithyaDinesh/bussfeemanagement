<?php
if (isset($_POST['submit'])) {
    include('conn.php');
    session_start();
        $username=$_POST['usn'];
        $password=$_POST['password'];
        $x=md5($password);
        $sql="SELECT * FROM students WHERE usn='$username'";
        $result=$db->query($sql) or die($db->error);
        $row = $result->fetch_assoc();
        // print_r($row);
        // exit;
        if ($row) {
        if ($x===$row['password']) {
                $_SESSION['user']=$row['name'];
                $_SESSION['userId']=$row['id'];
                header("location:../dashboard.php");             
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