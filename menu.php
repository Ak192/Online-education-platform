<?php
$requestname = $_SERVER['SCRIPT_NAME'];

$menuArr = array(
    "profile"=>"",
    "about"=>"",
    "courses"=>"",
    "pages"=> "",
    "contact"=>""
);

if($requestname=="/ecommerce/profile.php"){
    $menuArr['profile']="active";
}
else if($requestname=="/ecommerce/home.php"){
    $menuArr['home']="active";
}
else if($requestname =="/ecommerce/courses.php"){
    $menuArr['courses']="active";
}
else if($requestname =="/ecommerce/team.php" || $requestname=="/ecommerce/testimonial.php" ||$requestname=="/ecommerce/404.php"){
    $menuArr['pages']="active";
}
else if($requestname =="/ecommerce/contact.php"){
    $menuArr['contact']="active";
}

else{
    $menuArr['home']="active";
}

?>

</head>
<body style="padding-top: 0px;">
<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <img class=" px-4" src="adminpanel/image/logo.png" alt="Upload" width="200px">
       <!-- <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>eLEARNING</h2> 
        </a> -->
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link <?php echo $menuArr['profile'];?>">profile</a>
                <a href="about.php" class="nav-item nav-link  <?php echo $menuArr['about'];?>">About</a>
                <a href="courses.php" class="nav-item nav-link <?php echo $menuArr['courses'];?>">Courses</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle <?php echo $menuArr['pages'];?>" data-bs-toggle="dropdown" >Pages</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="team.php" class="dropdown-item">Our Team</a>
                        <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                        <a href="404.php" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="contact.php" class="nav-item nav-link <?php echo $menuArr['contact'];?> ">Contact</a>
            </div>
            <a href="login.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Login now<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>