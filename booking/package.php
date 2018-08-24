<?php include'header.php';?>
        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Package Category</li>
          </ol>
          <?php if(@$error==3) { ?>
          <div class="alert alert-success">
            <i class="fa fa-check"></i> Updated successfully!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php } ?>

          <div class="card mb-3">
            <div class="card-header">
               <a href="Package-add.php" class="fa fa-plus btn btn-info">Add Package Category</a>
            </div>
            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-bordered example" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                     <tr>
                      <th>Sr.No</th>
                      <th>Package Name</th>
                      <th>Package Category</th>
                      <th>Package Plan</th>
                      <th>Package Type</th>
                      <th>Action</th>
                    </tr>
                  </thead>
             
                  <tbody>
                    <?php $sql="select * from package";
                          $query=mysqli_query($db,$sql) or die(mysqli_error());
                          $i=1;
                          while($data=mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                      <td><?php echo $i++;?></td>
                      <td><?php echo $data['package_name'];?></td>
                      <td><?php echo $data['package_category'];?></td>
                      <td><?php echo $data['package_plan'];?></td>
                      <td><?php echo $data['package_type'];?></td>
                      
                       <th><a class="btn btn-info" href="Package-edit.php?cat-id=<?= $data['pack_id']?>"><i class="fa fa-pencil"></i></a><a class="btn btn-danger" href="lib/Package.php?del=<?= $data['pack_id']?>"><i class="fa fa-trash"></i></a></th>
                    </tr>
                   <?php }?>
                    
                  </tbody>
                      
                </table>
              </div>
            </div>
            
          </div>

        </div>
        <!-- /.container-fluid -->
<?php include'footer.php';?>
<script type="text/javascript">
  function inactivefunc(id)
  {
    window.location.href='lib/Package.php?inactive='+id;
  }
  function activefunc(id)
  {
    window.location.href='lib/Package.php?active='+id;
  }
</script>