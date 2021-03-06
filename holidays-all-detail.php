<?php 
include'inner-header.php';
$sql="select * from book_list where status=1";
$query=mysqli_query($db,$sql) or die('database not coneect');
?>

				<div class="booking-item-details">
					<header class="booking-item-header">
						<div class="row">
							<div class="col-md-9">
								<h2 class="lh1em">So My Resort</h2>
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
								<p class="booking-item-header-price"><span class="text-lg">0</span>Base Fare</p>
							</div>
						</div>
					</header>
					<div class="row">
						<div class="col-md-8">
							<div class="tabbable booking-details-tabbable">
								<ul class="nav nav-tabs" id="myTab">
									<li class="active"><a href="#tab-1" data-toggle="tab"><i class="fa fa-camera"></i>Photos</a>
									</li>
									<li><a href="#inclusion" data-toggle="tab"><i class="fa fa-map-marker"></i>Include</a>
									</li>
									<li><a href="#exclusions" data-toggle="tab"><i class="fa fa-map-marker"></i>Exclude</a>
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
												<img src="https://www.goalltrip.com/403.php" alt="Tour" title="Holidaays" />
											</div>
										</div>
										<!-- START LIGHTBOX GALLERY -->
										<!-- END LIGHTBOX GALLERY -->
									</div>
									<div class="tab-pane fade" id="inclusion">Airport/Railway (Thivim/Karmali) Station transfers by non AC coach Non Alcoholic Welcome drink on arrival Complimentary one bottles of mineral water on a day of arrival Well appointed air conditioned rooms with TV, Electronic, Mini Bar Buffet Breakfast & Dinner. One Full day South Goa Sightseeing followed by boat cruise by non AC coach Complimentary one Mineral Water bottle per room per day Use of swimming pool and other hotel services All currently applicable hotel taxes.</div>
									<div class="tab-pane fade" id="exclusions">Any Air or train fare. Monument fee / Camera fee. Kind of Personal Expenses or Optional Tours/Meals other than specified. Cost does not include any other thing apart from the inclusions. Medical Travel insurance. Surcharges applicable during Festival, Peak Season & Special Events. Any changes in the taxes levied by Govt.</div>
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
													<p>The world famous holiday destination, Goa welcomes its visitors with vivacious locals, sparkling waters, white sands, lip-smacking Goan dishes and happening nightclubs. Goa is divided into two districts namely North Goa and South Goa, with Panaji as its administrative capital. While North Goa is an instant hit among party lovers with its pulsating nightlife, lively beaches and hippie markets, South Goa is the ultimate place for peace seekers with its clean beaches, fewer activities and less crowd. If you're looking for accommodation in North Goa area, then So My Resort is the perfect place to enjoy a peaceful stay. Located on the Calangute-Candolim main road, So My Resort is just 500 m away from North Goas famous Calangute Beach. It enjoys close proximity to Baga Beach, Candolim beach, Sinquerim Beach, flea markets and casinos as well. Surrounded by swaying coconut trees and old Goan houses, the resort is well-connected to Dabolim Airport (42 km), Thivim Railway Station (18 km) and Mapusa Bus Terminus (8 km).</p>
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
															<div class="booking-item-raiting-list-number">1418</div>
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
										</div><a class="btn btn-primary" href="#">Write a Review</a>
									</div>
									<div class="tab-pane fade" id="tab-5">
										<div class="mt20">
											<ul class="booking-list">
												<?php while($list=mysqli_fetch_assoc($query)){?>
												<li>
													<a class="booking-item" href="#">
														<div class="row">
															<div class="col-md-3">
																<div class="booking-item-img-wrap">
																	<img src="booking/uploads_list/<?= $list['images'];?>" alt="Image Alternative text" title="hotel PORTO BAY RIO INTERNACIONAL de luxe" />
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
																<p class="booking-item-address"><i class="fa fa-map-marker"></i> <?= $list['country'];?>,<?= $list['state'];?>(Times Square)</p>
																<ul class="booking-item-features booking-item-features-rentals booking-item-features-sign">
																	<li rel="tooltip" data-placement="top" title="Sleeps"><i class="fa fa-male"></i><span class="booking-item-feature-sign">x 4</span>
																	</li>
																	<li rel="tooltip" data-placement="top" title="Bedrooms"><i class="im im-bed"></i><span class="booking-item-feature-sign">x 3</span>
																	</li>
																	<li rel="tooltip" data-placement="top" title="Bathrooms"><i class="im im-shower"></i><span class="booking-item-feature-sign">x 1</span>
																	</li>
																</ul>
															</div>
															<div class="col-md-3"><span class="booking-item-price">$<?= $list['price'];?></span>(<?= $list['days'];?>)<span>Days/Night</span>
																<button onclick="funcBook('<?= $list['book_id'];?>');" class="btn btn-primary">Book Now</button>
															</div>
														</div>
													</a>
												</li>
												<?php }?>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="booking-item-meta">
								<h2 class="lh1em mt40" id="price">INR0</h2>
								<input type="hidden" name="price" value="0" id="" />
								<input type="hidden" name="total" value="" id="price" />
								<input type="hidden" name="pck_id" value="321" id="" />
								<input type="hidden" name="pack_name" value="So My Resort" id="" />
								<div class="booking-item-rating">
									<ul class="icon-list icon-group booking-item-rating-stars">
										<li><i class="fa fa-star"></i>
										</li>
										<li><i class="fa fa-star"></i>
										</li>
										<li><i class="fa fa-star"></i>
										</li>
										<li><i class="fa fa-star"></i>
										</li>
										<li><i class="fa fa-star"></i>
										</li>
									</ul><span class="booking-item-rating-number"><b >4.7</b> of 5 <small class="text-smaller">guest rating</small></span>
									<p><a class="text-default" href="#">based on 1535 reviews</a>
									</p>
								</div>
							</div>
							<div class="booking-item-dates-change">
								<div class="input-daterange" data-date-format="MM d, DD"></div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group form-group- form-group-select-plus">
											<label>Extra Adults</label>
											<div class="btn-group-select-num" data-toggle="buttons">
												<select class="form-control adult" name="extra_adult">
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
												<select class="form-control child" name="extra_child">
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
							<button type="submit" class="btn btn-primary btn-lg">Book Now</button>
						</div>
					</div>
				</div>
				<div class="gap"></div>
			</div>
		</form>
		<?php include'inner-footer.php';?>
<script type="text/javascript">
	
	function funcBook(id)
	{
		
		window.location.href="resort-book.php?book-id="+id;
	}
</script>