<?php include 'inner-header.php'; if($_REQUEST[ 'book-id']){ $id=$_REQUEST[ 'book-id']; $sql="select * from bus_list where bus_id='$id'" ; $query=mysqli_query($db,$sql) or die( 'database not coneect'); $list=mysqli_fetch_assoc($query); } else{ header( "Location:booking-ticket.php"); } ?>
<style>
	#starRating li{ list-style: none; float: left; margin-left: 5px;}
</style>
<div class="booking-item-details">
	<header class="booking-item-header">
		<div class="row">
			<div class="col-md-9">
				<h2 class="lh1em">Booking System</h2>
				<p class="lh1em text-small"><i class="fa fa-map-marker"></i> 6782 Sarasea Circle, Siesta Key, FL 34242</p>
				<ul class="list list-inline text-small">
					<li><a href="#"><i class="fa fa-envelope"></i>  info@wintrip.in</a>
					</li>
					<li><a href="#"><i class="fa fa-home"></i>  wintrip.in</a>
					</li>
					<li><i class="fa fa-phone"></i> 8111892447</li>
				</ul>
			</div>
			<div class="col-md-3">
				<p class="booking-item-header-price"><span class="text-lg">&#x20B9;<?= $list['price'];?></span>Base Fare</p>
			</div>
		</div>
	</header>
	<div class="row">
		<div class="col-md-8">
			<div class="tabbable booking-details-tabbable">
				<ul class="nav nav-tabs" id="myTab">
					<li class="active"><a href="#tab-1" data-toggle="tab"><i class="fa fa-camera"></i>Photos</a>
					</li>
					<li><a href="#terms" data-toggle="tab"><i class="fa fa-map-marker"></i>Terms</a>
					</li>
					<li><a href="#tab-3" data-toggle="tab"><i class="fa fa-info-circle"></i>About</a>
					</li>
					<li><a href="#tab-4" data-toggle="tab"><i class="fa fa-signal"></i>Rating</a>
					</li>
					<li><a href="#tab-5" data-toggle="tab"><i class="fa fa-bars"></i>Itinerary</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade in active" id="tab-1">
						<div class="tab-pane fade in active" id="tab-1">
							<div class="fotorama" data-allowfullscreen="true" data-nav="thumbs" style="height:350px" width="500px">
								<img src="uploads_list/<?= $list['images'];?>" tag="" height="500" width="500">
							</div>
						</div>
						<!-- START LIGHTBOX GALLERY -->
						<!-- END LIGHTBOX GALLERY -->
					</div>
					<div class="tab-pane fade" id="terms">
						<h5 style="font-weight:bold">Terms & Condition</h5>
						Price mentioned is for a person basis. Bookings are applicable on twin-sharing basis. Bookings are subject to availability with the hotel. Cost does not include any other thing apart from the itinerary inclusions. Any other services that is not included in the above quoted section. Government Service Tax extra 3.09% (as applicable). Rates of the Luxury segment are not applicable between 20th Dec until 5th Jan and for the long weekends Package rates are subject to change without any prior notice. Goalltrip.com will provide alternate or similar category of hotel in case the hotel mentioned in program is not available. All cancellations & amendments will be done as per hotel policy. The guest must carry photo identification like Passport/Driving License/Voter ID Card IN ORIGINAL at the point of check in at the hotel. Goalltrip.com reserves the right to change/modify or terminate the offer any time at its own discretion and without any prior notice. A Surcharge may be levied by the hotel during National Holidays/Festive period/Extended Weekends, New year etc. Above rates may go higher during long weekends and on black out dates and it will not applicable during festival period(national or local holidays) Goalltrip.com is not responsible for any inconvenience cause due to any political issue or natural calamity etc.
						<div class="gap"></div>
						<h5 style="font-weight:bold">Cancellation</h5>
						If circumstances force you to cancel the BOOKING, the cancellation must be intimated to us in writing and the following cancellation charges will apply. If time limit is triggered then 20% of the package amount will be deducted In low season 100% of the package amount will be deducted if cancelled 3 days before check in date In peak season 100% of the package amount will be deducted once time limit is triggered Same cancellation policy will apply for postponements of bookings or in case of change of hotels during the progress of tour.</div>
					<div class="tab-pane fade" id="tab-3">
						<div class="mt20">
							<div class="row">
								<div class="col-md-12">
									<h5 style="font-weight:bold">Description</h5>
									<p>
										<?=$ list[ 'book_description']?>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="tab-4">
						<div class="mt20">
							<div class="row">
								<div class="col-md-8">
									<h4 class="lhem">Traveler rating</h4>
									<ul class="list booking-item-raiting-list">
										<li>
											<div class="booking-item-raiting-list-title">Exellent</div>
											<div class="booking-item-raiting-list-bar">
												<div style="width:90%;"></div>
											</div>
											<div class="booking-item-raiting-list-number">1000</div>
										</li>
										<li>
											<div class="booking-item-raiting-list-title">Very Good</div>
											<div class="booking-item-raiting-list-bar">
												<div style="width:6%;"></div>
											</div>
											<div class="booking-item-raiting-list-number">76</div>
										</li>
										<li>
											<div class="booking-item-raiting-list-title">Average</div>
											<div class="booking-item-raiting-list-bar">
												<div style="width:4%;"></div>
											</div>
											<div class="booking-item-raiting-list-number">20</div>
										</li>
										<li>
											<div class="booking-item-raiting-list-title">Poor</div>
											<div class="booking-item-raiting-list-bar">
												<div style="width:2%;"></div>
											</div>
											<div class="booking-item-raiting-list-number">9</div>
										</li>
										<li>
											<div class="booking-item-raiting-list-title">Terrible</div>
											<div class="booking-item-raiting-list-bar">
												<div style="width:1%;"></div>
											</div>
											<div class="booking-item-raiting-list-number">8</div>
										</li>
									</ul>
								</div>
								<div class="col-md-4">
									<h4 class="lhem">Summary</h4>
									<ul class="list booking-item-raiting-summary-list">
										<li>
											<div class="booking-item-raiting-list-title">Sleep</div>
											<ul class="icon-group booking-item-rating-stars">
												<li><i class="fa fa-smile-o"></i>
												</li>
												<li><i class="fa fa-smile-o"></i>
												</li>
												<li><i class="fa fa-smile-o"></i>
												</li>
												<li><i class="fa fa-smile-o"></i>
												</li>
												<li><i class="fa fa-smile-o"></i>
												</li>
											</ul>
										</li>
										<li>
											<div class="booking-item-raiting-list-title">Location</div>
											<ul class="icon-group booking-item-rating-stars">
												<li><i class="fa fa-smile-o"></i>
												</li>
												<li><i class="fa fa-smile-o"></i>
												</li>
												<li><i class="fa fa-smile-o"></i>
												</li>
												<li><i class="fa fa-smile-o"></i>
												</li>
												<li><i class="fa fa-smile-o text-gray"></i>
												</li>
											</ul>
										</li>
										<li>
											<div class="booking-item-raiting-list-title">Service</div>
											<ul class="icon-group booking-item-rating-stars">
												<li><i class="fa fa-smile-o"></i>
												</li>
												<li><i class="fa fa-smile-o"></i>
												</li>
												<li><i class="fa fa-smile-o"></i>
												</li>
												<li><i class="fa fa-smile-o"></i>
												</li>
												<li><i class="fa fa-smile-o"></i>
												</li>
											</ul>
										</li>
										<li>
											<div class="booking-item-raiting-list-title">Clearness</div>
											<ul class="icon-group booking-item-rating-stars">
												<li><i class="fa fa-smile-o"></i>
												</li>
												<li><i class="fa fa-smile-o"></i>
												</li>
												<li><i class="fa fa-smile-o"></i>
												</li>
												<li><i class="fa fa-smile-o"></i>
												</li>
												<li><i class="fa fa-smile-o"></i>
												</li>
											</ul>
										</li>
										<li>
											<div class="booking-item-raiting-list-title">Rooms</div>
											<ul class="icon-group booking-item-rating-stars">
												<li><i class="fa fa-smile-o"></i>
												</li>
												<li><i class="fa fa-smile-o"></i>
												</li>
												<li><i class="fa fa-smile-o"></i>
												</li>
												<li><i class="fa fa-smile-o"></i>
												</li>
												<li><i class="fa fa-smile-o"></i>
												</li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
							<div class='col-lg-12 cell'> <a class="btn btn-primary enquiry-button" href="#">Write a Review</a>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="tab-5">
						<div class="mt20">
							<ul class="booking-list">
								<li>
									<a class="booking-item" href="#">
										<div class="row">
											<div class="col-md-3">
												<div class="booking-item-img-wrap">
													<img src="uploads_list/<?= $list['images'];?>" alt="Image Alternative text" title="hotel PORTO BAY RIO INTERNACIONAL de luxe" />
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
													</ul><span class="booking-item-rating-number"><b ><?= $list['review'];?></b></span><small>(<?= $list['review'];?> reviews)</small>
												</div>
												<h5 class="booking-item-title"><?= $list['address'];?></h5>
												<p class="booking-item-address"><i class="fa fa-map-marker"></i> 
													<?=$ list[ 'country'];?>,
														<?=$ list[ 'state'];?>(Times Square)</p>
												<ul id="starRating" data-stars="5"></ul>
											</div>
											<div class="col-md-3"><span class="booking-item-price">&#x20B9;<?= $list['price'];?></span>(
												<?=$ list[ 'days'];?>)<span>Days/Night</span>
											</div>
										</div>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="booking-item-meta">
				<h2 class="lh1em mt40" id="price"></h2>
			</div>
			<div class="booking-item-dates-change">
				<div class="input-daterange" data-date-format="MM d, DD"></div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group form-group- form-group-select-plus">
							<label>Extra Adults</label>
							<div class="btn-group-select-num" data-toggle="buttons">
								<select class="form-control adult" name="extra_adult" onchange="adultcount(this.value);">
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group form-group-select-plus">
							<label>Extra Children</label>
							<div class=" btn-group-select-num" data-toggle="buttons">
								<select class="form-control child" name="extra_child" onchange="adultcount(this.value);">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="gap gap-small"></div>
			<button type="submit" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal">Book Now</button>
		</div>
	</div>
