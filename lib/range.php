
<?php
include'../booking/config.php';
if(@$_REQUEST['allDataFilter']==1)
{
	/*{'minVal': minVal,'maxVal':maxVal,'filterVal':filterVal,'allDataFilter':1},*/
	$minVal=$_REQUEST['minVal'];
	$maxVal=$_REQUEST['maxVal'];
	$filterVal=$_REQUEST['filterVal'];
	if(strtolower($_REQUEST['filterVal'])=='flight'){
		 $sql="SELECT * FROM `flight_list` WHERE price BETWEEN '$minVal' AND '$maxVal'";
	} else if(strtolower($_REQUEST['filterVal'])=='bus'){
		 $sql="SELECT * FROM `bus_list` WHERE price BETWEEN  '$minVal' AND '$maxVal'";
	} else if(strtolower($_REQUEST['filterVal'])=='hotel'){
		 $sql="SELECT * FROM `hotel_list` WHERE price BETWEEN  '$minVal' AND '$maxVal'";
	} else if(strtolower($_REQUEST['filterVal'])=='recharge'){
		 $sql="SELECT * FROM `recharge_list` WHERE price BETWEEN  '$minVal' AND '$maxVal'";
	} else if(strtolower($_REQUEST['filterVal'])=='tour'){
		 $sql="SELECT * FROM `tour_list` WHERE price BETWEEN  '$minVal' AND '$maxVal'";
	} else if(strtolower($_REQUEST['filterVal'])=='cars'){
		  $sql="SELECT * FROM `car_list`WHERE price BETWEEN  '$minVal' AND '$maxVal'";
	} else{
		echo "<h2>Data Not Found!</h2>";
	}
	$query=@mysqli_query($db,$sql) or die('Category not selected');
	echo '<ul class="booking-list">';
				while ($data=mysqli_fetch_assoc($query)) {
				echo '<li>
				<a class="booking-item" href="resort-book.php">
				<div class="row">
					<div class="col-md-3">
						<div class="booking-item-img-wrap">
							<img src="uploads_list/'.$data['images'].'" alt="Image Alternative text" title="hotel PORTO BAY RIO INTERNACIONAL de luxe">
							<div class="booking-item-img-num"><i class="fa fa-picture-o"></i>19</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="booking-item-rating">
							<ul class="icon-group booking-item-rating-stars">
								<li><i class="fa fa-star"></i>
								</li>
								<li><i class="fa fa-star"></i>
								</li>
								<li><i class="fa fa-star"></i>
								</li>
								<li><i class="fa fa-star"></i>
								</li>
								<li><i class="fa fa-star-half-empty"></i>
								</li>
							</ul><span class="booking-item-rating-number"><b>('.$data['review'].')</b></span><small>Review</small>
						</div>
						<h5 class="booking-item-title">'.$_REQUEST['filterVal'].'</h5>
						<p class="booking-item-address"><i class="fa fa-map-marker"></i> '.$data['city'].$data['state'].$data['country'].'('.date("l jS \of F Y h:i:s A").')</p>
						<ul class="booking-item-features booking-item-features-rentals booking-item-features-sign">
							<li rel="tooltip" data-placement="top" title="" data-original-title="Sleeps"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x 4</span>
							</li>
							<li rel="tooltip" data-placement="top" title="" data-original-title="Bedrooms"><i class="im im-bed"></i><span class="booking-item-feature-sign">x 3</span>
							</li>
							<li rel="tooltip" data-placement="top" title="" data-original-title="Bathrooms"><i class="im im-shower"></i><span class="booking-item-feature-sign">x 1</span>
							</li>
						</ul>
					</div>
					<div class="col-md-3">
					<span class="booking-item-price">&#8377;'.$data['price'].'</span><span></span><span class="btn btn-primary">Book Now</span>
					</div>
				</div>
			</a>
			</li>';
			}
			echo "</ul>"; 

} else{
	echo "Data Not Found!";
}