<?php 
session_start();
if(isset($_SESSION['user_id'])){
    unset($_SESSION['user_id']);
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    header("location:index.php");

}
else{
    $log= "already logout";
   // header("location:index.php");
}

?>