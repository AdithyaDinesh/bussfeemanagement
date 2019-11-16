<?php
    include('conn.php');
    session_start();
        $name=$_POST['name'];
        $dest=$_POST['destination'];
        $id = $_SESSION['userId'];  
        $sql="UPDATE `students` SET   `name` = '$name' , `destination` = '$dest' WHERE `students`.`id` = '$id'";
        $result=$db->query($sql) or die($db->error);
        if ($result) {
        $_SESSION['message'] = "Updated Successfully!";
        }else{
                $_SESSION['message'] = "Oops Database error!";

        }
                header("location:../dashboard.php"); 
        


?>