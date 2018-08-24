<?php
include'../config.php';
if(@$_REQUEST['country'])
{
	 $id=$_REQUEST['country'];
	$sql="select * from states where country_id='$id'";
	$query=mysqli_query($db,$sql) or die('query Not Execute!');
	echo ' <select  name="state" id="state22" class="form-control" onclick="selectTours(this.value)">';
	while($data1=mysqli_fetch_assoc($query)){
         echo '<option value="'.$data1['id'].'">'.$data1['state_name'].'</option>';
      }
     echo '</select>';
}
if(@$_REQUEST['state'])
{
	$id=$_REQUEST['state'];
	$sql="select * from cities where state_id='$id'";
	$query=mysqli_query($db,$sql) or die('query Not Execute!');
	echo ' <select  name="city" id="city" class="form-control">';
	while($data2=mysqli_fetch_assoc($query)){
         echo '<option value="'.$data2['city_name'].'">'.$data2['city_name'].'</option>';
      }
     echo '</select>';
}
