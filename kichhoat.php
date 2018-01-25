<?php
if(isset($_GET["taikhoan"]) && isset($_GET["ma"]) )
{
	$taikhoan=$_GET['taikhoan'];
	$ma=$_GET['ma'];
	$result= mysqli_query($conn, "SELECT * from khachhang where kh_tendangnhap='$taikhoan' and kh_makichhoat='$ma'");
	echo"$ma";
	if(mysqli_num_rows($result)>0)
	{
		mysqli_query($conn, "UPDATE khachhang set kh_trangthai=1 where kh_tendangnhap='$taikhoan'");
		echo"dk thanh cong";
	}
	else
		echo"ma khong dung";
}
?>