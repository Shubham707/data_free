<?php
include'../booking/config.php';
$R=$_REQUEST;
$id=$R['bus_id'];
$user_id = $R['user_id'] ? $R['user_id'] : 0;
echo $sql="INSERT INTO `bus_seat_booking`(`user_id`,`bus_id`, `user_name`, `id_proof`, `address`, `city`, `state`, `country`, `reserve_date`, `return_date`,`balance`, `seat_reserve`) VALUES ('$user_id','$R[bus_id]','$R[name]','$R[id_proof]','$R[address]','$R[city]','$R[state]','$R[country]','$R[reserve_date]','$R[return_date]','$R[balance]','$R[seat_reserve]')";
 	$query=mysqli_query($db,$sql) or die('not correct query!');
 	$check="SELECT  `totel_seat_reserve` FROM `bus_list` WHERE bus_id='$id'";
 	$checkQuery=mysqli_query($db,$check) or die('Check Is not update seat');
 	$data=mysqli_fetch_assoc($checkQuery);
 	if($data['totel_seat_reserve']=='')
 	{
 		 $reserv=$R['seat_reserve'];
 	}
 	else 
 	{ 
 		 $reserv=$data['totel_seat_reserve'].','.$R['seat_reserve']; 
    }
   
   $bus="UPDATE `bus_list` SET `totel_seat_reserve`='$reserv' WHERE `bus_id`='$id'";
   $update=mysqli_query($db,$bus) or die('not correct query!');
header('Location:book.php');


/*UPDATE `bus_list` SET `bus_id`=[value-1],`bus_cat_id`=[value-2],`bus_name`=[value-3],`images`=[value-4],`price`=[value-5],`create_current_data`=[value-6],`city`=[value-7],`state`=[value-8],`country`=[value-9],`address`=[value-10],`review`=[value-11],`discount`=[value-12],`days`=[value-13],`book_description`=[value-14],`totel_seat_reserve`=[value-15],`total_seat`=[value-16],`status`=[value-17],`created`=[value-18],`updated`=[value-19] WHERE 1

Array ( [name] => frgfdjgk [id_proof] => klhl [address] => lk [city] => hlkh [state] => lkh [country] => lkh [reserve_date] => lk [return_date] => hlk [balance] => hl [seat_reserve] => 10,26,38,19,27 [submit] => Submit )
*/