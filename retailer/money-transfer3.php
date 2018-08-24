<?php
session_start();
include('../config.php');
if(!isset($_SESSION['retailer'])) {
	header("location:index.php");
	exit();
}
include('common.php');
$error = isset($_GET['error']) && $_GET['error']!='' ? mysql_real_escape_string($_GET['error']) : 0;
$meta['title'] = "Money Transfer 3";
include('header.php');
?>
<style>
.btn .btn-primary {
	color:#fff;
}
h3.box-title {
	font-size:18px!important;
}
.form-title {
	font-size:16px;
	width:100%;
	float:left;
	padding-left:10px;
	padding-bottom:10px;
	margin-top:25px;
	margin-bottom:25px;
	border-bottom:1px solid #ddd;
}
body.modal-open .datepicker {
  z-index: 1200 !important;
}
</style>
<link rel="stylesheet" href="../css/sweetalert.css">
<script type="text/javascript" src="../js/sweetalert.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	//Customer Search
	$("#submitSearchCustomer").click(function() {
		var mobile = $('#mobile').val().trim();
		if(mobile=="") {
			swal({ title: "Error", text: "Mobile number cannot be blank", type: "error"});
			return false;
		} else {
			if(parseInt(mobile.length)!='10') {
				swal({ title: "Error", text: "Please enter a valid mobile number", type: "error"});
				return false;
			} else {
				swal({ title: "Processing", text: "Please wait a moment..", imageUrl: "../images/preloader.gif", showConfirmButton: false});
				$.ajax({ 
					url : "dmt-ezypay.php",
					type : "GET",
					data : "request=senderValidate&mobile="+mobile,
					async : false,
					success	: function(data) {	
						var obj = $.parseJSON(data);
						if(obj["EZY_RSP"]=='0') {
							swal({ title: "SUCCESS", text: obj["EZY_MSG"], type: "success", showCancelButton: true, confirmButtonText: 'Fetch Beneficiary!', closeOnConfirm: false, closeOnCancel: false},
							function(swalAction) {
								if(swalAction) {
									$("#boxSenderRegistration").hide();
									$("#sdSenderMobile").html(obj["EZY_SENDER_MOBILE"]);
									$("#sdSenderName").html(obj["EZY_SENDER_NAME"]);
									$("#senderInfo").show();							
									getBeneficiaryList(obj["EZY_SENDER_MOBILE"]);	
								} else {
									swal.close();
								}					
							});
						} else if (obj["EZY_RSP"]=='1') {
							$("#senderInfo").hide();
							$('#frmSenderRegister').find("#mobile").val(obj["EZY_MOB"]);
							$("#boxSenderRegistration").show();
							swal({ title: "NOT EXISTS", text: obj["EZY_MSG"], type: "warning"});
						} else {
							swal({ title: "ERROR", text: obj["EZY_MSG"], type: "error"});
						}
					}
				});
			}
		}
	});	

	//Customer Registration along with beneficiary
	$("#submitSenderRegister").click(function() {
		var mobile = $('#frmSenderRegister').find("#mobile").val().trim();
		var name = $('#frmSenderRegister').find('#name').val().trim();
		if(mobile=="" || name=="") {
			var txtError = "Field cannot be blank";
			if(mobile=="") {
				var txtError = "Please enter customer mobile number";
			} else if (name=="") {
				var txtError = "Please enter sender name";
			}
			swal({ title: "Error", text: txtError, type: "error"});
			return false;
		} else {
			if(parseInt(mobile.length)!='10') {
				swal({ title: "Error", text: "Please enter a valid 10 digit mobile number", type: "error"});
				return false;
			} else {
				swal({ title: "Processing", text: "Please wait a moment..", imageUrl: "../images/preloader.gif", showConfirmButton: false});
				$.ajax({ 
					url : "dmt-ezypay.php",
					type : "GET",
					data : "request=senderRegistration&mobile="+mobile+"&name="+name,
					async : false,
					success	: function(data) {
						var obj = $.parseJSON(data);
						if(obj["EZY_RSP"]=='0') {	
							swal({ title: "SUCCESS", text: obj["EZY_MSG"], type: "success"},
							function() {
								$('#otpRefId').val(obj["EZY_REF_TXN_NO"]);
								$('#otpRefCode').val(obj["EZY_VERIFICATION_REF_NO"]);
								$('#otpCode').val('');
								$('#modalOtpVerify').modal('show');	
							});	
						}
						else if (obj["EZY_RSP"]=='1') {
							swal({ title: "Error", text: obj["EZY_MSG"], type: "error"});
						}
						else {
							swal({ title: "Error", text: obj["EZY_MSG"], type: "error"});
						}
					}
				});
			}
		}
	});	

	//Beneficiary Registration
	$("#submitBeneficiaryRegister").click(function() {
		var mobile = $('#mobile').val().trim();
		var benRegName = $('#benRegName').val().trim();
		var benRegAccount = $('#benRegAccount').val().trim();
		var benRegIfsc = jQuery('#benRegIfsc').val().trim();
		if(mobile=="" || benRegName=="" || benRegAccount=="" || benRegIfsc=="") {
			swal({ title: "Error", text: "Mobile/Name/Account/IFSC cannot be blank", type: "error"});
			return false;
		} else {
			if(parseInt(mobile.length)!='10') {
				swal({ title: "Error", text: "Please enter a valid mobile number", type: "error"});
				return false;
			} else {
				swal({ title: "Processing", text: "Please wait a moment..", imageUrl: "../images/preloader.gif", showConfirmButton: false});
				$.ajax({ 
					url : "dmt-ezypay.php",
					type : "GET",
					data : "request=beneficiaryAdd&mobile="+mobile+"&ben_name="+benRegName+"&ben_account="+benRegAccount+"&ifsc="+benRegIfsc,
					async : false,
					success	: function(data) {
						var obj = $.parseJSON(data);
						if(obj["EZY_RSP"]=='0') {	
						  swal({ title: "SUCCESS", text: obj["EZY_MSG"], type: "success"},
							function() {								
								$("#frmBeneficiaryRegister").trigger('reset');	
							});
						} else if (obj["EZY_RSP"]=='224') {
							swal({ title: "FAILED", text: obj["EZY_MSG"], type: "error"});
						} else {
							swal({ title: "FAILED", text: obj["EZY_MSG"], type: "error"});
						}
					}
				});
			}
		}
	});	

	//OTP Verification
	$("#submitOtpVerification").click(function() {
		var mobile = $('#mobile').val().trim();
		var otpRefId = $('#otpRefId').val().trim();
		var otpRefCode = $('#otpRefCode').val().trim();
		var otpCode = $('#otpCode').val().trim();
		if(mobile=="" ||  otpRefId=="" || otpRefCode=="" || otpCode=="") {
			swal({ title: "Error", text: "Mobile or Referece Code or OTP cannot be blank", type: "error"});
			return false;
		} else {
			if(parseInt(mobile.length)!='10') {
				swal({ title: "Error", text: "Invalid mobile number", type: "error"});
				return false;
			} else {
				swal({ title: "Processing", text: "Please wait a moment..", imageUrl: "../images/preloader.gif", showConfirmButton: false});
				$.ajax({ 
					url		: "dmt-ezypay.php",
					type	: "GET",
					data	: "request=otpVerify&mobile="+mobile+"&otp_ref_code="+otpRefCode+"&otp="+otpCode+"&otp_ref_id="+otpRefId,
					async : false,
					success	: function(data) {
						var obj = $.parseJSON(data);
						if(obj["EZY_RSP"]=='0') {	
							swal({ title: "SUCCESS", text: obj["EZY_MSG"], type: "success"},
							function () {
								$('#boxSenderRegistration').hide();
								$('#modalOtpVerify').modal('hide');
							});
						} else if (obj["EZY_RSP"]=='1') {
							swal({ title: "ERROR", text: obj["EZY_MSG"], type: "error"});
						} else {
							swal({ title: "ERROR", text: obj["EZY_MSG"], type: "error"});
						}
					}
				});
			}
		}
	});
	//Resend OTP
	$("#submitOtpResend").click(function() {
		var mobile = $('#mobile').val().trim();
		var otpRefCode = $('#otpRefCode').val().trim();
		if(mobile=="" || otpRefCode=="") {
			swal({ title: "Error", text: "Mobile/OTP reference number cannot be blank", type: "error"});
			return false;
		} else {
			if(parseInt(mobile.length)!='10') {
				swal({ title: "Error", text: "Invalid mobile number", type: "error"});
				return false;
			} else {
				swal({ title: "Processing", text: "Please wait a moment..", imageUrl: "../images/preloader.gif", showConfirmButton: false});
				$.ajax({ 
					url		: "dmt-ezypay.php",
					type	: "GET",
					data	: "request=otpResend&mobile="+mobile+"&otp_ref_code="+otpRefCode,
					async : false,
					success	: function(data) {
						//console.log(data);
						var obj = $.parseJSON(data);
						if(obj["EZY_RSP"]=='0') {		
							swal({ title: "SUCCESS", text: obj["EZY_MSG"], type: "success"},
							function() {
								$('#otpRefId').val(obj["EZY_REF_TXN_NO"]);
								$('#otpRefCode').val(obj["EZY_VERIFICATION_REF_NO"]);
								$('#otpCode').val("");
								$('#submitOtpResend').attr("disabled", 'disabled');
							});	
						} else if (obj["EZY_RSP"]=='1') {
							swal({ title: "Error", text: obj["EZY_MSG"], type: "error"});
						} else {
							swal({ title: "Error", text: obj["EZY_MSG"], type: "error"});
						}
					}
				});
			}
		}
	});

	$("#findIfscBen, #findIfscBenReg").click(function() {
		var mobile = $('#mobile').val().trim();
		if(mobile=="") {
			swal({ title: "Error", text: "Mobile number cannot be blank", type: "error"});
		} else {
			$('#modalIfsc').modal('show');
		}
	});

	//Search IFSC Code
	$("#submitIfscSearch").click(function() {
		var mobile = $('#mobile').val().trim();
		var bank = $('#bank_name').val().trim();
		var branch = $('#branch_name').val().trim();
		if(mobile=="" || bank=="" || branch=="") {
			swal({ title: "Error", text: "Mobile/Bank/Branch cannot be blank", type: "error"});
		} else {
			if(bank.length <= '3' || branch.length <= '3') {
				swal({ title: "Error", text: "Bank or Branch name required min 4 charcter", type: "error"});
			} else {
				swal({ title: "Processing", text: "Please wait a moment..", imageUrl: "../images/preloader.gif"});
				$.ajax({ 
					url		: "https://api.techm.co.in/api/bank/search/likeBranchName",
					type	: "POST",
					dataType: 'json',
					contentType: "application/json; charset=utf-8",
					data	: '{ "bankName": "'+bank+'", "branchName" : "'+branch+'" }',
					async : false,
					success	: function(data) {
						swal.close();		
						var html = "";	
						var data2 = data.data;
						html +='<table style="overflow:scroll" class="table table-condensed table-striped"><thead><tr><th>IFSC</th><th>Bank Name</th><th>Branch Name</th><th>City</th><th>Address</th></tr></thead><tbody>';
						for(var i=0;i<data2.length;i++) {
							var ifsc = data2[i].IFSC;
					    var branch = data2[i].BRANCH;
					    var city = data2[i].CITY;
					    var bankname = data2[i].BANK;
					    var address = data2[i].ADDRESS;
							html += '<tr style="cursor:pointer" ifsc="'+ifsc+'" onclick="insertIfsc(this);">';
							html += '<td>'+ifsc+'</td>';
							html += '<td>'+bankname+'</td>';
							html += '<td>'+branch+'</td>';
							html += '<td>'+city+'</td>';
							html += '<td style="word-wrap: break-word;">'+address+'</td></tr>';
						}
						html += '</tbody></table>';
						$("#modalIfscResult .modal-body").html(html);
						$('#modalIfscResult').modal('show');
					}
				});
			}
		}
	});
	//Money Transfer
	$("#submitMoneyRemittance").click(function() {
		var mobile = $('#mobile').val().trim();
		var benCode = $('#benRemCode').val().trim();
		var benAmount = $('#benRemAmount').val().trim();
		var benRemType = $("input[name='ben_rem_type']").val().trim();
		var benAadhaar = $('#benRemAadhaar').val().trim();
		var benPanCard = $('#benRemPanCard').val().trim();
		if(mobile=="" || benCode=="" || benAmount=="" || benRemType=="") {
			swal({ title: "Error", text: "Mobile or other fields cannot be blank", type: "error"});
			return false;
		} else {
			if(parseInt(mobile.length)!='10') {
				swal({ title: "Error", text: "Invalid mobile number", type: "error"});
				return false;
			} else {
				swal({ title: "Processing", text: "Please wait a moment..", imageUrl: "../images/preloader.gif", showConfirmButton: false});
				$('#benRemitanceModal').modal('hide');
				$.ajax({ 
					url		: "dmt-ezypay.php",
					type	: "GET",
					data	: "request=moneyRemittance&mobile="+mobile+"&ben_code="+benCode+"&ben_amount="+benAmount+"&ben_type="+benRemType+"&ben_aadhaar="+benAadhaar+"&ben_pan="+benPanCard,
					async : false,
					success	: function(data) {
						$("#frmMoneyRemittance").trigger('reset');	
						var obj = $.parseJSON(data);
						if(obj["EZY_RSP"]=='0') {	
							swal({ title: "SUCCESS", text: obj["EZY_MSG"], type: "success"},
							function () {
								var html = "";
								html +='<table style="overflow:scroll" class="table table-condensed"><tbody>';
								html += '<tr><td>Beneficiary Name</td><td>'+obj["EZY_BEN_NAME"]+'</td></tr>';
								html += '<tr><td>Beneficiary Code</td><td>'+obj["EZY_BEN_CODE"]+'</td></tr>';
								html += '<tr><td>Bank Name</td><td>'+obj["EZY_BANK_NAME"]+'</td></tr>';
								html += '<tr><td>Ref Number</td><td>'+obj["EZY_BEN_IMPS_REF_NO"]+'</td></tr>';
								html += '<tr><td>Transaction ID</td><td>'+obj["EZY_TRANS_ID"]+'</td></tr>';
								html += '<tr><td>Status</td><td>'+obj["EZY_MESSAGE"]+'</td></tr>';
								html += '</tbody></table>';
								$("#modalRemResult .modal-body").html(html);
								$('#modalRemResult').modal('show');	
							});
						} else if (obj["EZY_RSP"]=='1') {
							swal({ title: "FAIL", text: obj["EZY_MSG"], type: "error"});
						} else {
							swal({ title: "FAIL", text: obj["EZY_MSG"], type: "error"});
						}
					}
				});
			}
		}
	});	

	//Beneficiary Delete
	$("#submitBeneficiaryDelete").click(function() {
		var mobile = $('#mobile').val().trim();
		var benCode = $('#benDelCode').val().trim();
		if(mobile=="" || benCode=="") {
			swal({ title: "Error", text: "Mobile/Code cannot be blank", type: "error"});
		} else {
			$("#modalBenDelete").modal('hide');		
			swal({ title: "Processing", text: "Please wait a moment..", imageUrl: "../images/preloader.gif", showConfirmButton: false});
			$.ajax({ 
				url		: "dmt-ezypay.php",
				type	: "GET",
				data	: "request=beneficiaryDelete&mobile="+mobile+"&ben_code="+benCode,
				async : false,
				success	: function(data) {
					var obj = $.parseJSON(data);
					if(obj["EZY_RSP"]=='0') {
						swal({ title: "SUCCESS", text: obj["EZY_MSG"], type: "success"});
						$('.ben_list_tr_'+benCode).hide('slow');
					} else if (obj["EZY_RSP"]=='1') {
						swal({ title: "FAIL", text: obj["EZY_MSG"], type: "error"});
					} else {
						swal({ title: "FAIL", text: obj["EZY_MSG"], type: "error"});
					}
				}
			});
		}
	});

	var dob = $('#dob').datepicker({
		format: 'dd-mm-yyyy'
	}).on('changeDate', function(ev) {
  	dob.hide();
	}).data('datepicker');	

	var frDate = $('#fromDate').datepicker({
		format: 'dd-mm-yyyy'
	}).on('changeDate', function(ev) {
  	frDate.hide();
	}).data('datepicker');	

	var toDate = $('#toDate').datepicker({
		format: 'dd-mm-yyyy'
	}).on('changeDate', function(ev) {
  	toDate.hide();
	}).data('datepicker');

});

