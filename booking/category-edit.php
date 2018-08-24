<?php 
 include'header.php';
 $id=$_REQUEST['resort_id'];
$sql="select * from resort_category where resort_cat_id ='$id'";
$q=mysqli_query($db,$sql) or die(mysqli_error());
$data=mysqli_fetch_assoc($q) or die("error");
 ?>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Resort Update</li>
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
        <div class="card-header">Resort Category Update</div>
        <div class="card-body">
          <form action="lib/active.php" method="post" enctype="multipart/form-data">
           
            <div class="form-group">
              <label for="inputEmail">Resort Category Name</label>
              <div class="form-label-group">
                <input type="text" name="resort_cat_name" id="sourceTextField" onkeyup="change();" class="form-control" placeholder="Resort Name" value="<?php echo $data['resort_cat_name'];?>">
                
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail">Resort Category Tag</label>
              <div class="form-label-group">
                <input type="text" name="resort_cat_tag" id="destinationTextField" class="form-control" placeholder="Resort Name" value="<?php echo $data['resort_cat_tag'];?>" disabled>
                
              </div>
            </div>
            <input type="hidden" name="resort_id" value="<?php echo $data['resort_cat_id'];?>">
            
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
