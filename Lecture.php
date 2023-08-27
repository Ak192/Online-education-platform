<?php 
error_reporting(0);
session_start();
include_once("adminpanel/database.php");
include_once("header2.php");
$id=$_GET['id'];
$video=$_GET['video_id'];
$select="SELECT materials.id,materials.Product_Id,materials.Material_Type_Id,materials.Material_Name,
materials.Metarial_value,product.Product_Name,product.Image,material_type.Name from materials INNER join product on materials.Product_Id=product.id LEFT join material_type on materials.Material_Type_Id=material_type.Id  WHERE product.id='$id' ";
$ex=mysqli_query($conn,$select);
?>

<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">  -->
<link rel="stylesheet" href="css/profile.css">
<form action="" method="post" enctype="multipart/form-data">
<div class="container" style="padding-top:30px;">
    <div class="row gutters">
    
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12" style="height:80vh;">
            <div class="card h-100" style="padding-top:20px;overflow: auto">
            <?php 
      
           while($fet=mysqli_fetch_assoc($ex)){

      ?>
         <a href="Lecture.php?id=<?php echo $id; ?>&video_id=<?php echo $fet['Metarial_value'];?>"><div class="" style="  display: flex; width: 90%;margin: 10px auto;height: 57px;border-radius: 9px;box-shadow: 3px 4px 6px 1px gainsboro; padding-top: 5px;">
                 <img src="adminpanel/CourseImage/<?php echo $fet['Image'];?>" alt="upload"style=" width: 2opx; max-width: 20px; min-width: 46px; border-radius: 5px; border: 2px solid; margin: 5px;" >
                 <div class="course" style=" width: 80%; margin-left: 20px;">
                    <h6 style="font-size: 13px;"><?php echo $fet['Product_Name']; ?></h6>
                    <p style="margin-top: -12px;font-size: 13px;height: 35px;overflow: hidden;"><?php echo $fet['Material_Name']; ?></p>
                 </div>
              </div> </a> 
              <?php } ?>
             <!-- <div class="" style="  display: flex; width: 90%; margin: 10px auto;height: 57px;border-radius: 9px;box-shadow: 3px 4px 6px 1px gainsboro;">
                 <img src="adminpanel/image/online.png" alt="upload"style=" width: 2opx; max-width: 20px; min-width: 46px; border-radius: 5px; border: 2px solid; margin: 5px;" >
                 <div class="course" style=" width: 80%; margin-left: 20px;">
                    <h6>title</h6>
                    <p style="margin-top: -12px;"> course content</p>
                 </div>
              </div> -->
            </div>
        </div>
        
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/<?php echo $video;?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                   
                 
                </div>
            </div>
        </div>
     
    </div>
 
</div>
</form>


<?php
include_once("footer.php");

?>