</div>
<div class="gap"></div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ticket Booking</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php include 'ticket/book.php'?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<?php include 'inner-footer.php';?>
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
	function funcBook(id)
	{
		
		window.location.href="resort-book.php?book-id="+id;
	}
	function adultcount(evt)
	{

		var adult=$('.adult').val();
		var child=$('.child').val();
		if(adult && child)
		{
			$('#adultpass').val(adult);
			$('#childpass').val(child);
		}
	}
</script>
<script>
	$(".enquiry-button").click(function (e) {
	    e.preventDefault();
	    e.stopPropagation();
	    var cell = $(this).closest('.cell');
	    if (cell.find('.enquiry-form').length) {
	        cell.find('.enquiry-form').slideToggle();
	    } else {
	        cell.append(
	            "<form id='sendReview' method='post'><div class='row'><div class='col-md-8'>" +
	            "<div class='md-form mb-0'>" +
	            "Your Name: <input type='text'  name='username' class='form-control'></div></div>" +
	            "<br><div class='col-md-8'>" +
	            "<div class='md-form mb-0'>" +
	            " <br>Title: <input type='text'  name='title' class='form-control'></div></div>" +
	            "<div class='col-md-8'>" +
	            "<div class='md-form mb-0'>" +
	            "Optional Comment:<textarea type='text'  name='comment' class='form-control'></textarea></div></div>" +
	            "<div class='col-md-8'><br><div class='md-form mb-0'><input class='btn btn-info setup' type='submit' id='send' value='Review'></form>" +
	            "</div></div>");
	        cell.find('.enquiry-form').hide().slideDown("slow");
	    }
	});
	$(document).ready(function(){
	$("#send").click(function(){
	var username = $("#username").val();
	var title = $("#title").val();
	var comment = $("#comment").val();
	var dataString = 'username='+ username + '&title='+ title + '&comment='+ comment;
	alert(dataString);
	});
	});
	
	
	jQuery(function( $ ) {
	    $('#starRating').starRating({
			 callback: function (value) {
				 alert('You Just Clicked: '+value);
	            }})
	});
</script>