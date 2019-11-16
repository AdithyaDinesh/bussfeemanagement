<?php
    include('../../includes/conn.php');
    session_start();
        $name=$_POST['name'];
        $usn=$_POST['usn'];
        $password=$_POST['password'];
        $p = md5($password);
        $dest=$_POST['destination'];
        $yoj=$_POST['yoj']; 
        // print_r($_POST);
        // exit;
        $sql="INSERT INTO `students` (`id`, `name`, `usn`, `password`, `destination`, `yoj`) VALUES (NULL, '$name', '$usn', '$p', '$dest', '$yoj')";
        $result=$db->query($sql) or die($db->error);

        if ($result) {
                $_SESSION['message'] = "Updated Successfully!";
        }else{
                $_SESSION['message'] = "Oops Database error!";

        }
                header("location:../dashboard.php"); 
        


?>

