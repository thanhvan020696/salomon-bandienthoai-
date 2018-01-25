     <!-- Bootstrap --> 
    <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">

<div class="container">
	<h2>Thêm loại sản phẩm</h2>
<?php	
	include_once('connection.php');
	if(isset($_POST['btnThemMoi']))
	{
		$tenloai=$_POST['txtTen'];
		$mota=$_POST['txtMoTa'];
		$result=mysqli_query($conn, "SELECT * from loaisanpham where lsp_ten='$tenloai'");
		if(mysqli_num_rows($result)==0)
		{
			$sql2="INSERT INTO loaisanpham(lsp_ten, lsp_mota) VALUES('$tenloai','$mota')";
			mysqli_query($conn,$sql2);
			echo"<meta http-equiv='refresh' content='0;URL=?khoatrang=quanlyloaisanpham'/>";
		}
		else
			echo"ten loai da ton tai";
	}
?>

			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
					<div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Tên loại sản phẩm(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên loại sản phẩm" value='<?php ?>'>
							</div>
					</div>
                    
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Mô tả(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtMoTa" id="txtMoTa" class="form-control" placeholder="Mô tả" value='<?php ?>'>
							</div>
					</div>
                    
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnThemMoi" id="btnThemMoi" value="Thêm mới"/>
                              <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" onclick="window.location='?khoatrang=quanlyloaisanpham'" />
                              	
						</div>
					</div>
				</form>
	</div>