function getSenderBalance() {
	var mobile = $('#mobile').val().trim();
	if(mobile=="") {
		swal({ title: "Error", text: "Mobile cannot be blank", type: "error"});
		return false;
	} else {		
		swal({ title: "Processing", text: "Please wait a moment..", imageUrl: "../images/preloader.gif", showConfirmButton: false});
		$.ajax({ 
			url : "dmt-ezypay.php",
			type : "GET",
			data : "request=senderBalance&mobile="+mobile,
			async : false,
			success	: function(data) {
				var obj = $.parseJSON(data);
				if(obj["EZY_RSP"]=='0') {
					swal({ title: "SUCCESS", text: obj["EZY_MSG"], type: "success"});
				} else if (obj["EZY_RSP"]=='1') {
					swal({ title: "ERROR", text: obj["EZY_MSG"], type: "warning"});
				} else {
					swal({ title: "ERROR", text: obj["EZY_MSG"], type: "error"});
				}
			}
		});
	}
}

function getBeneficiaryList(mobile) {
	if(mobile=="") {
		swal({ title: "Error", text: "Mobile cannot be blank", type: "error"});
		return false;
	} else {		
		swal({ title: "Processing", text: "Please wait a moment..", imageUrl: "../images/preloader.gif", showConfirmButton: false});
		$.ajax({ 
			url : "dmt-ezypay.php",
			type : "GET",
			data : "request=beneficiaryList&mobile="+mobile,
			async : false,
			success	: function(data) {
				var obj = $.parseJSON(data);
				if(obj["EZY_RSP"]=='0') {
					swal({ title: "SUCCESS", text: obj["EZY_MSG"], type: "success"},
					function() {						
						$("#boxBeneficiaryList").show();
						$.post("ezypay/list-beneficiary.php",{js_data: obj["EZY_BEN"], ajax: 'true'}, function(jd){
							$("#boxCustomerRegistration").hide();	
							$("#boxBeneficiaryForm").hide();
							$("#boxBeneficiaryList").html(jd);
						});
					});
				} else if (obj["EZY_RSP"]=='1') {
					$("#boxBeneficiaryForm").show();
					swal({ title: "ERROR", text: obj["EZY_MSG"], type: "warning"});
				} else {
					swal({ title: "ERROR", text: obj["EZY_MSG"], type: "error"});
				}
			}
		});
	}
}

