<?php
 $id=$_GET['id'];
include_once("adminpanel/database.php");
$query="SELECT product.id,product.Product_Name,product.Price,product.Start_dateTime,
 product.End_dateTime,product.Image,product.Description,category.Category_Name,instructor.Instructor_name FROM `product` 
  INNER join category on product.Category_id=category.Id
 inner join instructor on product.Instructor_id=instructor.Id WHERE product.id='$id'";
$ex=mysqli_query($conn,$query);
$fet=mysqli_fetch_assoc($ex);
if(isset($fet['id'])){
  $title = $fet['Product_Name'];
  $category = $fet['Category_Name'];
  $start = $fet['Start_dateTime'];
  $end = $fet['End_dateTime'];
  $image = $fet['Image'];
  $price= $fet['Price'];
  $description=$fet['Description'];
  $faculty=$fet['Instructor_name'];
} 
?>

<?php include_once("header.php") ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
 
    <!-- /.content-header -->

    <!-- Main content -->
    
    <section class="content" style="margin-top:20px;">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
      
        <div class="media" style="display:flex;">
       <img class="align-self-center mr-3" src="adminpanel/CourseImage/<?php echo $image; ?>" alt="Generic placeholder image" style="
    height: 100%;
    width: 50%;
    magin-right: 20px;
    margin-right: 20px;
    border-radius: 15px;
">
     <div class="media-body">
      <h5 class="mt-0" style=" border-radius: 0px 0px 15px 15px;background: aqua;padding: 15px;"><?php echo  $title ; ?> &emsp; (<?php echo $category; ?>) </h5>
      <h3 class="mt-0" style="font-size: 20px;padding: 10px 21px;" ><?php echo  $price ; ?>.00/- &emsp; (<?php echo $start."-". $end; ?>) </h3>
      <h5 class="mt-0"><?php echo  $faculty ; ?></h5>
       <p> <?php echo  $description ; ?></p>
      
       <a href="join_now.php"> <button type="button" class="btn btn-outline-success mt-2 txt-end">Join now</button> </a>
  </div>
  
</div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once("footer.php"); ?>