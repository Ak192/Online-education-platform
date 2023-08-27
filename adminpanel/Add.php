<?php
session_start();
if(!isset($_SESSION['id'])){
  header("location:index.php");
}
$error=[];
 include_once("database.php");
 if(isset($_POST['email'])){
  $email= $_POST['email'];
  $name= trim($_POST['name']);
  $phone= trim($_POST['contact']);
  $add= $_POST['Address'];
  $pass = "";
  $cpass = "";

  /*if($pass !=$cpass){

  }*/


  $emailRegex = "/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/";

  if($name==""){
    $error['name']="Name is required";
  }
  if($phone==""){
    $error['phone']="Phone is required";
  }
  else if(is_numeric($phone)==false){
    $error['phone']="Phone must be numeric";
  }
  else if(strlen($phone) !=10){
    $error['phone']="Phone must be length of 10";
  }

  if($email==""){
    $error['email']="Email must be length of 10";
  }
  /*else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error['email']="Invalid Email";
  }*/
  else if (!preg_match($emailRegex,$email)) {
    $error['email']="Not valid email";
  }


  if(count($error)<1){
    $address=mysqli_real_escape_string($conn,$add);
    $q="insert into user(Name,phone,Address,Email) values('$name','$phone','$address','$email')";
    $e= mysqli_query ($conn,$q);
    if($e== true){
        header("location:user_listing.php");
    }
    else{
      $error ="sorry data is not inserted";
    }
  }
 

 }
?>

 <?php include_once("header.php") ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include_once("menu.php")?>

  <!-- Content Wrapper. Contains page content -->
 <?php

include("breadcreamb.php");
?>
    <!-- /.content-header -->
 <style>
.error{
  color:red;
}
  </style>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <form action="" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter the name" value="<?php if(isset($name)){echo $name; } ?>">
                    <span class="error"><?php if(isset($error['name'])){echo $error['name'];} ?></span>
                  </div>

                  <div class="form-group">
                    <label for="conct">Contact No</label>
                    <input type="text" class="form-control" name="contact" id="contact" placeholder="+91 " >
                    <span class="error"><?php if(isset($error['phone'])){echo $error['phone'];} ?></span>
                  </div>
                  <div class="form-group">
                    <label for="Address">Address</label>
                    <input type="text" class="form-control" name="Address" id="contact" placeholder="Address">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="contact" placeholder="Email..." >
                    <span class="error"><?php if(isset($error['email'])){echo $error['email'];} ?></span>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add</button>
                 <a href="user_listing.php"><button type="button" class="btn btn-default float-right">Back</button> </a>
                </div>
              </form>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once("footer.php"); ?>