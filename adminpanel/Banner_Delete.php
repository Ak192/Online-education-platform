<?php
session_start();
if(!isset($_SESSION['id'])){
  header("location:index.php");
}
$id=$_GET['id'];
include_once("database.php");
$select="select Image from banner where Id='$id'";
$ex=mysqli_query($conn,$select);
$fet=mysqli_fetch_assoc($ex);
unlink("Bannerimage/".$fet['Image']);
$query="delete  from banner where Id='$id'";
$ex1=mysqli_query($conn,$query);
if($ex1== true){
    header("location:Banner_listing.php");
}
?>
