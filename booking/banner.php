<?php
include'header.php';
if(@$_POST['name'] && @$_FILES['banner'])
{
  $name=$_REQUEST['name'];
  if($_FILES['banner']['name'])
    {
      $newFileName = uniqid('uploaded-', true) . '.' . strtolower(pathinfo($_FILES['banner']['name'], PATHINFO_EXTENSION));
       move_uploaded_file($_FILES['banner']['tmp_name'], '../uploads_list/' . $newFileName);
    }
   $sql="INSERT INTO `banner`(`banner_name`, `banner_image`) VALUES ('$name','$newFileName')";
   $query=mysqli_query($db,$sql) or die(mysqli_error());
   header("Location:banner.php");
}
if(@$_REQUEST['ban-del'] && @$_REQUEST['image'])
{
  $id=$_REQUEST['ban-del'];
  $image=$_REQUEST['image'];
  $sql="DELETE FROM `banner` WHERE `banner`.`ban_id` ='$id'";
   unlink('../uploads_list/'.$image);
  $query=mysqli_query($db,$sql) or die(mysqli_error());
   header("Location:banner.php");
}
if(@$_POST['imagename'] && @$_REQUEST['ban_id'] && @$_REQUEST['ban_image'])
{
  $name=$_REQUEST['imagename'];
  $ban_id=$_REQUEST['ban_id'];
  $ban_image=$_REQUEST['ban_image'];
    if($_FILES['imagebanner']['name']!="")
    {
      $newFileName = uniqid('uploaded-', true) . '.' . strtolower(pathinfo($_FILES['imagebanner']['name'], PATHINFO_EXTENSION));
       move_uploaded_file($_FILES['imagebanner']['tmp_name'], '../uploads_list/' . $newFileName);
       unlink('../uploads_list/'.$ban_image);
    }
    else{
      $newFileName=$_REQUEST['ban_image'];
    }
   $sql="UPDATE `banner` SET `banner_name`='$name',`banner_image`='$newFileName' WHERE ban_id='$ban_id'";
   $query=mysqli_query($db,$sql) or die(mysqli_error());
   header("Location:banner.php");
}
?>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Banner List</li>
          </ol>
          <?php if(@$error==3) { ?>
          <div class="alert alert-success">
            <i class="fa fa-check"></i> Update data successfully!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php } ?>

          <div class="card mb-3">
            <div class="card-header">
               <a href="#" data-toggle="modal" data-target="#myModal" class="fa fa-plus btn btn-info">Add Banner</a>
            </div>
            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-bordered example" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                     <tr>
                      <th>Sr.No</th>
                      <th>Resort Name</th>
                      <th>Images</th>
                     
                      <th>Action</th>
                    </tr>
                  </thead>
             
                  <tbody>
                    <?php $sql="SELECT * FROM `banner`";
                          $query=mysqli_query($db,$sql) or die(mysqli_error());
                          $i=1;
                          while($data=mysqli_fetch_assoc($query)){
                    ?>
                    <tr>
                      <td><?php echo $i++;?></td>
                      <td><?php echo $data['banner_name'];?></td>
                      <td><img src="../uploads_list/<?php echo $data['banner_image'];?>" alt="" height='100' width="100"></td>
                      <td><button class="btn btn-info" id="edit" data-toggle="modal" data-ids="<?php echo $data['ban_id'];?>" data-image="<?php echo $data['banner_image'];?>" data-name="<?php echo $data['banner_name'];?>" data-target="#myModal1"><i class="fa fa-pencil"></i></button><a class="btn btn-danger" href="banner.php?ban-del=<?= $data['ban_id'].'&image='.$data['banner_image']?>""><i class="fa fa-trash"></i></a></td>
                    </tr>
                   <?php }?>
                    
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Sr.No</th>
                      <th>Resort Name</th>
                      <th>Images</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            
          </div>

        </div>
        <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">Add Banner</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

              <form action="#" id="sendData" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="email">Banner Name:</label>
                    <input type="text" class="form-control" name="name" id="name">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Banner Image:</label>
                    <input type="file" class="form-control" name="banner" id="banner">
                  </div>
                  
                  <button type="submit" name="submit" id="submit123" class="btn btn-info">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>
        <!-- /.container-fluid -->
        <div id="myModal1" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Edit Image</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form action="#"  method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="email">Banner Name:</label>
                    <input type="text" class="form-control" name="imagename" id="name1">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Banner Image:</label>
                    <input type="file" class="form-control" name="imagebanner">
                  </div>
                  <input type="hidden" name="ban_id" id="id123">
                  <input type="hidden" name="ban_image" id="banner2">
                  <button type="submit" name="submit" id="submit123" class="btn btn-info">Submit</button>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>
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
  
$(document).on('click','#edit',function(){
    
   $('#name1').val($(this).data('name'));
   $('#banner2').val($(this).data('image'));
   $('#id123').val($(this).data('ids'));
  
});
 
</script>