<?php
session_start();
if(!isset($_SESSION['admin'])) {
	header("location:index.php");
	exit();
}
include('../config.php');
include('../system/class.pagination.php');
$tbl = new ListTable();
$id = isset($_GET['id']) && $_GET['id']!='' ? mysql_real_escape_string($_GET['id']) : 0;
$type = isset($_GET['type']) && $_GET['type']!='' ? mysql_real_escape_string($_GET['type']) : '';
$error = isset($_GET['error']) && $_GET['error']!='' ? mysql_real_escape_string($_GET['error']) : 0;
if(isset($_POST['add'])) {
	if($_POST['name']=='' || $_POST['no_token']=='' || $_POST['status']=='') {
		$error = 1;		
	} else {
		$name = htmlentities(addslashes($_POST['name']),ENT_QUOTES);		
		$no_token = htmlentities(addslashes($_POST['no_token']),ENT_QUOTES);
		$db->execute("INSERT INTO user_category(`name`, `no_token`, `status`) VALUES ('".$name."', '".$no_token."', '".$_POST['status']."')");
		$error = 2;
		header("location:user-category.php?type=add&error=2");
		exit();
	}
}
if(isset($_POST['edit'])) {
	if($_POST['name']=='' || $_POST['no_token']=='' || $_POST['status']=='') {
		$error = 1;		
	} else {
		$name = htmlentities(addslashes($_POST['name']),ENT_QUOTES);		
		$no_token = htmlentities(addslashes($_POST['no_token']),ENT_QUOTES);
		$db->execute("UPDATE `user_category` SET `name`='".$name."', `no_token`='".$no_token."', `status`='".$_POST['status']."' WHERE id='".$id."' ");
		$error = 2;
		header("location:user-category.php?type=edit&id=".$id."&error=3");
		exit();
	}
}
if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id']) && $_GET['id']!='0') {
	$db->execute("DELETE FROM `user_category` WHERE id='".$id."' ");
	header("location:user-category.php?error=4");
	exit();
}
$meta['title'] = "User Category";
include('header.php');
?>
<div class="content">
	<div class="container-fluid">
		<div class="page-header">
			<div class="page-title">User Category</div>
			<div class="pull-right">				
				<a href="user-category.php?type=add" class="btn btn-primary"><i class="fa fa-plus"></i> Add Category</a>
			</div>
		</div>
		<?php if($error == 4) { ?>
		<div class="alert alert-danger">
			<i class="fa fa-times"></i> Deleted succesfully!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php } else if($error == 3) { ?>
		<div class="alert alert-success">
			<i class="fa fa-check"></i> Updated Successfully
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php } else if($error == 2) { ?>
		<div class="alert alert-success">
			<i class="fa fa-check"></i> Added Successfully
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php } else if($error == 1) { ?>
		<div class="alert alert-danger">
			<i class="fa fa-times"></i> Oops, Some parameters are missing!
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php }?>
		<div class="row" style="min-height:500px;">
			<div class="col-sm-6">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><i class="fa fa-list"></i> Category</h3>
					</div>			
					<div class="box-body">
						<div class="col-sm-12"><div class="col-sm-12">
							<?php 
							if($type=='edit') {
								$cat = $db->queryUniqueObject("SELECT * FROM user_category WHERE id='".$id."' ");
								if(!$cat) {
									header("location:user-category.php");
									exit();
								}
							?>
							<form method="post" action="">
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="name" value="<?php echo $cat->name;?>" placeholder="Category Name" class="form-control">
								</div>
								<div class="form-group">
									<label>Token</label>
									<input type="text" name="no_token" value="<?php echo $cat->no_token;?>" placeholder="Token" class="form-control">
								</div>
								<div class="form-group">
									<label>Status</label>
									<div class="jrequired">
										<label class="radio-inline">
											<input type="radio" name="status" id="gst_deduct_yes" value="1"<?php if($cat->status=='1'){?> checked="checked"<?php }?>> Yes
										</label>
										<label class="radio-inline">
											<input type="radio" name="status" id="gst_deduct_no" value="0"<?php if($cat->status=='0'){?> checked="checked"<?php }?>> No
										</label>
									</div>
								</div>
								<div class="form-group">&nbsp;</div>
								<div class="form-group">
									<input type="submit" name="edit" value="Edit Category" class="btn btn-primary">
								</div>
							</form>
							<?php } else { ?>
							<form method="post" action="">
								<div class="form-group">
									<label>Name</label>
									<input type="text" name="name" placeholder="Category Name" class="form-control">
								</div>
								<div class="form-group">
									<label>Token</label>
									<input type="text" name="no_token" placeholder="Token" class="form-control">
								</div>
								<div class="form-group">
									<label>Status</label>
									<div class="jrequired">
										<label class="radio-inline">
											<input type="radio" name="status" id="status1" value="1" checked="checked"> Yes
										</label>
										<label class="radio-inline">
											<input type="radio" name="status" id="status2" value="0"> No
										</label>
									</div>
								</div>
								<div class="form-group">&nbsp;</div>
								<div class="form-group">
									<input type="submit" name="add" value="Add Category" class="btn btn-primary">
								</div>
							</form>
							<?php } ?>
						</div></div>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><i class="fa fa-list"></i> List Category</h3>
					</div>			
					<div class="box-body no-padding">
						<table class="table table-condensed table-striped table-bordered col-md-12">
							<thead>
								<tr>
									<th width="5%">S.No</th>
									<th>Name</th>
									<th>Token</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php						
								$query = $db->query("SELECT * FROM user_category ORDER BY name ASC ");
								if($db->numRows($query) < 1) echo "<tr><td colspan='100%'>No Result Found</td></tr>";
								while($row = $db->fetchNextObject($query)) {
								?>
								<tr>
									<td><?php echo $scnt++;?></td>
									<td><?php echo $row->name;?></td>
									<td><?php echo $row->no_token;?></td>
									<td>
										<?php if($row->status=='1') {?>
											Active
										<?php } else if($row->status=='0') {?>
											Inactive
										<?php } ?>
									</td>
									<td>
										<a href="user-category.php?type=edit&id=<?php echo $row->id;?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i></a>
										<a href="user-category.php?type=delete&id=<?php echo $row->id;?>" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
									</td>									
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php'); ?>