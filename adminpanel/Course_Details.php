<?php
session_start();
if(!isset($_SESSION['id'])){
  header("location:index.php");
}
 $id=$_GET['id'];
include_once("database.php");
$query="SELECT product.id,product.Product_Name,product.Popular_course,product.Description,product.Start_dateTime,product.End_dateTime,
product.Status,product.Image,category.Category_Name,instructor.Instructor_name FROM `product` left join instructor
 on product.Instructor_id= instructor.Id INNER join category on product.Category_id=category.Id WHERE product.id='$id'";
$ex=mysqli_query($conn,$query);
$fet=mysqli_fetch_assoc($ex);
if(isset($fet['id'])){
  $id = $fet['id'];
  $title = $fet['Product_Name'];
  $category = $fet['Category_Name'];
  $popural = $fet['Popular_course'];
  $faculty = $fet['Instructor_name'];
  $description = $fet['Description'];
  $start = $fet['Start_dateTime'];
  $end = $fet['End_dateTime'];
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
                    <label for="category" class="col-sm-2 col-form-label">Category :</label>
                    <div class="col-sm-10"> <?php echo $category ;?> </div>
                  </div>
                  <?php 
                  if($popural==1){
                    $popural="Yes";
                  }
                  else{
                    $popural="Not";
                  }

                  ?>
                  <div class="form-group row">
                    <label for="popular" class="col-sm-2 col-form-label">Popular Course :</label>
                    <div class="col-sm-10"> <?php echo $popural ;?> </div>
                  </div>

                  <div class="form-group row">
                    <label for="faculty" class="col-sm-2 col-form-label">Instructor Name :</label>
                    <div class="col-sm-10"> <?php echo $faculty ; ?> </div>
                  </div>
                  <div class="form-group row">
                    <label for="description" class="col-sm-2 col-form-label">Description :</label>
                    <div class="col-sm-10"> <?php echo $description ; ?> </div>
                  </div>
                  <div class="form-group row">
                    <label for="start-date" class="col-sm-2 col-form-label">Course Start Date :</label>
                    <div class="col-sm-10"> <?php echo $start ; ?> </div>
                  </div>


                  <div class="form-group row">
                    <label for="end-date" class="col-sm-2 col-form-label">Course End Date :</label>
                    <div class="col-sm-10"> <?php echo $end ;?> </div>
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
                    <div class="col-sm-10"> <img src="CourseImage/<?php echo $image ?>" alt="upload" width="250" style=" box-shadow: 2px 4px 8px black;" > </div>
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                 <a href="Course_listing.php"> <button  type="button" class="btn btn-info">Back</button> </a>
                
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