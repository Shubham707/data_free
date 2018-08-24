<?php 
 include'header.php';
if(@$_REQUEST['hotel_id'])
{
  $id=$_REQUEST['hotel_id'];
  $sql="SELECT * FROM hotel_list WHERE hotel_id='$id'";
  $query=mysqli_query($db,$sql) or die(mysqli_error());
  $data=mysqli_fetch_assoc($query);
}
  $setCat="SELECT * FROM `hotel_category`";
  $select=mysqli_query($db,$setCat) or die('not connected');
 ?>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Hotel Update</li>
          </ol>
          <hr>
          
          <?php if(@$error==2) { ?>
          <div class="alert alert-danget">
            <i class="fa fa-check"></i> Hotel is not inserted data!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php } ?>
        </div>
        <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Hotel Update</div>
        <div class="card-body">
          <form action="lib/hotel.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <div class="form-label-group">
                <select  name="hotel_cat_id" id="inputEmail" class="form-control" placeholder="Category Name" required="required">
                  <option value="<?php echo $data['hotel_cat_id'];?>"><?php echo $data['hotel_cat_id'];?></option>
                  <?php while($value=mysqli_fetch_assoc($select)){ ?>
                     <option value="<?php echo $value['hotel_cat_name'];?>"><?php echo $value['hotel_cat_name'];?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
           
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="name" id="inputEmail" class="form-control" placeholder="Flight Name" required="required" value="<?= $data['hotel_name'];?>">
                <label for="inputEmail">Hotel Name</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="file" name="imagess" id="inputEmail" class="form-control" placeholder="Flight Image" >
                <label for="inputEmail">Hotel Image</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="price" id="inputEmail" class="form-control" placeholder="Flight Price" required="required" value="<?= $data['price'];?>">
                <label for="inputEmail">Hotel Price</label>
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
            <input type="hidden" name="hotel_id" value="<?= $data['hotel_id'];?>">
            <input type="hidden" name="images" value="<?= $data['images'];?>">
           
            <input name="update" type="submit" class="btn btn-primary btn-block">
          </form>
         
        </div>
      </div>
    </div>
<?php include'footer.php';?>