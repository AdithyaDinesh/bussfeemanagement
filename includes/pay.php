<?php 
include('../../includes/conn.php');
    session_start();
        $id=$_POST['id'];
        $month=$_POST['month'];
        $year=$_POST['year'];
        // echo $id."/".$month."/".$year;
        // exit;
        $sql="UPDATE `fee_payment` SET `status` = '1'  WHERE `student_id`=".$id." AND `month` = ".$month." AND `year` = ".$year;
        $result=$db->query($sql) or die($db->error);

        if ($result) {
                $_SESSION['message'] = "Paid Successfully!";
        }else{
                $_SESSION['message'] = "Oops Database error!";

        }
                header("location:../fee.php"); 
        
?>