<?php

include('../config/constants.php');

 $id= $_GET['id'];

//sql query to dlt admin
 $sql ="DELETE FROM tbl_admin WHERE id=$id";

 $res= mysqli_query($conn,$sql);

 if($res==true){
    // echo"Admin Deleted";

    $_SESSION['delete'] ="Admin deleted Successully";
    header('location:'.SITEURL.'admin/manage-admin.php');

 }
 else{

    //echo"Failed";

    $_SESSION['delete'] ="Failed to Delete Admin.Try Again.";
    header('location:'.SITEURL.'admin/manage-admin.php');

 }

?>