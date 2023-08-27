<?php
include_once("database.php");
$id=$_GET['id'];
$select="select Image from testimonial where Id='$id'";
$ex=mysqli_query($conn,$select);
$fet=mysqli_fetch_assoc($ex);
$delete="delete from testimonial where Id='$id'";
$ex1=mysqli_query($conn,$delete);

if($ex1==true){
    unlink("TestimonialImage/".$fet['Image']);
    header("location:Testimonials_list.php");
}

?>