<?php
session_start();
if(!isset($_SESSION['id'])){
  header("location:index.php");
}
$id=$_GET['id'];
include_once("database.php");
$limit=10;
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else{
    $page=1;
}
$offset=($page-1)*$limit;

if(isset($_POST['searchbtn'])){
   $search=$_POST['table_search'];
   $select="SELECT materials.id,materials.Status,materials.Product_Id,materials.Material_Type_Id,materials.Material_Name,materials.Metarial_value,
   product.Product_Name,product.Image,material_type.Name from materials INNER join product on materials.Product_Id=product.id LEFT join material_type on materials.Material_Type_Id=material_type.Id  WHERE materials.Material_Name  LIKE '%$search%' LIMIT $offset,$limit";
  $s=mysqli_query($conn,$select);

}
 else{
    $select="SELECT materials.id,materials.Status,materials.Product_Id,materials.Material_Type_Id,materials.Material_Name,materials.Metarial_value,
    product.Product_Name,product.Image,material_type.Name from materials INNER join product on materials.Product_Id=product.id LEFT join material_type on materials.Material_Type_Id=material_type.Id  WHERE product.id='$id' limit $offset,$limit ";

 $s = mysqli_query($conn,$select);
 //$product_n=mysqli_fetch_assoc($s);

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
        <form action="" method="post"> 
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Course Metarials:<?php //echo $product_n['Product_Name']; ?>
                <a href="Metarial_Add.php?id=<?php echo $id ?>"><button type="button" class="btn  btn-outline-info btn-xs">Add</button></a>&ensp;        
               </h3>
            
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
                      <th>Type</th>
                      <th>Status</th>
                      <th >Action</th>
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
                    <td><?php echo $e['Material_Name']; ?></td>
                    
                    <td><?php echo $e['Name']; ?></td>
                    <?php
                    if($e['Status']==1){
                        $status="Active";
                    }
                    else{
                         $status="Inactive";
                    }

                    ?>

                    <td><?php echo $status; ?></td>
                    
                    <td>
                     
                      <a href="Metarial_Update.php?id=<?php echo $e['id'] ?>"><button type="button" class="btn  btn-outline-primary btn-xs">Update</button></a>&ensp;
                      <a href="Metarial_Delete.php?id=<?php echo $e['id'] ?>"><button type="button" class="btn  btn-outline-danger btn-xs">Delete</button></a>&ensp;
                     
                       </td>

                      
                    </tr>
                  <?php $i=$i+1; } ?>
                  </tbody>
                </table>
      
                 </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                
                <?php 
                  $sql1="select * from materials  where Product_Id=$id";
                  $res=mysqli_query($conn,$sql1) or die("query faild");
                  if(mysqli_num_rows($res)>0){
                     $total_record=mysqli_num_rows($res);
                  
                    $total_page=ceil($total_record / $limit);
                    echo"<ul class='pagination pagination-sm m-0 float-right'>";
                    if($page > 1){
                
                      echo'<li class="page-item"> <a class="page-link" href="course_metarial.php?id='.$id.'& page='.($page - 1).'">«</a> </li>';
                      }
                      for($i=1;$i<=$total_page;$i++ ){
                        if($i==$page){
                            $active = "active";
                            
                        }
                        else{
                            $active="";
                        }
                        echo"<li class=' page-item $active'><a class='page-link' href='course_metarial.php?id=$id & page=$i'>$i</a></li>";
                    }
                    if($total_page >$page){
                      echo'<li class="page-item"> <a class="page-link" href="course_metarial.php?id= '.$id.'& page='.($page + 1).'">»</a> </li>';
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