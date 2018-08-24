<?php 
 include'header.php';
if(@$_REQUEST['submit'])
{

  $name=ucfirst($_REQUEST['resort_cat_name']);
  $url=str_replace(' ', '-', strtolower($_REQUEST['cat_name']));
  $tag=ucfirst($_REQUEST['resort_cat_tag']);
   $data="INSERT INTO `resort_category`(`resort_cat_name`, `resort_cat_url`, `resort_cat_tag`) VALUES ('$name','$url','$tag')";
    $query=mysqli_query($db, $data) or die (mysqli_error());
   header("Location:resort-category.php?error=3");
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
            <li class="breadcrumb-item active">Resort Add</li>
          </ol>
          <hr>
          
          <?php if(@$error==2) { ?>
          <div class="alert alert-danget">
            <i class="fa fa-check"></i> Resort is not inserted data!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php } ?>
        

        </div>
        <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Resort Category Add</div>
        <div class="card-body">
          <form action="#" method="post" enctype="multipart/form-data">
           
            <div class="form-group">
              <label for="inputEmail">Resort Category Name</label>
              <div class="form-label-group">
                <input type="text" name="resort_cat_name" id="sourceTextField" onkeyup="change();" class="form-control" placeholder="Flight Name" required="required">
                
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail">Resort Category Tag</label>
              <div class="form-label-group">
                <input type="text" name="resort_cat_tag" id="destinationTextField" class="form-control" placeholder="Flight Name" required="required" disabled>
                
              </div>
            </div>
            <!-- <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="name" id="inputEmail" class="form-control" placeholder="Flight Name" required="required">
                <label for="inputEmail">Resort Category Name</label>
              </div>
            </div> -->
            
            <input name="submit" type="submit" class="btn btn-primary btn-block">
          </form>
         
        </div>
      </div>
    </div>
<?php include'footer.php';?>
<script type="text/javascript">
  function change(){
                var src= document.getElementById("sourceTextField");
                var dest= document.getElementById("destinationTextField");
                dest.value=src.value;
            }
</script>
