<?php 
session_start();
include_once("database.php");
 
$id=$_GET['id'];
$iid=$id;

if(isset($_POST['name'])){
     $name=$_POST['name'];
     $product_id=$id;
     $content_type=$_POST['type'];
     $token=$_POST['token'];
     $status = isset($_POST['check'])?1:0;
     $fname=$_FILES['upload']['name'];
     $type=$_FILES['upload']['type'];
     $tmp_name=$_FILES['upload']['tmp_name'];
  if($type == "application/pdf"){
    $file_name = time().rand().$fname;
    $dest="CourseImage/coursemetarials/";
    $destpath=$dest.$file_name;
    $save=move_uploaded_file($tmp_name,$destpath);
    $file="";
    if($save == true){
        $file= $file_name;
       
    }

  }
  $query="INSERT into materials(Product_Id,Material_Type_Id,Material_Name,Metarial_value,Assiment,Status)
   values('$product_id','$content_type','$name','$token','$file','$status')";
  $ex=mysqli_query($conn,$query);
  if($ex==true){
    header("location:course_metarial.php?id=$iid");
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
                <h3 class="card-title">Add course_metarials Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="subject"> Subject Name:</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder=" subject  name ..." >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Content Type :</label>
                    <select class="form-control" name="type" value="">
                            <option value="" selected  disabled >select...</option>
                             <?php $typeselect="select * from material_type ";
                               $typeex=mysqli_query($conn,$typeselect);
                               while($fet=mysqli_fetch_assoc($typeex)){
                                ?>
                                <option value="<?php echo $fet['Id'] ?>"  > <?php echo $fet['Name']; ?></option>
                                <?php }?>
                        </select>    
                  </div>
                  <div class="form-group">
                    <label for="youtube-token">YouTube Token :</label>
                    <input type="text" name="token" class="form-control" id=" " placeholder="YouTube Token...">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Assiment upload :</label>
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