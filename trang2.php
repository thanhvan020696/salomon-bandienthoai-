<?php 
session_start();
if(isset($_SESSION["ten"]))
{
	echo "xin chao $_SESSION['ten'] <br>";
	if($_SESSION["quyen"]=="quantri")
		echo"ban la quan tri";
	else echo"ban rat binh thuong";
}
else
echo"chua dang nhap nhe";


?>