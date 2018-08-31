<?php

include'header.php';?>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tour List Table</li>
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
               <a href="tour-add.php" class="fa fa-plus btn btn-info">Add Tour</a>
            </div>
            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-bordered example" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                     <tr>
                      <th>Sr.No</th>
                      <th>Tour Name</th>
                      <th>Images</th>
                      <th>Plan</th>
                      <th>Type</th>
                      <th>Category</th>
                      <th>Discount</th>
                      <th>Days/Night</th>
                      <th>Country</th>
                      <th>State</th>
                      <th>City</th>
                      <th>Popular</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
             
                  <tbody>
                    <?php $sql="select * from tour_list inner join countries on countries.id=tour_list.country inner join states on states.id=tour_list.state ORDER BY tour_id DESC";
                          $query=mysqli_query($db,$sql) or die(mysqli_error());
                          $i=1;
                          while($data=mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                      <td><?php echo $i++;?></td>
                      <td><?php echo $data['tour_name'];?></td>
                      <td><img src="../uploads_list/<?php echo $data['images'];?>" alt="" height='100' width="100"></td>
                      <td><?php echo $data['tour_plan'];?></td>
                      <td><?php echo $data['tour_package'];?></td>
                      <td><?php echo $data['category'];?></td>
                      <td><?php echo $data['discount'];?></td>
                      <td><?php echo $data['days'].'/'.$data['night'];?></td>
                      <td><?php echo $data['country_name'];?></td>
                      <td><?php echo $data['state_name'];?></td>
                      <td><?php echo $data['city'];?></td>
                      <td><?php if($data['popular']==0){?>
                      <button onclick="popularfunc('<?= $data['tour_id']?>');" class="btn btn-danger fas fa-times"></button><?php } else { ?>
                         <button onclick="popularsfunc('<?= $data['tour_id']?>');" class="btn btn-success fas fa-check"></button>
                      <?php }?></td>
                      <td><?php if($data['status']==1){ ?>
                        <button onclick="inactivefunc('<?= $data['tour_id']?>');" class="btn btn-success">Active</button>
                         <?php } else{ ?>
                        <button onclick="activefunc('<?= $data['tour_id']?>');" class="btn btn-danger">Inactive</button>
                       <?php }?>
                      </td>
                       <th><a class="btn btn-info" href="tour-edit.php?tour_id=<?= $data['tour_id']?>"><i class="fa fa-pencil"></i></a><a class="btn btn-danger" href="lib/package.php?delete=<?= $data['tour_id']?>"><i class="fa fa-trash"></i></a></th>
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
    window.location.href='lib/package.php?inactive='+id;
  }
  function activefunc(id)
  {
    window.location.href='lib/package.php?active='+id;
  }
  function popularfunc(id)
  {
    window.location.href='lib/package.php?popular='+id;
  }
   function popularsfunc(id)
  {
    window.location.href='lib/package.php?populars='+id;
  }
</script>