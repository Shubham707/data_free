<?php include'booking/config.php';
$sql="select * from tour_list inner join countries on countries.id=tour_list.country inner join states on states.id=tour_list.state ORDER BY tour_id DESC limit 4";
$query=mysqli_query($db,$sql) or die(mysqli_error());
?>
<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from travel.bdtask.com/travel_demo/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Feb 2017 15:09:57 GMT -->
<!-- Mirrored from SwipeCell.in/utility_all by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 08 Mar 2017 08:40:30 GMT -->
<!-- Added by HTTrack -->
<!-- /Added by HTTrack -->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Welcome To SwipeCell</title>
	<!-- Favicons -->
	<link rel="apple-touch-icon" type="image/x-icon" href="assets/images/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="assets/images/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="assets/images/apple-touch-icon-114x114-precomposed.png">
	<!-- Base Css -->
	<link href="assets/css/base.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/autocom.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
		.error{ color: red; }
	</style>
</head>

<body>
	<!-- page loader -->
	<div class="se-pre-con"></div>
	<div id="page-content">
		<!-- navber -->
		<nav id="mainNav" class="navbar navbar-fixed-top">
			<div class="container">
				<!--Brand and toggle get grouped for better mobile display-->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><i class="glyphicon glyphicon-list"></i>
					</button>
					<a class="navbar-brand" href="index.html">
						<img src="assets/images/logo.png" class="img-resposive" alt="">
					</a>
				</div>
				<!--Collect the nav links, forms, and other content for toggling-->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.html">Home</a>
						</li>
						<li><a href="aboutus.html">About Us</a>
						</li>
						<li><a href="contactus.html">Contact Us</a>
						</li>
						<li class=""><a href="utility_all.html">Travel</a>
						</li>
						<li class=""><a href="utility_all.html">BillPayments</a>
						</li>
						<li><a href="login.php">Money Transfer</a>
						</li>
						<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">My Account <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a target="_blank" href="login.php">Login</a>
								</li>
								<li><a target="_blank" href="register.html">Sign up</a>
								</li>
								<li><a target="_blank" href="load_wallet.html">Load Wallet</a>
								</li>
								<li><a target="_blank" href="http://www.ireff.in/plans/airtel/delhi-ncr">Recharge Plan</a>
								</li>
								<li><a target="_blank" href="SwipeCell.apk">Download App</a>
								</li>
							</ul>
						</li>
					</ul>
					<ul class="nav navbar-nav navbar-right hidden-sm">
						<li>
							<a class="nav-btn" href="https://play.google.com/store/apps/details?id=com.swipecell.recharge" target="_blank">
								<div class="thm-btn">Download App!</div>
							</a>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container -->
		</nav>
		
		<!-- /.nav end -->
		<div class="slider-wrapper">
			<div class="responisve-container">
				<div class="slider">
					<div class="fs_loader"></div>
					<div class="slide">
						<p class="uc" data-position="150,360" data-in="top" data-step="1" data-out="top" data-ease-in="easeOutBounce">Welcome to</p>
						<p class="slider-titele" data-position="210,200" data-in="left" data-step="2" data-delay="100">Leading Portal SwipeCell</p>
					</div>
					<div class="slide">
						<p class="uc" data-position="150,360" data-in="top" data-step="1" data-out="top" data-ease-in="easeOutBounce">Mobile Recharges</p>
						<p class="slider-titele" data-position="210,200" data-in="left" data-step="2" data-delay="100">Dth ,Datacard Recharges</p>
					</div>
					<div class="slide">
						<p class="uc" data-position="150,360" data-in="top" data-step="1" data-out="top">All Kind of Bill Payments</p>
						<p class="slider-titele" data-position="210,200" data-in="bottom" data-step="2" data-delay="100">Electricity , Gas, Postpaid</p>
					</div>
					<div class="slide">
						<p class="uc" data-position="150,360" data-in="top" data-step="1" data-out="top">Money Transfer IMPS & NEFT</p>
						<p class="slider-titele" data-position="210,200" data-in="bottom" data-step="2" data-delay="100">Send Money To Any Indian Bank</p>
					</div>
					<div class="slide">
						<p class="uc" data-position="150,360" data-in="top" data-step="1" data-out="top">Travel Agency Provider</p>
						<p class="slider-titele" data-position="210,200" data-in="bottom" data-step="2" data-delay="100">SwipeCell Offering More</p>
					</div>
					<div class="slide">
						<p class="uc" data-position="150,360" data-in="top" data-step="1" data-out="top">Cheapest Flight Booking</p>
						<p class="slider-titele" data-position="210,200" data-in="bottom" data-step="2" data-delay="100">By SwipeCell Get Offer</p>
						<!-- <a href="#" class="thm-btn" data-position="370,435" data-in="bottom" data-out="right" data-step="2" data-delay="1500">Call : +91 8137034526</a>-->
					</div>
				</div>
			</div>
		</div>
		<!-- booking -->
		<div class="container boking-inner">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel">
						<div class="panel-heading">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab1default" data-toggle="tab"><i class="fa fa-mobile" ></i>Mobile</a>
								</li>
								<li>
									<a href="#tab2default" data-toggle="tab"> <i class="fa fa-desktop"></i>Dth</a>
								</li>
								<li class=""><a href="#tab3default" data-toggle="tab"><i class="fa fa-bolt"></i>Data</a>
								</li>
								<li class=""><a href="#tab4default" data-toggle="tab"><i class="fa fa-lightbulb-o"></i>Power</a>
								</li>
								<li class=""><a href="#tab5default" data-toggle="tab"><i class="fa fa-fire"></i>Gas</a>
								</li>
								<li class=""><a href="#tab6default" data-toggle="tab"><i class="fa fa-train"></i>Metro</a>
								</li>
								<li class=""><a href="#tab7default" data-toggle="tab"><i class="fa fa-tint"></i>Water</a>
								</li>
								<li class=""><a href="#tab8default" data-toggle="tab"><i class="fa fa-handshake-o"></i>Insurance</a>
								</li>
							</ul>
						</div>
						<div class="panel-body">
							<div class="tab-content">
								<div class="tab-pane fade in active" id="tab1default">
									<form id="mobile_ch" action="http://SwipeCell.in/mobile_payment.php" method="post">
										<input type="hidden" name="tid" id="tid" readonly />
										<input type="hidden" name="merchant_id" value="" />
										<input type="hidden" id="order_id" name="order_id" value="2398" />
										<input type="hidden" name="currency" value="INR" />
										<input type="hidden" name="redirect_url" value="http://SwipeCell.in//mobile_payment.php" />
										<input type="hidden" name="cancel_url" value="http://SwipeCell.in//ccav/ccavResponseHandler.php" />
										<input type="hidden" name="language" value="EN" />
										<input type="hidden" name="billing_name" value="" />
										<input type="hidden" name="billing_address" value="Room no 1101, near Railway station Ambad" />
										<input type="hidden" name="billing_city" value="Indore" />
										<input type="hidden" name="billing_state" value="MP" />
										<input type="hidden" name="billing_zip" value="425001" />
										<input type="hidden" name="billing_country" value="India" />
										<input type="hidden" name="mobile" id="ccv_mobile" value="" />
										<input type="hidden" name="email" id="ccv_email" value="" />
										<input type="hidden" name="customer_identifier" value="" />
										<input type="hidden" name="integration_type" value="iframe_normal" />
										<div class="row">
											<div class="col-xs-12 col-sm-9 col-md-10">
												<div class="row panel-margin">
													<div class="col-xs-6 col-sm-4 col-md-3 panel-padding">
														<label>Mobile Number</label>
														<div class="icon-addon">
															<input type="text" placeholder="Mobile No " required name="number" id="number" class="form-control" required />
														</div>
													</div>
													<div class="col-xs-6 col-sm-4 col-md-2 panel-padding">
														<label>Amount</label>
														<div class="icon-addon">
															<input type="text" placeholder="Amount" required name="amount" id="amnt" class="form-control" />
														</div>
													</div>
													<div class="col-xs-2 col-sm-2 col-md-3 hidden-sm panel-padding">
														<label>Operator</label>
														<!-- filters select -->
														<div class="select-filters">
															<select name="operator" id="out" class="form-control" style="color:#003" required>
																<option value="1">AIRTEL</option>
																<option value="2">VODAFONE</option>
																<option value="3">IDEA</option>
																<option value="4">TATA INDICOM</option>
																<option value="5">TATA DOCOMO</option>
																<option value="6">TELENOR</option>
																<option value="7">MTNL</option>
																<option value="8">BSNL</option>
																<option value="9">AIRCEL</option>
																<option value="10">VIDEOCON</option>
																<option value="11">MTS</option>
																<option value="39">RELIANCE GSM</option>
																<option value="40">RELIANCE CDMA</option>
																<option value="42">BSNL STV</option>
																<option value="43">TATA DOCOMO STV</option>
																<option value="44">TELENOR STV</option>
																<option value="46">VIDEOCON STV</option>
																<option value="47">MTNL STV</option>
															</select>
														</div>
													</div>
													<div class="col-xs-2 col-sm-2 col-md-3 hidden-sm panel-padding">
														<label>State</label>
														<!-- filters select -->
														<div class="select-filters">
															<select class="form-control" style="color:#003" id="out2" name="" required>
																<option value="AP">ANDHRA PRADESH</option>
																<option value="AS">ASSAM</option>
																<option value="BR">BIHAR</option>
																<option value="CH">CHENNAI</option>
																<option value="MP">CHHATTISGARH</option>
																<option value="DL">DELHI</option>
																<option value="DL">DELHI</option>
																<option value="GJ">GUJRAT</option>
																<option value="HR">HARYANA</option>
																<option value="HP">HIMACHAL PRADESH</option>
																<option value="JK">JAMMU & KASHMIR</option>
																<option value="BR">JHARKHAND</option>
																<option value="KA">KARNATAKA</option>
																<option value="KL">KERALA</option>
																<option value="KO">KOLKATA</option>
																<option value="MP">MADHYA PRADESH</option>
																<option value="MH">MAHARASHTRA</option>
																<option value="MH">MAHARASTRA & GOA</option>
																<option value="MU">MUMBAI</option>
																<option value="NE">NORTH EAST</option>
																<option value="OR">ORISSA</option>
																<option value="PB">PUNJAB</option>
																<option value="RJ">RAJASTHAN</option>
																<option value="TN">TAMILNADU</option>
																<option value="UE">UP EAST</option>
																<option value="UW">UP WEST</option>
																<option value="WB">WEST BENGAL</option>
															</select>
														</div>
													</div>
													<div class="col-xs-2 col-sm-2 col-md-1 hidden-sm panel-padding" style="margin-top:30px;"> <span style="color:#FFF; font-weight:bold;cursor:pointer" data-toggle="modal" data-target=".flight-details" class="btn"></span>
													</div>
												</div>
											</div>
											<div class="col-xs-12 col-sm-3 col-md-2">
												<button type="submit" class="thm-btn">Recharge</button>
											</div>
											<div style="display:none" id="out3"></div>
										</div>
									</form>
								</div>
								<div class="tab-pane fade" id="tab2default">
								<form id="dth_number_card" action="http://SwipeCell.in/mobile_payment.php" method="post">
										<input type="hidden" name="tid" id="tid" readonly />
										<input type="hidden" name="merchant_id" value="" />
										<input type="hidden" id="order_id" name="order_id" value="5653" />
										<input type="hidden" name="currency" value="INR" />
										<input type="hidden" name="redirect_url" value="../SwipeCell.in_/mobile_payment.html" />
										<input type="hidden" name="cancel_url" value="../SwipeCell.in_/ccav/ccavResponseHandler.html" />
										<input type="hidden" name="language" value="EN" />
										<input type="hidden" name="billing_name" value="" />
										<input type="hidden" name="billing_address" value="Room no 1101, near Railway station Ambad" />
										<input type="hidden" name="billing_city" value="Indore" />
										<input type="hidden" name="billing_state" value="MP" />
										<input type="hidden" name="billing_zip" value="425001" />
										<input type="hidden" name="billing_country" value="India" />
										<input type="hidden" name="mobile" id="ccv_mobile" value="" />
										<input type="hidden" name="email" id="ccv_email" value="" />
										<input type="hidden" name="customer_identifier" value="" />
										<input type="hidden" name="integration_type" value="iframe_normal" />
										<div class="row">
											<div class="col-xs-12 col-sm-9 col-md-10">
												<div class="row panel-margin">
													<div class="col-xs-6 col-sm-4 col-md-3 panel-padding">
														<label>Dth Number</label>
														<div class="icon-addon">
															<input type="text" placeholder="Dth No " required name="number" id="" class="form-control" />
														</div>
													</div>
													<div class="col-xs-6 col-sm-4 col-md-2 panel-padding">
														<label>Amount</label>
														<div class="icon-addon">
															<input type="text" placeholder="Amount" required name="amount" id="" class="form-control" required />
														</div>
													</div>
													<div class="col-xs-2 col-sm-2 col-md-3 hidden-sm panel-padding">
														<label>Operator</label>
														<!-- filters select -->
														<div class="select-filters">
															<select name="operator" id="" required class="form-control" style="color:#003" required>
																<option value="12">DISH TV</option>
																<option value="13">TATA SKY</option>
																<option value="14">SUN TV</option>
																<option value="15">VIDEOCON D2H TV</option>
																<option value="16">RELIANCE BIG TV</option>
																<option value="17">AIRTEL DEGITAL TV</option>
															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xs-12 col-sm-3 col-md-2">
												<button type="submit" class="thm-btn">Recharge</button>
											</div>
										</div>
									</form>
								</div>
								<div class="tab-pane fade" id="tab3default">
									<form id="datacard_number" action="http://SwipeCell.in/mobile_payment.php" method="post">
										<input type="hidden" name="tid" id="tid" readonly />
										<input type="hidden" name="merchant_id" value="" />
										<input type="hidden" id="order_id" name="order_id" value="5475" />
										<input type="hidden" name="currency" value="INR" />
										<input type="hidden" name="redirect_url" value="../SwipeCell.in_/mobile_payment.html" />
										<input type="hidden" name="cancel_url" value="../SwipeCell.in_/ccav/ccavResponseHandler.html" />
										<input type="hidden" name="language" value="EN" />
										<input type="hidden" name="billing_name" value="" />
										<input type="hidden" name="billing_address" value="Room no 1101, near Railway station Ambad" />
										<input type="hidden" name="billing_city" value="Indore" />
										<input type="hidden" name="billing_state" value="MP" />
										<input type="hidden" name="billing_zip" value="425001" />
										<input type="hidden" name="billing_country" value="India" />
										<input type="hidden" name="mobile" id="ccv_mobile" value="" />
										<input type="hidden" name="email" id="ccv_email" value="" />
										<input type="hidden" name="customer_identifier" value="" />
										<input type="hidden" name="integration_type" value="iframe_normal" />
										<div class="row">
											<div class="col-xs-12 col-sm-9 col-md-10">
												<div class="row panel-margin">
													<div class="col-xs-6 col-sm-4 col-md-3 panel-padding">
														<label>Datacard Number</label>
														<div class="icon-addon">
															<input type="text" placeholder="Datacard No " required name="number" id="" class="form-control" required />
														</div>
													</div>
													<div class="col-xs-6 col-sm-4 col-md-2 panel-padding">
														<label>Amount</label>
														<div class="icon-addon">
															<input type="text" placeholder="Amount" required name="amount" id="" class="form-control" required />
														</div>
													</div>
													<div class="col-xs-2 col-sm-2 col-md-3 hidden-sm panel-padding">
														<label>Operator</label>
														<!-- filters select -->
														<div class="select-filters">
															<select name="operator" id="" class="form-control" style="color:#003" required>
																<option value="18">MTS MBLAZE</option>
																<option value="19">MTS MBROWSE</option>
																<option value="20">RELIANCE NETCONNECT</option>
																<option value="21">TATA PHOTON WHIZ</option>
																<option value="22">TATA PHOTON MAX</option>
																<option value="82">TATA PHOTON PLUS</option>
															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xs-12 col-sm-3 col-md-2">
												<button type="submit" class="thm-btn">Rechrge</button>
											</div>
										</div>
									</form>
								</div>
								<div class="tab-pane fade" id="tab4default">
									<form id="customer_id_data" action="http://SwipeCell.in/mobile_payment.php" method="post">
										<input type="hidden" name="tid" id="tid" readonly />
										<input type="hidden" name="merchant_id" value="" />
										<input type="hidden" id="order_id" name="order_id" value="6409" />
										<input type="hidden" name="currency" value="INR" />
										<input type="hidden" name="redirect_url" value="../SwipeCell.in_/mobile_payment.html" />
										<input type="hidden" name="cancel_url" value="../SwipeCell.in_/ccav/ccavResponseHandler.html" />
										<input type="hidden" name="language" value="EN" />
										<input type="hidden" name="billing_name" value="" />
										<input type="hidden" name="billing_address" value="Room no 1101, near Railway station Ambad" />
										<input type="hidden" name="billing_city" value="Indore" />
										<input type="hidden" name="billing_state" value="MP" />
										<input type="hidden" name="billing_zip" value="425001" />
										<input type="hidden" name="billing_country" value="India" />
										<input type="hidden" name="mobile" id="ccv_mobile" value="" />
										<input type="hidden" name="email" id="ccv_email" value="" />
										<input type="hidden" name="customer_identifier" value="" />
										<input type="hidden" name="integration_type" value="iframe_normal" />
										<div class="row">
											<div class="col-xs-12 col-sm-9 col-md-10">
												<div class="row panel-margin">
													<div class="col-xs-6 col-sm-4 col-md-3 panel-padding">
														<label>Customer Id</label>
														<div class="icon-addon">
															<input type="text" placeholder="Customer Id" required name="number" id="" class="form-control" />
														</div>
													</div>
													<div class="col-xs-6 col-sm-4 col-md-2 panel-padding">
														<label>Amount</label>
														<div class="icon-addon">
															<input type="text" placeholder="Amount" required name="amount" id="" class="form-control" />
														</div>
													</div>
													<div class="col-xs-6 col-sm-4 col-md-2 panel-padding">
														<label>Account No</label>
														<div class="icon-addon">
															<input type="text" placeholder="Account" required name="account" id="" class="form-control" />
														</div>
													</div>
													<div class="col-xs-2 col-sm-2 col-md-5 hidden-sm panel-padding">
														<label>Operator</label>
														<!-- filters select -->
														<div class="select-filters">
															<select name="operator" id="" class="form-control" style="color:#003" required>
																<option value="34">BSES YAMUNA</option>
																<option value="35">BSES RAJDHANI</option>
																<option value="36">NORTH DELHI POWER LIMITED</option>
																<option value="48">Ajmer vidyut vitran nigam</option>
																<option value="50">CHHATTISGARH ELECTRICITY BOARD</option>
																<option value="51">MSEB MUMBAI</option>
																<option value="52">TORRENT POWER</option>
																<option value="54">UTTAR GUJARAT VIJ COMPANY</option>
																<option value="55">RELIANCE ENERGY MUMBAI</option>
																<option value="56">UTTAR HARYANA BIJLI VITRANA NI</option>
																<option value="57">WEST BENGAL ELECTRICITY DISTRI</option>
																<option value="59">BEST ELECTRICITY</option>
																<option value="63">TATA POWER DELHI LIMITED</option>
																<option value="69">PANJAB STATE POWER CORPORATION</option>
																<option value="71">TAMIL NADU ELECTICITY BOARD</option>
																<option value="74">DAKSHIN GUJARAT VIJ COMPANY</option>
																<option value="75">MADHYA GUJARAT VIJ COMPANY</option>
																<option value="76">PASCHIM GUJARAT VIJ COMPANY</option>
																<option value="83">Calcutta Electricity Supply Ltd</option>
																<option value="86">JAIPUR VIDYUT VITRAN NIGAM</option>
																<option value="87">BESCOM</option>
																<option value="88">JODHPUR VIDYUT VITRAN NIGAM</option>
																<option value="89">south bihar power distribution company</option>
																<option value="90">north bihar power distribution company</option>
																<option value="91">bangalore electricity distribution company</option>
																<option value="93">Southern power Distribution Company Ltd of Andhra Pradesh( APSPDCL)</option>
																<option value="94">Southern Power Distribution Company of Telangana Limited</option>
																<option value="96">Madhya Pradesh Madhya Kshetra Vidyut Vitaran Company Limited - Bhopal</option>
																<option value="97">Rajasthan Vidyut Vitran Nigam Limited</option>
																<option value="98">MSEDC Limited</option>
																<option value="99">India Power Corporation Limited</option>
																<option value="100">Jamshedpur Utilities and Services Company Limited</option>
																<option value="101">Noida Power Company Limited</option>
																<option value="102">Brihan Mumbai Electric Supply and Transport Undertaking</option>
																<option value="103">Madhya Pradesh Paschim Kshetra Vidyut Vitaran Indore</option>
																<option value="104">Madhya Pradesh Paschim Kshetra Vidyut Vitaran Jabalpur</option>
															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xs-12 col-sm-3 col-md-2">
												<button type="submit" class="thm-btn">Pay Now</button>
											</div>
										</div>
									</form>
								</div>
								<div class="tab-pane fade" id="tab5default">
									<form id="customer_id_gas"  action="http://SwipeCell.in/mobile_payment.php" method="post">
										<input type="hidden" name="tid" id="tid" readonly />
										<input type="hidden" name="merchant_id" value="" />
										<input type="hidden" id="order_id" name="order_id" value="1937" />
										<input type="hidden" name="currency" value="INR" />
										<input type="hidden" name="redirect_url" value="../SwipeCell.in_/mobile_payment.html" />
										<input type="hidden" name="cancel_url" value="../SwipeCell.in_/ccav/ccavResponseHandler.html" />
										<input type="hidden" name="language" value="EN" />
										<input type="hidden" name="billing_name" value="" />
										<input type="hidden" name="billing_address" value="Room no 1101, near Railway station Ambad" />
										<input type="hidden" name="billing_city" value="Indore" />
										<input type="hidden" name="billing_state" value="MP" />
										<input type="hidden" name="billing_zip" value="425001" />
										<input type="hidden" name="billing_country" value="India" />
										<input type="hidden" name="mobile" id="ccv_mobile" value="" />
										<input type="hidden" name="email" id="ccv_email" value="" />
										<input type="hidden" name="customer_identifier" value="" />
										<input type="hidden" name="integration_type" value="iframe_normal" />
										<div class="row">
											<div class="col-xs-12 col-sm-9 col-md-10">
												<div class="row panel-margin">
													<div class="col-xs-6 col-sm-4 col-md-3 panel-padding">
														<label>Customer Id</label>
														<div class="icon-addon">
															<input type="text" placeholder="Customer Id" required name="number" id="" class="form-control" />
														</div>
													</div>
													<div class="col-xs-6 col-sm-4 col-md-2 panel-padding">
														<label>Amount</label>
														<div class="icon-addon">
															<input type="text" placeholder="Amount" required name="amount" id="" class="form-control" />
														</div>
													</div>
													<div class="col-xs-6 col-sm-4 col-md-2 panel-padding">
														<label>Account Id</label>
														<div class="icon-addon">
															<input type="text" placeholder="Account" required name="account" id="" class="form-control" />
														</div>
													</div>
													<div class="col-xs-2 col-sm-2 col-md-3 hidden-sm panel-padding">
														<label>Operator</label>
														<!-- filters select -->
														<div class="select-filters">
															<select name="operator" id="" class="form-control" style="color:#003" required>
																<option value="80">GUJARAT GAS COMPANY LTD</option>
																<option value="81">INDRAPRASHTA GAS LTD</option>
																<option value="85">Mahanagar Gas Limited</option>
															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xs-12 col-sm-3 col-md-2">
												<button type="submit" class="thm-btn">Pay Now</button>
											</div>
										</div>
									</form>
								</div>
								<div class="tab-pane fade" id="tab6default">
									<form id="metro_card_data" action="http://SwipeCell.in/mobile_payment.php" method="post">
										<input type="hidden" name="tid" id="tid" readonly />
										<input type="hidden" name="merchant_id" value="" />
										<input type="hidden" id="order_id" name="order_id" value="6986" />
										<input type="hidden" name="currency" value="INR" />
										<input type="hidden" name="redirect_url" value="../SwipeCell.in_/mobile_payment.html" />
										<input type="hidden" name="cancel_url" value="../SwipeCell.in_/ccav/ccavResponseHandler.html" />
										<input type="hidden" name="language" value="EN" />
										<input type="hidden" name="billing_name" value="" />
										<input type="hidden" name="billing_address" value="Room no 1101, near Railway station Ambad" />
										<input type="hidden" name="billing_city" value="Indore" />
										<input type="hidden" name="billing_state" value="MP" />
										<input type="hidden" name="billing_zip" value="425001" />
										<input type="hidden" name="billing_country" value="India" />
										<input type="hidden" name="mobile" id="ccv_mobile" value="" />
										<input type="hidden" name="email" id="ccv_email" value="" />
										<input type="hidden" name="customer_identifier" value="" />
										<input type="hidden" name="integration_type" value="iframe_normal" />
										<div class="row">
											<div class="col-xs-12 col-sm-9 col-md-10">
												<div class="row panel-margin">
													<div class="col-xs-6 col-sm-4 col-md-3 panel-padding">
														<label>Card No</label>
														<div class="icon-addon">
															<input type="text" placeholder="Card No" required name="number" id="" class="form-control" />
														</div>
													</div>
													<div class="col-xs-6 col-sm-4 col-md-2 panel-padding">
														<label>Amount</label>
														<div class="icon-addon">
															<input type="text" placeholder="Amount" required name="amount" id="" class="form-control" />
														</div>
													</div>
													<div class="col-xs-6 col-sm-4 col-md-2 panel-padding">
														<label>Account Id</label>
														<div class="icon-addon">
															<input type="text" placeholder="Account" required name="account" id="" class="form-control" />
														</div>
													</div>
													<div class="col-xs-2 col-sm-2 col-md-3 hidden-sm panel-padding">
														<label>Operator</label>
														<!-- filters select -->
														<div class="select-filters">
															<select class="form-control" id="" name="operator" required>
																<option value="paytm">Kolkata Metro</option>
																<option value="paytm">Delhi Metro</option>
																<option value="paytm">Mumbai Metro</option>
															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xs-12 col-sm-3 col-md-2">
												<button type="submit" class="thm-btn">Pay Now</button>
											</div>
										</div>
									</form>
								</div>
								<div class="tab-pane fade" id="tab7default">
									<form id="cunsumer_data_id" action="http://SwipeCell.in/mobile_payment.php" method="post">
										<input type="hidden" name="tid" id="tid" readonly />
										<input type="hidden" name="merchant_id" value="" />
										<input type="hidden" id="order_id" name="order_id" value="5753" />
										<input type="hidden" name="currency" value="INR" />
										<input type="hidden" name="redirect_url" value="../SwipeCell.in_/mobile_payment.html" />
										<input type="hidden" name="cancel_url" value="../SwipeCell.in_/ccav/ccavResponseHandler.html" />
										<input type="hidden" name="language" value="EN" />
										<input type="hidden" name="billing_name" value="" />
										<input type="hidden" name="billing_address" value="Room no 1101, near Railway station Ambad" />
										<input type="hidden" name="billing_city" value="Indore" />
										<input type="hidden" name="billing_state" value="MP" />
										<input type="hidden" name="billing_zip" value="425001" />
										<input type="hidden" name="billing_country" value="India" />
										<input type="hidden" name="mobile" id="ccv_mobile" value="" />
										<input type="hidden" name="email" id="ccv_email" value="" />
										<input type="hidden" name="customer_identifier" value="" />
										<input type="hidden" name="integration_type" value="iframe_normal" />
										<div class="row">
											<div class="col-xs-12 col-sm-9 col-md-10">
												<div class="row panel-margin">
													<div class="col-xs-6 col-sm-4 col-md-3 panel-padding">
														<label>Consumer No</label>
														<div class="icon-addon">
															<input type="text" placeholder="Consumer No" required name="number" id="" class="form-control" />
														</div>
													</div>
													<div class="col-xs-6 col-sm-4 col-md-2 panel-padding">
														<label>Amount</label>
														<div class="icon-addon">
															<input type="text" placeholder="Amount" required name="amount" id="" class="form-control" />
														</div>
													</div>
													<div class="col-xs-6 col-sm-4 col-md-2 panel-padding">
														<label>Account No</label>
														<div class="icon-addon">
															<input type="text" placeholder="Account" required name="account" id="" class="form-control" />
														</div>
													</div>
													<div class="col-xs-2 col-sm-2 col-md-5 hidden-sm panel-padding">
														<label>Operator</label>
														<!-- filters select -->
														<div class="select-filters">
															<select class="form-control" id="" name="operator" required>
																<option value="paytm">Aurangabad City Water Utility Company Ltd</option>
																<option value="paytm">Delhi Jal Board</option>
																<option value="goalltrip">Kerala Water</option>
																<option value="goalltrip">Goa Water</option>
																<option value="goalltrip">Chennai Metro Water</option>
																<option value="goalltrip">MIDC Water</option>
																<option value="goalltrip">Hyderabad Metropoliton Water</option>
																<option value="goalltrip">Jaipur Water Board</option>
															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xs-12 col-sm-3 col-md-2">
												<button type="submit" class="thm-btn">Pay Now</button>
											</div>
										</div>
									</form>
								</div>
								<div class="tab-pane fade" id="tab8default">
									<form id="policy_id_data" action="http://SwipeCell.in/mobile_payment.php" method="post">
										<input type="hidden" name="tid" id="tid" readonly />
										<input type="hidden" name="merchant_id" value="" />
										<input type="hidden" id="order_id" name="order_id" value="6645" />
										<input type="hidden" name="currency" value="INR" />
										<input type="hidden" name="redirect_url" value="../SwipeCell.in_/mobile_payment.html" />
										<input type="hidden" name="cancel_url" value="../SwipeCell.in_/ccav/ccavResponseHandler.html" />
										<input type="hidden" name="language" value="EN" />
										<input type="hidden" name="billing_name" value="" />
										<input type="hidden" name="billing_address" value="Room no 1101, near Railway station Ambad" />
										<input type="hidden" name="billing_city" value="Indore" />
										<input type="hidden" name="billing_state" value="MP" />
										<input type="hidden" name="billing_zip" value="425001" />
										<input type="hidden" name="billing_country" value="India" />
										<input type="hidden" name="mobile" id="ccv_mobile" value="" />
										<input type="hidden" name="email" id="ccv_email" value="" />
										<input type="hidden" name="customer_identifier" value="" />
										<input type="hidden" name="integration_type" value="iframe_normal" />
										<div class="row">
											<div class="col-xs-12 col-sm-9 col-md-10">
												<div class="row panel-margin">
													<div class="col-xs-6 col-sm-4 col-md-3 panel-padding">
														<label>Policy No</label>
														<div class="icon-addon">
															<input type="text" placeholder="Policy No" required name="number" id="" class="form-control" />
														</div>
													</div>
													<div class="col-xs-6 col-sm-4 col-md-2 panel-padding">
														<label>Amount</label>
														<div class="icon-addon">
															<input type="text" placeholder="Amount" required name="amount" id="" class="form-control" />
														</div>
													</div>
													<div class="col-xs-6 col-sm-4 col-md-3 panel-padding">
														<label>Date Of Birth</label>
														<div class="icon-addon">
															<input type="text" placeholder="mm/dd/yyyy" required name="dob" id="" class="form-control" />
														</div>
													</div>
													<div class="col-xs-2 col-sm-2 col-md-4 hidden-sm panel-padding">
														<label>Operator</label>
														<!-- filters select -->
														<div class="select-filters">
															<select class="form-control" id="" name="operator" required>
																<option>ICICI Prudential Life Insurance</option>
																<option>Reliance General Insurance</option>
																<option>Reliance Life Insurance</option>
																<option>Religare Health Insurance</option>
																<option>SBI General Insurance Limited</option>
																<option>TATA AIA Life Insurance</option>
																<option>Birla Sun Life Insurance</option>
															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="col-xs-12 col-sm-3 col-md-2">
												<button type="submit" class="thm-btn">Pay Now</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- popular tour -->
		<section class="popular-inner">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="title">
							<h2>Popular Tours</h2>
							<p>Most Popular Tours in the World</p>
						</div>
					</div>
				</div>
				<div class="row thm-margin">
					<div id="popular-slide" class="owl-carousel">
						<?php while($data=mysqli_fetch_assoc($query)){?>
						<div class="item">
							<div class="grid-item-inner">
								<div class="grid-img-thumb">
									<!-- ribbon -->
									<div class="ribbon"><span>Popular</span>
									</div>
									<a href="index.html">
										<img src="uploads_list/<?php echo $data['images']?>" alt="1" class="img-responsive" />
									</a>
								</div>
								<div class="grid-content">
									<div class="grid-price text-right">Only <span><sub>INR</sub> <?php echo $data['tour_plan']?></span>
									</div>
									<div class="grid-text">
										<div class="place-name"><?php echo $data['city'].' '.$data['state_name'].' '.$data['country_name'];?></div>
										<div class="travel-times">
											<h4 class="pull-left"><?php echo $data['days'].' days'. $data['night'];?> Night </h4>
											<span class="pull-right">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php }?>
					</div>
				</div>
			</div>
		</section>
		<!-- service -->
		<!-- destination -->
		<!-- package section -->
		<section class="package">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="title">
							<h2>Latest Tour Package</h2>
							<p>A great Collection of our Tour Packages</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-3">
						<div class="package-wiget">
							<div class="grid">
								<figure class="effect-milo">
									<img src="assets/images/Package-800x500-1.jpg" class="img-responsive" alt="">
									<figcaption>
										<div class="effect-block">
											<h3>Hilton Molino Stucky</h3>
											<div class="package-ratting"> <i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-half-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
											<button type="button" class="thm-btn">Explore Now</button>
										</div>
									</figcaption>
								</figure>
							</div>
							<div class="package-content">
								<h5>Hilton Molino Stucky</h5>
								<div class="package-price">from <span class="price">
                                            <span class="amount">INR2000 Offer </span>
									</span>/night</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-3">
						<div class="package-wiget">
							<div class="grid">
								<figure class="effect-milo">
									<img src="assets/images/Package-800x500-2.jpg" class="img-responsive" alt="">
									<figcaption>
										<div class="effect-block">
											<h3>Palolem, India</h3>
											<div class="package-ratting"> <i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-half-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
											<button type="button" class="thm-btn">Explore Now</button>
										</div>
									</figcaption>
								</figure>
							</div>
							<div class="package-content">
								<h5>Palolem, India</h5>
								<div class="package-price">from <span class="price">
                                            <span class="amount">INR1500 Offer </span>
									</span>/night</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-3">
						<div class="package-wiget">
							<div class="grid">
								<figure class="effect-milo">
									<div class="ribbon"><span>Popular</span>
									</div>
									<img src="assets/images/Package-800x500-3.jpg" class="img-responsive" alt="">
									<figcaption>
										<div class="effect-block">
											<h3>IEiffel Tower, Paris</h3>
											<div class="package-ratting"> <i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-half-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
											<button type="button" class="thm-btn">Explore Now</button>
										</div>
									</figcaption>
								</figure>
							</div>
							<div class="package-content">
								<h5>IEiffel Tower, Paris</h5>
								<div class="package-price">from <span class="price">
                                            <span class="amount">INR2900 Offer </span>
									</span>/night</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-3">
						<div class="package-wiget">
							<div class="grid">
								<figure class="effect-milo">
									<img src="assets/images/Package-800x500-4.jpg" class="img-responsive" alt="">
									<figcaption>
										<div class="effect-block">
											<h3>Canals of Venice, Italy</h3>
											<div class="package-ratting"> <i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-half-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
											<button type="button" class="thm-btn">Explore Now</button>
										</div>
									</figcaption>
								</figure>
							</div>
							<div class="package-content">
								<h5>Canals of Venice, Italy</h5>
								<div class="package-price">from <span class="price">
                                            <span class="amount">INR1890 Offer </span>
									</span>/night</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-3">
						<div class="package-wiget">
							<div class="grid">
								<figure class="effect-milo">
									<img src="assets/images/Package-800x500-5.jpg" class="img-responsive" alt="">
									<figcaption>
										<div class="effect-block">
											<h3>Itali, Pisa</h3>
											<div class="package-ratting"> <i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-half-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
											<button type="button" class="thm-btn">Explore Now</button>
										</div>
									</figcaption>
								</figure>
							</div>
							<div class="package-content">
								<h5>Itali, Pisa</h5>
								<div class="package-price">from <span class="price">
                                            <span class="amount">INR1390 Offer </span>
									</span>/night</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-3">
						<div class="package-wiget">
							<div class="grid">
								<figure class="effect-milo">
									<div class="ribbon"><span>New</span>
									</div>
									<img src="assets/images/Package-800x500-6.jpg" class="img-responsive" alt="">
									<figcaption>
										<div class="effect-block">
											<h3>St Paul's Cathedral, London</h3>
											<div class="package-ratting"> <i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-half-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
											<button type="button" class="thm-btn">Explore Now</button>
										</div>
									</figcaption>
								</figure>
							</div>
							<div class="package-content">
								<h5>St Paul's Cathedral, London</h5>
								<div class="package-price">from <span class="price">
                                            <span class="amount">INR1800 Offer </span>
									</span>/night</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-3 hidden-sm">
						<div class="package-wiget">
							<div class="grid">
								<figure class="effect-milo">
									<img src="assets/images/Package-800x500-7.jpg" class="img-responsive" alt="">
									<figcaption>
										<div class="effect-block">
											<h3>Castel Sant'Angelo. Rome</h3>
											<div class="package-ratting"> <i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-half-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
											<button type="button" class="thm-btn">Explore Now</button>
										</div>
									</figcaption>
								</figure>
							</div>
							<div class="package-content">
								<h5>Castel Sant'Angelo. Rome</h5>
								<div class="package-price">from <span class="price">
                                            <span class="amount">INR1700 Offer </span>
									</span>/night</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4 col-md-3 hidden-sm">
						<div class="package-wiget">
							<div class="grid">
								<figure class="effect-milo">
									<img src="assets/images/Package-800x500-8.jpg" class="img-responsive" alt="">
									<figcaption>
										<div class="effect-block">
											<h3>Giza Necropolis, Egypt</h3>
											<div class="package-ratting"> <i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-half-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
											<button type="button" class="thm-btn">Explore Now</button>
										</div>
									</figcaption>
								</figure>
							</div>
							<div class="package-content">
								<h5>Giza Necropolis, Egypt</h5>
								<div class="package-price">from <span class="price">
                                            <span class="amount">INR2000 Offer </span>
									</span>/night</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Counter -->
		<section class="counter-inner">
			<div class="container">
				<div class="row">
					<div class="col-sm-3">
						<div class="count-content">
							<div class="count-icon"> <i class="flaticon-earth-globe"></i>
							</div>
							<div class="count">
								<h1 class="count-number">1648</h1>
								<div class="count-text">Destinations</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="count-content">
							<div class="count-icon"> <i class="flaticon-cabin"></i>
							</div>
							<div class="count">
								<h1 class="count-number">3589</h1>
								<div class="count-text">Hotels</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="count-content">
							<div class="count-icon"> <i class="flaticon-photographer-with-cap-and-glasses"></i>
							</div>
							<div class="count">
								<h1 class="count-number">109087</h1>
								<div class="count-text">Tourists</div>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="count-content">
							<div class="count-icon"> <i class="flaticon-airplane-flight-in-circle-around-earth"></i>
							</div>
							<div class="count">
								<h1 class="count-number">1891</h1>
								<div class="count-text">Tour</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- blog section -->
		<!-- Newsletter -->
		<section class="get-offer">
			<div class="container">
				<div class="row">
					<div class="col-sm-5"> <span>Subscribe to our Newsletter</span>
						<h2>& Discover the best offers!</h2>
					</div>
					<div class="col-sm-7">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Enter Your Email" name="q">
							<div class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="flaticon-paper-plane"></i> Subscribe</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<!-- Footer Section -->
	<footer>
		<div class="container">
			<div class="row">
				<!-- Address -->
				<div class="col-sm-4 col-md-3">
					<div class="footer-box address-inner">
						<p>SwipeCell is a one-stop online solution company features various services</p>
						<div class="address"> <i class="flaticon-placeholder"></i>
							<p>Energic Softech Solutions Pvt. Ltd.
								<p>554/555,Tower B-2,Spaze I-Tech Park, Sohna Road, Sector 49, GURGAON, HR-122018</p>
						</div>
						<div class="address"> <i class="flaticon-customer-service"></i>
							<p>+91 124-4002005 / 4002006</p>
						</div>
						<div class="address"> <i class="flaticon-mail"></i>
							<p>info@SwipeCell.in</p>
						</div>
					</div>
				</div>
				<div class="col-sm-8 col-md-6">
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<div class="footer-box">
								<h4 class="footer-title">About SwipeCell</h4>
								<ul class="categoty">
									<li><a href="aboutus.html">About Us</a>
									</li>
									<li><a href="aboutus.html">Why us</a>
									</li>
									<li><a href="aboutus.html">Company Profile</a>
									</li>
									<li><a href="aboutus.html">Our Team</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="footer-box">
								<h4 class="footer-title">Support</h4>
								<ul class="categoty">
									<li><a href="contactus.html">Contact Us</a>
									</li>
									<li><a target="_blank" href="user_agreement.html">User Agreement</a>
									</li>
									<li><a href="contactus.html">Faq</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="footer-box">
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 hidden-sm">
					<div class="footer-box">
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="sub-footer">
			<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<p>Copyright@2014 Energic Softech Solutions Pvt.Ltd. All Rights Reserved</p>
					</div>
					<div class="col-sm-7">
						<div class="footer-menu">
							<ul>
								<li><a href="index.html">Home</a>
								</li>
								<li><a href="aboutus.html">About</a>
								</li>
								<li><a href="contactus.html">Contact</a>
								</li>
								<li><a href="register.html">Register</a>
								</li>
								<li><a href="login.php">Login</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade flight-details" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg">
		<!--  border-radius: 0;
    margin-left: 109px;
    margin-right: 109px;
    padding: 20px 2 -->
		<div class="modal-content" style="border-radius:10px;">
			<div class="modal-body">
				<div class="flight-details-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span>
					</button>
					<h5>LATEST MOBILE PLAN FOR YOU</h5>
					<div class="load" id="fountainG" style="display:none;">
						<div id="fountainG_1" class="fountainG"></div>
						<div id="fountainG_2" class="fountainG"></div>
						<div id="fountainG_3" class="fountainG"></div>
						<div id="fountainG_4" class="fountainG"></div>
						<div id="fountainG_5" class="fountainG"></div>
						<div id="fountainG_6" class="fountainG"></div>
						<div id="fountainG_7" class="fountainG"></div>
						<div id="fountainG_8" class="fountainG"></div>
					</div>
					<div class="flight-details-book"></div>
					<div class="clearfix"></div>
				</div>
				<div class="flight-details-body">
					<div style="" class="plan" id="plan"></div>
				</div>
			</div>
		</div>
	</div>
