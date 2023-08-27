<?php 
session_start();
if(isset($_SESSION['user_id'])){
    $id=$_SESSION['user_id'];
   $email=$_SESSION['email'];
}
?>
<?php include_once("header2.php"); ?>
<?php 
     include_once("adminpanel/database.php");
     $cours="SELECT product.id,product.Product_Name,product.Price,product.Image from product inner join orders on product.id=orders.Product_id where orders.Email='$email' ";
     $cex=mysqli_query($conn,$cours);
     ?>
<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
                <h1 class="mb-5">Purchage Courses</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <?php $i=1; while($cour=mysqli_fetch_assoc($cex)) { ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="<?php echo "0.".$i."s" ?>">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="adminpanel/CourseImage/<?php echo $cour['Image']; ?>" alt="Upload" style="min-width: 100%; height: 40vh;" >
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="Assiment.php?id=<?php echo $cour['id'];  ?>" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Assiment</a>
                                <a href="Lecture.php?id=<?php echo $cour['id']; ?>" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Lecture</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0">&#8377; <?php echo $cour['Price']; ?></h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small>(123)</small>
                            </div>
                            <h5 class="mb-4"><?php echo $cour['Product_Name']; ?> </h5>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>John Doe</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>1.49 Hrs</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30 Students</small>
                        </div>
                    </div>
                </div>
                 <?php  $i=$i+2; }  ?>
   
               
             </div>
        </div>
    </div>


<?php include_once("footer.php"); ?>