function getTransHistory() {
	var mobile = $('#mobile').val().trim();
	if(mobile=="") {
		swal({ title: "Error", text: "Mobile cannot be blank", type: "error"});
		return false;
	} else {		
		swal({ title: "Processing", text: "Please wait a moment..", imageUrl: "../images/preloader.gif", showConfirmButton: false});
		$.ajax({ 
			url : "dmt-ezypay.php",
			type : "GET",
			data : "request=transactionHistory&mobile="+mobile,
			async : false,
			success	: function(data) {
				var obj = $.parseJSON(data);
				if(obj["EZY_RSP"]=='0') {
					swal({ title: "SUCCESS", text: obj["EZY_MSG"], type: "success"},
					function() {
						var jsTxn = obj['EZY_TXN'];
						html = '';
						for (key in jsTxn) {
							var tx = jsTxn[key]; 
							html += '<tr><td>'+tx.BeneficiaryName+'</td><td>'+tx.AccountNumber+'</td><td>'+tx.AccType+'</td><td>'+tx.Ifscode+'</td><td>'+tx.BeneficiaryCode+'</td><td>'+tx.TransactionAmount+'</td><td>'+tx.Status+'</td><td>'+tx.TransactionDate+'</td></tr>';
						}
						$("#boxSenderTransaction").show('slow');
						$("#transTableBody").html(html);
					});
				} else if (obj["EZY_RSP"]=='1') {
					swal({ title: "ERROR", text: obj["EZY_MSG"], type: "warning"});
				} else {
					swal({ title: "ERROR", text: obj["EZY_MSG"], type: "error"});
				}
			}
		});
	}
}

