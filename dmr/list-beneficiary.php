<?php
session_start();
$jsList = isset($_POST['js_data']) && $_POST['js_data']!='' ? $_POST['js_data'] : false;
$jsBeneficary = isset($_POST['js_data']) && $_POST['js_data']!='' ? $_POST['js_data'] : false;
?>
<div class="dmt box">
	<div class="box-heading">
		<div class="panel-title pull-left"><i class="fa fa-list-alt"></i> List Beneficiary</div>
		<div class="pull-right">
			<a href="javascript:void(0)" onclick="getBeneficiaryForm()" class="btn btn-sm btn-success">Add Beneficiary</a>
			<a href="javascript:void(0)" onclick="getTransHistory()" class="btn btn-sm btn-primary">History</a>
		</div>		
	</div>
	<div class="panel-body no-padding">
		<table id="tblBeneficiary" class="table table-condensed table-striped">
			<thead>
				<tr>
					<th></th>
					<th>Beneficiary Name</th>
					<th>ID</th>
					<th>Account Number</th>
					<th>Type</th>
					<th>IFSC</th>
					<th width="5%"></th>
					<th width="5%"></th>
					<th width="2%"></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if($jsBeneficary) {
				foreach($jsBeneficary as $dataBen) { ?>
				<tr id="<?php echo $dataBen['BeneficiaryCode'];?>" class="ben_list_tr_<?php echo $dataBen['BeneficiaryCode'];?>">
					<td align="center"><input type="radio" name="ben_row" onclick="enableButton('<?php echo $dataBen['BeneficiaryCode'];?>')" /></td>
					<td><?php echo $dataBen['BeneficiaryName'];?></td>
					<td><?php echo $dataBen['BeneficiaryCode'];?></td>
					<td><?php echo $dataBen['AccountNumber'];?></td>
					<td><?php echo $dataBen['AccountType'];?></td>
					<td><?php echo $dataBen['IFSC'];?></td>
					<td>
						<a href="javascript:void(0)" onClick="benRemittance('<?php echo $dataBen['BeneficiaryCode'];?>','<?php echo $dataBen['BeneficiaryName'];?>','<?php echo $dataBen['AccountNumber'];?>','<?php echo $dataBen['AccountType'];?>','<?php echo $dataBen['IFSC'];?>');" id="rem_<?php echo $dataBen['BeneficiaryCode'];?>" class="btn btn-xs btn-primary disabled">Transfer</a>
					</td>
					<td>						
						<a href="javascript:void(0)" onClick="benValidate('<?php echo $dataBen['BeneficiaryCode'];?>','<?php echo $dataBen['AccountNumber'];?>','<?php echo $dataBen['IFSC'];?>');" id="val_<?php echo $dataBen['BeneficiaryCode'];?>" class="btn btn-xs btn-warning disabled">Validate</a>
					</td>
					<td>
						<a href="javascript:void(0)" onClick="benDeleteModal('<?php echo $dataBen['BeneficiaryCode'];?>','<?php echo $dataBen['BeneficiaryName'];?>','<?php echo $dataBen['AccountNumber'];?>','<?php echo $dataBen['AccountType'];?>','<?php echo $dataBen['IFSC'];?>');" id="del_<?php echo $dataBen['BeneficiaryCode'];?>" class="btn btn-xs btn-danger disabled"><i class="fa fa-trash"></i></a>
					</td>
				</tr>
				<?php } } ?>
			</tbody>
		</table>
	</div>
</div>