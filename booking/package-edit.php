<?php 
 include'header.php';
if(@$_REQUEST['cat-id'])
{
  $id=$_REQUEST['cat-id'];
   $data="select * from package where pack_id='$id'";
    $query=mysqli_query($db, $data) or die (mysqli_error());
    $data=mysqli_fetch_assoc($query);
}
 ?>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Package Update</li>
          </ol>
          <hr>
          
          <?php if(@$error==2) { ?>
          <div class="alert alert-danget">
            <i class="fa fa-check"></i> Package is not inserted data!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php } ?>
        

        </div>
        <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Package Category Update</div>
        <div class="card-body">
          <form action="lib/package.php" method="post" enctype="multipart/form-data">
           
            <div class="form-group">
              <label for="inputEmail">Package Name</label>
              <div class="form-label-group">
                <input type="text" name="package_name" id="package_name" class="form-control" placeholder="Flight Name" value="<?php echo $data['package_name']?>">
                 
              </div>
            </div>
            <div class="form-group">
                <label for="inputEmail">Package Category</label>
              <div class="form-label-group">
                <input type="text" name="package_category" id="package_category" class="form-control"  value="<?php echo $data['package_category']?>">
              
              </div>
            </div>
            <div class="form-group">
               <label for="inputEmail">Package Type</label>
              <div class="form-label-group">
                <input type="text" name="package_type" id="package_type" class="form-control"  value="<?php echo $data['package_type']?>">
               
              </div>
            </div>
            <div class="form-group">
               <label for="inputEmail">Package Plan</label>
              <div class="form-label-group">
                <input type="text" name="package_plan" id="package_plan" class="form-control"  value="<?php echo $data['package_plan']?>">
               
              </div>
            </div>
             <input type="hidden" name="pack_id" value="<?php echo $data['pack_id']?>">
            <input name="submit" type="submit" class="btn btn-primary btn-block">
          </form>
         
        </div>
      </div>
    </div>
<?php include'footer.php';?>
<script type="text/javascript">
  /*function change(){
                var src= document.getElementById("sourceTextField");
                var dest= document.getElementById("destinationTextField");
                dest.value=src.value;
            }*/
</script>
