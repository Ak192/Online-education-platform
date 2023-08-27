<?php 
session_start();
include_once("adminpanel/database.php");
include_once("header.php");
?>
<?php
$status= $_SESSION['status'];

?>
<!-- main section-->
<section style="height: 70vh;">
    <div style="width: 500px;
    height= 100px;
    
    margin: 20px auto;
    background: white;
    box-shadow: 2px 5px 10px 2px;
">
 <img src="https://i.gifer.com/7efs.gif" alt="upload"  width="100px" > <?php echo $status; ?>
</div>
</section>

 <!-- Footer Start -->
 <?php include_once("footer.php"); ?>