<?php
//echo "<pre>";
//print_r($_SERVER);

$requestname = $_SERVER['SCRIPT_NAME'];


$menuArr = array(
    "profile"=>"",
    "changepass"=>"",
    "coursperchage"=>"",
    "cours" =>""
);

if($requestname=="/ecommerce/profile.php"){
    $menuArr['profile']="active";
}
else if($requestname=="/ecommerce/changepass.php"){
    $menuArr['changepass']="active";
}
else if($requestname =="/ecommerce/coursperchage.php"){
    $menuArr['coursperchage']="active";
}
else if($requestname =="/ecommerce/Assiment.php" || $requestname=="/ecommerce/Lecture.php"){
    $menuArr['cours']="active";
}

else{
    $menuArr['profile']="active";
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>eLEARNING - eLearning HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
   
</head>

<body>
<!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
      <a href="index.php"><img class=" px-4" src="adminpanel/image/logo.png" alt="Upload" width="200px"> </a>
       <!-- <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>eLEARNING</h2> 
        </a> -->
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="profile.php" class="nav-item nav-link <?php echo $menuArr['profile'];?>">profile</a>
                <a href="changepass.php" class="nav-item nav-link  <?php echo $menuArr['changepass'];?>">change password</a>
                <a href="coursperchage.php" class="nav-item nav-link <?php echo $menuArr['coursperchage'];?>">course perchage </a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle <?php echo $menuArr['cours'];?>" data-bs-toggle="dropdown" >Course metrial</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="Assiment.php" class="dropdown-item">Assiment</a>
                        <a href="Lecture.php" class="dropdown-item">Lacture video</a>
                        
                    </div>
                </div>
               <!-- <a href="contact.php" class="nav-item nav-link <?php echo $menuArr['contact'];?> ">fqs</a> -->
            </div>
            <a href="logout.php" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Logout now <i class="fa-duotone fa-arrow-right-to-arc"></i> </a>
        </div>
    </nav>