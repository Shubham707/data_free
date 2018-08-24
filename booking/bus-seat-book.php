<?php

include'header.php';?>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Resort List Table</li>
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
               <a href="resort-add.php" class="fa fa-plus btn btn-info">Add Resort</a>
            </div>
            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-bordered example" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                     <tr>
                      <th>Sr.No</th>
                      <th>Bus Name</th>
                      <th>Name</th>
                      <th>Balance</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Country</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  $sql="SELECT `bus_list`.`bus_id`,`bus_list`.`bus_name`,`bus_seat_booking`.`user_name`,`bus_seat_booking`.`id_proof`,`bus_seat_booking`.`address`,`bus_seat_booking`.`city`,`bus_seat_booking`.`state`,`bus_seat_booking`.`country`,`bus_seat_booking`.`balance`,`bus_seat_booking`.`reserve_date`,`bus_seat_booking`.`return_date`,`bus_seat_booking`.`seat_reserve`,`bus_seat_booking`.`status` FROM `bus_list` INNER JOIN `bus_seat_booking` ON `bus_list`.`bus_id`=`bus_seat_booking`.`bus_id` ORDER BY seat_id DESC";
                    $query=mysqli_query($db,$sql) or die(mysqli_error());
                    $i=1;
                    while($data=mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                      <td><?php echo $i++;?></td>
                      <td><?php echo ucfirst($data['bus_name'])?></td>
                      <td><?php echo $data['user_name'];?></td>
                      <td><?php echo $data['balance'];?></td>
                      <td><?php echo $data['city'];?></td>
                      <td><?php echo $data['state'];?></td>
                      <td><?php echo $data['country'];?></td>
                      <td><?php if($data['status']==1){?>
                        <button onclick="inactivefunc('<?= $data['seat_id']?>');" class="btn btn-success">Active</button>
                         <?php } else{ ?>
                        <button onclick="activefunc('<?= $data['seat_id']?>');" class="btn btn-danger">Inactive</button>
                       <?php }?>
                      </td>
                      <th><a class="btn btn-info" href="edit-resort.php?flight_id=<?= $data['seat_id']?>"><i class="fa fa-pencil"></i></a><a class="btn btn-danger" href="lib/confirm.php?delete=<?= $data['seat_id']?>""><i class="fa fa-trash"></i></a>
                      </th>
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
    window.location.href='lib/confirm.php?inactive='+id;
  }
  function activefunc(id)
  {
    window.location.href='lib/confirm.php?active='+id;
  }
</script>