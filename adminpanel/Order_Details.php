<?php
session_start();
if(!isset($_SESSION['id'])){
  header("location:index.php");
}
$id= $_GET['id'];
include_once("database.php");
$q="select * from user where Id='$id'";
$s=mysqli_query($conn,$q);
$f=mysqli_fetch_assoc($s);

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
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Details of <?php echo $f['Name'] ?> </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Id</label>
                    <div class="col-sm-10"> <?php echo $f['Id'] ?></div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10"> <?php echo $f['Name'] ?> </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Contact No</label>
                    <div class="col-sm-10"> <?php echo $f['Phone'] ?> </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10"> <?php echo $f['Address'] ?> </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">city</label>
                    <div class="col-sm-10"> <?php echo $f['City'] ?> </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">State</label>
                    <div class="col-sm-10"> <?php echo $f['State'] ?> </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10"> <?php echo $f['Email'] ?> </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">status</label>
                    <div class="col-sm-10"> <?php echo $f['Status'] ?> </div>
                  </div>

                <!-- /.card-body -->
                <div class="card-footer">
                 <a href="user_listing.php"> <button  type="button" class="btn btn-info">Back</button> </a>
                
                </div>
                <!-- /.card-footer -->
              </form>
            </div>   
     
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once("footer.php"); ?>