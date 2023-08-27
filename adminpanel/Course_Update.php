<?php 
session_start();
include_once("database.php");
$id=$_GET['id'];
$name="";
$category="";
$popular="";
if(isset($_POST['name'])){
 $name=$_POST['name'];
 $himage=$_POST['himage'];
 $category=$_POST['category'];
 $start_date= $_POST['start_date'];
  $d=strtotime($start_date);
 $start=date("Y-m-d H:i:s",$d);
 $end_date=$_POST['end_date'];
 $e=strtotime($end_date);
 $end=date("Y-m-d H:i:s",$e);
 $faculty=$_POST['instructor'];
 $description=$_POST['description'];
 $price=$_POST['price'];
 $popular=$_POST['popural'];
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
    $query="update product set Product_name='$name',Price='$price',Status='$status',Popular_course='$popular',Category_id='$category',Start_dateTime='$start',End_dateTime='$end',Instructor_id='$faculty',Description='$description' where id='$id'";
  
  }
  else{
    $query="update product set Product_name='$name',Price='$price',Status='$status',Popular_course='$popular',Category_id='$category',Start_dateTime='$start',End_dateTime='$end',Instructor_id='$faculty',Join_now_url='$description',Image='$image' where id='$id'";

  }
  $ex=mysqli_query($conn,$query);  
  if($ex==true && !isset($image)==true)
  {
    header("location:course_listing.php");
  }
 else if($ex==true){
    unlink("CourseImage/".$himage);
    header("location:course_listing.php");
    
  }
  else{
    $error="not update";
  }
 
}
else{
    $query="SELECT *,category.Category_Name FROM `product` INNER join category on product.Category_id=category.Id WHERE product.id='$id'";
    $ex=mysqli_query($conn,$query);
    $fet=mysqli_fetch_assoc($ex);
    if(isset($fet['id'])){
       $name=$fet['Product_Name'];
       $category=$fet['Category_id'];
       $popular=$fet['Popular_course'];
       $status=$fet['Status'];
       $price=$fet['Price'];
       $start=$fet['Start_dateTime'];
       $end=$fet['End_dateTime'];
       $faculty=$fet['Instructor_id']; 
       $description=$fet['Description'];
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
                <h3 class="card-title">Update Course Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="cours-name">Course Name :</label>
                    <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="course name..." value="<?php echo $name; ?>">
                  </div>
                  <div class="form-group">
                    <label for="category"> Category :</label>
                        <select class="form-control" name="category" value="">
                            <option value=""  disabled >select...</option>
                        <?php  
                              $data="select * from category";
                              $ex1=mysqli_query($conn,$data);
                              while ($cat=mysqli_fetch_assoc($ex1)){
                                $select="";
                                if($category==$cat['Id']){
                                    $select="selected";
                                }
                                else{
                                    $select="select.....";
                                }
                              ?>
                            <option value="<?php echo $cat['Id']; ?>" <?php echo $select ;?> > <?php echo $cat['Category_Name']; ?> </option>
                            <?php } ?>
                        </select>      
                    </div>
                    <div class="form-group">
                    <label for="category"> Popular course :</label>
                        <select class="form-control" name="popural" value="">
                            <option value="" selected  disabled >select...</option>
                            <?php
                            if($popular==1){
                         $select="selected";
                        echo "<option value='1' $select> yes</option>
                        <option value='0'> no </option>";
                       }
                        else if($popular==0){
                            $select="selected";
                            echo "<option value='1' > yes</option>
                        <option value='0' $select > no </option>";
     
                        }
                        else{
                            $popular="";
                        }
                        ?> 
                        </select>      
                    </div>
                  <div class="form-group">
                     <label for="datetime">Start Date & Time :</label>
                     <input type="datetime-local" name="start_date" id="" class="form-control" value="<?php echo $start ;?>" >
                   </div>   
                   <div class="form-group">
                     <label for="datetime">End Date & Time :</label>
                     <input type="datetime-local" name="end_date" id="" class="form-control" value="<?php echo $end ;?>">
                   </div>         
                   <div class="form-group">
                    <label for="faculty">Faculty Name :</label>
                    <select class="form-control" name="instructor">
                     <option value="" selected disabled>select.. </option>
                     <?php 
                     $select="select * from instructor ";
                     $fex=mysqli_query($conn,$select);
                      while($fet= mysqli_fetch_assoc($fex)){
                        if($faculty==$fet['Id']){
                            $select="selected";
                        }
                        else{
                          $select="";
                        }
                     ?>
                       <option value="<?php echo $fet['Id'];?>"<?php echo $select ; ?>><?php echo $fet['Instructor_name'];?> </option>
                         <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="desc"> Description :</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Enter ..." > <?php echo $description; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="Price">Prices :</label>
                    <input type="number" name="price" class="form-control" id="exampleInputPassword1" placeholder="price of course" value="<?php echo $price ; ?>">
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