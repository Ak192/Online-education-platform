<?php 
if(!isset($_SESSION)){
    session_start();

}

if(!isset($_SESSION['user_id'])){
header("location:login.php");
}
else{
        $user_id=$_SESSION['user_id'];
        $name=$_SESSION['name'];
        $email=$_SESSION['email'];
        
}

 $id=$_GET['id'];

 if($id<1 || $id==""){
    header("location:index.php");
 }
 $product_id=$id;
 $_SESSION['product_id']=$id;
include_once("adminpanel/database.php");
$select="select Product_name,Price from product where id='$id' ";
$proex=mysqli_query($conn,$select);
$profet=mysqli_fetch_assoc($proex);
$price=$profet['Price'];
$razorPayPrice = ($price*100);
/*
if(isset($_GET['first'])){
  $first=$_GET['first'];
  $last=$_GET['last'];
  $mobile=$_GET['mobile'];
  $address1=$_GET['address1'];
  $address2=$_GET['address2'];
  $country=$_GET['country'];
  $state=$_GET['state'];
  $city=$_GET['city'];
  $zip=$_GET['zip'];
   
 /* $ins="insert into orders (User_id,Product_id,Total_net_amount,First_name,Last_name,Email,Mobile_no,Address1,Address2,Country_id,State_id,City_name,Zip_code) value ('$user_id','$product_id','$price','$first','$last','$email','$mobile','$address1','$address2','$country','$state','$city','$zip')";
 $ex=mysqli_query($conn,$ins);
 if(isset($ex)){
    $_SESSION['status']="order has been successfully complited";
   // header("location:order_status.php");
  // header("location:pay.php");
 }
 else{
    $_SESSION['status']="order faild !";
    //header("location:order_status.php");
   // header("location:pay.php");
 }
  

}
*/




?>
<!-- header -->
<?php include_once("header.php"); ?>


<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="lib/animate/animate.min.css" rel="stylesheet">
<link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="css/style2.css" rel="stylesheet">



<!-- Shop Detail Start -->

<script src=   
    "https://ajax.googleapis.com/ajax/libs/   
    jquery/3.3.1/jquery.min.js">   
    </script>   
    <!-- Popper JS -->  
    <script src=   
    "https://cdnjs.cloudflare.com/ajax/libs/   
    popper.js/1.12.9/umd/popper.min.js">   
    </script>   
    <!-- Latest compiled JavaScript -->  
    <script src=   
    "https://maxcdn.bootstrapcdn.com/bootstrap/   
    4.0.0/js/bootstrap.min.js">   
    </script>   
<?php 

     include_once("adminpanel/database.php");

    ?>
<form action="config.php" method="" >
<div class="container-fluid" style=" margin-top: 30px;">
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Billing
                    Address</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label>First Name</label>
                        <input class="form-control" type="text" name="first" id="first" placeholder="John">
                        <span id="firstError" style="color:red;"></span>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Last Name</label>
                        <input class="form-control" type="text" name="last" id="last" placeholder="Doe">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>E-mail</label>
                        <input class="form-control" type="text" name="email" id="email" placeholder="example@email.com"
                            value="<?php echo $email; ?>" >
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Mobile No</label>
                        <input class="form-control" type="text" name="mobile" id="mobile" placeholder="+123 456 789">
                        <span id="mobileError" style="color:red;"></span>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Address Line 1</label>
                        <input class="form-control" type="text" name="address1" id="address1" placeholder="123 Street">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Address Line 2</label>
                        <input class="form-control" type="text" name="address2" id="address2" placeholder="123 Street">
                    </div>
                    <div class="col-md-6 form-group">
                        <label>Country</label>
                        <select class="custom-select" id="country" name="country">
                            <option selected disabled>select Country..</option>
                            <option value="1">india</option>

                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <label>City</label>
                        <input class="form-control"  id="city" type="text" name="city" placeholder="New York" >
                    </div>
                    <div class="col-md-6 form-group">
                        <label>State</label>
                        <select class="custom-select" id="state" name="state">
                            <option selected disabled>select state..</option>
                            <option value="1">Bihar</option>
                            <option value="2">UP</option>
                            <option value="3">mp</option>
                            <option value="4">jharkhand</option>
                        </select>
                    </div>
                    <!--  <div class="col-md-6 form-group">
                            <label>State</label>
                            <input class="form-control" type="text" placeholder="New York">
                        </div> -->
                    <div class="col-md-6 form-group">
                        <label>ZIP Code</label>
                        <input class="form-control" id="zip" type="text" name="zip" placeholder="123">
                    </div>
                    <!--  <div class="col-md-12 form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="newaccount">
                                <label class="custom-control-label" for="newaccount">Create an account</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="shipto">
                                <label class="custom-control-label" for="shipto" data-toggle="collapse" data-target="#shipping-address">Ship to different address</label>
                            </div>
                        </div> -->
                </div>
            </div>
            <!-- <div class="collapse mb-5" id="shipping-address">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Shipping Address</span></h5>
                    <div class="bg-light p-30">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" placeholder="John">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" placeholder="Doe">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" placeholder="example@email.com">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" placeholder="+123 456 789">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 1</label>
                                <input class="form-control" type="text" placeholder="123 Street">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 2</label>
                                <input class="form-control" type="text" placeholder="123 Street">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Country</label>
                                <select class="custom-select">
                                    <option selected="">United States</option>
                                    <option>Afghanistan</option>
                                    <option>Albania</option>
                                    <option>Algeria</option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>City</label>
                                <input class="form-control" type="text" placeholder="New York">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>State</label>
                                <input class="form-control" type="text" placeholder="New York">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input class="form-control" type="text" placeholder="123">
                            </div>
                        </div>
                    </div>
                </div>-->
        </div>
        <?php
            
            

             ?>
        <div class="col-lg-4">
            <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Order
                    Total</span></h5>
            <div class="bg-light p-30 mb-5">
                <div class="border-bottom">
                    <h6 class="mb-3">Products</h6>
                    <div class="d-flex justify-content-between">
                        <p>
                            <?php echo $profet['Product_name']; ?>
                        </p>
                        <p name="price" >&#8377;
                            <?php echo $profet['Price']; ?>
                        </p>
                    </div>
                    <!-- <div class="d-flex justify-content-between">
                            <p>Product Name 2</p>
                            <p>$150</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p>Product Name 3</p>
                            <p>$150</p>
                        </div> -->
                </div>
                <!-- <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>$150</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">$10</h6>
                        </div>
                    </div>-->
                <div class="pt-2">
                    <div class="d-flex justify-content-between mt-2">
                        <h5>Total</h5>
                        <h5>&#8377;
                            <?php echo $profet['Price']; ?>

                        </h5>
                    </div>
                </div>
            </div>
            <div class="mb-5">
                    <button class="btn btn-block btn-primary font-weight-bold py-3 buy_now" type="button">Pay Now</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<!-- Shop Detail End -->


