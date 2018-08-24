<?php 
 include'header.php';

  $setCat="SELECT * FROM `flight_category`";
  $select=mysqli_query($db,$setCat) or die('not connected');
 ?>

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Flight Add</li>
          </ol>
          <hr>
          
          <?php if(@$error==2) { ?>
          <div class="alert alert-danget">
            <i class="fa fa-check"></i> Flight is not inserted data!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php } ?>
        

        </div>
        <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Flight Add</div>
        <div class="card-body">
          <form action="lib/flight.php" method="post" enctype="multipart/form-data">
           <div class="form-group">
              <div class="form-label-group">
                <select type="text" name="resort_cat_id" id="inputEmail" class="form-control" placeholder="Category Name" required="required">
                  <option value=" ">Please Select Category</option>
                  <?php while($value=mysqli_fetch_assoc($select)){ ?>
                  <option value="<?php echo  $value['cat_name'];?>"><?php echo $value['cat_name'];?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="name" id="inputEmail" class="form-control" placeholder="Flight Name" required="required">
                <label for="inputEmail">Flight Name</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="file" name="images" id="inputEmail" class="form-control" placeholder="Flight Image" required="required">
                <label for="inputEmail">Flight Image</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="price" id="inputEmail" class="form-control" placeholder="Flight Price" required="required">
                <label for="inputEmail">Flight Price</label>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail">Address</label>
              <div class="form-label-group">
                <textarea type="text" name="address" id="inputEmail" class="form-control" placeholder="Address" required="required"></textarea>
                
              </div>
            </div>
            
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" onchange="set_country(this,country,city_state)" name="country" id="inputEmail" class="form-control" placeholder="Country" required="required">
                <label for="inputEmail">Country</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="state" id="inputEmail" class="form-control" placeholder="State" required="required">
                <label for="inputEmail">State</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="city" id="inputEmail" class="form-control" placeholder="City" required="required">
                <label for="inputEmail">City</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="discount" id="inputEmail" class="form-control" placeholder="Discount" required="required">
                <label for="inputEmail">Discount</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="number" name="days" id="days" class="form-control" placeholder="Day/nights" required="required">
                <label for="inputEmail">Day/nights</label>
              </div>
            </div>
             <div class="form-group">
               <label for="inputEmail">Discription</label>
              <div class="form-label-group">
                <textarea name="book_description"  id="inputEmail" class="form-control" placeholder="" required="required"></textarea>
               
              </div>
            </div>
           
            <input name="insert" type="submit" class="btn btn-primary btn-block" value="Submit">
          </form>
         
        </div>
      </div>
    </div>
<?php include'footer.php';?>