function benDeleteModal(benCode,benName,benAccount,benAccountType,benIfsc) {
	var mobile = $('#mobile').val().trim();
	if(mobile=="" || benCode=="") {
		swal({ title: "ERROR", text: "Mobile or Beneficiary Code cannot be blank", type: "error"});
		return false;
	} else {
		if(parseInt(mobile.length)!='10') {
			swal({ title: "Error", text: "Invalid mobile number", type: "error"});
			return false;
		} else {	
			$("#benDelCode").val(benCode);
			$("#benDelName").val(benName);
			$("#benDelAccount").val(benAccount);
			$("#benDelAccountType").val(benAccountType);
			$("#benDelIfsc").val(benIfsc);
			$('#modalBenDelete').modal('show');
		}
	}
}

function benValidate(benCode,benAccount,benIfsc) {
	var mobile = $('#mobile').val().trim();
	if(mobile=="" || benAccount=="" || benIfsc=="") {
		swal({ title: "Error", text: "Fields cannot be blank", type: "error"});
	} else {
		swal({
			title: "Are you sure?",
			text: "Do you really want to validate beneficiary account!",
			type: "success",
			showCancelButton: true,
			confirmButtonColor: "#5cb85c",
			confirmButtonText: "Yes, Confirm!",
			closeOnConfirm: false
		},
		function(){
			swal({ title: "Processing", text: "Please wait a moment..", imageUrl: "../images/preloader.gif", showConfirmButton: false});
			$.ajax({ 
				url		: "dmt-ezypay.php",
				type	: "GET",
				data	: "request=beneficiaryValidate&mobile="+mobile+"&ben_account="+benAccount+"&ben_ifsc="+benIfsc,
				async : false,
				success	: function(data) {
					var obj = $.parseJSON(data);
					if(obj["EZY_RSP"]=='0') {
						swal({ title: "SUCCESS", text: obj["EZY_MSG"], type: "success"});
						$('#val_'+benCode).addClass("disabled");
						var html = "";
						html +='<table style="overflow:scroll" class="table table-condensed"><tbody>';
						html += '<tr><td>Beneficiary Name</td><td>'+obj["EZY_BEN_NAME"]+'</td></tr>';
						html += '<tr><td>Bank Name</td><td>'+obj["EZY_BEN_BANK"]+'</td></tr>';
						html += '<tr><td>Account Number</td><td>'+obj["EZY_BEN_ACC"]+'</td></tr>';
						html += '<tr><td>IFSC</td><td>'+obj["EZY_BEN_IFSC"]+'</td></tr>';
						html += '<tr><td>Ref Number</td><td>'+obj["EZY_IMPS_REF_NO"]+'</td></tr>';
						html += '<tr><td>Status</td><td>'+obj["EZY_MSG"]+'</td></tr>';
						html += '</tbody></table>';
						$("#modalValidateResult .modal-body").html(html);
						$('#modalValidateResult').modal('show');	
					} else if (obj["EZY_RSP"]=='1') {
						swal({ title: "FAILED", text: obj["EZY_MSG"], type: "error"});
					} else {
						swal({ title: "FAILED", text: obj["EZY_MSG"], type: "error"});
					}
				}
			});
		});
	}
}

