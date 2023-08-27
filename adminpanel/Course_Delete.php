<?php
include_once("database.php");
$id=$_GET['id'];
$select="select Image from product where id='$id'";
$ex=mysqli_query($conn,$select);
$fet=mysqli_fetch_assoc($ex);
$delete="delete from product where id='$id'";
$ex1=mysqli_query($conn,$delete);

if($ex1==true){
    unlink("CourseImage/".$fet['Image']);
    header("location:course_listing.php");
}

?>