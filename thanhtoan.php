<?php
include_once 'connection.php';
			  if(isset($_POST['btnCapNhat'])) 
			  	{
					//Kiểm tra dữ liệu trước khi thêm vào CSDL
					if($_POST['txtNoiGiaoHang']!="" && $_POST['txtNgayGiaoHang']!="" && $_POST['s1HinhThucThanhToan']!="0")
					{
						//lấy các thông tin
						$noigiao = $_POST['txtNoiGiaoHang'];
						$ngaygiao = $_POST['txtNgayGiaoHang'];
						$httt = $_POST['s1HinhThucThanhToan'];
						//tạo câu truy vấn và lưu đơn hàng vào CSDL
						$query = "INSERT INTO dondathang (dh_ngaylap, dh_ngaygiao, dh_noigiao, dh_trangthaithanhtoan, httt_ma, kh_tendangnhap) VALUES (now(),'".$ngaygiao."','".$noigiao."',0,".$httt.",'".$_SESSION['tendangnhap']."')";
						mysqli_query($conn,$query) or die(mysqli_error($conn));
						//Lấy mã moi vua them
						$dh_ma = mysqli_insert_id($conn);
						//Lấy từng sản phẩm trong giỏ hàng lưu vào CSDL
						foreach($_SESSION["giohang"] as $key => $row) {
							$query = "INSERT INTO sanpham_dondathang (sp_ma, dh_ma, sp_dh_soluong, sp_dh_dongia) VALUES (".$key.",".$dh_ma.",".$row['soluong'].",".$row['gia'].")";
							mysqli_query($conn,$query) or die(mysqli_error($conn));
							$queryupdatesoluong = "UPDATE sanpham SET sp_soluong=sp_soluong-".$row['soluong']." WHERE sp_ma=".$key;
							mysqli_query($conn,$queryupdatesoluong);
						}
						//Xóa giỏ hàng 
						unset($_SESSION["giohang"]);
						
						echo"<script>alert('Đơn hàng đã được ghi nhận roi do Chúng tôi sẽ sớm xác nhận và thanh toán với bạn');</script>";
						echo"<script>window.location='index.php';</script>";
					}
					
					else
					{
						echo"Vui lòng nhập đầy đủ thông tin nhakkkkkk";
					}
				}
				  
			  
?>

<?php
function bindHTTTList($conn){
	include 'connection.php';
	$query = "SELECT httt_ma, httt_ten FROM hinhthucthanhtoan";
	$result = mysqli_query($conn,$query);
	echo "<select name='s1HinhThucThanhToan'><option value='0'>Chọn hình thức thanh toán</option>";
	while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		echo"<option value='" . $row['httt_ma'] . "'>" . $row['httt_ten'] . "</option>";
	}
	echo "</select>";
}
?>
<div class="container">
<h1>Thanh toán giỏ hàng</h1>
<form id="form1" class="form-horizontal" name="form1" method="POST" action="">
	
    <div class="form-group">						    
        <label for="lblNoiGiaoHang" class="col-sm-2 control-label">Nơi giao hàng(*):  </label>
		<div class="col-sm-10">
		      <input type="text" name="txtNoiGiaoHang" id="txtNoiGiaoHang" class="form-control" placeholder="Nơi giao hàng" value=""/>
		</div>
   </div>     
   
   <div class="form-group">     
        <label for="lblNgayGiaoHang" class="col-sm-2 control-label">Ngày giao hàng(*):  </label>
		<div class="col-sm-10">	      
              <input name="txtNgayGiaoHang" id="txtNgayGiaoHang" type='date' class="form-control" />   
		</div>
   </div>
   
   <div class="form-group">           
        <label for="lblHinhThucThanhToan" class="col-sm-2 control-label">Hình thức thanh toán(*):  </label>
		<div class="col-sm-10">
		      <?php
			  bindHTTTList($conn);
			  ?>
		</div>
   </div>     
   
   <div class="form-group">      
   <div class="col-sm-2"></div>
        <div class="col-sm-10">
        	<input type="submit" name="btnCapNhat"  class="btn btn-primary" id="btnLobtnCapNhat" value="Cập nhật"/>
            <input name="btnBoQua" type="button" class="btn btn-primary" id="btnBoQua" value="Bỏ qua" onclick="window.location='?khoatrang=giohang'" />
        </div>
     </div>   
</form>
</div>

