<?php 
session_start();
include_once("database.php");


if(isset($_POST['name'])){
 $name=$_POST['name'];
 $designation=$_POST['designation'];
 $facebook= $_POST['facebook'];
 $twitter=$_POST['twitter'];
 $instagram=$_POST['instagram'];
 $status = isset($_POST['check'])?1:0;
 $fname=$_FILES['upload']['name'];
 $type=$_FILES['upload']['type'];
 $tmp_name=$_FILES['upload']['tmp_name'];
  if($type == "image/jpg" || $type == "image/jpeg" ||$type == "image/png"){
    $image_name = time().rand().$fname;
    $dest="InstructorImage/";
    $destpath=$dest.$image_name;
    $save=move_uploaded_file($tmp_name,$destpath);
    $image="";
    if($save == true){
        $image= $image_name;
    }
   
 $query="insert into instructor (Instructor_name,Designation,Facebook_url,Twitter_url,Instagram_url,Image,Status) values('$name','$designation','$facebook','$twitter','$instagram','$image','$status')";

    $ex=mysqli_query($conn,$query);

  }
  if($ex== true){
    header("location:Instructor_list.php");
  }
}



?>



<!--header section -->
<?php include_once("header.php");?>
<?php include_once("menu.php");?>
<?php include_once("breadcreamb.php");?>
<!-- main section -->

<section class="content">
      <div class="container-fluid">
         <!--<div class="row"> -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add instructor Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Instructor Name :</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder=" instructor name ...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Designation :</label>
                    <input type="text" name="designation" class="form-control" id="exampleInputPassword1" placeholder="Designation...">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Facebook URL :</label>
                    <input type="text" name="facebook" class="form-control" id="exampleInputPassword1" placeholder="url of facebook..">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Twitter URL :</label>
                    <input type="text" name="twitter" class="form-control" id="exampleInputPassword1" placeholder="url of twitter..">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Instagram URL :</label>
                    <input type="text" name="instagram" class="form-control" id="exampleInputPassword1" placeholder="url of instagram..">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Image :</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="upload" class="custom-file-input" id="exampleInputFile" value="">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                     
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" name="check" class="form-check-input" id="exampleCheck1" val="1" >
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
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
<?php include_once("footer.php");?>