<?php
session_start();
if(!isset($_SESSION['id'])){
  header("location:index.php");
}
include_once("database.php");
$limit=3;
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else{
    $page=1;
}
$offset=($page-1)*$limit;

if(isset($_POST['searchbtn'])){
   $search=$_POST['table_search'];
  $query="SELECT * FROM `banner` WHERE Title LIKE '%$search%' LIMIT $offset,$limit ";
  $s=mysqli_query($conn,$query);

}
 else{
 $q="select * from banner limit $offset,$limit";
 $s = mysqli_query($conn,$q);
 }


?>

 <?php include_once("header.php") ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include_once("menu.php")?>

  <!-- Content Wrapper. Contains page content -->
 <?php

include("breadcreamb.php");
?>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
       
        <!-- /.row -->
        <!-- Main row -->
      
        <form action="" method="post">
        
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> Bannner Information : </h3>
            
                 <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">

                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
 
                    <div class="input-group-append">
                      <button type="submit" name="searchbtn" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>S.N</th>
                      <th>Title</th>
                      <th>Status</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i=1;
                    while($e=mysqli_fetch_assoc($s)){
                      $srno=($page-1)*$limit+$i;

                    ?>
                    <tr>
                    <td><?php echo $srno; ?></td>
                    <td><?php echo $e['Title']; ?></td>
                    <?php
                    if($e['Status']==1){
                      $status="active";
                    }
                    else{
                      $status="";
                    }
                    ?>
                    <td><?php echo $status; ?></td>
                    <td> <img src="Bannerimage/<?php echo $e['Image']; ?>" alt="Upload" width="100px"></td>
                    
                    
                    <td>
                      <a href="Banner_Details.php?id=<?php echo $e['Id']; ?>"><button type="button" class="btn  btn-outline-info btn-xs">View</button></a>&ensp;
                      <a href="Banner_Update.php?id=<?php echo $e['Id']; ?>"><button type="button" class="btn  btn-outline-primary btn-xs">Update</button></a>&ensp;
                      <a href="Banner_Delete.php?id=<?php echo $e['Id']; ?>"><button type="button" class="btn  btn-outline-danger btn-xs">Delete</button></a>
                       </td>

                      
                    </tr>
                  <?php $i=$i+1; } ?>
                  </tbody>
                </table>
      
                 </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                
                <?php 
                  $sql1="select * from banner";
                  $res=mysqli_query($conn,$sql1) or die("query faild");
                  if(mysqli_num_rows($res)>0){
                     $total_record=mysqli_num_rows($res);
                  
                    $total_page=ceil($total_record / $limit);
                    echo"<ul class='pagination pagination-sm m-0 float-right'>";
                    if($page > 1){
                
                      echo'<li class="page-item"> <a class="page-link" href="Banner_listing.php?page='.($page - 1).'">«</a> </li>';
                      }
                      for($i=1;$i<=$total_page;$i++ ){
                        if($i==$page){
                            $active = "active";
                            
                        }
                        else{
                            $active="";
                        }
                        echo"<li class=' page-item $active'><a class='page-link' href='Banner_listing.php?page=$i'>$i</a></li>";
                    }
                    if($total_page >$page){
                      echo'<li class="page-item"> <a class="page-link" href="Banner_listing.php?page='.($page + 1).'">»</a> </li>';
                      }
                    echo'</ul>';
                  }
                ?>
               
              </div>
          </div>
            <!-- /.card -->
          </div>
          
        </div>
       
      </form> <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
    <!-- /.content -->

  <!-- /.content-wrapper -->
<?php include_once("footer.php"); ?>