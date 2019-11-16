<?php
    include('../../includes/conn.php');
    session_start();
        $locaction=$_POST['location'];
        $distance=$_POST['distance'];
        $busno=$_POST['busno'];
        $price=$_POST['price'];
        $sql="INSERT INTO `location` (`id`, `place`, `distance`, `bus_no`, `price`) VALUES (NULL, 'locaction', '$distance', '$busno', '$price')";
        $result=$db->query($sql) or die($db->error);

        if ($result) {
                $_SESSION['message'] = "Added Successfully!";
        }else{
                $_SESSION['message'] = "Oops Database error!";

        }
                header("location:../addlocation.php"); 
        


?>

