<?php
$id=$_GET['id'];
include_once("database.php");

$select="select Image from instructor where Id='$id'";
$ex=mysqli_query($conn,$select);
$fet=mysqli_fetch_assoc($ex);
$delete="delete from instructor where Id='$id'";
$ex1=mysqli_query($conn,$delete);
/*
if($ex1==true){
     unlink("InstructorImage/".$fet['Image']);
    header("location:Instructor_list.php");
}
*/

?>