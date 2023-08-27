<?php 
session_start();
include_once("adminpanel/database.php");
include_once("header.php");
?>
<!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Testimonial</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Testimonial</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Testimonial Start -->
    <?php 
      $q="select * from testimonial where Status=1";
      $ex1=mysqli_query($conn,$q);
       ?>

    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                <h1 class="mb-5">Our Students Say!</h1>
            </div>

            
            <div class="owl-carousel testimonial-carousel position-relative">
            <?php while($t=mysqli_fetch_assoc($ex1)){ ?>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="adminpanel/TestimonialImage/<?php echo $t['Image']; ?>" style="width: 80px; height: 80px;">
                    <h5 class="mb-0"><?php echo $t['Client_name']; ?></h5>
                    <p><?php echo $t['Profession']; ?></p>
                    <div class="testimonial-text bg-light text-center p-4">
                    <p class="mb-0"><?php echo $t['Message']; ?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
            
        </div>
    </div>
    --
    <!-- Testimonial End -->
        

    <!-- Footer Start -->
    <?php include_once("footer.php"); ?>