function benRemittance(benCode,benName,benAccount,benAccountType,benIfsc) {	
	$("#benRemCode").val(benCode);
	$("#benRemName").val(benName);
	$("#benRemAccount").val(benAccount);
	$("#benRemAccountType").val(benAccountType);
	$("#benRemIfsc").val(benIfsc);
	$('#benRemitanceModal').modal('show');
}

function getBackBeneList() {
	swal({ title: "Processing", text: "Please wait a moment..", imageUrl: "../images/preloader.gif", showConfirmButton: false});
	jQuery("#boxSenderTransaction").hide();
	jQuery("#boxBeneficiaryForm").hide();
	jQuery("#boxEkycForm").hide();
	jQuery("#boxBeneficiaryList").show();
	swal.close();
}

function getBeneficiaryForm() {
	swal({ title: "Processing", text: "Please wait a moment..", imageUrl: "../images/preloader.gif", showConfirmButton: false});
	jQuery("#boxSenderTransaction").hide();
	jQuery("#boxBeneficiaryList").hide();
	jQuery("#boxBeneficiaryForm").show();
	swal.close();
}

function enableButton(code) {
	jQuery('a[id^=rem_]').addClass('disabled');
	jQuery('a[id^=val_]').addClass('disabled');
	jQuery('a[id^=del_]').addClass('disabled');
	jQuery('#rem_'+code).removeClass('disabled');
	jQuery('#val_'+code).removeClass('disabled');
	jQuery('#del_'+code).removeClass('disabled');	
}

