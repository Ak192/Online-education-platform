<?php 
//error_reporting(0);
session_start();
if(isset($_SESSION['user_id'])){
    $id=$_SESSION['user_id'];
   $email=$_SESSION['email'];
} 


include_once("adminpanel/database.php");


if(isset($_POST['submit'])){
    $name=isset($_POST['fullname'])?$_POST['fullname']:"";
    $phone=$_POST['phone'];
    $gender=$_POST['Gender'];
    $Address=$_POST['address'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $zipcode=$_POST['zip'];
 
   $fname=$_FILES['upload']['name'];
    $type=$_FILES['upload']['type'];
   $tmp_name=$_FILES['upload']['tmp_name'];
  if($type == "image/jpg" || $type == "image/jpeg" ||$type == "image/png"){
        $image_name = time().rand().$fname;
        $dest="adminpanel/User_image/";
        $destpath=$dest.$image_name;
        $save=move_uploaded_file($tmp_name,$destpath);
        $image="";
        if($save == true){
            $image= $image_name;
            $query="update user set Name='$name',Gender='$gender',Phone='$phone',Address='$Address',City='$city',State='$state',Pin_Code='$zipcode',Image='$image' where Id='$id'";
        }
    
     
     else{
        $query="update user set Name='$name',Gender='$gender',Phone='$phone',Address='$Address',City='$city',State='$state',Pin_Code='$zipcode' where Id='$id'";
         }
        $ex1=mysqli_query($conn,$query);
          if($ex1==true && !isset($image)==true)
          {
            header("location:profile.php");
          }
         else if($ex1==true){
            unlink("TestimonialImage/".$himage);
            header("location:profile.php");
            
          }
         else{
            $error="not update";
          }
    }
    
}


else{
    $select="select * from user where Id='$id'";
    $ex=mysqli_query($conn,$select);
    $fet=mysqli_fetch_assoc($ex);
    if(isset($fet['Id'])){
        $name=$fet['Name'];
        $phone=$fet['Phone'];
        $gender=$fet['Gender'];
        $Address=$fet['Address'];
        $city=$fet['City'];
        $state=$fet['State'];
        $zipcode=$fet['Pin_Code'];
        $himage=$fet['Image'];
    }

}
?>
<link rel="stylesheet" href="upload_image.css">
<style>
    .picture-container{
    position: relative;
    cursor: pointer;
    text-align: center;
}
.picture{
    width: 106px;
    height: 106px;
    background-color: #999999;
    border: 4px solid #CCCCCC;
    color: #FFFFFF;
    border-radius: 50%;
    margin: 0px auto;
    overflow: hidden;
    transition: all 0.2s;
    -webkit-transition: all 0.2s;
}
.picture:hover{
    border-color: #2ca8ff;
}
.content.ct-wizard-green .picture:hover{
    border-color: #05ae0e;
}
.content.ct-wizard-blue .picture:hover{
    border-color: #3472f7;
}
.content.ct-wizard-orange .picture:hover{
    border-color: #ff9500;
}
.content.ct-wizard-red .picture:hover{
    border-color: #ff3b30;
}
.picture input[type="file"] {
    cursor: pointer;
    display: block;
    height: 100%;
    left: 0;
    opacity: 0 !important;
    position: absolute;
    top: 0;
    width: 100%;
}

.picture-src{
    width: 100%;
    
}
</style>
<?php include_once("header2.php");?>
<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">  -->
<link rel="stylesheet" href="css/profile.css">
<form action="" method="post" enctype="multipart/form-data">
<div class="container" style="padding-top:30px;">
 
    <div class="row gutters">
     
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                    <div class="account-settings">
                        <div class="user-profile">
                          <div class="picture-container">
                             <div class="picture">
                                <?php if (isset($himage)) {
                                    $im="adminpanel/User_image/$himage";
                                }
                                else{
                                  $im="https://bootdey.com/img/Content/avatar/avatar7.png";
                                }
                              
                                ?>
                               <img src="<?php echo $im; ?>" class="picture-src" id="wizardPicturePreview" title="">
                              <!-- <input type="file" id="wizard-picture"  class="" name="file"> -->
                              <input type="file" name="upload" id="wizard-picture">
                               <input type="hidden" name="himage" value="<?php echo $himage;?>">
                             </div>
                              <!-- <h6 class="">Choose Picture</h6> -->

                           </div>
                           <!-- <div class="user-avatar">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                            </div> -->
                            <h5 class="user-name"><?php echo $name ;?></h5>
                            <h6 class="user-email"><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                             data-cfemail="354c405e5c7578544d425059591b565a58">[<?php echo $email; ?>]</a></h6>
                        </div>
                        <div class="about">
                            <h5>About</h5>
                            <p>I'm Yuki. Full Stack Designer I enjoy creating user-centric, delightful and human
                                experiences.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100">
                <div class="card-body">
                  
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mb-2 text-primary">Personal Details</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="fullName">Full Name</label>
                                <input type="text" class="form-control" id="fullName" name="fullname" placeholder="Enter full name" value="<?php echo $name ; ?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="eMail">Email</label>
                                <input type="email" class="form-control" id="eMail" name="email" placeholder="Enter email ID" value="<?php echo $email; ?>" disabled >
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number" value="<?php echo $phone ; ?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" style="padding: 21px 30px;">
                            <div class="form-group">
                                
                                <lable for="Gender" > Gender:</label>
                                <?php
                                if($gender=='male')
                                  echo'<input type="radio" name="Gender" id="male" value="male" checked > Male
                                    <input type="radio" name="Gender" id="female" value="female"> female' ;
                                    else{
                                        echo'<input type="radio" name="Gender" id="male" value="male" > Male
                                    <input type="radio" name="Gender" id="female" value="female" checked > female' ;
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <h6 class="mt-3 mb-2 text-primary">Address</h6>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="Street">Street</label>
                                <input type="name" class="form-control" id="Street" name="address" placeholder="Enter Street" value="<?php echo $Address; ?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="ciTy">City</label>
                                <input type="text" class="form-control" name="city" id="ciTy" placeholder="Enter City" value="<?php echo $city; ?>">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="sTate">State</label>
                                <select class="form-control" name="state">
                                    <option  disabled>select state..</option>
                                    <?php 
                                     $statess="select * from states";
                                     $exstate=mysqli_query($conn,$statess);
                                       while($fetstate=mysqli_fetch_assoc($exstate)){
                                         if($state== $fetstate['id']){
                                            $select="selected";
                                         }
                                         else{
                                            $select=" ";
                                         }
                                       ?>
                                    <option value="<?php echo $fetstate['id'] ?>"<?php echo $select; ?>> <?php echo $fetstate['name'];?> </option>
                                     <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label for="zIp">Zip Code</label>
                                <input type="text" class="form-control" name="zip" id="zIp" placeholder="Zip Code" value="<?php echo $zipcode ; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-end" style="margin:15px 12px;">
                                <button type="button" id="submit" name="submit"
                                    class="btn btn-secondary">Cancel</button>
                                <button type="sumbit" id="submit" name="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                 
                </div>
            </div>
        </div>
     
    </div>
 
</div>
</form>


<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
// Prepare the preview for profile picture
    $("#wizard-picture").change(function(){
        readURL(this);
    });
});
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<?php
include_once("footer.php");
?>