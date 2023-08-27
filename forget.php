<?php
session_start();
include_once("adminpanel/database.php");
if(isset($_POST['email'])){
    $email=$_POST['email'];
    $query="select * from user where Email='$email'";
    $ex=mysqli_query($conn,$query);
    $s=mysqli_fetch_assoc($ex);
    if(isset($s['Email'])){
       $email=$s['Email'];
      $username=$s['Name'];
      $password=$s['Password'];
        $to_email= $email;
        $subject="forget password";
        $body="hello ".$username." your password : ".$password ;
       $sender_email ="From: onlineeducationplatform71@gmail.com";
        if(mail($to_email,$subject,$body,$sender_email)){
        $_SESSION['msg']="password is send to your mail :".$email;
         header("location: login.php");
        }
        else{
            $error="invalid email! <br> please check your and try again ?";
        }
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


    <!--header -->


    <div class="row justify-content-center" style="margin-top:54px;">
        <div class="col-md-7 col-lg-5" style=" display: flex; align-items: center; justify-content: center;">
            <div class="login-wrap p-4 p-md-5">
                <div class="d-flex">
                    <div class="w-100">
                        <img src="adminpanel/image/logo.png" alt="" width="150px">
                    </div>
                    <div class="w-100">
                        <p class="social-media d-flex justify-content-end">
                            <a href="#" class="social-icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-facebook"></span></a>
                            <a href="#" class="social-icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-twitter"></span></a>
                        </p>
                    </div>
                </div>
                <form action="#" class="login-form" method="post">
                    <div class="form-group">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="fa fa-user"></span></div>
                        <input type="email" name="email" class="form-control rounded-left" placeholder="Username" required="">
                    </div>
                    
                    <div class="form-group d-flex align-items-center">
                        <div class="w-100 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary rounded submit" style=" width:100%; ">Forget Password</button>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <div class="w-100 text-center">
                            <p>if don't forget password <a href="login.php">Login</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- footer -->
</body>

</html>