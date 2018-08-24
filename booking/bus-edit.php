<?php 
 include'header.php';
if(@$_REQUEST['bus_id'])
{
  $id=$_REQUEST['bus_id'];
  $sql="SELECT * FROM bus_list WHERE bus_id='$id'";
  $query=mysqli_query($db,$sql) or die(mysqli_error());
  $data=mysqli_fetch_assoc($query);
}
  $setCat="SELECT * FROM `flight_category`";
  $select=mysqli_query($db,$setCat) or die('not connected');
 ?>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Bus Update</li>
          </ol>
          <hr>
          
          <?php if(@$error==2) { ?>
          <div class="alert alert-danget">
            <i class="fa fa-check"></i> Bus is not inserted data!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php } ?>
        </div>
        <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Bus Update</div>
        <div class="card-body">
          <form action="lib/bus.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <div class="form-label-group">
                <select type="text" name="bus_cat_id" id="inputEmail" class="form-control" placeholder="Category Name" required="required">
                  <option value="<?php echo $data['bus_cat_id'];?>"><?php echo $data['bus_cat_id'];?></option>
                  <?php while($value=mysqli_fetch_assoc($select)){ ?>
                  <option value="<?php echo  $value['cat_name'];?>"><?php echo $value['cat_name'];?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
           
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="bus_name" id="inputEmail" class="form-control" placeholder="Bus Name" required="required" value="<?= $data['bus_name'];?>">
                <label for="inputEmail">Bus Name</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="file" name="imagess" id="inputEmail" class="form-control" placeholder="Bus Image" >
                <label for="inputEmail">Bus Image</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="price" id="inputEmail" class="form-control" placeholder="Bus Price" required="required" value="<?= $data['price'];?>">
                <label for="inputEmail">Bus Price</label>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail">Address</label>
              <div class="form-label-group">
                <textarea type="text" name="address" id="inputEmail" class="form-control" placeholder="Address" required="required"><?= $data['address'];?></textarea>
                
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="country" id="inputEmail" class="form-control" placeholder="Country" required="required" value="<?= $data['country'];?>">
                <label for="inputEmail">Country</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="state" id="inputEmail" class="form-control" placeholder="State" required="required" value="<?= $data['state'];?>">
                <label for="inputEmail">State</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="city" id="inputEmail" class="form-control" placeholder="City" required="required" value="<?= $data['city'];?>">
                <label for="inputEmail">City</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="discount" id="inputEmail" class="form-control" placeholder="Discount" required="required" value="<?= $data['discount'];?>">
                <label for="inputEmail">Discount</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="number" name="days" id="days" class="form-control" placeholder="Day/nights" required="required" value="<?= $data['days'];?>">
                <label for="inputEmail">Day/nights</label>
              </div>
            </div>
             <div class="form-group">
               <label for="inputEmail">Discription</label>
              <div class="form-label-group">

                <textarea name="book_description"  id="inputEmail" class="form-control" placeholder="" required="required"><?= $data['book_description'];?></textarea>
                
              </div>
            </div>
            <input type="hidden" name="bus_id" value="<?= $data['bus_id'];?>">
            <input type="hidden" name="images" value="<?= $data['images'];?>">
           
            <input name="update" type="submit" class="btn btn-primary btn-block">
          </form>
         
        </div>
      </div>
    </div>
<?php include'footer.php';?>