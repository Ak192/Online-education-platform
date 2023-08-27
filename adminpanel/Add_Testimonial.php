<?php
session_start();
include_once("database.php");

if(isset($_POST['name'])){

   
  $name=$_POST['name']; 
  $profession=$_POST['profession'];
  $message= $_POST['message'];
  $status = isset($_POST['check'])?1:0;
  $fname=$_FILES['upload']['name'];
 $type=$_FILES['upload']['type'];
 $tmp_name=$_FILES['upload']['tmp_name'];
  if($type == "image/jpg" || $type == "image/jpeg" ||$type == "image/png"){
    $image_name = time().rand().$fname;
    $dest="TestimonialImage/";
    $destpath=$dest.$image_name;
    $save=move_uploaded_file($tmp_name,$destpath);
    $image="";
    if($save == true){
        $image= $image_name;
    }   
    $query="insert into testimonial(Client_name,Profession,Message,Image,Status) values('$name','$profession','$message','$image','$status')";
    $ex=mysqli_query($conn,$query);
    if($ex==true){
      header("location:Testimonials_list.php");
    }
 
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
                <h3 class="card-title">Testimonial information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">client name :</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Client name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1" >Profession :</label>
                    <select class="form-control" name="profession">
                     <option value="" selected disabled >selected Profession </option>
                       <option value="0">student </option>
                       <option value="1">faculty </option>
                    </select>
                  </div>
                  <div class="form-group">
                        <label>Message :</label>
                        <textarea name="message" class="form-control" rows="3" placeholder="Enter ..."></textarea>
                     </div>
                  
                  <div class="form-group">
                  <label> client image :</label>
                    <div class="custom-file">
                      <input type="file" name="upload" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose file</label>
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
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
 <!-- footer section -->
<?php include_once("footer.php");?>