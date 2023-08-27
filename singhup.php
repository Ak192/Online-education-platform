<?php
session_start();
if(isset($_POST['name'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $pass=$_POST['cpass'];
    $pas= md5($pass);
    include_once("adminpanel/database.php");
$query="insert into user (Name,Email,Password) values('$name','$email','$pas')";
$ex=mysqli_query($conn,$query);
if($ex== true){
    header("location:login.php");
}
else{
    echo $error="please try again";
}
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="row justify-content-center" style="margin:30px 0px; ">
        <div class="col-md-7 col-lg-5" style=" display: flex; align-items: center;justify-content: center;">
            <div class="login-wrap p-4 p-md-5">
                <div class="d-flex">
                    <div class="w-100">
                        <img src="adminpanel/image/logo.png" alt="" width="150px">
                    </div>
                    <div class="w-100">
                        <p class="social-media d-flex justify-content-end">
                            <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span
                                    class="fa fa-facebook"></span></a>
                            <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span
                                    class="fa fa-twitter"></span></a>
                        </p>
                    </div>
                </div>
                <form action="#" class="login-form"  method="post" >
                    <div class="form-group">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="fa fa-user"></span></div>
                        <input type="text" name="name"; class="form-control rounded-left" placeholder="name" required="">
                    </div>
                    <div class="form-group">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="fa  fa-envelope"></span></div>
                        <input type="text" name="email" class="form-control rounded-left" placeholder="Email" required="">
                    </div>

                    <div class="form-group">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="fa fa-lock"></span></div>
                        <input type="password" name="pass" class="form-control rounded-left" placeholder="Password" required="">
                    </div>
                    <div class="form-group">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="fa fa-lock"></span></div>
                        <input type="password" name="cpass" class="form-control rounded-left" placeholder="Conform password"
                            required="">
                    </div>
                    <div class="form-group d-flex align-items-center">
                        <div class="w-100 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary rounded submit" style=" width:100%; ">Singh
                                up</button>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <div class="w-100 text-center">
                            <p class="mb-1">Already have an acount ? <a href="login.php">Login now</a></p>
                            <p><a href="forget.php">Forgot Password</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- footer -->
</body>

</html>