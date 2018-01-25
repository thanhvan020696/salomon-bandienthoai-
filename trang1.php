<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="trang2.php" method="get" accept-charset="utf-8">
	<input type="submit" name="btnghithongtin" value="Ghi Lai">
	<input type="submit" name="btnxoa" value="Xoa">
	<?php
	session_start();
	if(isset($_POST['btnghithongtin']))
	{
		$_SESSION['ten']='thanh van';
		$_SESSION['quyen']='quantri';
		$_SESSION['giohang']=array();
		$_SESSION['giohang']["3"]=array(
          "ten" =>"sámung",
          "gia" =>"123",
          "soluong" =>"2"
			);
		$_SESSION['giohang']["7"]=array(
          "ten" =>"oppo",
          "gia" =>"123565",
          "soluong" =>"24"
			);
		echo"da duoc luu";
	}
	else
	{
		session_destroy();
		echo"da xoa nhe";
	}
	?>
</form>
</body>
</html>