</div>
	</footer>
	<!-- jQuery -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="js/jquery.validate.js" type="text/javascript"></script>
	<!-- jquery ui js -->
	<script src="assets/js/jquery-ui.min.js" type="text/javascript"></script>
	<!-- bootstrap js -->
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<!-- fraction slider js -->
	<script src="assets/js/jquery.fractionslider.js" type="text/javascript"></script>
	<!-- owl carousel js -->
	<script src="assets/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
	<!-- counter -->
	<script src="assets/js/jquery.counterup.min.js" type="text/javascript"></script>
	<script src="assets/js/waypoints.js" type="text/javascript"></script>
	<!-- filter portfolio -->
	<script src="assets/js/jquery.shuffle.min.js" type="text/javascript"></script>
	<script src="assets/js/portfolio.js" type="text/javascript"></script>
	<!-- magnific popup -->
	<script src="assets/js/jquery.magnific-popup.min.js" type="text/javascript"></script>
	<!-- range slider -->
	<script src="assets/js/ion.rangeSlider.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.easing.min.js" type="text/javascript"></script>
	<!-- custom -->
	<script src="assets/js/custom.js" type="text/javascript"></script>
	<script type="text/javascript">
		  $("#mobile_ch").validate();
		  $("#datacard_number").validate();
		  $("#dth_number_card").validate();
		  $("#customer_id_data").validate();
		  $("#customer_id_gas").validate();
		  $("#metro_card_data").validate();
		  $("#cunsumer_data_id").validate();
		  $("#policy_id_data").validate(); 
	</script>
	
	
<!--   <script src="js/mobile.js"></script> -->
</body>
<!-- Mirrored from travel.bdtask.com/travel_demo/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Feb 2017 15:14:08 GMT -->
<!-- Mirrored from SwipeCell.in/utility_all by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 08 Mar 2017 08:40:31 GMT -->
<!-- Added by HTTrack -->
<!-- /Added by HTTrack -->

</html>