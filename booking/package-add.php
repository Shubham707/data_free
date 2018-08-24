<?php 
 include'header.php';
if(@$_REQUEST['submit'])
{

   $name=ucfirst($_REQUEST['package_name']);
   $cat=ucfirst($_REQUEST['package_category']);
   $type=ucfirst($_REQUEST['package_type']);
   $plan=ucfirst($_REQUEST['package_plan']);
   $data="INSERT INTO `package`(`package_name`, `package_category`, `package_type`,`package_plan`) VALUES ('$name','$cat','$type','$plan')";
    $query=mysqli_query($db,$data) or die (mysqli_error());
   header("Location:package.php?error=3");
}
else {
  
}
 ?>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Package Add</li>
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
        <div class="card-header">Package Category Add</div>
        <div class="card-body">
          <form action="#" method="post" enctype="multipart/form-data">
           
            <div class="form-group">
              <label for="inputEmail">Package Name</label>
              <div class="form-label-group">
                <input type="text" name="package_name" id="package_name" class="form-control" placeholder="Flight Name" required="required" >
                 
              </div>
            </div>
            <div class="form-group">
                <label for="inputEmail">Package Category</label>
              <div class="form-label-group">
                <select  name="package_category" id="package_category" class="form-control" placeholder="Flight Name" required="required" >
                  <option value=0>Plase Select</option>
                  <option value='First Class'>First Class</option>
                  <option value='Second Class'>Second Class</option>
                  <option value='Third Class'>Third Class</option>
                  <option value='Other'>Other</option>
              </select>
              </div>
            </div>
            <div class="form-group">
               <label for="inputEmail">Package Type</label>
              <div class="form-label-group">
                <input type="text" name="package_type" id="package_type" class="form-control" placeholder="Flight Name" required="required">
               
              </div>
            </div>
            <div class="form-group">
               <label for="inputEmail">Package Plan</label>
              <div class="form-label-group">
                <input type="text" name="package_plan" id="package_plan" class="form-control" placeholder="Flight Name" required="required">
               
              </div>
            </div>
           
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
