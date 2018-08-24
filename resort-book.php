<?php 
include'booking/config.php';
$id=$_REQUEST['book-id']; 
$sql="select * from book_list where book_id='$id'";
$query=mysqli_query($db,$sql) or die('database not coneect');
?>
<!DOCTYPE HTML>
<html>
<!-- Mirrored from remtsoy.com/tf_templates/traveler/demo_v1_7/flights.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Sep 2016 16:51:49 GMT -->
<!-- Mirrored from wintrip.in/holidays_detail.php?package_id=321&title=So My Resort by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 08 Mar 2017 08:55:55 GMT -->
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
</head>
<script src="js/google.js"></script>
<script>
	/*$(document).ready(function() {
			var myArr = [];
		
			$.ajax({
				type: "GET",
				url: "flight.xml", // change to full path of file on server
				dataType: "xml",
				success: parseXml,
				complete: setupAC,
				failure: function(data) {
					alert("XML File could not be found");
					}
			});
		
			function parseXml(xml)
			{
				//find every query value
				$(xml).find("flight").each(function()
				{
					
					//myArr.push($(this).attr("country"));
					myArr.push($(this).text());
				});	
			}
			
			function setupAC() {
				$("input#from").autocomplete({
						source: myArr,
						minLength: 1,
						
						select: function(event, ui) {
							$("input#from").val(ui.item.value);
							//$("#searchForm").submit();
							//document.getElementById('from').innerHTML=+'badsddsf';
						}
				});
			}
		});
		
	$(document).ready(function() {
			var myArr = [];
		
			$.ajax({
				type: "GET",
				url: "flight.xml", // change to full path of file on server
				dataType: "xml",
				success: parseXml,
				complete: setupAC,
				failure: function(data) {
					alert("XML File could not be found");
					}
			});
		
			function parseXml(xml)
			{
				//find every query value
				$(xml).find("flight").each(function()
				{
					
					//myArr.push($(this).attr("country"));
					myArr.push($(this).text());
				});	
			}
			
			function setupAC() {
				$("input#to").autocomplete({
						source: myArr,
						minLength: 1,
						
						select: function(event, ui) {
							$("input#to").val(ui.item.value);
							//$("#searchForm").submit();
						}
				});
			}
		});*/
</script>
<script type="text/javascript">
	/*$(document).ready(function() {
		var myArr = [];
	
		$.ajax({
			type: "GET",
			url: "flight_int.xml", // change to full path of file on server
			dataType: "xml",
			success: parseXml,
			complete: setupAC,
			failure: function(data) {
				alert("XML File could not be found");
				}
		});
	
		function parseXml(xml)
		{
			//find every query value
			$(xml).find("flight_int").each(function()
			{
				
				//myArr.push($(this).attr("country"));
				
				text ='<i class="fa fa-bed"></i>';
				
				myArr.push($(this).text());
			});	
		}
		
		function setupAC() {
			$("input#from_location_international_flight").autocomplete({
					source: myArr,
					minLength: 2,
					
					select: function(event, ui) {
						$("input#from_location_international_flight").val(ui.item.value)
						
						//$("input#from_location_international_flight").in
						
						document.getElementById('from_location_international_flight').innerHTML='<i class="fa fa-bed"></i>';
						//$("#searchForm").submit();
					}
			});
		}
	});
	
	$(document).ready(function() {
		var myArr = [];
	
		$.ajax({
			type: "GET",
			url: "flight_int.xml", // change to full path of file on server
			dataType: "xml",
			success: parseXml,
			complete: setupAC,
			failure: function(data) {
				alert("XML File could not be found");
				}
		});
	
		function parseXml(xml)
		{
			//find every query value
			$(xml).find("flight_int").each(function()
			{
				
				//myArr.push($(this).attr("country"));
				myArr.push($(this).text());
			});	
		}
		
		function setupAC() {
			$("input#to_location_international_flight").autocomplete({
					source: myArr,
					minLength: 1,
					
					select: function(event, ui) {
						$("input#to_location_international_flight").val(ui.item.value);
						//$("#searchForm").submit();
					}
			});
		}
	});*/
