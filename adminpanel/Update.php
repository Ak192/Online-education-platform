<?php
session_start();
if(!isset($_SESSION['id'])){
  header("location:index.php");
}
include_once("database.php");
  $id= $_GET['id']; 
  echo $id;
 if(isset($_POST['email'])){
      $name= $_POST['name'];
      $phone=$_POST['phone'];
      $email=$_POST['email'];
      $Add= $_POST['Address'];
  $query= "update user set Name='$name', Phone='$phone', Email='$email' , Address='$Add' where Id='$id'";
 $execute= mysqli_query($conn,$query);
 if($execute== true){
  header("location:user_listing.php");
 }
 }
 else{
 $query="select * from user where Id='$id'";
$execute=mysqli_query($conn,$query);
$fetch= mysqli_fetch_assoc($execute);
if(isset($fetch['Id'])){
     $name= $fetch['Name'];
     $phone= $fetch['Phone'];
     $email= $fetch['Email'];
     $Add = $fetch['Address'];
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
 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <form Action="" method="post"> 
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter the name" value="<?php echo $name ?>">
                  </div>

                  <div class="form-group">
                    <label for="conct">Contact No</label>
                    <input type="number" class="form-control" name="phone" id="contact" placeholder="+91 " value="<?php echo $phone ?>">
                  </div>
                  <div class="form-group">
                    <label for="Address">Address</label>
                    <input type="text" class="form-control" name="Address" id="Address" placeholder="Address" value="<?php echo $Add ?>">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email"  placeholder="Email..." value="<?php echo $email ?>">
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">update</button>
                  <a href="user_listing.php"> <button type="button" class="btn btn-default float-right">Bcck</button> </a>
                </div>
              </form>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once("footer.php"); ?>