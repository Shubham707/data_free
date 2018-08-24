<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from travel.bdtask.com/travel_demo/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Feb 2017 15:09:57 GMT -->

<!-- Mirrored from SwipeCell.in/utility_all by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 08 Mar 2017 08:40:30 GMT -->
<!-- Added by HTTrack --><!-- /Added by HTTrack -->
<head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Welcome To SwipeCell</title>
        <!-- Favicons -->
        <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
        <link rel="apple-touch-icon" type="image/x-icon" href="assets/images/apple-touch-icon-57x57-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="assets/images/apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="assets/images/apple-touch-icon-114x114-precomposed.png">
        <!-- Base Css -->
        <link href="assets/css/base.css" rel="stylesheet" type="text/css"/>
        
         <link href="assets/css/autocom.css" rel="stylesheet" type="text/css"/>
         <style>
         	
#mainNav{ background-color: #999; }
ol li{ list-style-type: square; margin-left:20px; }
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
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span><i class="glyphicon glyphicon-list"></i>
                        </button>
                        <a class="navbar-brand" href="index.html">
                            <img src="assets/images/logo.png" class="img-resposive" alt="">
                        </a>
                    </div>
                    <!--Collect the nav links, forms, and other content for toggling--> 
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="color: black !important;">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index.html">Home</a></li>
                            <li><a href="aboutus.html">About Us</a></li>
                            <li><a href="contactus.html">Contact Us</a></li>
                            <li class=""><a href="utility_all.html">Travel</a></li>
                            
                            <li class=""><a href="utility_all.html">BillPayments</a></li>                         
                           
                            <li><a href="login.php">Money Transfer</a></li>
                            
                            
                             <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true">My Account <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a target="_blank" href="login.php">Login</a></li>
                                    <li><a target="_blank" href="register.html">Sign up</a></li>
                                    <li><a target="_blank" href="load_wallet.html">Load Wallet</a></li>
                                    <li><a target="_blank" href="http://www.ireff.in/plans/airtel/delhi-ncr">Recharge Plan</a></li>
                                    <li><a target="_blank" href="SwipeCell.apk">Download App</a></li>
                                    
                                   
                                </ul>
                            </li>
                            
                        </ul>
                        <ul class="nav navbar-nav navbar-right hidden-sm">
                            <li><a class="nav-btn" href="https://play.google.com/store/apps/details?id=com.swipecell.recharge" target="_blank"><div class="thm-btn">Download App! </div></a></li>
                        </ul>
                    </div> <!-- /.navbar-collapse --> 
                </div> <!-- /.container --> 
            </nav> 
            
            
            <script src="js/google.js"></script>


    

    <script>
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
	});
</script>
<script type="text/javascript">		
	
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
	});
	
</script>

<script>
	$(document).ready(function() {
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
	});
</script>

<script>
	$(document).ready(function() {
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
	});
</script>

<script>
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
			$("input.bus_from").autocomplete({
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
	});
</script>






<script>
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
	});
	
	
	
	
	
</script>











<script type="text/javascript">		
	
	
	$(document).ready(function() {
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
	});
</script>  

<script type="text/javascript">		
	
	
	$(document).ready(function() {
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
	});
