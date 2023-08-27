<?php
session_start();
if(isset($_SESSION['user_id'])){
   header("location:profile.php");
}
$referrer = isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:"";
//$productDetailPage = strpos($referrer,"cart_details.php");
$loginPageRef = strpos($referrer,"login.php");
$logoutPageRef = strpos($referrer,"logout.php");



if($loginPageRef ==false && $logoutPageRef ==false){
    $_SESSION['referrer'] = $referrer;
}


if(isset($_POST['username'])){
    $username=$_POST['username'];
    $pass=$_POST['password'];
   echo $pas=md5($pass);
    include_once("adminpanel/database.php");
    $query="select * from user where Email='$username' and Password='$pas'";
    $ex=mysqli_query($conn,$query);
    $s=mysqli_fetch_assoc($ex);
     if(isset($s['Id'])){
        $_SESSION['user_id']=$s['Id'];
        $_SESSION['name']=$s['Name'];
        $_SESSION['email']=$s['Email'];

       if(isset($_SESSION['referrer']) && $_SESSION['referrer'] !=""){
            $redirect = $_SESSION['referrer'];
            unset($_SESSION['referrer']);
            header("location:".$redirect);
        }
        else{
            header("location:profile.php");
        }
    
        
     }
    else{
        $error="invalid user";
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
        <div class="col-md-7 col-lg-5" style="
    display: flex;
    align-items: center;
    justify-content: center;">
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
                <form action="#" class="login-form" method="post">
                    <div class="form-group">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="fa fa-user"></span></div>
                        <input type="text" name="username"class="form-control rounded-left" placeholder="Username" required="">
                    </div>
                    <div class="form-group">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="fa fa-lock"></span></div>
                        <input type="password" name="password" class="form-control rounded-left" placeholder="Password" required="">
                    </div>
                    <div class="form-group d-flex align-items-center">

                        <div class="w-100 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary rounded submit"
                                style=" width:100%; ">Login</button>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <div class="w-100 text-center">
                            <p class="mb-1">Don't have an account? <a href="singhup.php">Sign Up</a></p>
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