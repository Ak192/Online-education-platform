<?php
session_start();
if(!isset($_SESSION['id'])){
  header("location:index.php");
}
 $id=$_GET['id'];
include_once("database.php");
$query="select * from banner where Id='$id'";
$ex=mysqli_query($conn,$query);
$fet=mysqli_fetch_assoc($ex);
if(isset($fet['Id'])){
  $id = $fet['Id'];
  $title = $fet['Title'];
  $description = $fet['Description'];
  $readnow = $fet['Readnow'];
  $joinnow = $fet['Joinnow'];
  $status = $fet['Status'];
  $image = $fet['Image'];
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
        <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Details of <?php echo $title ; ?>  </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="id" class="col-sm-2 col-form-label">Id :</label>
                    <div class="col-sm-10"> <?php echo $id; ?></div>
                  </div>

                  <div class="form-group row">
                    <label for="Title" class="col-sm-2 col-form-label">Title :</label>
                    <div class="col-sm-10"> <?php echo $title ;?> </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description :</label>
                    <div class="col-sm-10"> <?php echo $description ;?> </div>
                  </div>

                  <div class="form-group row">
                    <label for="read-now" class="col-sm-2 col-form-label">URL of Read now :</label>
                    <div class="col-sm-10"> <?php echo $readnow ; ?> </div>
                  </div>

                  <div class="form-group row">
                    <label for="join-now" class="col-sm-2 col-form-label">URL of Join now :</label>
                    <div class="col-sm-10"> <?php echo $joinnow?> </div>
                  </div> <?php
                         if($status==1){
                          $status="active";
                         }
                         else{
                          $status="inactive";
                         }

                         ?>
                  <div class="form-group row">
                    <label for="status" class="col-sm-2 col-form-label">Status :</label>
                    <div class="col-sm-10"> <?php echo $status ?> </div>
                  </div>
                  <div class="form-group row">
                    <label for="Image" class="col-sm-2 col-form-label">image :</label>
                    <div class="col-sm-10"> <img src="Bannerimage/<?php echo $image ?>" alt="upload" width="250" style=" box-shadow: 2px 4px 8px black;" > </div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                 <a href="Banner_listing.php"> <button  type="button" class="btn btn-info">Back</button> </a>
                
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