</script>
<script>
	/*$(document).ready(function() {
		var myArr = [];
	
		$.ajax({
			type: "GET",
			url: "INTL_City_details.xml", // change to full path of file on server
			dataType: "xml",
			success: parseXml,
			complete: setupAC,
			failure: function(data) {
				alert("XML File could not be found");
				}
		});
	
		function parseXml(xml)
		{
			//find every query value
			$(xml).find("CityName").each(function()
			{
				
				//myArr.push($(this).attr("label"));
				myArr.push($(this).text());
			});	
		}
		
		function setupAC() {
			$("input#from_hotel_int").autocomplete({
					source: myArr,
					minLength: 2,
					
					select: function(event, ui) {
						$("input#from_hotel_int").val(ui.item.value);
						//$("#international_form").submit();
					}
			});
		}
	});*/
</script>
<script>
	/*$(document).ready(function() {
		var myArr = [];
	
		$.ajax({
			type: "GET",
			url: "dom_hotel.xml", // change to full path of file on server
			dataType: "xml",
			success: parseXml,
			complete: setupAC_dom,
			failure: function(data) {
				alert("XML File could not be found");
				}
		});
	
		function parseXml(xml)
		{
			//find every query value
			$(xml).find("domhotel").each(function()
			{
				
				//myArr.push($(this).attr("label"));
				myArr.push($(this).text());
			});	
		}
		
		function setupAC_dom() {
			$("input#from_hotel").autocomplete({
					source: myArr,
					minLength: 2,
					
					select: function(event, ui) {
						$("input#from_hotel").val(ui.item.value);
						//$("#international_form").submit();
						
						//var gif ='http://www.ticketshop-thueringen.de/Ticketshop-theme/images/dummy/loading_150.gif';
						
						
                      //$("input#from_hotel").css( "background-image", "url(" +ui.item.gif + ")" );
					}
			});
		}
	});*/
</script>
<script>
	/*$(document).ready(function() {
			var myArr = [];
		
			$.ajax({
				type: "GET",
				url: "bus_city.xml", // change to full path of file on server
				dataType: "xml",
				success: parseXml,
				complete: setupAC,
				failure: function(data) {
					alert("XML File could not be found");
					}
			});
		
			function parseXml(xml)
			{
				//find every query value
				$(xml).find("bus").each(function()
				{
					
					//myArr.push($(this).attr("country"));
					myArr.push($(this).text());
				});	
			}
			
			function setupAC() {
				$("input#bus_from").autocomplete({
						source: myArr,
						minLength: 1,
						
						select: function(event, ui) {
							$("input#bus_from").val(ui.item.value);
							//$("#searchForm").submit();
							//document.getElementById('from').innerHTML=+'badsddsf';
						}
				});
			}
		});
		
	$(document).ready(function() {
			var myArr = [];
		
			$.ajax({
				type: "GET",
				url: "bus_city.xml", // change to full path of file on server
				dataType: "xml",
				success: parseXml,
				complete: setupAC,
				failure: function(data) {
					alert("XML File could not be found");
					}
			});
		
			function parseXml(xml)
			{
				//find every query value
				$(xml).find("bus").each(function()
				{
					
					//myArr.push($(this).attr("country"));
					myArr.push($(this).text());
				});	
			}
			
			function setupAC() {
				$("input#bus_to").autocomplete({
						source: myArr,
						minLength: 1,
						
						select: function(event, ui) {
							$("input#bus_to").val(ui.item.value);
							//$("#searchForm").submit();
						}
				});
			}
		});*/
