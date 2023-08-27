<?php
session_start();
include_once("database.php");
$id=$_GET['id'];

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

  }
  if(!isset($image)){
    $query="update testimonial set Client_name='$name',Profession='$profession',Message='$message',status='$status' where Id='$id'";  
  }
  else{
  $query="update testimonial set Client_name='$name',Profession='$profession',Message='$message',status='$status',Image='$image' where Id='$id'";
  }
      $ex=mysqli_query($conn,$query);
      if($ex==true && !isset($image)==true)
      {
        header("location:Testimonials_list.php");
      }
     else if($ex==true){
        unlink("TestimonialImage/".$himage);
        header("location:Testimonials_list.php");
        
      }
      else{
        $error="not update";
      }
     

}
else{
     $select="select * from testimonial where Id='$id'";
     $ex1=mysqli_query($conn,$select);
     $fet=mysqli_fetch_assoc($ex1);
     if(isset($fet['Id'])){
    $name=$fet['Client_name'];
    $profession=$fet['Profession'];
    $message=$fet['Message'];
    $status=$fet['status'];
    $himage=$fet['Image']; 
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
                <h3 class="card-title">Update Testimonial information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="Client-name">client name :</label>
                    <input type="text" class="form-control" name="name" id="client-name" placeholder="Client name..." value="<?php echo $name ; ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1" >Profession :</label>
                    <select class="form-control" name="profession">
                     <option value=" " disabled >selected Profession </option>
                     <?php
                       if($profession==1){
                         $select="selected";
                        echo "<option value='0'> student </option>
                         <option value='1' echo $select >faculty </option>";
                       }
                        else if($profession==0){
                            $select="selected";
                            echo "<option value='0'  echo $select > Student </option>
                            <option value='1'>faculty </option>";
     
                        }
                        else{
                            $profession="";
                        }
                        ?>
                      
                    </select>
                  </div>
                  <div class="form-group">
                        <label>Message :</label>
                        <textarea name="message" class="form-control" rows="3" placeholder="Enter ..." ><?php echo $message ; ?></textarea>
                     </div>
                  
                  <div class="form-group">
                  <label> client image :</label>
                    <div class="custom-file">
                      <input type="file" name="upload" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile"><?php echo $himage ; ?> </label>
                      <input type="hidden" name="himage" value="<?php echo $himage;?>">
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
                    <input type="checkbox" name="check" class="form-check-input" id="exampleCheck1" val="1" <?php echo $check ;?> >
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
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
 <!-- footer section -->
<?php include_once("footer.php");?>