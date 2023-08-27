<?php
session_start();
if(!isset($_SESSION['id'])){
  header("location:index.php");
}
 $id=$_GET['id'];
include_once("database.php");
$query="SELECT * from instructor where Id='$id'";
$ex=mysqli_query($conn,$query);
$fet=mysqli_fetch_assoc($ex);
if(isset($fet['Id'])){
  $id = $fet['Id'];
  $instructor_name = $fet['Instructor_name'];
  $designation = $fet['Designation'];
  $facebook = $fet['Facebook_url'];
  $twitter = $fet['Twitter_url'];
  $instagram = $fet['Instagram_url'];
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
                <h3 class="card-title">Details of <?php echo $instructor_name ; ?>  </h3>
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
                    <label for="Instructor-name" class="col-sm-2 col-form-label">Instructor Name :</label>
                    <div class="col-sm-10"> <?php echo $instructor_name ;?> </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="designation" class="col-sm-2 col-form-label">Designation :</label>
                    <div class="col-sm-10"> <?php echo $designation ;?> </div>
                  </div>
                
                  <div class="form-group row">
                    <label for="facebook" class="col-sm-2 col-form-label">URL of Facebook :</label>
                    <div class="col-sm-10"> <?php echo $facebook ; ?> </div>
                  </div>
                  <div class="form-group row">
                    <label for="Twitter" class="col-sm-2 col-form-label">URL of Twitter :</label>
                    <div class="col-sm-10"> <?php echo $twitter ; ?> </div>
                  </div>
                  <div class="form-group row">
                    <label for="instagram" class="col-sm-2 col-form-label">URL of Instagram :</label>
                    <div class="col-sm-10"> <?php echo $instagram ; ?> </div>
                  </div>
                        <?php
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
                    <div class="col-sm-10"> <img src="InstructorImage/<?php echo $image ?>" alt="upload" width="130" style=" box-shadow: 2px 4px 8px black;" > </div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                 <a href="Instructor_list.php"> <button  type="button" class="btn btn-info">Back</button> </a>
                
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