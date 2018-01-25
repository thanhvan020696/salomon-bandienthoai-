     <!-- Bootstrap --> 
    <link rel="stylesheet" type="text/css" href="style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
    <script language="javascript">
	function deleteConfirm(){
		if(confirm("Bạn có chắc chắn muốn xóa!")){
			return true;
		}
		else{
			return false;
		}
	}
	
</script>
 <?php
 include_once('connection.php');
 if(isset($_GET['mahinh']))
 {
 	$mahinh=$_GET['mahinh'];
 	$result=mysqli_query($conn, "select *  from hinhsanpham where hsp_ma='$mahinh'");
 	$row=mysqli_fetch_array($result);
 	$hinhcanxoa=$row['hsp_tentaptin'];
     $masp=$row['sp_ma'];

     unlink("product-imgs/".$hinhcanxoa);
     mysqli_query($conn,"DELETE  FROM hinhsanpham where hsp_ma='$mahinh'");
     echo "<meta http-equiv='refresh' content='0;URL= ?khoatrang=quanlysanpham_hinhanh&ma=$masp'";
   
 }
  	if(isset($_POST['btnLuu']))	
  	{
  		$spma=$_POST['txtMa'];
  		$taptin=$_FILES['fileHinhAnh'];
  		if ($taptin['type']=="image/jpg"||$taptin['type']=="image/png"||$taptin['type']=="image/jpeg"||$taptin['type']=="image/gif")
  		 {
  			if ($taptin['size'] <= 61400)
  			 {
  				$tentaptin=$spma."_".$taptin['name'];
  			copy($taptin['tmp_name'],"product-imgs/".$tentaptin);
  			$result=mysqli_query($conn, "INSERT INTO hinhsanpham(hsp_tentaptin, sp_ma) values ('$tentaptin', '$spma')");
           if($result)
           	{
           		echo"up thanh cong";
         //  echo "<meta http-equiv='refresh' content='0; URL= quanly_sanpham_hinhanh.php'/>";}
  			}
  			else
  			{
  				echo " k thanh cong";
  				//echo "<meta http-equiv='refresh' content='0; URL= quanly_sanpham_hinhanh.php'/>";
  			}
  		}
      else
        echo"kich thuoc qua lon";
  		}
  		else 
         echo"khong dung dinh dang";



  	}
 ?>
 	<h2>Quản lý hình ảnh sản phẩm</h2>
 	<?php

 	if(isset($_GET['ma']))
 	{
 		$masp= $_GET['ma'];
 		$result=mysqli_query($conn, "SELECT * FROM sanpham Where sp_ma='$masp'");
 		$row= mysqli_fetch_array($result); 	
 	?>
		<div class="container">
			 	<form  id="frmHinhAnh" class="form-horizontal" name="frmHinhAnh" method="post" action="" enctype="multipart/form-data" role="form">
					<div class="form-group">
                        <label for="txtTen" class="col-sm-2 control-label">Mã sản phẩm(*):  </label>
						<div class="col-sm-10">
							<input type="text" name="txtMa" id="txtMa" class="form-control" placeholder="Mã sản phẩm" value='<?php echo $row['sp_ma'] ?>' readonly="readonly"/>
						</div>
            		</div>	
                    <div class="form-group">    
                        <label for="txtTen" class="col-sm-2 control-label">Tên sản phẩm(*):  </label>
						<div class="col-sm-10">
						     <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên loại sản phẩm" value='<?php echo $row['sp_ten'] ?>' readonly="readonly"/> 
						</div>
                    </div>    
                     <div class="form-group">    
                        <label for="" class="col-sm-2 control-label">Hình ảnh(*):  </label>
						<div class="col-sm-10">
							<input type="file" name="fileHinhAnh" id="fileHinhAnh" class="form-control"/>
                            <input type="submit"  class="btn btn-primary" name="btnLuu" id="btnLuu" value="Lưu hình ảnh"/>        
						</div>
                     </div>       
 
 <?php 
 $i=0;
 $result= mysqli_query($conn, "SELECT * from hinhsanpham where sp_ma='$masp'");
 while ($row= mysqli_fetch_array($result)) {
 	
$i++;
 ?>
                    <!--Danh sach hinh anh-->
                     <div class="col-sm-offset-2 col-sm-12">
						<div class="col-sm-1">
                        	<label class="control-label">STT</label>
                        </div>
                        <div class="col-sm-2">
                        	<label class="control-label">Hình ảnh</label>
                        </div>
                        <div class="col-sm-1">
                        	<label class="control-label">Xóa</label>
                        </div>
                    </div> <!-- <div class="col-sm-offset-2 col-sm-12">1 hang bang hinh anh-->
                   <!--Row du lieu-->
                   <?php
		  				
					?>
							<div class='col-sm-offset-2 col-sm-12'>
							  <div class='col-sm-1'>
								<?php echo$i ?>
								</div>
							  <div class='col-sm-2'>
								<img src="product-imgs/<?php echo $row['hsp_tentaptin'] ?>" width="100px"/>
							  </div>
							  <div class='col-sm-3'>
								  <a onclick="return deleteConfirm()" 
                                  href="?khoatrang=quanlysanpham_hinhanh&mahinh=<?php echo $row['hsp_ma'] ?>">
								  <img src='images/delete.png' border='0' /></a>
							  </div>
                              
							</div>
                            <div class='col-sm-offset-2 col-sm-4'>
                           		<div><hr /></div>
                           </div>
                          <?php
}}

		  				?>
				<!-- <div class="form-group"> -Danh sach hinh anh-->

                   <div class="col-sm-offset-2 col-sm-12">
                   		<div class="col-sm-1">
						     <a href="?khoatrang=quanlysanpham"> Đóng</a>
                        </div>
              		</div>
                    
				</form>
		</div><!--<div class="container">-->


