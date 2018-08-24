<?php
session_start();
if(!isset($_SESSION['staff'])) {
	header("location:index.php");
	exit();
}
include("../config.php");
include("common.php");
$request_id = isset($_GET['uid']) && $_GET['uid'] != '' ? mysql_real_escape_string($_GET['uid']) : 0;
$error = isset($_GET['error']) && $_GET['error'] != '' ? mysql_real_escape_string($_GET['error']) : 0;
$token = isset($_GET['token']) && $_GET['token'] != '' ? mysql_real_escape_string($_GET['token']) : 0;
if($token != hashToken($request_id)) {
	exit("Token not match");
}

if(isset($_POST['submit'])) {
	$pin = hashPin(htmlentities(addslashes($_POST['pin']),ENT_QUOTES));
	$admin_info = $db->queryUniqueObject("SELECT * FROM apps_admin WHERE admin_id = '".$_SESSION['admin']."' ");
	if($admin_info) {
		if($admin_info->pin==$pin) {
			for($i = 1; $i<=count($_POST['operator_id']); $i++) {
			
				$commission_type[$i] = isset($_POST['commission_type'][$i]) ? $_POST['commission_type'][$i] : "%";
				$is_surcharge[$i] = isset($_POST['is_surcharge'][$i]) ? $_POST['is_surcharge'][$i] : "n";
				$surcharge_type[$i] = isset($_POST['surcharge_type'][$i]) ? $_POST['surcharge_type'][$i] : "f";				
				
				$exists = $db->queryUniqueObject("SELECT id FROM apps_commission WHERE operator_id='".mysql_real_escape_string($_POST['operator_id'][$i])."' AND uid='".$request_id."'");
				if($exists) {
					
					if($_POST['user_type']=='1') {
						$db->execute("UPDATE apps_commission SET comm_api='".mysql_real_escape_string($_POST['commission_ap'][$i])."', commission_type='".$commission_type[$i]."', is_surcharge='".$is_surcharge[$i]."', surcharge_type='".$surcharge_type[$i]."', surcharge_value='".mysql_real_escape_string($_POST['surcharge_amt'][$i])."', status='".$_POST['operator_status'][$i]."' WHERE id='".$_POST['comm_id'][$i]."' AND uid='".$request_id."' ");
					} else {
						$db->execute("UPDATE apps_commission SET comm_mdist='".mysql_real_escape_string($_POST['commission_md'][$i])."', comm_dist='".mysql_real_escape_string($_POST['commission_ds'][$i])."', comm_ret='".mysql_real_escape_string($_POST['commission_rt'][$i])."', commission_type='".$commission_type[$i]."', is_surcharge='".$is_surcharge[$i]."', surcharge_type='".$surcharge_type[$i]."', surcharge_value='".mysql_real_escape_string($_POST['surcharge_amt'][$i])."', status='".$_POST['operator_status'][$i]."' WHERE id='".$_POST['comm_id'][$i]."' AND uid='".$request_id."' ");
					}
					
				} else {
					
					if($_POST['user_type']=='1') {
						$db->execute("INSERT INTO apps_commission(uid, operator_id, comm_api, commission_type, is_surcharge, surcharge_type, surcharge_value, status) values('".$request_id."', '".mysql_real_escape_string($_POST['operator_id'][$i])."', '".mysql_real_escape_string($_POST['commission_ap'][$i])."', '".$commission_type[$i]."', '".$is_surcharge[$i]."', '".$surcharge_type[$i]."', '".$_POST['surcharge_amt'][$i]."', '".$_POST['operator_status'][$i]."') ");
					} else {						
						$db->execute("INSERT INTO apps_commission(uid, operator_id, comm_mdist, comm_dist, comm_ret, commission_type, is_surcharge, surcharge_type, surcharge_value, status) values('".$request_id."', '".mysql_real_escape_string($_POST['operator_id'][$i])."', '".mysql_real_escape_string($_POST['commission_md'][$i])."', '".mysql_real_escape_string($_POST['commission_ds'][$i])."', '".mysql_real_escape_string($_POST['commission_rt'][$i])."', '".$commission_type[$i]."', '".$is_surcharge[$i]."', '".$surcharge_type[$i]."', '".$_POST['surcharge_amt'][$i]."', '".$_POST['operator_status'][$i]."') ");
					}					
				}
			}
			
			$error = 3;
			 
		} else {
			$error = 2;
		}
	} else {
		$error = 1;		
	}
	
	header("location:user-commission.php?uid=".$request_id."&token=".$token."&error=".$error);
	exit();
}

