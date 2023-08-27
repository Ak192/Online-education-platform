<?php
session_start();
$id = $_GET['id'];
include_once("database.php");
$q="delete from user where Id='$id'";
$e=mysqli_query($conn,$q);
header("location:user_listing.php");


?>