</script>    
            <!-- /.nav end -->
        
            
            
           
            <!-- popular tour -->
            <section class="popular-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="title">
                                <h2> Policy</h2>
                                <p>Swipe cell Policy turm and condition</p>
                            </div>
                        </div>
                    </div>
                    <div class="row thm-margin" style="font-size: 16px; font-family: Arial, Helvetica, sans-serif;">
                       <h3>Term And Condition:</h3><br>
                       <strong> Authorization for Cash Movement at 
						<b><u><a href="https://swipecell.in">Swipecell</a></u></b> requires the submission of persons authorized to initiate and confirm transfers of
						cash in order to transact Swipecell’s daily business. </strong><br>
						This is accomplished via two forms, the Incumbency
						Certificate and Funds Transfer and Transaction Security Procedures  authorization forms. With
						the selection of the new Administrator, the current forms (attached for your reference) are no longer valid.
						Below are brief descriptions highlighting the purpose of each form.<br>
						
						I have completed both forms for your review and approval. You may wish to add or modify authorized
						staff or include dollar limitations. Please keep in mind that establishing too low of dollar limits could
						impede our ability to transact business timely.
						I recommend that your Board approve the Incumbency Certificate and Funds Transfer and Transaction
						Security Procedures as presented and authorize the Chair execute the documents.
						Please contact me if you have any questions.
						SwipeCell (SC) is a nation-wide payment system facilitating one-to-one funds transfer. Under this Scheme, individuals, firms and corporates can electronically transfer funds from any bank branch to any individual, firm or corporate having an account with any other bank branch in the country participating in the Scheme.
						<b>Division/Department:</b><br>
						Receiving funds:
						To initiate an incoming Swipecell relationship, the periodic incoming receipts to the company should exceed
						10. If the incoming receipt amount is less, a discussion with a Treasury representative is appropriate.
						The division/department will work with Treasury to provide banking instructions be sent via secure method
						to the payor. The division/department must perform due diligence on the vendor or work with Purchasing
						to assure requirements for purchasing from the vendor meet office requirements.<br>
						<b>Paying funds:</b><br>
						Vendor Swipecell relationships are handled on a case-by-case basis with Purchasing or the Accounts Payable
						department. Vendor Swipecell are made  Purchasing Card (“P-Card”). Factors in the decision to pay via Swipecell include: the size of the
						account/payment, the length of the relationship, the frequency of payment(s), etc. The
						division/department, Purchasing and/or Accounts Payable will confirm banking instructions with the
						payee.<br>
						<b>Accounts Payable:</b><br>
						If a vendor requests payment via Swipecell, Accounts Payable will work with the vendor to attain or verify the
						Swaipcell banking instructions provided by Purchasing or the vendor. An alternate Accounts Payable staff
						member will confirm the banking instructions with the vendor to mitigate fraud and strengthen the integrity
						of the data. The alternate Accounts Payable staff member confirmation is not necessary if the
						appropriate due diligence was performed by the division/department or Purchasing. Swipecell,s initiated by
						Accounts Payable do not have a minimum dollar amount for initiation.<br>
						<b>Purchasing:</b><br>
						If a vendor requests payment via Swiprcell, Purchasing may work with Accounts Payable to identify the
						payment transaction type required for the settlement of funds to the vendor. Purchasing may also work
						with the vendor to attain the vendor’s banking instructions. If Purchasing receives the banking
						instructions, only one individual in Accounts Payable will confirm the banking instructions. The vendor
						requirements maintained by Purchasing will provide support of the integrity of the vendor.<br>
						<b>Treasury:</b><br>
						Treasury will identify the appropriate Swiprcell payment method for requests received for processing by
						Treasury. Treasury will review the transactional details and supporting documentation received for
						payment initiation to assure the integrity of the information. Treasury may consult with the provider of the
						request for payment to assess that vendor due diligence was performed and integrity of the banking
						instructions.<br>
						<b>Cancellation by the Customer:</b><br>
						The customer may cancel a Money Transfer Transaction if the payment to the receiver (in the case of the Cash Receipt Method) has not yet been completed. In such a case, the customer shall take the procedures prescribed by the Bank; provided, however, that such cancellations may not be allowed if it is prohibited under the Foreign Exchange Laws or rejected by the Alliance Partner. In such a case, the Bank shall not be liable for any damages arising therefrom. As a general rule, deposits made into the Receiver's Account (for deposit into a bank account) cannot be cancelled.<br>
						If the customer terminates the Account or the International Money Transfer Service Agreement, the customer shall be deemed to have requested the cancellation of all of the customer's pending Money Transfer Transactions pursuant to Paragraph 1, including payment to the receiver (in the case of the Cash Receipt Method) and crediting of amounts to the Receiver's Bank Account (in the case of the Credit-to- Account Method), and the Bank shall take the relevant procedures to cancel such Money Transfer Transactions.<br><br>
						
							<b>Fees once paid through the payment gateway shall not be refunded other than in the following circumstances:</b>

							<ol><li>Multiple times debiting of Candidate Card/Bank Account due to technical error OR Candidate's account being debited with excess amount in a single transaction due to technical error. In such cases, excess amount excluding Payment Gateway charges would be refunded to the candidate.</li>

							<li>Due to technical error, payment being charged on the Candidate Card/Bank Account but the enrolment for the examination is unsuccessful. Candidate would be provided with the enrolment by Swipecell at no extra cost. However, if in such cases, candidate wishes to seek refund of the amount, he/she would be refunded net the amount, after deduction of Payment Gateway charges or any other charges.</li>

							<li>The Candidate will have to make an application for refund along with the transaction number and original payment receipt if any generated at the time of making payments.</li>

							<li>The application in the prescribed format should be sent to <u>info@SwipeCell.in</u>.</li>

							<li>The application will be processed manually and after verification, if the claim is found valid, the amount received in excess will be refunded by Swipecell through electronic mode in favour of the applicant and confirmation sent to the mailing address given in the online registration form, within a period of 7-10 calendar days on receipt of such claim.</li>

							<li> In case of any queries, please call Swipecell Certification Helpdesk on <u>+91 124-4002005 / 4002006</u> or write to <u><a href="https://swipecell.in">info@SwipeCell.in</a></u>.</li>
						</ol>
                    </div>
                </div>
            </section>
            <!-- service -->
           
            <!-- destination -->
            
           
            <!-- package section -->
       
            <!-- Counter -->
         <!--    <section class="counter-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="count-content">
                                <div class="count-icon">
                                    <i class="flaticon-earth-globe"></i>
                                </div>
                                <div class="count">
                                    <h1 class="count-number">1648</h1>
                                    <div class="count-text">Destinations</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="count-content">
                                <div class="count-icon">
                                    <i class="flaticon-cabin"></i>
                                </div>
                                <div class="count">
                                    <h1 class="count-number">3589</h1>
                                    <div class="count-text">Hotels</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="count-content">
                                <div class="count-icon">
                                    <i class="flaticon-photographer-with-cap-and-glasses"></i>
                                </div>
                                <div class="count">
                                    <h1 class="count-number">109087</h1>
                                    <div class="count-text">Tourists</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="count-content">
                                <div class="count-icon">
                                    <i class="flaticon-airplane-flight-in-circle-around-earth"></i>
                                </div>
                                <div class="count">
                                    <h1 class="count-number">1891</h1>
                                    <div class="count-text">Tour</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->
            <!-- blog section -->
         
            <!-- Newsletter -->
           <!--  <section class="get-offer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5">
                            <span>Subscribe to our Newsletter</span>
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
                </div> -->
            </section>
        </div>
        <!-- Footer Section -->

        <footer>
            <div class="container">
                <div class="row">
                    <!-- Address -->
                    <div class="col-sm-4 col-md-3">
                        <div class="footer-box address-inner">
                            <p>SwipeCell is a one-stop online solution company features various services   </p>
                            <div class="address">
                                <i class="flaticon-placeholder"></i>
                                <p>
