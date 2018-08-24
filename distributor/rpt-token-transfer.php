<?php 
session_start();
if(!isset($_SESSION['distributor'])) {
	header("location:index.php");
	exit();
}
include('../config.php');
include('common.php');
include('../system/class.pagination.php');
$tbl = new ListTable();

$from = isset($_GET["f"]) && $_GET["f"]!='' ? mysql_real_escape_string($_GET["f"]) : date("Y-m-d");
$to = isset($_GET["t"]) && $_GET["t"]!='' ? mysql_real_escape_string($_GET["t"]) : date("Y-m-d");
$aFrom = date("Y-m-d 00:00:00", strtotime($from));
$aTo = date("Y-m-d 23:59:59", strtotime($to));

//Search Query
$sWhere = " WHERE (t.from_uid='".$_SESSION['distributor_uid']."' OR t.to_uid='".$_SESSION['distributor_uid']."') AND t.added_date BETWEEN '".$aFrom."' AND '".$aTo."' ";
if(isset($_GET["type"]) && $_GET["type"]!='') {
	$sWhere .= " AND t.ts_type='".mysql_real_escape_string($_GET["type"])."' ";
}
$statement = "token_activation t LEFT JOIN apps_user u ON t.to_uid=u.uid $sWhere ORDER BY t.added_date DESC";

//Pagination
$paged = (int) (!isset($_GET["paged"]) ? 1 : $_GET["paged"]);
$limit = (int) (!isset($_GET["show"]) ? 25 : $_GET["show"]);
$startpoint = ($paged * $limit) - $limit;
$scnt = ($paged * $limit) - $limit + 1;
$self = $tbl->remove_page_param('token-transfer-rpt.php');

$meta['title'] = "Token Transfer Report";
include('header.php');
?>
<script>
$(document).ready(function() {
	$('#from').datepicker({
		format: 'yyyy-mm-dd'
	});
	$('#to').datepicker({
		format: 'yyyy-mm-dd'
	});
});
</script>
<link rel="stylesheet" href="../js/datepicker/datepicker.css">
<script src="../js/datepicker/bootstrap-datepicker.js"></script>
<div class="content">
	<div class="container">
		<div class="page-header">
			<div class="page-title">Report <small>/ Token</small></div>
		</div>
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><i class="fa fa-list"></i> List Token Trasfers</h3>
			</div>			
			<div class="box-body no-padding min-height-480">
				<div class="box-filter padding-20">
					<form method="get">
						<div class="col-sm-5">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<input type="text" size="8" name="f" id="from" value="<?php if(isset($_GET['f'])) { echo $_GET['f']; }?>" placeholder="From Date" class="form-control">
									</div>
								</div>
								<div class="col-sm-6">
									<div class="form-group">
										<input type="text" size="8" name="t" id="to" value="<?php if(isset($_GET['t'])) { echo $_GET['t']; }?>" placeholder="To Date" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<select name="type" class="form-control">
									<option value=""></option>
									<option value="dr" <?php if(isset($_GET['type']) && $_GET['type']=="dr") { ?> selected="selected"<?php } ?>>DEBIT</option>
									<option value="cr" <?php if(isset($_GET['type']) && $_GET['type']=="cr") { ?> selected="selected"<?php } ?>>CREDIT</option>
								</select>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<button type="submit" class="btn btn-warning"> Filter</button>
							</div>
						</div>
					</form>
				</div>
				<table class="table table-condensed table-striped">
					<thead>
						<tr>
							<th width="4%">S.NO</th>
							<th>Date</th>
							<th width="8%">Type</th>
							<th>User</th>
							<th width="8%">Tokens</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$query = $db->query("SELECT t.*, u.company_name FROM {$statement} LIMIT {$startpoint}, {$limit}");
						if($db->numRows($query) < 1) echo "<tr><td colspan='100%'>No Result Found</td></tr>";
						while($row = $db->fetchNextObject($query)) { ?>
						<tr>
							<td><?php echo $scnt++;?></td>
							<td><?php echo date('d/m/Y H:i:s', strtotime($row->added_date));?></td>
							<td><?php echo $row->ts_type;?></td>
							<?php if($row->ts_type=="cr") { ?>	
							<td><?php if($row->to_uid=='0') { echo "<b>".SITENAME."</b>"; } else { echo $row->company_name;}?></td>	
							<?php } else { ?>
							<td><?php if($row->from_uid=='0') { echo "<b>".SITENAME."</b>"; } else { echo $row->company_name;}?></td>	
							<?php } ?>
							<td><?php echo $row->token_value;?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="paginate">
			<?php echo $tbl->pagination($statement,$limit,$paged,$self);?>	
		</div>
	</section>
</div>
<?php include('footer.php');?>