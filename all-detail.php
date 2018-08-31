<?php 
include'inner-header.php';
if(@$_REQUEST['tour-name'])
{
	$name=str_replace('-', ' ',$_REQUEST['tour-name']);
}
$sql="select * from tour_list where tour_name='$name'";
$query=mysqli_query($db,$sql) or die('database not coneect');
?>

				<div class="booking-item-details">
					<header class="booking-item-header">
						<div class="row">
							<div class="col-md-9">
								<h2 class="lh1em"><?php echo $name=str_replace('-', ' ',$_REQUEST['tour-name']);?></h2>
								
							</div>
							
						</div>
					</header>
					<div class="row">
						<div class="col-md-8">
							<div class="tabbable booking-details-tabbable">
								
								<div class="tab-content">
									<div class="tab-pane fade in active" id="tab-1">
										
										<div class="mt20">
											<ul class="booking-list">
												<?php while($list=mysqli_fetch_assoc($query)){?>
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
																	</ul><span class="booking-item-rating-number"><b ><?= $list['review'];?></b></span><small>(Reviews)</small>
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
															<div class="col-md-3"><span class="booking-item-price">&#x20b9;<?= $list['tour_plan'];?></span>(<?= $list['days'];?>)<span>Days/Night</span>
																<button onclick="funcBook('<?= $list['tour_id'];?>');" class="btn btn-primary">Book Now</button>
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