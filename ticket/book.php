<?php

$sql="SELECT * FROM `bus_seat_booking`";
$query=mysqli_query($db,$sql) or die(mysqli_error());
$data=mysqli_fetch_assoc($query);
$bus="SELECT * FROM `bus_list` where bus_id='$id'";
$busQuery=mysqli_query($db,$bus) or die(mysqli_error());
$totalData=mysqli_fetch_assoc($busQuery);
$country="SELECT * FROM `countries`";
$cQuery=mysqli_query($db,$country) or die(mysqli_error());

?>

<!-- /all in one seo pack -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
	#holder{	
	 height:400px;	 
	 width:750px;
	 background-color:#F5F5F5;
	 border:1px solid #A4A4A4;
	 margin-left:10px;	
	}
	 #place {
	 position:relative;
	 margin:7px;
	 }
     #place a{
	 font-size:0.6em;
	 }
     #place li
     {
         list-style: none outside none;
         position: absolute;   
     }    
     #place li:hover
     {
        background-color:yellow;      
     } 
	 #place .seat{
	 background:url("ticket/available_seat_img.gif") no-repeat scroll 0 0 transparent;
	 height:33px;
	 width:33px;
	 display:block;	 
	 }
      #place .selectedSeat
      { 
		background-image:url("ticket/booked_seat_img.gif");      	 
      }
	   #place .selectingSeat
      { 
		background-image:url("ticket/selected_seat_img.gif");      	 
      }
	  #place .row-3, #place .row-4{
		margin-top:10px;
	  }
	 #seatDescription{
	 padding:0px;
	 }
	  #seatDescription li{
	  verticle-align:middle;	  
	  list-style: none outside none;
	   padding-left:35px;
	  height:35px;
	  float:left;
	  }
    .modal-dialog {
          width: 800px;
        }
  </style>

    <form id="form1" action="seat-booking.php" runat="server">
	
       <div id="holder"> 
		<ul  id="place">
        </ul>    
	</div>
	 <div > 
    	<ul id="seatDescription">
        <li style="background:url('ticket/available_seat_img.gif') no-repeat scroll 0 0 transparent;">Available Seat</li>
        <li style="background:url('ticket/booked_seat_img.gif') no-repeat scroll 0 0 transparent;">Booked Seat</li>
        <li style="background:url('ticket/selected_seat_img.gif') no-repeat scroll 0 0 transparent;">Selected Seat</li>
      </ul>  
      <div style="width:200px;text-align:left;margin:5px">  
        <input type="button" id="btnShowNew" value="Show Selected Seats" /><!-- <input type="button" id="btnShow" value="Show All" />  -->
      </div>
      <div class="col-md-12">
        <section class="section">
    <div class="row">        
      
      <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="mail.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                          <label for="name" class="">Total Balance:</label>
                            <input type="text" id="totalBal" name="" class="form-control" disabled>
                        </div>
                       
                    </div>
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                          <label for="email" class="">Seat Reserve:</label>
                            <input type="text" id="selectSeat" name="seat_reserve" class="form-control">
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                          <label for="name" class="">Date:</label>
                            <input type="text" id="fillDate" name="reserve_date" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                          <label for="email" class="">Return Date:</label>
                            <input type="text" id="returndate" name="return_date" class="form-control">
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                          <label for="name" class="">Adult:</label>
                            <input type="text" name="adult" id="adultpass" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                          <label for="email" class="">Child:</label>
                            <input type="text" name="child" id="childpass" class="form-control">
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                          <label for="name" class="">Name:</label>
                            <input type="text" name="bus_id" id="" value="<?php echo $totalData['bus_id'];?>" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form mb-0">Mobile NO:</label>
                            <input type="text" id="email" name="email" class="form-control">
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                          <label for="name" class="">Id Proof:</label>
                            <input type="text" id="id_proof" name="id_proof" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form mb-0">Address</label>
                            <input type="text" id="address" name="address" class="form-control">
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="md-form mb-0">
                          <label for="name" class="">Country:</label>
                            <select  id="country" name="country" class="form-control" required onchange="selectTour(this.value);">
                              <option value=" ">Please Select</option>
                              <?php while($count=mysqli_fetch_assoc($cQuery)){ ?>
                              <option value="<?= $count['id'];?>"><?= $count['country_name'];?></option>
                            <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form mb-0" id="result">
                         
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="md-form mb-0" id="stateresult">
                          
                        </div>
                    </div>
                </div>
                <input type="hidden" name="bus_id" id="" value="<?php echo $totalData['bus_id'];?>">
                <input type="hidden" name="user_id" id="user_id">
                <input type="hidden" name="balance" id="totalBalenable" value=""><br>
                
                <input type="submit" name="submit" class="btn btn-primary" id="submit" value="Submit">

            </form>
        </div>
        

    </div>

</section>
     
    </form>
    <script type="text/javascript">
      jQuery(document).ready();
      allSeats='<?php echo $totalData['total_seat'];?>';
      tatalRow=allSeats / 5;

        $(function () {
            var settings = {
                rows: 5,
                cols: tatalRow,
                rowCssPrefix: 'row-',
                colCssPrefix: 'col-',
                seatWidth: 60,
                seatHeight: 70,
                taxkey: 18,
                seatCss: 'seat',
                price:'<?php echo $totalData['price'];?>',
                selectedSeatCss: 'selectedSeat',
				        selectingSeatCss: 'selectingSeat'
            };

            var init = function (reservedSeat) {
                var str = [], seatNo, className;
                for (i = 0; i < settings.rows; i++) {
                    for (j = 0; j < settings.cols; j++) {
                        seatNo = (i + j * settings.rows + 1);
                        className = settings.seatCss + ' ' + settings.rowCssPrefix + i.toString() + ' ' + settings.colCssPrefix + j.toString();
                        if ($.isArray(reservedSeat) && $.inArray(seatNo, reservedSeat) != -1) {
                            className += ' ' + settings.selectedSeatCss;
                        }
                        str.push('<li class="' + className + '"' +
                                  'style="top:' + (i * settings.seatHeight).toString() + 'px;left:' + (j * settings.seatWidth).toString() + 'px">' +
                                  '<a title="' + seatNo + '">' + seatNo + '</a>' +
                                  '</li>');
                    }
                }
                $('#place').html(str.join(''));
            };

            //case I: Show from starting
            //init();

            //Case II: If already booked
            var bookedSeats = [<?php echo $totalData['totel_seat_reserve'];?>];
            
            init(bookedSeats);


      $('.' + settings.seatCss).click(function () {
			if ($(this).hasClass(settings.selectedSeatCss)){
				alert('This seat is already reserved');
			}
			else{
            $(this).toggleClass(settings.selectingSeatCss);
				}
            });
            $('#btnShow').click(function () {
                var str = [];
                $.each($('#place li.' + settings.selectedSeatCss + ' a, #place li.'+ settings.selectingSeatCss + ' a'), function (index, value) {
                    str.push($(this).attr('title'));
                });
                select=str.join(',');
                tax=str.length * settings['price'] / 100 * settings['taxkey'];
                total=str.length * settings['price'] + tax;
                 document.getElementById('selectSeat').value=select;
                document.getElementById('totalBal').value=total;
                
            });
            $('#btnShowNew').click(function () {
                var str = [], item;
                $.each($('#place li.' + settings.selectingSeatCss + ' a'), function (index, value) {
                    item = $(this).attr('title');                   
                    str.push(item);                   
                });
               
                select=str.join(',');
                tax=str.length * settings['price'] / 100 * settings['taxkey'];
                total=str.length * settings['price'] + tax;
                 document.getElementById('selectSeat').value=select;
                document.getElementById('totalBal').value=total;
                document.getElementById('totalBalenable').value=total;
            });
        });
  function selectTour(evt)
  {
    $.ajax({
            url: 'booking/lib/country.php',
            type: 'POST',
            data: {'country': evt},
            success:function(result){
              $('#result').html(result);
            }
          });
  }
  function selectTours(evt)
  {
    $.ajax({
            url: 'booking/lib/country.php',
            type: 'POST',
            data: {'state': evt},
            success:function(result){
              $('#stateresult').html(result);
            }
          });
  }
</script>