<!-- Products Start -->
<!-- Products End -->


<!-- Footer Start -->

<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

  $('body').on('click', '.buy_now', function(e){
   // var totalAmount = $(this).attr("data-amount");
    var product_id =  $(this).attr("data-id");
    

    var first_name =$('#first').val();
    var last_name=$('#last').val();
    var email=$('#email').val();
    var mobile =$('#mobile').val();
    var address1=$('#address1').val();
    var address2=$('#address2').val();
    var country_id=$('#country').val();
    var state_id=$('#state').val();
    var city_name=$('#city').val();
    var zip_code=$('#zip').val();
    var error = false;

    /*if(first==""){      
      //alert("please enter the first name");
      //document.getElementById("firstError").innerHTML="please enter the first name";
      $('#firstError').html('please enter the first name');
      document.getElementById('first').focus();
      error= true;
    
    }
    else{
        $('#firstError').html('');
    }
    var last=$('#last').val();
    if(last==""){
        alert("please enter the last  name");
       // document.getElementById('last').focus();
        error= true;
    }
    var mob_regex = /^(?:(?:\+|0{0,2})91(\s*[\-]\s*)?|[0]?)?[789]\d{9}$/;
    if(mobile==""){
        alert("please enter the mobile");
        $('#mobileError').html('please enter the mobile');
        error= true;
    }   

    else if(mob_regex.test(mobile)==false){
        $('#mobileError').html('please enter the mobilef');
    } 
    
    else{
        $('#mobileError').html('');
    }*/


    if(error==false){
    var options = {
    "key": "rzp_test_JtHNOTI9gzjlv1",
    "amount": "<?php echo $razorPayPrice ;?>", // 2000 paise = INR 20
    "name": "Online Education Platform",
    "description": "Payment",
    "image": "adminpanel/image/logo.png",
    "handler": function (response){
          $.ajax({
            url: 'http://localhost/ecommerce/config.php',
            type: 'post',
            dataType: 'json',
            data: {
             razorpay_payment_id: response.razorpay_payment_id , totalAmount : "<?php echo $razorPayPrice ;?>", first : first_name,last : last_name,mobile : mobile, address1 : address1,address2 : address2, country : country_id ,state : state_id, city : city_name,zip_code : zip_code
            }, 
            success: function (response) {
              //  if(response.flag==true){
                window.location.href = 'success.php';
               // }

             ///  window.location.href = 'http://localhost/ecommerce/success.php';
            }
        });
     
    },

    "theme": {
        "color": "#528FF0"
    }
  };
  var rzp1 = new Razorpay(options);
  rzp1.open();
  e.preventDefault();


    }
  });

</script>
<!-- footer -->
<?php include_once("footer.php");?>