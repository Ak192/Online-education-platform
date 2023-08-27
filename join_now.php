<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location:login.php");
}
else{
   $name=$_SESSION['name'];
}
echo"<pre>";
print_r($_SESSION);
exit;
echo "hello ";
?>