$user = $db->queryUniqueObject("SELECT * FROM apps_user WHERE uid='".$request_id."' ");
if(!$user) { header("location:index.php"); exit(); }

$meta['title'] = "Commissions Settings";
include("header.php");
?>
<script type = "text/javascript">
function fill(t){
	jQuery('.fill-'+t).each(function() {
    	jQuery(this).val(jQuery('#comm_'+t).val());	
	});
}
</script>
<div class="content">
	<div class="container-fluid">
		<div class="page-header">
			<div class="page-title">Commission <small>/ <?php echo getUserType($user->user_type);?> </small></div>
		</div>		
		<?php if($error == 3) { ?>
		<div class="alert alert-success" role="alert">
			Updated successfully
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php }elseif($error==2) { ?>
		<div class="alert alert-warning" role="alert">
			Oops, Invalid Pin!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php }elseif($error==1) { ?>
		<div class="alert alert-danger" role="alert">
			Oops, Some manditory fields are empty.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php }	?>
		<div class="row">
			<div class="col-sm-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><i class="fa fa-pencil-square"></i> Update Commission</h3>
					</div>
					<div class="box-body no-padding min-height-480">
						<form id="form1" method="post" action="" class="form-inline">
						<input disabled="disabled" type="hidden" name="user_type" id="user_type" value="<?php echo $user->user_type;?>" />
						<table class="table table-condensed">
							<tr>
								<th width="6%">S. No.</th>
								<th>Operator Name</th>
								<th>Service Type</th>
								<th width="1%">Com</th>
								<?php if($user->user_type == '3') {?>		
								<th width="10%">Master Dist</th>
								<th width="10%">Distributor</th>
								<th width="10%">Retailer</th>
								<?php } else { ?>
								<th width="10%">API</th>
								<?php } ?>
								<th>Scharge</th>
								<th>Value</th>
								<th>In %</th>
								<th width="1%">Status</th>
							</tr>
							<tr>
								<td colspan="4"><b class="text-red">Insert Multiple Type Commission</b></td>
								<?php if($user->user_type=='3') {?>	
								<td><input type="text" size="5" name="comm_md" id="comm_md" disabled="disabled" onchange="fill('md')" class="form-control input-sm" placeholder="Enter" /></td>
								<td><input type="text" size="5" name="comm_ds" id="comm_ds" disabled="disabled" onchange="fill('ds')" class="form-control input-sm" placeholder="Enter" /></td>
								<td><input type="text" size="5" name="comm_rt" id="comm_rt" disabled="disabled" onchange="fill('rt')" class="form-control input-sm" placeholder="Enter" /></td>
								<?php } else { ?>
								<td><input type="text" size="5" name="comm_ap" id="comm_ap" disabled="disabled" onchange="fill('ap')" class="form-control input-sm" placeholder="Enter" /></td>
								<?php } ?>
								<td colspan="4"></td>
							</tr>
							<?php
							$i = 0;														
							$query = $db->query("SELECT opr.*, ser.service_name FROM operators opr LEFT JOIN service_type ser ON opr.service_type=ser.service_type_id ORDER BY opr.service_type,opr.operator_name ASC ");
							while($result = $db->fetchNextObject($query)) {
								$comm_info = $db->queryUniqueObject("SELECT * FROM apps_commission WHERE uid='".$user->uid."' AND operator_id='".$result->operator_id."' ");
								if($comm_info) {
									$comm_mdist = $comm_info->comm_mdist;
									$comm_dist = $comm_info->comm_dist;
									$comm_ret = $comm_info->comm_ret;
									$comm_api = $comm_info->comm_api;
									$commission_type = $result->commission_type;
									$is_surcharge = $result->is_surcharge;
									$surcharge_type = $result->surcharge_type;
									$surcharge_value = $comm_info->surcharge_value;
									$status = $comm_info->status;
									$id = $comm_info->id;
									
								} else {
									$comm_mdist = "";
									$comm_dist = "";
									$comm_ret = "";
									$comm_api = "";
									$commission_type = $result->commission_type;
									$is_surcharge = $result->is_surcharge;
									$surcharge_type = $result->surcharge_type;
									$surcharge_value = $result->surcharge_value;
									$status = $result->status;
									$id = $comm_info->id;

								}
							 ?>
							<tr id="<?php echo $i++;?>" <?php if(!$comm_info) {?>class="bg-danger"<?php }?>>
								<td align="center">
									<?php echo $i;?>
									<input type="hidden" disabled="disabled" name="operator_id[<?php echo $i;?>]" value="<?php echo $result->operator_id;?>" />
									<input type="hidden"  disabled="disabled" name="comm_id[<?php echo $i;?>]" value="<?php if($comm_info) { echo $comm_info->id;}?>" />
									<input type="hidden" disabled="disabled" name="commission_type[<?php echo $i;?>]" value="<?php echo $commission_type;?>" />
									<input type="hidden" disabled="disabled" name="surcharge_type[<?php echo $i;?>]" value="<?php echo $surcharge_type;?>" />
									<input type="hidden" disabled="disabled" name="operator_status[<?php echo $i;?>]" value="<?php echo $status;?>" />
								</td>
								<td><?php echo $result->operator_name;?></td>
								<td><?php echo $result->service_name;?></td>								
								<td align="center"><b><?php echo getCommissionType($commission_type=='p');?></b></td>						
								<?php if($user->user_type=='3') {?>					
								<td>
									<input type="text" disabled="disabled" size="5" id="commission_md<?php echo $i;?>" name="commission_md[<?php echo $i;?>]" value="<?php echo $comm_mdist;?>" class="form-control input-sm fill-md" />
								</td>
								<td>
									<input type="text"  disabled="disabled" size="5" id="commission_ds<?php echo $i;?>" name="commission_ds[<?php echo $i;?>]" value="<?php echo $comm_dist;?>" class="form-control input-sm fill-ds" />
								</td>
								<td>
									<input type="text" disabled="disabled" size="5" id="commission_rt<?php echo $i;?>" name="commission_rt[<?php echo $i;?>]" value="<?php echo $comm_ret;?>" class="form-control input-sm fill-rt" />
								</td>
								<?php } else { ?>
								<td>
									<input type="text" disabled="disabled" size="5" id="commission_ap<?php echo $i;?>" name="commission_ap[<?php echo $i;?>]" value="<?php echo $comm_api;?>" class="form-control input-sm fill-ap" />
								</td>
								<?php } ?>
								<td align="center">
									<input disabled="disabled"  type="checkbox" id="is_surcharge<?php echo $i;?>" name="is_surcharge[<?php echo $i;?>]" value="y" <?php if($is_surcharge=='y') {?>checked="checked"<?php } ?> />
								</td>
								<td>
									<input disabled="disabled"  type="text" size="5" id="surcharge_amt<?php echo $i;?>" name="surcharge_amt[<?php echo $i;?>]" value="<?php echo $surcharge_value;?>" class="form-control input-sm" />
								</td>
								<td><b><?php if($is_surcharge=='y') {echo getSurchargeType($surcharge_type);}?></b></td>	
								<?php if(!empty($sP['operator_active'])) { ?>
								<td align="center">
									<?php if($status == "1") {?>
									<?php if($id) { ?>
									<a href="operator-action_direact_retailer.php?token=<?php echo $token;?>&id=<?php echo $id;?>&status=0" class="label label-success">Active</a>
									<?php } else { ?>
									<span class="label label-success">Active</span>
									<?php } ?>
								<?php } else {?>
									<?php if($id) { ?>
									<a href="operator-action_direact_retailer.php?token=<?php echo $token;?>&id=<?php echo $id;?>&status=1" class="label label-danger">Inactive</a>
									<?php } else { ?>
									<span class="label label-danger">Inactive</span>
									<?php } ?>
								<?php }?>
								</td>		
								<?php }
								else {
								?>
								<td align="center">
									<?php if($status=='1') {?>
										<i class="fa fa-check-circle text-green"></i>
									<?php }else {?>
										<i class="fa fa-minus-circle text-red"></i>
									<?php }?>



								</td>
								<?php }	?>						
							</tr>
							<?php } ?>
							<tr>
								<td colspan='100%'>&nbsp;</td>
							</tr>
							<tr>
								<?php if($user->user_type == '3') { ?>
								<td colspan="6"></td>
								<?php } else { ?>
								<td colspan="4"></td>
								<?php } ?>
								<td colspan="2"><input  type="text" name="pin" id="pin" size="8" placeholder="PIN" class="form-control" /></td>
								<td colspan="3">
									<input  type="submit" name="submit" value="Update" class="btn btn-success" />
									<input disabled="disabled" type="reset" name="reset" value="Reset" class="btn btn-default" />
								</td>
							</tr>
						</table>
						</form>
					</div>
				</div>
			</div>	
		</div>
	</div>
</div>
<?php include("footer.php");?>