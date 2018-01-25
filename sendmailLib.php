<?php
require_once('PHPMailer/class.phpmailer.php');
function sendGMail($username, $password, $name, $addresses, $replyTos, $subject, $content)
{
	$mail= new PHPMailer(true);
	$mail->IsSMTP(); // thiet lap mailer de su dung SMTP
	$mail->SMTPDebug =0;
	$mail->SMTPAuth= true; //bat chung thuc SMTP
	$mail->SMTPSecure="ssl";
	$mail->Host="smtp.gmail.com";// chỉ định server chính
	$mail->Port="465";// thiet lap cổng
	$mail->Username= $username; //dia chi mail của nguoi goi
	$mail->Password=$password;// pass của ng gửi
	foreach($addresses as $address)
	{
		$mail->AddAddress($address[0],$address[1]);// dia chỉ ng nhận- tạo mảng nhìu ng nhận
	} //dia chi nguoi nhan
	foreach($replyTos as $replyTo)
		{
		$mail->AddReplyTo($replyTo[0], $replyTo[1]); // mail dc reple cho ai, tạo  mảng nhìu ng đc reply
	}
	$mail->SetFrom($username, $name);// tu nguoi goi, ten nguoi goi
	$mail->Subject =$subject;
	$mail->MsgHTML($content);
	$mail->Charset='UTF-8';
	$mail->Send();
}
?>