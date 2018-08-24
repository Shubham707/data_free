<?php

include'header.php';?>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Flight Category</li>
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
               <a href="flight-cat-add.php" class="fa fa-plus btn btn-info">Add Flight Category</a>
            </div>
            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-bordered example" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                     <tr>
                      <th>Sr.No</th>
                      <th>Flight Name</th>
                      <th>Tag</th>
                      <th>Action</th>
                    </tr>
                  </thead>
             
                  <tbody>
                    <?php $sql="select * from flight_category";
                          $query=mysqli_query($db,$sql) or die(mysqli_error());
                          $i=1;
                          while($data=mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                      <td><?php echo $i++;?></td>
                      <td><?php echo $data['cat_name'];?></td>
                      
                      <td><?php echo $data['cat_tag'];?></td>
                      
                       <th><a class="btn btn-info" href="flight-cat-edit.php?cat-id=<?= $data['cat_id']?>"><i class="fa fa-pencil"></i></a><a class="btn btn-danger" href="lib/flight.php?del=<?= $data['cat_id']?>"><i class="fa fa-trash"></i></a></th>
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
    window.location.href='lib/active.php?inactive='+id;
  }
  function activefunc(id)
  {
    window.location.href='lib/active.php?active='+id;
  }
</script>