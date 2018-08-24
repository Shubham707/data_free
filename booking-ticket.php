<?php include'booking/config.php';

?>
<!DOCTYPE HTML>
<html>
<!-- Mirrored from remtsoy.com/tf_templates/traveler/demo_v1_7/flights.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Sep 2016 16:51:49 GMT -->
<!-- Mirrored from wintrip.in/holidays_detail.php?package_id=202&title=2016 Goa Departures With Air Ex Mumbai 4 Days by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 08 Mar 2017 08:55:45 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<!-- /Added by HTTrack -->
<head>
	<title>Indian Largest Travel and Utility Porvinding Portal</title>
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
	<meta name="keywords" content="Template, html, premium, themeforest" />
	<meta name="description" content="Traveler - Premium template for travel companies">
	<meta name="author" content="Tsoy">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- GOOGLE FONTS -->
	<!-- /GOOGLE FONTS -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/styles-2.css">
	<link rel="stylesheet" href="css/mystyles.css">
	<link rel="stylesheet" href="css/book_form.css">
	<script src="js/modernizr.js"></script>
	<link rel="alternate stylesheet" type="text/css" href="css/schemes/bright-turquoise.css" title="bright-turquoise" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="css/schemes/turkish-rose.css" title="turkish-rose" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="css/schemes/salem.css" title="salem" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="css/schemes/hippie-blue.css" title="hippie-blue" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="css/schemes/mandy.css" title="mandy" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="css/schemes/green-smoke.css" title="green-smoke" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="css/schemes/horizon.css" title="horizon" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="css/schemes/cerise.css" title="cerise" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="css/schemes/brick-red.css" title="brick-red" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="css/schemes/de-york.css" title="de-york" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="css/schemes/shamrock.css" title="shamrock" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="css/schemes/studio.css" title="studio" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="css/schemes/leather.css" title="leather" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="css/schemes/denim.css" title="denim" media="all" />
	<link rel="alternate stylesheet" type="text/css" href="css/schemes/scarlet.css" title="scarlet" media="all" />
	<link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css">
	<style type="text/css">
		#slider-container {
		    width:auto;
		    margin-left:30px;
		}
		.ui-datepicker-month{ background-color: #333; }
	</style>
</head>


<body class="full">
	<!-- FACEBOOK WIDGET -->
	<div id="fb-root"></div>
	<!-- /FACEBOOK WIDGET -->
	<div class="global-wrap">
		<header id="main-header">
			<div class="header-top">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<a class="logo" href="index-2.html">
								<img src="images/logo.png" style="width:200px; height: 45px;" alt="Travel Logo" title="Logo" />
							</a>
						</div>
						<div class="col-md-3 col-md-offset-2"></div>
						<div class="col-md-9">
							<div class="top-user-area clearfix">
								<ul class="top-user-area-list list list-horizontal list-border">
									<li> <a href="register.html" title="Sign in">Sign Up</a> 
									</li>
									<li> <a href="login.html" title="Agent Login">Sign In</a>
									</li>
									<li> <a target="_blank" href="https://goalltrip.com/load_wallet" title="Agent Login">Load Wallet</a>
									</li>
									<li class="nav-drop"><a href="#">My Account<i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></a>
										<ul class="list nav-drop-menu">
											<li onclick="location.href='print_ticket'" style="cursor:pointer"><a title="Print Flight Ticket"><i class="fa fa-plane">&nbsp;</i> Print Ticket</a>
											</li>
											<li onclick="location.href='cancel_ticket'" style="cursor:pointer"><a title="Cancel Flight Ticket"><i class="fa fa-plane">&nbsp;</i> Cancel Ticket</a>
											</li>
											<li onclick="location.href='print_bus_ticket'" style="cursor:pointer"><a title="Print Bus Ticket"><i class="im im-bus">&nbsp;</i> Print Ticket</a>
											</li>
											<li onclick="location.href='print_recharge'" style="cursor:pointer"><a title="Print Recharge"><i class="fa fa-mobile">&nbsp;</i> Recharge Print</a>
											</li>
										</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
			<div class="container">
				<ul class="breadcrumb">
					<li><a href="index-3.html">Home</a>
					</li>
				</ul>

				<div class="booking-item-details">
					<header class="booking-item-header">
						<div class="row">
							<div class="col-md-9"></div>
						</div>
					</header>
					<div class="row">
						<div class="col-md-4">
							
							<div class="booking-item-dates-change">
								<h4>Filter Booking And Recharge</h4>
								<div class="input-daterange" data-date-format="MM d, DD"></div>

								<div class="row">
									<div class="col-md-6">

										<div class="form-group form-group- form-group-select-plus">
											<div class="col-md-12">

												<div class="col-md-8">
													<input type="checkbox" class="form-control" id="bus" onclick="sendFliter('bus');" name="extra_adult" value="bus">
												</div>
												<div class="col-md-4">
													Bus
												</div>
											</div>
											<div class="col-md-12">
												<div class="col-md-8">
													<input type="checkbox" class="form-control" id="car" onclick="sendFliter('car');" name="extra_adult" value="car">
												</div>
												<div class="col-md-4">
													Car
												</div>
											</div>
											<div class="col-md-12">
												<div class="col-md-8">
													<input type="checkbox" class="form-control" id="flight" onclick="sendFliter('flight');" name="extra_adult" value="flight">
												</div>
												<div class="col-md-4">
													Flight
												</div>
											</div>
											<div class="col-md-12">
												<div class="col-md-8">
													<input type="checkbox" class="form-control" id="hotel" onclick="sendFliter('hotel');" name="extra_adult" value="hotel">
												</div>
												<div class="col-md-4">
													Hotel
												</div>
											</div>
											<div class="col-md-12">
												<div class="col-md-8">
													<input type="checkbox" class="form-control" id="recharge" onclick="sendFliter('recharge');" name="extra_adult" value="recharge">
												</div>
												<div class="col-md-4">
													Recharge
												</div>
											</div>
											<div class="col-md-12">
												<div class="col-md-8">
													<input type="checkbox" class="form-control" id="tour" onclick="sendFliter('tour');" name="extra_adult" value="tour">
												</div>
												<div class="col-md-4">
													Resort
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- next sidebar -->
							<div class="gap gap-small"></div>
							<div class="booking-item-dates-change">
								<h4>Filter Booking Date</h4>
								<div class="input-daterange" data-date-format="MM d, DD"></div>

								<div class="row">
									<div class="col-md-12">

										<div class="form-group form-group- form-group-select-plus">
											<div class="col-md-12">
												<form id="dateFilter" method="post">
												<div class="col-md-12">
													<input type="text" id="fillDate" class="form-control" name="booking_date">
												</div>
												<div class="gap gap-small"></div>
												<div class="col-md-12">
													<select type="text" class="form-control" id="catDate" name="catDate">
														<option value=" ">Select Category</option>
														<option>Bus</option>
														<option>Flight</option>
														<option>Cars</option>
														
													</select>
												</div>
												<div class="gap gap-small"></div>
												</form>
											</div>
											
										</div>
									</div>
								</div>
							</div>
							<div class="gap gap-small"></div>
							<div class="booking-item-dates-change">
								<h4>Filter Booking Price Range</h4>
								<div class="input-daterange" data-date-format="MM d, DD"></div>

								<div class="row">
									<div class="col-md-12">

										<div class="form-group form-group- form-group-select-plus">
											<div class="col-md-12">
												<div id="slider-container"></div>
												<p>
												    <label for="amount"></label>
												    <input type="text" id="amount" style="border: 0; color: red; font-weight: bold;margin-left: 0px;" />
												</p>
												<form id="searchRange" method="post">
													<input type="hidden" name="minValue" id="minValue">
													<input type="hidden" name="maxValue" id="maxValue">
													<div class="gap gap-small"></div>
												<div class="col-md-12">
													<select class="form-control" name="typeRange" id="typeRange">
														<option value=" ">Filter Category</option>
														<option>Bus</option>
														<option>Flight</option>
														<option>Cars</option>
														
													</select>
												</div>

												
												<div id="slider-range"></div>
												
												</form>
											</div>
											
										</div>
									</div>
								</div>
							</div>

						</div>
						<div class="col-md-8">
							<div class="tabbable booking-details-tabbable">
								<ul class="nav nav-tabs" id="myTab">
									<li><a href="#tab-5" data-toggle="tab"><i class="fa fa-bars"></i>Booking List</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="">
										<div class="mt20" id="result">
											
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
				<div class="gap"></div>
			</div>
		</form>
		<footer id="main-footer">
			<div class="container">
				<div class="row row-wrap">
					<div class="col-md-3">
						<a class="logo" href="index-2.html">
							<img src="images/logo.png" style="width: 190px;
    height: 45px;" alt="wintrip.in" title="wintrip.in" />
						</a>
						<ul class="list list-horizontal list-space">
							<li>
								<a target="_blank" class="fa fa-facebook box-icon-normal round animate-icon-bottom-to-top" href="https://www.facebook.com/suvogoalltrip"></a>
							</li>
							<li>
								<a target="_blank" class="fa fa-twitter box-icon-normal round animate-icon-bottom-to-top" href="https://twitter.com/goalltrip_com"></a>
							</li>
							<li>
								<a target="_blank" class="fa fa-google-plus box-icon-normal round animate-icon-bottom-to-top" href="https://twitter.com/goalltrip_com"></a>
							</li>
							<li>
								<a class="fa fa-linkedin box-icon-normal round animate-icon-bottom-to-top" href="#"></a>
							</li>
							<li>
								<a target="_blank" class="fa fa-youtube box-icon-normal round animate-icon-bottom-to-top" href="https://youtu.be/_nDfWXMJWdI"></a>
							</li>
						</ul>
						<p>Copyright © 2016 Wintrip tours and holidays All Rights Reserved.</p>
					</div>
					<style>
						.list-footer > li{
							
							font-weight:bold;
							font-size:12px;
							
						}
					</style>
					<div class="col-md-2">
						<h4 style="color: #F60">Wintrip Info</h4>
						<ul class="list list-footer">
							<li><a href="about.html">About Us</a>
							</li>
							<li><a href="#">Board Of Directors</a>
							</li>
							<li><a href="about-2.html">Our Team</a>
							</li>
							<li><a href="contact.html">Contact us</a>
							</li>
						</ul>
					</div>
					<div class="col-md-2">
						<h4 style="color: #F60">Partner </h4>
						<ul class="list list-footer">
							<li><a href="register.html">Become an Agent</a>
							</li>
							<li><a href="franchise.html">Franchise</a>
							</li>
							<li><a href="faq.html">Faq</a>
							</li>
						</ul>
					</div>
					<div class="col-md-2">
						<h4 style="color: #F60">Legal</h4>
						<ul class="list list-footer">
							<li><a href="privacy.html">Privacy Policy</a>
							</li>
							<li><a href="terms.html">Terms & Conditions</a>
							</li>
							<li><a href="terms.html">Legal Data</a>
							</li>
							<li><a href="user_agreement.html">User Agreement</a>
							</li>
						</ul>
					</div>
					<div class="col-md-3">
						<h4>Wintrip tours and holidays</h4>
						<h4 style="color:#F60">+91 8111892447</h4>
						<h4 style="color:#F60">info@wintrip.in</h4>
						<p style="font-weight:bold">24/7 Dedicated Customer Support</p>
					</div>
				</div>
			</div>
		</footer>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/slimmenu.js"></script>
		<script src="js/bootstrap-datepicker.js"></script>
		<script src="js/bootstrap-timepicker.js"></script>
		<script src="js/nicescroll.js"></script>
		<script src="js/dropit.js"></script>
		<script src="js/ionrangeslider.js"></script>
		<script src="js/icheck.js"></script>
		<script src="js/fotorama.js"></script>
		<script src="js/typeahead.js"></script>
		<script src="js/card-payment.js"></script>
		<script src="js/magnific.js"></script>
		<script src="js/owl-carousel.js"></script>
		<script src="js/fitvids.js"></script>
		<script src="js/tweet.js"></script>
		<script src="js/countdown.js"></script>
		<script src="js/gridrotator.js"></script>
		<script src="js/custom.js"></script>
		<script src="js/switcher.js"></script>
		<script src="assets/js/jquery-ui.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
		<script>
		var dateToday = new Date();
		var dates = $("#fillDate, #to").datepicker({
		    defaultDate: "+1w",
		    changeMonth: true,
		    numberOfMonths: 1,
		    minDate: dateToday,
		    onSelect: function(selectedDate) {
		        var option = this.id == "from" ? "minDate" : "maxDate",
		            instance = $(this).data("datepicker"),
		            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
		        dates.not(this).datepicker("option", option, date);
		    }
		});
		function sendFliter(evt)
		{
			$.ajax({
				url: 'lib/filter.php',
				type: 'POST',
				data: {filterData: evt},
				success:function(result){
					$('#result').html(result);
				}
			});
		}
		function loadData(){
	      $.ajax({
				url: 'lib/filter.php?filterData=2',
				type: 'POST',
				data: {},
				success:function(result){
					$('#result').html(result);
				}
			});
	    }
	    loadData();
		$("input:checkbox").on('click', function() {
			  var $box = $(this);
			  if ($box.is(":checked")) {
			    var group = "input:checkbox[name='" + $box.attr("name") + "']";
			    $(group).prop("checked", false);
			    $box.prop("checked", true);
			  } else {
			    $box.prop("checked", false);
			  }
			});
					$(function () {
				      $('#slider-container').slider({
				          range: true,
				          min: 200,
				          max: 10000,
				          values: [100, 10000],
				          create: function() {
				              $("#amount").val("299 - 1099");
				          },
				          slide: function (event, ui) {
				              $("#amount").val("" + ui.values[0] + " - " + ui.values[1]);
				              var mi = ui.values[0];
				              var mx = ui.values[1];
				              $('#minValue').val(mi);
				              $('#maxValue').val(mx);
				              filterSystem(mi, mx);
				          }
				      })
					});

			  function filterSystem(minPrice, maxPrice) {
			      $("#computers div.system").hide().filter(function () {
			          var price = parseInt($(this).data("price"), 10);
			          return price >= minPrice && price <= maxPrice;
			      }).show();
			  }
			  $(document).ready(function() {
				$('#searchRange').click(function(){
					var minVal= $('#minValue').val();
					var maxVal= $('#maxValue').val();
					var filterVal= $('#typeRange').val();
					/*var allValue='minVal'+minVal+'&maxVal'+maxVal+'&filterVal'+filterVal;
					console.log(allValue);*/
					$.ajax({
						url: 'lib/range.php',
						type: 'POST',
						data: {'minVal': minVal,'maxVal':maxVal,'filterVal':filterVal,'allDataFilter':1},
						success:function(result){
							$('#result').html(result);

						}
					});
				});
			  });
			   $(document).ready(function() {
				$('#dateFilter').click(function(){
					var fillDate= $('#fillDate').val();
					var catDate= $('#catDate').val();
					console.log(fillDate+''+catDate)
					$.ajax({
						url: 'lib/filterDate.php',
						type: 'POST',
						data: {'fillDate': fillDate,'catDate':catDate,'allDataFilter':3},
						success:function(result){
							$('#result').html(result);

						}
					});
				});
			  });
			 
		</script>
	</div>
</body>


</html>
