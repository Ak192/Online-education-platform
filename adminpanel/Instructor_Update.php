<?php 
session_start();
include_once("database.php");
$id=$_GET['id'];

if(isset($_POST['name'])){
$instructor_name =$_POST['name'];
$designation =$_POST['designation'];
$facebook =$_POST['facebook'];
$twitter =$_POST['twitter'];
$instagram =$_POST['instagram'];
 $status = isset($_POST['check'])?1:0;
 $fname=$_FILES['upload']['name'];
 $type=$_FILES['upload']['type'];
 $tmp_name=$_FILES['upload']['tmp_name'];
  if($type == "image/jpg" || $type == "image/jpeg" ||$type == "image/png"){
    $image_name = time().rand().$fname;
    $dest="CourseImage/";
    $destpath=$dest.$image_name;
    $save=move_uploaded_file($tmp_name,$destpath);
    $image="";
    if($save == true){
        $image= $image_name;
    }

  }
  if(!isset($image)){
    $query="update instructor set Instructor_name='$instructor_name',Designation='$designation',Facebook_url='$facebook',Twitter_url='$twitter',Instagram_url='$instagram', Status='$status',  where Id='$id'";
  
  }
  else{
    $query="update instructor set Instructor_name='$instructor_name',Designation='$designation',Facebook_url='$facebook',Twitter_url='$twitter',Instagram_url='$instagram', Status='$status',Image='$image'  where id='$id'";

  }
  $ex=mysqli_query($conn,$query);  
  if($ex==true && !isset($image)==true)
  {
    header("location:Instructor_list.php");
  }
 else if($ex==true){
    unlink("InstructorImage/".$himage);
    header("location:Instructor_list.php");
    
  }
  else{
    $error="not update";
  }
 
}
else{
    $query="SELECT  * from instructor where Id='$id'";
    $ex=mysqli_query($conn,$query);
    $fet=mysqli_fetch_assoc($ex);
    if(isset($fet['Id'])){
        $instructor_name = $fet['Instructor_name'];
        $designation = $fet['Designation'];
        $facebook = $fet['Facebook_url'];
        $twitter = $fet['Twitter_url'];
        $instagram = $fet['Instagram_url'];
        $status = $fet['Status'];
       $himage=$fet['Image'];
    }
  
}
?>
<!--header section -->
<?php include_once("header.php");?>
<?php include_once("menu.php");?>
<?php include_once("breadcreamb.php");?>
<!-- main section -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<section class="content">
      <div class="container-fluid">
         <!--<div class="row"> -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add course Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="instructor-name">Instructor Name :</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="instructor name..." value="<?php echo $instructor_name; ?>">
                  </div>
                  <div class="form-group">
                    <label for="designation"> Designation :</label>
                     <input type="text"class="form-control" name="designation" id="designation" placeholder="Designation..." value="<?php echo $designation; ?>">
                 </div>  
                  <div class="form-group">
                    <label for="facebook">URL of Facebook :</label>
                    <input type="text" name="facebook" class="form-control" id="exampleInputPassword1" placeholder="URL of Facebook ..." value="<?php echo $facebook ;?>">
                  </div>
                  <div class="form-group">
                    <label for="Twitter">Twitter :</label>
                    <input type="text" name="twitter" class="form-control" id="exampleInputPassword1" placeholder="URL of Twitter ..." value="<?php echo $twitter ;?>">
                  </div>
                  <div class="form-group">
                    <label for="instagram">Twitter :</label>
                    <input type="text" name="instagram" class="form-control" id="exampleInputPassword1" placeholder="URL of instagram ..." value="<?php echo $instagram ;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Image :</label>
                    <div class="input-group">
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="upload">
                            <label class="custom-file-label" for="customFile"><?php echo $himage ;?></label>
                            <input type="hidden" name="himage" value="<?php echo $himage;?>">

                        </div>
                     
                    </div>

                  </div>
                     <?php
                     if($status==1){
                        $check="checked";
                     }
                     else{
                        $check="";
                     }

                     ?>
                  <div class="form-check">
                    <input type="checkbox" name="check" class="form-check-input" id="exampleCheck1" val="" <?php echo $check;?> >
                    <label class="form-check-label" for="exampleCheck1">status </label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
      <!--  </div> -->
    </div>
</section>

<!--footer section -->
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>


<?php include_once("footer.php");?> 