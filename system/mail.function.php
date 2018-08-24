<?php
require 'class.phpmailer.php';
function phpMailerFunction($to, $subject, $message) {
	$mail =	new PHPMailer(true); //New instance, with exceptions enabled
	$body	=	$message;
	$body	=	preg_replace('/\\\\/','', $body); //Strip backslashes
	$mail->IsSMTP();                           // tell the class to use SMTP
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->Port       = 25;                    // set the SMTP server port
	$mail->Host       = "mail.swipecell.in"; // SMTP server
	$mail->Username   = "info@swipecell.in";     // SMTP server username
	$mail->Password   = "info@2017#";            // SMTP server password
	$mail->IsSendmail();  // tell the class to use Sendmail
	$mail->AddReplyTo("info@swipecell.in","Support Team");
	$mail->From       = "info@swipecell.in";
	$mail->FromName   = "Support Team";
	$mail->AddAddress($to);
	$mail->Subject  = $subject;
	$mail->WordWrap   = 80; // set word wrap
	$mail->MsgHTML($body);
	$mail->IsHTML(true); // send as HTML
	$mail->Send();
}

function mailNewClient($fullname, $company_name, $mobile, $email, $username, $password, $sitename = '') {
	$subject = $sitename." new account created successfully";
	$message = "<html>
				<body>
				<table border='0' cellpadding='5' cellspacing='5' width='100%'>
					<tr>
						<td>Dear ".$fullname.", <br><br>
						Your account has been created successfully, below are the account and login details for your account!<br><br>
						Full Name : ".$fullname."<br>
						Company Name : ".$company_name."<br>
						Registered Mobile : ".$mobile."<br>
						Email : ".$email."<br><br>
						Username : ".$username."<br>
						Password : ".$password."<br><br></td>
					</tr>
					<tr>
						<td>Please do not share your account details to anybody</td>
					</tr>
					<tr>
						<td>Thanks,<br />Support Team<br/>".$sitename."</td>
					</tr>
				</table>
				</body>
				</html>";
	if($email!='') {
		if(phpMailerFunction($email, $subject, $message)) {
			return true;
		} else {
			return false;
		}
	}
}

function mailNewAdmin($email, $fullname, $mobile, $username, $password, $pin, $sitename = '') {
	$subject = $sitename." new account created successfully";
	$message = "<html>
				<body>
				<table border='0' cellpadding='5' cellspacing='5' width='100%'>
					<tr>
						<td>Dear ".$fullname.", <br><br>
						Your account has been created successfully, below are the account and login details for your account!<br><br>
						Full Name : ".$fullname."<br>
						Mobile : ".$mobile."<br>
						Email : ".$email."<br><br>
						Username : ".$username."<br>
						Password : ".$password."<br>
						Pin : ".$pin."<br><br></td>
					</tr>
					<tr>
						<td>Please do not share your account details to anybody</td>
					</tr>
					<tr>
						<td>Thanks,<br />Support Team<br/>".$sitename."</td>
					</tr>
				</table>
				</body>
				</html>";
	if($email!='') {
		if(phpMailerFunction($email, $subject, $message)) {
			return true;
		} else {
			return false;
		}
	}
}

function mailChangePin($email, $username, $pin) {
	$subject = "PIN reset details";
	$message = "<html>
				<body>
				<table border='0' cellpadding='5' cellspacing='5' width='100%'>
					<tr>
						<td>Hi ".$username.", <br><br>
						Your PIN has been changed successfully, your new PIN is: <b>".$pin."</b><br><br>
						If you made this change, you don't need to do anything more.<br>If you didn't change your pin, your account might have been hijacked. To get back into your account, you'll need to reset your pin.<br>Please do not share your pin details to anybody<br><br></td>
					</tr>
					<tr>
						<td>Thanks,<br />Support Team<br/></td>
					</tr>
				</table>
				</body>
				</html>";
	if($email!='') {
		if(phpMailerFunction($email, $subject, $message)) {
			return true;
		} else {
			return false;
		}
	}
}

function mailForgetPassword($email, $username, $password) {
	$subject = " password reset details";
	$message = "<html>
				<body>
				<table border='0' cellpadding='5' cellspacing='5' width='100%'>
					<tr>
						<td>Hi ".$username.", <br><br>
						Your Password has been successfully reset, your new password is: <b>".$password."</b><br></td>
					</tr>
					<tr>
						<td>Please do not share your password details to anybody<br><br></td>
					</tr>
					<tr>
						<td>Thanks,<br />Support Team<br/></td>
					</tr>
				</table>
				</body>
				</html>";
	if($email!='') {	
		if(phpMailerFunction($email, $subject, $message)) {
			return true;
		} else {
			return false;
		}
	}
}

function mailChangePassword($email, $username, $password) {
	$subject =	"Password chanage confirmation";
	$message =	"<html>
				<body>
				<table border='0' cellpadding='5' cellspacing='5' width='100%'>
					<tr>
						<td>Hi ".$username.", <br><br>
						Your Password has been recently change, your new password is: <b>".$password."<b><br><br>
						If you made this change, you don't need to do anything more.<br>If you didn't change your password, your account might have been hijacked. To get back into your account, you'll need to reset your password.<br>Please do not share your pin details to anybody<br><br></td>
					</tr>
					<tr>
						<td>Thanks,<br />Support Team<br/></td>
					</tr>
				</table>
				</body>
				</html>";
	if($email!='') {
		if(phpMailerFunction($email, $subject, $message)) {
			return true;
		} else {
			return false;
		}
	}
}

function mailFundTransfer($email, $fullname, $amount, $closing_balance, $date) {
	$subject = "Fund transfer confirmation";
	$message = "<html>
				<body>
				<table border='0' cellpadding='5' cellspacing='5' width='100%'>
					<tr>
						<td>Dear ".$fullname.", <br><br>
							Balance has been credited to your account, below are the details<br><br>
							<hr>
							Added Date : ".$date."<br>
							<hr>
							Amount : Rs ".$amount."<br>
							<hr>
							Closing Balance : Rs ".$closing_balance."<br>
							<hr><br><br>
						</td>
					</tr>
					<tr>
						<td>Thanks,<br />Support Team<br/></td>
					</tr>
				</table>
				</body>
				</html>";
	if($email!='') {
		if(phpMailerFunction($email, $subject, $message)) {
			return true;
		} else {
			return false;
		}
	}
}
function sendbulkemail($email, $msg) {
	$subject = "Test Bulk Email";
	$message = "<html>
					<body>
						<table border='0' cellpadding='5' cellspacing='5' width='100%'>
							<tr>
								<td><img src='../images/icon.png'>  <br><br>
									".$msg."<br>
									<br><br>
								</td>
							</tr>
							<tr>
								<td>Thanks,<br />Support Team<br/></td>
							</tr>
						</table>
					</body>
				</html>";
	if($email!='') {
		if(phpMailerFunction($email, $subject, $message)) {
			return true;
		} else {
			return false;
		}
	}
}

?>
