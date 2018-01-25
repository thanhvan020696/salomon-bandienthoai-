     <!-- Bootstrap --> 
    <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
<div class="container">
	<h2>Cập nhật sản phẩm</h2>
	<?php
	include('connection.php');
	      if(isset($_GET['ma']))
			{
				
				$ma=$_GET['ma'];
				
					$sql="SELECT * FROM loaisanpham where lsp_ma='$ma'";
					$result2=mysqli_query($conn,$sql);
					$row=mysqli_fetch_array($result2);

			
			
			
			
	?>
	
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
					<div class="form-group">
						    <label for="txtTen" class="col-sm-2 control-label">Tên loại sản phẩm(*):  </label>
						
							<div class="col-sm-10">
							      <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên loại sản phẩm" value="<?php echo $row['lsp_ten'] ?>">
							</div>
					</div>
                    <div class="form-group">
						    <label for="txtMoTa" class="col-sm-2 control-label">Mô tả(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtMoTa" id="txtMoTa" class="form-control" placeholder="Mô tả" value="<?php echo $row['lsp_mota'] ?>">
							</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnCapNhat" id="btnCapNhat" value="Cập nhật"/>
                              <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" onclick="window.location='quanly_loaisanpham.php'" />                              	
						</div>
					</div>
				</form>
	</div>
	


	 <?php
			}
			else
				echo"<meta http-equiv='refresh' content='0;URL=?khoatrang=quanlyloaisanpham'/>";
			?>
	<?php   
	 if(isset($_POST['btnCapNhat']))
			{
				$tenloai=$_POST['txtTen'];
				$mota=$_POST['txtMoTa'];
				echo"$ma ";
				$sql="UPDATE  loaisanpham set lsp_ten='$tenloai', lsp_mota='$mota' where lsp_ma='$ma'";
				mysqli_query($conn,$sql);
				//echo"<script language='javascript'> window.location='index.php?khoatrang=quanlyloaisanpham'</script>";
				echo"<meta http-equiv='refresh' content='0;URL=index.php?khoatrang=quanlyloaisanpham'/>";
			}
		?>