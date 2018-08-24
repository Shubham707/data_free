<?php 
 include'header.php';
  $setCat="SELECT DISTINCT package_category FROM `package`";
  $select=mysqli_query($db,$setCat) or die('not connected');
  $setname="SELECT DISTINCT * FROM `package`";
  $sel=mysqli_query($db,$setname) or die('not connected');
  $settype="SELECT DISTINCT package_type FROM `package`";
  $type=mysqli_query($db,$settype) or die('not connected');
  $setplan="SELECT DISTINCT * FROM `package`";
  $plan=mysqli_query($db,$setname) or die('not connected');

  $selcountry="SELECT * FROM `countries`";
  $country=mysqli_query($db,$selcountry) or die('not connected');
 ?>
     <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tour Add</li>
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
        <div class="card-header">Tour Add</div>
        <div class="card-body">
          <form action="lib/package.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <div class="form-label-group">
                <select type="text" name="tour_name" id="inputEmail" class="form-control" placeholder="Category Name" required="required">
                  <option value="">Please Select Tour</option>
                  <?php while($value=mysqli_fetch_assoc($sel)){ ?>
                  <option value="<?php echo  $value['package_name'];?>"><?php echo $value['package_name'];?></option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group" id="">
                <select  name="category" id="inputEmail" class="form-control" required>
                   <option value="">Please Select Category Name</option>
                  <?php while($value=mysqli_fetch_assoc($select)){ ?>
                    <option value="<?php echo $value['package_category']?>"><?php echo $value['package_category']?></option>
                  <?php }?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                 <select  name="tour_package" id="inputEmail" class="form-control" required>
                  <option value="">Please Select Tour Type(Bus,Bike,Car)</option>
                  <?php while($value=mysqli_fetch_assoc($type)){ ?>
                    <option value="<?php echo $value['package_type']?>"><?php echo $value['package_type']?></option>
                  <?php }?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <select  name="tour_plan" id="inputEmail" class="form-control" required>
                  <option>Tour Category Plan</option>
                  <?php while($value=mysqli_fetch_assoc($plan)){ ?>
                    <option value="<?php echo $value['package_plan']?>"><?php echo $value['package_plan']?></option>
                  <?php }?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="file" name="images" id="inputEmail" class="form-control" placeholder="Bus Image" required>
                <label for="inputEmail">Tour Image</label>
              </div>
            </div>
            
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="create_date" id="date" class="form-control fillData" placeholder="Bus Price" required="required" >
                <label for="inputEmail">Tour Booking Date</label>
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
                <input type="text" name="discount" id="inputEmail" class="form-control" placeholder="Discount" required="required" >
                <label for="inputEmail">Discount</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="number" name="days" id="days" class="form-control" placeholder="Day/nights" required="required" >
                <label for="inputEmail">Day</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="number" name="night" id="night" class="form-control" placeholder="Day/nights" required="required" >
                <label for="inputEmail">Nights</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                 <select  name="country" id="inputEmail" class="form-control" onchange="selectTour(this.value)">
                   <option value="0">Please Select Country</option>
                  <?php while($count=mysqli_fetch_assoc($country)){ ?>
                    <option value="<?php echo $count['id']?>"><?php echo $count['country_name']?></option>
                  <?php }?>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group" id="result">
               
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group" id="stateresult">
                
              </div>
            </div>
             <div class="form-group">
               <label for="inputEmail">Discription</label>
              <div class="form-label-group">

                <textarea name="book_description"  id="inputEmail" class="form-control" placeholder="" required="required"></textarea>
                
              </div>
            </div>
           
            <input name="insert" type="submit" class="btn btn-primary btn-block">
          </form>
         
        </div>
      </div>
    </div>
<?php include'footer.php';?>
<script type="text/javascript">
  function selectTour(evt)
  {
    $.ajax({
            url: 'lib/country.php',
            type: 'POST',
            data: {'country': evt},
            success:function(result){
              $('#result').html(result);
            }
          });
  }
  function selectTours(evt)
  {
    $.ajax({
            url: 'lib/country.php',
            type: 'POST',
            data: {'state': evt},
            success:function(result){
              $('#stateresult').html(result);
            }
          });
  }
  
</script>