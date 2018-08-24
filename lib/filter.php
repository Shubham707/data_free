<?php 

include'../booking/config.php';
if(@$_REQUEST['filterData']=='bus')
{
				if($_REQUEST['filterData']=='bus'){
				$sql="SELECT * FROM `bus_list` ORDER BY `totel_seat_reserve` ASC";
				$query=mysqli_query($db,$sql) or die('query is not execute');
				echo '<ul class="booking-list">';
				while ($data=mysqli_fetch_assoc($query)) {
				echo '<li>
				<a class="booking-item" href="#">
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
						<h5 class="booking-item-title">'.$data['bus_cat_id'].'</h5>
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
					<div class="col-md-3"><span class="booking-item-price">&#8377;'.$data['price'].'</span><span></span><span class="btn btn-primary">Book Now</span>
					</div>
				</div>
			</a>
			</li>';
			}
			echo "</ul>"; 
			} else { echo "Data not found!"; }
} else if(@$_REQUEST['filterData']=='car'){
	if($_REQUEST['filterData']=='car'){
				$sql="SELECT * FROM `car_list` ORDER BY `car_id` ASC";
				$query=mysqli_query($db,$sql) or die('query is not execute');
				echo '<ul class="booking-list">';
				while ($data=mysqli_fetch_assoc($query)) {
				echo '<li>
				<a class="booking-item" href="#">
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
						<h5 class="booking-item-title">'.$data['car_cat_id'].'</h5>
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
					<div class="col-md-3"><span class="booking-item-price">&#8377;'.$data['price'].'</span><span></span><span class="btn btn-primary">Book Now</span>
					</div>
				</div>
			</a>
			</li>';
			}
			echo "</ul>"; 
			} else { echo "Data not found!"; }

} else if(@$_REQUEST['filterData']=='flight'){
					if($_REQUEST['filterData']=='flight'){
					$sql="SELECT * FROM `flight_list` ORDER BY `flight_id` ASC";
					$query=mysqli_query($db,$sql) or die('query is not execute');
					echo '<ul class="booking-list">';
					while ($data=mysqli_fetch_assoc($query)) {
					echo '<li>
				<a class="booking-item" href="#">
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
							<h5 class="booking-item-title">'.$data['flight_cat_id'].'</h5>
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
						<div class="col-md-3"><span class="booking-item-price">&#8377;'.$data['price'].'</span><span></span><span class="btn btn-primary">Book Now</span>
						</div>
					</div>
				</a>
				</li>';
				}
				echo "</ul>";
				} else{ echo "Data not found!"; }
} else if(@$_REQUEST['filterData']=='tour'){
				if($_REQUEST['filterData']=='tour'){
				$sql="SELECT * FROM `book_list` ORDER BY `book_id` ASC";
				$query=mysqli_query($db,$sql) or die('query is not execute');
				echo '<ul class="booking-list">';
				while ($data=mysqli_fetch_assoc($query)) {
				echo '<li>
			<a class="booking-item" href="#">
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
						<h5 class="booking-item-title">'.$data['resort_cat_id'].'</h5>
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
					<div class="col-md-3"><span class="booking-item-price">&#8377;'.$data['price'].'</span><span>/night</span><span class="btn btn-primary">Book Now</span>
					</div>
				</div>
			</a>
			</li>';
			}
			echo "</ul>";
			} else { echo "Data not found!"; }
}elseif (@$_REQUEST['filterData']=='hotel') {
	if ($_REQUEST['filterData']=='hotel')
	{
		$sql="SELECT * FROM `hotel_list` ORDER BY `hotel_id` ASC";
				$query=mysqli_query($db,$sql) or die('query is not execute');
				echo '<ul class="booking-list">';
				while ($data=mysqli_fetch_assoc($query)) {
				echo '<li>
			<a class="booking-item" href="#">
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
						<h5 class="booking-item-title">'.$data['hotel_cat_id'].'</h5>
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
					<div class="col-md-3"><span class="booking-item-price">&#8377;'.$data['price'].'</span><span>/night</span><span class="btn btn-primary">Book Now</span>
					</div>
				</div>
			</a>
			</li>';
			}
			echo "</ul>";
	}else{	
		echo "<h2>Data Not Found!</h2>";
	}
} else if (@$_REQUEST['filterData']=='recharge') {
	if ($_REQUEST['filterData']=='hotel')
	{
		$sql="SELECT * FROM `hotel_list` ORDER BY `hotel_id` ASC";
				$query=mysqli_query($db,$sql) or die('query is not execute');
				echo '<ul class="booking-list">';
				while ($data=mysqli_fetch_assoc($query)) {
				echo '<li>
			<a class="booking-item" href="#">
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
						<h5 class="booking-item-title">'.$data['hotel_cat_id'].'</h5>
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
					<div class="col-md-3"><span class="booking-item-price">&#8377;'.$data['price'].'</span><span>/night</span><span class="btn btn-primary">Book Now</span>
					</div>
				</div>
			</a>
			</li>';
			}
			echo "</ul>";
	}else{	
		echo "<h2>Data Not Found!</h2>";
	}
}
if(@$_REQUEST['filterData']==2)
{
	$sql="SELECT * FROM `hotel_list` ORDER BY `hotel_id` ASC";
				$query=mysqli_query($db,$sql) or die('query is not execute');
				echo '<ul class="booking-list">';
				while ($data=mysqli_fetch_assoc($query)) {
				echo '<li>
			<a class="booking-item" href="#">
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
						<h5 class="booking-item-title">'.$data['hotel_cat_id'].'</h5>
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
					<div class="col-md-3"><span class="booking-item-price">&#8377;'.$data['price'].'</span><span>/night</span><span class="btn btn-primary">Book Now</span>
					</div>
				</div>
			</a>
			</li>';
			}
			echo "</ul>";
}
?>
