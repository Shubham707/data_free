<?php include'inner-header.php';

?>
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
		<?php include'inner-footer.php';?>
		<script>
		
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
	