function insertIfsc(ele) {
	var ifsc = $(ele).attr("ifsc");
	$("#ben_ifsc").val(ifsc);
	$("#benRegIfsc").val(ifsc);
	$('#modalIfscResult').modal('hide');
}

function getDateBetween() {
	$('#modalDateBetween').modal('show');
}

function getCloseThis(id){
	$('#'+id).hide('slow');
}
</script>
<link rel="stylesheet" href="../js/datepicker/datepicker.css">
<script src="../js/datepicker/bootstrap-datepicker.js"></script>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="getBackBeneList()"  data-dismiss="modal">&times;</button>
        <h4 class="modal-title">E-KYC</h4>
      </div>
      <div class="modal-body">
        <iframe id="htmlbind" style="width: 400;height: 600px;margin: 10px 25% auto;"> </iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="getBackBeneList()"  data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="content">
	<div class="container">
		<div class="page-header">
			<div class="page-title">Money Transfer</div>
			
		</div>
		<div class="row">
			<?php
			if($aRetailer->is_money!='a') {?>
			<div class="col-sm-12 min-height-480">
				<?php include("dmt-activation.php");?>
			</div>
			<?php } else { ?>
			<div class="col-sm-12 min-height-480">
				<!-- Search Customer -->
				<div class="box">
					<div class="box-header">
						<h3 class="box-title"><i class="fa fa-angle-right"></i> Money Transfer</h3>
					</div>
					<div class="box-body">	
						<div class="form-horizontal">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label class="col-sm-4 control-label">Sender :</label>
										<div class="col-sm-6">
											<input type="text" name="mobile" id="mobile" class="form-control" placeholder="Enter Mobile Number" />
										</div>
										<div class="col-sm-2">
											<button type="submit" id="submitSearchCustomer" class="btn btn-success">Fetch Sender</button>
										</div>
									</div>	
								</div>
							</div>
						</div>	
					</div>
				</div>
				<!-- start response dump -->

				<div id="senderInfo" style="display:none;">
					<div class="dmt box">
						<div class="box-heading">
							<div class="panel-title pull-left"><i class="fa fa-address-card"></i> Sender Details</div>
						</div>
						<div class="box-body">
							<table class="table table-condensed table-bordered">
								<tbody>
									<tr>
										<td width="15%">Name</td>
										<td width="35%" id="sdSenderName"></td>
										<td width="15%">Mobile</td>
										<td width="20%" id="sdSenderMobile"></td>
										<td width="15%" id="sdSenderMobile"><a href="javascript:void(0);" onclick="getSenderBalance();" class="btn btn-xs btn-success">Check Balance</a></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- end of response dump -->			
				
				<!-- start response dump -->
				<div id="boxSenderTransaction" style="display:none;">
					<div class="dmt box">
						<div class="box-heading">
							<div class="panel-title pull-left"><i class="fa fa-list-alt"></i> List Transaction</div>
							<div class="pull-right">
								<a href="javascript:void(0)" onclick="getCloseThis('boxSenderTransaction')" class="btn btn-sm btn-success">Close</a>
							</div>
						</div>
						<div class="box-body no-padding">
							<table class="table table-condensed table-bordered">
								<thead>
									<tr>
										<td>Beneficiary Name</td>
										<td>Account Number</td>
										<td>Account Type</td>
										<td>Ifscode</td>
										<td>Beneficiary Code</td>
										<td>Amount</td>
										<td>Status</td>
										<td>Date</td>
									</tr>
								</thead>
								<tbody id="transTableBody">
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- end of response dump -->	
				
				<!-- start beneficiary list -->
				<div id="boxBeneficiaryList" style="display:none;">	
				</div>
				<!-- end of beneficiary list -->		

				<!-- start sender registration -->
				<div id="boxSenderRegistration" style="display:none;">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title"><i class="fa fa-user"></i> Add New Sender</h3>
						</div>
						<div class="box-body">	
							<form id="frmSenderRegister" class="form-horizontal">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-sm-4 control-label">Mobile Number :</label>
											<div class="col-sm-8">
												<input type="text" name="mobile" id="mobile" class="form-control" readonly="" placeholder="Enter Mobile Number" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Name :</label>
											<div class="col-sm-8">
												<input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" />
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">&nbsp;</label>
											<div class="col-sm-5">
												<button type="button" id="submitSenderRegister" class="btn btn-primary">Register Sender</button>
											</div>
										</div>
									</div>
								</div>	
							</form>
						</div>
					</div>	
				</div>
				<!-- end of sender registration -->
				
				<!-- start beneficiary add -->
				<div id="boxBeneficiaryForm" style="display:none;">
					<div class="dmt box">
						<div class="box-heading">
							<h3 class="box-title"><i class="fa fa-angle-right"></i> Add Beneficiary</h3>
							<div class="pull-right">
								<a href="javascript:void(0)" onclick="getBackBeneList()" class="btn btn-xs btn-primary">Back</a>
							</div>
						</div>
						<div class="box-body">	
							<form id="frmBeneficiaryRegister" class="form-horizontal">
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label class="col-sm-4 control-label">Beneficiary Name:</label>
											<div class="col-sm-8">
												<input type="text" name="ben_name" id="benRegName" class="form-control" placeholder="Enter Beneficiary Name" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">Bank Account :</label>
											<div class="col-sm-8">
												<input type="text" name="ben_account" id="benRegAccount" class="form-control" placeholder="Enter Bank Account Number" />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">IFSC :</label>
											<div class="col-sm-8">
												<div class="row">
													<div class="col-sm-8">
														<input type="text" name="ben_ifsc" id="benRegIfsc" class="form-control" placeholder="Enter IFSC Code" />
													</div>
													<div class="col-sm-4">
														<button type="button" name="findIfscBenReg" id="findIfscBenReg" class="btn btn-block btn-default" data-backdrop="static" data-keyboard="false">Find IFSC</button>
													</div>
												</div>
											</div>
										</div>
										<div class="form-group">
										</div>
										<div class="form-group">
											<label class="col-sm-4 control-label">&nbsp;</label>
											<div class="col-sm-5">
												<button type="button" id="submitBeneficiaryRegister" class="btn btn-primary">Submit</button>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>	
				</div>
				<!-- end of beneficiary add -->				
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<!-- Beneficiary Validate Result Modal -->
<div class="modal fade" id="modalValidateResult" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Reposne</h4>
      </div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
						No Result found
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!-- Beneficiary Validate Result Modal -->
<div class="modal fade" id="modalRemResult" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Reposne</h4>
      </div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
						No Result found
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modalIfsc" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Search IFSC Code</h4>
      </div>
			<div class="modal-body">
				<div class="row">
				<div class="col-sm-12">
					<form id="frmIfscSearch" class="form-horizontal">
						<div class="form-group">
							<label class="col-sm-4 control-label">Bank Name :</label>
							<div class="col-sm-6">
								<input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Enter Bank Name" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-4 control-label">Branch/City Name :</label>
							<div class="col-sm-6">
								<input type="text" name="branch_name" id="branch_name" class="form-control" placeholder="Enter Branch/City Name" />
							</div>
						</div>
					</form>
				</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" id="submitIfscSearch" class="btn btn-primary" data-dismiss="modal">Search</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modalIfscResult" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Result IFSC Code</h4>
      </div>
			<div class="modal-body" style="overflow:scroll;height:550px">
				<div class="row">
					<div class="col-sm-12">
						No Result found
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalOtpVerify" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">OTP Verification</h4>
      </div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
						<form id="frmOtpVerify" class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-4 control-label">Reference TXN ID :</label>
								<div class="col-sm-6">
									<input type="text" name="otp_ref_id" id="otpRefId" readonly="" class="form-control" placeholder="Enter Refrence ID" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">OTP Reference Code :</label>
								<div class="col-sm-6">
									<input type="text" name="otp_ref_code" id="otpRefCode" readonly="" class="form-control" placeholder="Enter Reference" />
								</div>

							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">OTP :</label>
								<div class="col-sm-6">
									<input type="text" name="otp_code" id="otpCode" class="form-control" placeholder="Enter OTP" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" id="submitOtpResend" class="btn btn-warning">Resend OTP</button>
				<button type="button" id="submitOtpVerification" class="btn btn-primary">Confirm</button>
			</div>
		</div>
	</div>
</div>

<!-- Money Transfer Modal -->
<div class="modal fade" id="benRemitanceModal" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Money Remittance</h4>
      </div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
						<form id="frmMoneyRemittance" class="form-horizontal">
							<input type="hidden" name="mr_uid" id="mr_uid" class="form-control" placeholder="Enter Beneficiary Name" />
							<div class="form-group">
								<label class="col-sm-4 control-label">Beneficiary ID :</label>
								<div class="col-sm-7">
									<input type="text" name="ben_rem_code" id="benRemCode" readonly="" class="form-control" placeholder="Enter Beneficiary ID" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Beneficiary Name :</label>
								<div class="col-sm-7">
									<input type="text" name="ben_rem_name" id="benRemName" readonly="" class="form-control" placeholder="Enter Beneficiary Name" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Bank Account No :</label>
								<div class="col-sm-7">
									<input type="text" name="ben_rem_account" id="benRemAccount" readonly="" class="form-control" placeholder="Bank Account Number" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Bank Account Type :</label>
								<div class="col-sm-7">
									<input type="text" name="ben_rem_account_type" id="benRemAccountType" readonly="" class="form-control" placeholder="Bank Account Type" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">IFSC Code :</label>
								<div class="col-sm-7">
									<input type="text" name="ben_rem_ifsc" id="benRemIfsc" readonly="" class="form-control" placeholder="Enter IFSC Code" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Transaction Type :</label>
								<div class="col-sm-7">
									<label class="radio-inline">
										<input type="radio" name="ben_rem_type" id="benRemTypeImps" value="58" checked="checked" /> IMPS
									</label>
									<label class="radio-inline">
										<input type="radio" name="ben_rem_type" id="benRemTypeNeft" value="127" /> NEFT
									</label>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Aadhaar :</label>
								<div class="col-sm-7">
									<input type="text" name="ben_rem_aadhaar" id="benRemAadhaar" class="form-control" placeholder="Enter Aadhaar" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Pan Number :</label>
								<div class="col-sm-7">
									<input type="text" name="ben_rem_pancard" id="benRemPanCard" class="form-control" placeholder="Enter Pancard" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Amount :</label>
								<div class="col-sm-7">
									<input type="text" name="ben_rem_amount" id="benRemAmount" class="form-control" placeholder="Enter Amount" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" id="submitMoneyRemittance" class="btn btn-primary">Confirm</button>
			</div>
		</div>
	</div>
</div>

<!-- Search Transaction date -->
<div class="modal fade" id="modalBenDelete" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete Beneficiary</h4>
      </div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
						<form id="frmBenDelete" class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-4 control-label">Beneficiary Code :</label>
								<div class="col-sm-7">
									<input type="text" name="ben_del_code" id="benDelCode" readonly="" class="form-control" placeholder="Beneficiary ID" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Beneficiary Name :</label>
								<div class="col-sm-7">
									<input type="text" name="ben_del_name" id="benDelName" readonly="" class="form-control" placeholder="Beneficiary Name" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Beneficiary Account :</label>
								<div class="col-sm-7">
									<input type="text" name="ben_del_account" id="benDelAccount" readonly="" class="form-control" placeholder="Beneficiary Account" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Account Type :</label>
								<div class="col-sm-7">
									<input type="text" name="ben_del_account_type" id="benDelAccountType" readonly="" class="form-control" placeholder="Enter Account Type" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Beneficiary IFSC :</label>
								<div class="col-sm-7">
									<input type="text" name="ben_del_ifsc" id="benDelIfsc" readonly="" class="form-control" placeholder="IFSC Code" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" id="submitBeneficiaryDelete" class="btn btn-primary">Delete</button>
			</div>
		</div>
	</div>
</div>

<!-- Search Transaction date -->
<div class="modal fade" id="modalDateBetween" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Select Dates</h4>
      </div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
						<form id="frmTransactionHistory" class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-2 control-label">From :</label>
								<div class="col-sm-3">
									<input type="text" name="from_date" id="fromDate" readonly="" class="form-control datepicker" placeholder="From Date" />
								</div>
								<label class="col-sm-2 control-label">To Date :</label>
								<div class="col-sm-3">
									<input type="text" name="to_date" id="toDate" readonly="" class="form-control datepicker" placeholder="To Date" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" id="submitTransactionHistroy" class="btn btn-primary">Search Transaction</button>
			</div>
		</div>
	</div>
</div>

<!-- Transaction detail Modal -->
<div class="modal fade" id="modalRefund" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Transaction Refund</h4>
      </div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12">
						<form id="frmRefundTxn" class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-4 control-label">Transaction ID :</label>
								<div class="col-sm-7">
									<input type="text" name="refund_txn_id" id="refundTxnId" readonly="" class="form-control" placeholder="Transaction ID" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Amount :</label>
								<div class="col-sm-7">
									<input type="text" name="refund_amount" id="refundAmount" readonly="" class="form-control" placeholder="Refund Amount" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">Reference Code :</label>
								<div class="col-sm-7">
									<input type="text" name="refund_reference_code" id="refundReferenceCode" readonly="" class="form-control" placeholder="Enter Refrence Code" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-4 control-label">OTP :</label>
								<div class="col-sm-7">
									<input type="text" name="refund_otp" id="refundOtp" class="form-control" placeholder="Enter OTP" />
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				<button type="button" id="submitRefundAmount" class="btn btn-primary">Confirm Refund</button>
			</div>
		</div>
	</div>
</div>
</html>
<?php include('footer.php');?>