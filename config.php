<?php
    if(!isset($_SESSION)){
      session_start();
  }
  $returnArr = array('flag'=>false);
  if(!isset($_SESSION['user_id'])){
     //header("location:login.php");
     $returnArr['message']="Un Authorised user";
     echo json_encode($returnArr);
     exit;
  }
  else{
        $user_id=$_SESSION['user_id'];
        $name=$_SESSION['name'];
        $email=$_SESSION['email'];
        $id=$_SESSION['product_id'];
  }
  $product_id=$id;
  include_once("adminpanel/database.php");
  $select="select Product_name,Price from product where id='$id' ";
  $proex=mysqli_query($conn,$select);
  $profet=mysqli_fetch_assoc($proex);
  $price=$profet['Price'];
   
   if(isset($_POST['first'])){
     $first=$_POST['first'];
     $last=$_POST['last'];
     $mobile=$_POST['mobile'];
     $address1=$_POST['address1'];
     $address2=$_POST['address2'];
     $country=$_POST['country'];
     $state=$_POST['state'];
     $city=$_POST['city'];
     $zip=$_POST['zip_code'];
     $razorpay_payment_id=$_POST['razorpay_payment_id'];
     $tolal_amount=$_POST['totalAmount']/100;
      if($razorpay_payment_id == true){
        $status=1;
      }
      else{
        $state=0;
      }
     $ins="insert into orders (User_id,Product_id,Total_net_amount,razorpay_payment_id,Oder_status,First_name,Last_name,Email,Mobile_no,Address1,Address2,Country_id,State_id,City_name,Zip_code) value ('$user_id','$product_id','$tolal_amount','$razorpay_payment_id','$status','$first','$last','$email','$mobile','$address1','$address2','$country','$state','$city','$zip')";
    $ex=mysqli_query($conn,$ins);
   if(isset($ex)){
    $returnArr['flag']=true;
      $returnArr['message']="Order is successfully created";
    }
    else{
      $returnArr['message']="Sorry! Order is not created. Please try it again later.";
    }
     
   
   }
   

   echo json_encode($returnArr);
   
  

   
?>
