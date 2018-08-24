<?php

include'header.php';?>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Hotel List Table</li>
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
               <a href="hotel-add.php" class="fa fa-plus btn btn-info">Add Hotel</a>
            </div>
            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-bordered example" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                     <tr>
                      <th>Sr.No</th>
                      <th>Hotel Name</th>
                      <th>Images</th>
                      <th>Price</th>
                      <th>Discount</th>
                      <th>days</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Country</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
             
                  <tbody>
                    <?php $sql="select * from hotel_list";
                          $query=mysqli_query($db,$sql) or die(mysqli_error());
                          $i=1;
                          while($data=mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                      <td><?php echo $i++;?></td>
                      <td><?php echo $data['hotel_name'];?></td>
                      <td><img src="uploads_list/<?php echo $data['images'];?>" alt="" height='100' width="100"></td>
                      <td><?php echo $data['price'];?></td>
                      <td><?php echo $data['discount'];?></td>
                      <td><?php echo $data['days'];?></td>
                      <td><?php echo $data['city'];?></td>
                      <td><?php echo $data['state'];?></td>
                      <td><?php echo $data['country'];?></td>
                      <td><?php if($data['status']==1){?>
                        <button onclick="inactivefunc('<?= $data['hotel_id']?>');" class="btn btn-success">Active</button>
                         <?php } else{ ?>
                        <button onclick="activefunc('<?= $data['hotel_id']?>');" class="btn btn-danger">Inactive</button>
                       <?php }?>
                      </td>
                       <th><a class="btn btn-info" href="hotel-edit.php?hotel_id=<?= $data['hotel_id']?>"><i class="fa fa-pencil"></i></a><a class="btn btn-danger" href="lib/hotel.php?delete=<?= $data['hotel_id']?>"><i class="fa fa-trash"></i></a></th>
                    </tr>
                   <?php }?>
                    
                  </tbody>
                       <tfoot>
                    <tr>
                      <th>Sr.No</th>
                      <th>Hotel Name</th>
                      <th>Images</th>
                      <th>Price</th>
                      <th>Discount</th>
                      <th>days</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Country</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
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
    window.location.href='lib/hotel.php?inactive='+id;
  }
  function activefunc(id)
  {
    window.location.href='lib/hotel.php?active='+id;
  }
</script>