</script>
<script>
	/*$(document).ready(function() {
			var myArr = [];
		
			$.ajax({
				type: "GET",
				url: "car_new_city.xml", // change to full path of file on server
				dataType: "xml",
				success: parseXml,
				complete: setupAC,
				failure: function(data) {
					alert("XML File could not be found");
					}
			});
		
			function parseXml(xml)
			{
				//find every query value
				$(xml).find("car").each(function()
				{
					
					//myArr.push($(this).attr("country"));
					myArr.push($(this).text());
				});	
			}
			
			function setupAC() {
				$("input#car_from").autocomplete({
						source: myArr,
						minLength: 1,
						
						select: function(event, ui) {
							$("input#car_from").val(ui.item.value);
							//$("#searchForm").submit();
							//document.getElementById('from').innerHTML=+'badsddsf';
						}
				});
			}
		});
		
	$(document).ready(function() {
			var myArr = [];
		
			$.ajax({
				type: "GET",
				url: "car_new_city.xml", // change to full path of file on server
				dataType: "xml",
				success: parseXml,
				complete: setupAC,
				failure: function(data) {
					alert("XML File could not be found");
					}
			});
		
			function parseXml(xml)
			{
				//find every query value
				$(xml).find("car").each(function()
				{
					
					//myArr.push($(this).attr("country"));
					myArr.push($(this).text());
				});	
			}
			
			function setupAC() {
				$("input#car_to").autocomplete({
						source: myArr,
						minLength: 1,
						
						select: function(event, ui) {
							$("input#car_to").val(ui.item.value);
							//$("#searchForm").submit();
						}
				});
			}
		});
		
		
		
		
		
		
		$(document).ready(function() {
			var myArr = [];
		
			$.ajax({
				type: "GET",
				url: "car_cities.xml", // change to full path of file on server
				dataType: "xml",
				success: parseXml,
				complete: setupAC,
				failure: function(data) {
					alert("XML File could not be found");
					}
			});
		
			function parseXml(xml)
			{
				//find every query value
				$(xml).find("car").each(function()
				{
					
					//myArr.push($(this).attr("country"));
					myArr.push($(this).text());
				});	
			}
			
			function setupAC() {
				$("input#city_id").autocomplete({
						source: myArr,
						minLength: 1,
						
						select: function(event, ui) {
							$("input#city_id").val(ui.item.value);
							//$("#searchForm").submit();
						}
				});
			}
		});
		
		
		
		
		
		
		$(document).ready(function() {
			var myArr = [];
		
			$.ajax({
				type: "GET",
				url: "holiday_dom_city.xml", // change to full path of file on server
				dataType: "xml",
				success: parseXml,
				complete: setupAC,
				failure: function(data) {
					alert("XML File could not be found");
					}
			});
		
			function parseXml(xml)
			{
				//find every query value
				$(xml).find("dom_holiday").each(function()
				{
					
					//myArr.push($(this).attr("country"));
					myArr.push($(this).text());
				});	
			}
			
			function setupAC() {
				$("input#domestic_holiday_city").autocomplete({
						source: myArr,
						minLength: 1,
						
						select: function(event, ui) {
							$("input#domestic_holiday_city").val(ui.item.value);
							//$("#searchForm").submit();
						}
				});
			}
		});*/
</script>
<script type="text/javascript">
	/*$(document).ready(function() {
		var myArr = [];
	
		$.ajax({
			type: "GET",
			url: "car_cities.xml", // change to full path of file on server
			dataType: "xml",
			success: parseXml,
			complete: setupAC2,
			failure: function(data) {
				alert("XML File could not be found");
				}
		});
	
		function parseXml(xml)
		{
			//find every query value
			$(xml).find("name").each(function()
			{
				
				//myArr.push($(this).attr("country"));
				myArr.push($(this).text());
			});	
		}
		
		function setupAC2() {
			$("input#from_location_holiday").autocomplete({
					source: myArr,
					minLength: 1,
					
					select: function(event, ui) {
						$("input#from_location_holiday").val(ui.item.value);
						//$("#searchForm").submit();
					}
			});
		}
	});*/
</script>
<script type="text/javascript">
	/*$(document).ready(function() {
		var myArr = [];
	
		$.ajax({
			type: "GET",
			url: "car_int_cities.xml", // change to full path of file on server
			dataType: "xml",
			success: parseXml,
			complete: setupAC2,
			failure: function(data) {
				alert("XML File could not be found");
				}
		});
	
		function parseXml(xml)
		{
			//find every query value
			$(xml).find("name").each(function()
			{
				
				//myArr.push($(this).attr("country"));
				myArr.push($(this).text());
			});	
		}
		
		function setupAC2() {
			$("input#from_location_holiday_int").autocomplete({
					source: myArr,
					minLength: 1,
					
					select: function(event, ui) {
						$("input#from_location_holiday_int").val(ui.item.value);
						//$("#searchForm").submit();
					}
			});
		}
	});*/
</script>
<!-- <body class="full" onload="price_low_to_high();setDefaultBody(); "> -->

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
								<img src="images/logo.png" style="width:200px;
    height: 45px;" alt="Travel Logo" title="Logo" />
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
															<div class="col-md-3"><span class="booking-item-price">$<?= $list['price'];?></span>(<?= $list['days'];?>)<span>Days/Night</span><span class="btn btn-primary">Book Now</span>
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
		<script src="js/modernizr.js"></script>
		<script src="js/bootstrap.js"></script>
	</div>
</body>
<!-- Mirrored from wintrip.in/holidays_detail.php?package_id=321&title=So My Resort by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 08 Mar 2017 08:55:55 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<!-- /Added by HTTrack -->

</html>