Energic Softech Solutions Pvt. Ltd.<p>
554/555,Tower B-2,Spaze I-Tech Park, Sohna Road, Sector 49,
GURGAON, HR-122018</p>
                            </div>
                            <div class="address">
                                <i class="flaticon-customer-service"></i>
                                <p> +91 124-4002005 / 4002006</p>
                            </div>
                            <div class="address">
                                <i class="flaticon-mail"></i>
                                <p> info@SwipeCell.in</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-6">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="footer-box">
                                    <h4 class="footer-title">About SwipeCell</h4>
                                    <ul class="categoty">
                                        <li><a href="aboutus.html">About Us</a></li>
                                        <li><a href="aboutus.html">Why us</a></li>
                                        <li><a href="aboutus.html">Company Profile</a></li>
                                        <li><a href="aboutus.html">Our Team</a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="footer-box">
                                    <h4 class="footer-title">Support</h4>
                            <ul class="categoty">
                                        <li><a href="contactus.html">Contact Us</a></li>
                                        <li><a target="_blank" href="user_agreement.html">User Agreement</a></li>
                                        <li><a href="contactus.html">Faq</a></li>
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
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="aboutus.html">About</a></li>
                                    <li><a href="contactus.html">Contact</a></li>
                                    <li><a href="register.html">Register</a></li>
                                    <li><a href="login.php">Login</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- jQuery -->
        <script src="assets/js/jquery.min.js" type="text/javascript"></script>
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
    </body>

<!-- Mirrored from travel.bdtask.com/travel_demo/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Feb 2017 15:14:08 GMT -->

<!-- Mirrored from SwipeCell.in/utility_all by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 08 Mar 2017 08:40:31 GMT -->
<!-- Added by HTTrack --><!-- /Added by HTTrack -->
</html>       
                  <div class="modal fade flight-details" tabindex="-1" role="dialog" >
	<div class="modal-dialog modal-lg">
    
    <!--  border-radius: 0;
    margin-left: 109px;
    margin-right: 109px;
    padding: 20px 2 -->
		<div class="modal-content" style="border-radius:10px;" >
			<div class="modal-body">
				<div class="flight-details-header" >
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
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
                  
					<div class="flight-details-book">
						
						
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="flight-details-body">
					  
                       <div style="" class="plan" id="plan">
                                
                                
                                
                               
                    
				</div>
			</div>
		</div>
	</div>
</div>
</div>
	   
       <script src="js/mobile.js"></script>

