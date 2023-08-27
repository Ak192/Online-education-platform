<?php
session_start();
if(!isset($_SESSION['id'])){
  header("location:index.php");
}
include_once("database.php");
$id=$_GET['id'];
$error="";
$readnow="";
$joinnow="";
if(isset($_POST['title'])){
  $title=$_POST['title'];
  $description=$_POST['description'];
  $readnow= $_POST['readnow'];
  $joinnow=$_POST['joinnow'];
 $status = isset($_POST['check'])?1:0;
 $fname=$_FILES['upload']['name'];
 $type=$_FILES['upload']['type'];
 $tmp_name=$_FILES['upload']['tmp_name'];
  if($type == "image/jpg" || $type == "image/jpeg" ||$type == "image/png"){
    $image_name = time().rand().$fname;
    $dest="Bannerimage/";
    $destpath=$dest.$image_name;
    $save=move_uploaded_file($tmp_name,$destpath);
    $image="";
    if($save == true){
        $image= $image_name;
    }
  }
  if(!isset($image_name)){
    echo $query= "update banner set Title='$title',Description='$description',Readnow='$read',Joinnow='$join',Status='$status' where Id='$id'"; 
  }
  else{
    echo $query= "update banner set Title='$title',Description='$description',Readnow='$read',Joinnow='$join',Status='$status',Image='$image' where Id='$id'"; 
  }
  

  $ex=mysqli_query($conn,$query);
 if($ex== true){
   header("location:Banner_listing.php");
 }
 else{
   $error="not update record ";
 }

}
 else{
  $query="select * from banner where Id='$id'";
  $ex=mysqli_query($conn,$query);
  $fet=mysqli_fetch_assoc($ex);
  if(isset($fet['Id'])){
    $title=$fet['Title'];
    $description=$fet['Description'];
    $readnow=$fet['Readnow'];
    $joinnow=$fet['Joinnow'];
    $image=$fet['Image'];
    $status=$fet['Status'];
  }
  }
  
?>

<!-- header section -->
<?php include_once("header.php") ?>
<?php include_once("menu.php") ?>
<?php include_once("breadcreamb.php") ?>

<!-- main section -->
<section class="content">
      <div class="container-fluid">
         <!--<div class="row"> -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">update Background Image</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Baner Title.." value="<?php echo $title ;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="Baner Description.." value="<?php echo $description ;?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Read now</label>
                    <input type="text" name="readnow" class="form-control" id="exampleInputPassword1" placeholder="link of read now" value="<?php echo $readnow ; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Join now</label>
                    <input type="text" name="joinnow" class="form-control" id="exampleInputPassword1" placeholder="Link of join now" value="<?php echo $joinnow ; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Banner Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="upload" class="custom-file-input" id="exampleInputFile" value="<?php echo $image; ?>">
                        <label class="custom-file-label" for="exampleInputFile"><?php echo $image; ?></label>
                      </div>
                     
                    </div>
                  </div>
                  <div class="form-check"> 
                 <?php 
                      if($status==1){
                       $check="checked";
                         }
                       else{
                         $check=" ";
                        }
                        ?>
                    <input type="checkbox" name="check" class="form-check-input" id="exampleCheck1" val="1" <?php echo $check; ?> > 
                    <label class="form-check-label" for="exampleCheck1">Status</label>
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

<!-- footer section -->
<?php include_once("footer.php"); ?>