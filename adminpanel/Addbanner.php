<?php 
session_start();
include_once("database.php");


if(isset($_POST['title'])){
 $title=$_POST['title'];
 $description=$_POST['description'];
 $read= $_POST['readnow'];
 $join=$_POST['joinnow'];
 $status = isset($_POST['check'])?1:0;
 

 $fname=$_FILES['upload']['name'];
 $type=$_FILES['upload']['type'];
 $tmp_name=$_FILES['upload']['tmp_name'];
  if($type == "image/jpg" || $type == "image/jpeg" ||$type == "image/png"){
    $image_name = time().rand().$fname;
    $dest="Bannerimage/";
    $destpath=$dest.$image_name;
    $save=move_uploaded_file($tmp_name,$destpath);
    $image="";
    if($save == true){
        $image= $image_name;
    }
   
 $query="insert into banner(Title,Description,Readnow,Joinnow,Status,Image) values('$title','$description','$read','$join','$status','$image')";

    $ex=mysqli_query($conn,$query);

  }
}



?>

<?php include_once("header.php") ?>
<?php include_once("menu.php") ?>
<?php include_once("breadcreamb.php") ?>

<section class="content">
      <div class="container-fluid">
         <!--<div class="row"> -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Background Image</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" name="title" id="exampleInputEmail1" placeholder="Baner Title..">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" name="description" class="form-control" id="exampleInputPassword1" placeholder="Baner Description..">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Read now</label>
                    <input type="text" name="readnow" class="form-control" id="exampleInputPassword1" placeholder="link of read now">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Join now</label>
                    <input type="text" name="joinnow" class="form-control" id="exampleInputPassword1" placeholder="Link of join now">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Banner Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="upload" class="custom-file-input" id="exampleInputFile" value="">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                     
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" name="check" class="form-check-input" id="exampleCheck1" val="1" >
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
      <!--  </div> -->
    </div>
</section>



<?php include_once("footer.php") ?>