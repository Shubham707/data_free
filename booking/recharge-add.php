<?php 

if(@$_REQUEST['submit'])
{
  $R=$_REQUEST;
  $db->execute("INSERT INTO `book_list` (`name`, `images`, `price`, `city`, `state`,`country`, `address`, `review`, `discount`, `days`) VALUES ('$R[name]', '$R[images]', '$R[price]', '$R[city]', '$R[state]', '$R[country]', '$R[review]', '$R[discount]', '$R[days]')"); 
   header("Location:booking-list.php?success=3");
}
else {
  
}
 ?>
<?php include'header.php';?>
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
          <form action="#" method="post" enctype="multipart/form-data">
           
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="name" id="inputEmail" class="form-control" placeholder="Email address" required="required">
                <label for="inputEmail">Flight Name</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="file" name="image" id="inputEmail" class="form-control" placeholder="Email address" required="required">
                <label for="inputEmail">Flight Image</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="price" id="inputEmail" class="form-control" placeholder="Email address" required="required">
                <label for="inputEmail">Flight Price</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="country" id="inputEmail" class="form-control" placeholder="Email address" required="required">
                <label for="inputEmail">Country</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="state" id="inputEmail" class="form-control" placeholder="Email address" required="required">
                <label for="inputEmail">State</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="city" id="inputEmail" class="form-control" placeholder="Email address" required="required">
                <label for="inputEmail">City</label>
              </div>
            </div>
            
            
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="address"  id="inputEmail" class="form-control" placeholder="Email address" required="required">
                <label for="inputEmail">Address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="discount" id="inputEmail" class="form-control" placeholder="Email address" required="required">
                <label for="inputEmail">Discount</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="number" name="days" id="days" class="form-control" placeholder="Day/nights" required="required">
                <label for="inputEmail">Day/nights</label>
              </div>
            </div>
           
            <input name="submit" type="submit" class="btn btn-primary btn-block">
          </form>
         
        </div>
      </div>
    </div>
<?php include'footer.php';?>