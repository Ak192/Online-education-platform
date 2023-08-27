<?php
session_start();
if(!isset($_SESSION['id'])){
  header("location:index.php");
}
 $id=$_GET['id'];
include_once("database.php");
$query="SELECT * from testimonial where Id='$id'";
$ex=mysqli_query($conn,$query);
$fet=mysqli_fetch_assoc($ex);
if(isset($fet['Id'])){
  $id = $fet['Id'];
  $client_name = $fet['Client_name'];
  $profession = $fet['Profession'];
  $message = $fet['Message'];
  $status = $fet['status'];
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
                <h3 class="card-title">Details of <?php echo $client_name ; ?>  </h3>
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
                    <label for="client-name" class="col-sm-2 col-form-label">Client Name :</label>
                    <div class="col-sm-10"> <?php echo $client_name ;?> </div>
                  </div>
                  <?php
                         if($profession==1){
                          $profess="Faculty";
                         }
                         else if($profession==0){
                          $profess="Student";
                         }
                         else{
                            $profess="";
                         }
                         ?>
                  <div class="form-group row">
                    <label for="profession" class="col-sm-2 col-form-label">Profession :</label>
                    <div class="col-sm-10"> <?php echo $profess ;?> </div>
                  </div>
                
                  <div class="form-group row">
                    <label for="message" class="col-sm-2 col-form-label">Message :</label>
                    <div class="col-sm-10"> <?php echo $message ; ?> </div>
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
                    <div class="col-sm-10"> <img src="TestimonialImage/<?php echo $image ?>" alt="upload" width="130" style=" box-shadow: 2px 4px 8px black;" > </div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                 <a href="Testimonials_list.php"> <button  type="button" class="btn btn-info">Back</button> </a>
                
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