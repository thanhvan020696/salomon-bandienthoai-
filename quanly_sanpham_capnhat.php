    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

<div class="container">
	<h2>Cập nhật sản phẩm</h2>
		<?php 
      include_once('connection.php');
      function LSPList($conn, $maloai)
      {
        $sql2="SELECT lsp_ma, lsp_ten from loaisanpham";
        $result2= mysqli_query($conn, $sql2);
        echo " <select name='loaisp' >
          <option value='0'>chon nha san xuat</option>";
          while ($row=mysqli_fetch_array($result2)) {
            if($row['lsp_ma']==$maloai)
            echo"<option value='".$row['lsp_ma']."' selected>". $row['lsp_ten']."</option>";
          else
             echo"<option value='".$row['lsp_ma']."' >". $row['lsp_ten']."</option>";
          }
        
       echo " </select> ";
      }
    
     function NSXList($conn, $mansx)
      {
        $sql2="SELECT nsx_ma, nsx_ten from nhasanxuat";
        $result2= mysqli_query($conn, $sql2);
        echo " <select name='nhasx' >
          <option value='0'>chon nha san xuat</option>";
          while ($row=mysqli_fetch_array($result2)) {
            if($row['nsx_ma']==$mansx)
            echo"<option value='".$row['nsx_ma']."' selected>". $row['nsx_ten']."</option>";
          else
             echo"<option value='".$row['nsx_ma']."' >". $row['nsx_ten']."</option>";
          }
        
       echo " </select> ";
      }
    
   ?>
   <?php
   if(isset($_GET['ma']))
   { 
    $ma=$_GET['ma'];
   $sql2=" SELECT * from sanpham where sp_ma='$ma'";
   $result= mysqli_query($conn, $sql2);
   $row= mysqli_fetch_array($result);
   $tensp=$row['sp_ten'];
          $motangan=$row['sp_mota_ngan'];
          $motachitiet=$row['sp_mota_chitiet'];
           $gia=$row['sp_gia'];
            $soluong=$row['sp_soluong'];
             $loai=$row['lsp_ma'];
           $nsx=$row['nsx_ma'];
   }
   ?>
   <?php
   if(isset($_POST['btnCapNhat']))
        {
          $tensp=$_POST['txtTen'];
          $motangan=$_POST['txtMoTaNgan'];
          $motachitiet=$_POST['txtMoTaChiTiet'];
           $gia=$_POST['txtGia'];
            $soluong=$_POST['txtSoLuong'];
             $loai=$_POST['loaisp'];
           $nsx=$_POST['nhasx'];
           if(trim($tensp)=="")
           {
            echo"nhap ten";
           }
           if(!is_numeric($gia))
           {
            echo"nhap gia";

           }
           if(!is_numeric($soluong))
           {
            echo"nhap sl";
            
           }
           if($loai=="0")
           {
            echo"nhap loai";
           }
           if($nsx=="0")
           {
            echo"nhap nxs";
           }
           else
           {
            $sql3=" UPDATE sanpham SET sp_ten='$tensp', sp_mota_ngan='$motangan', sp_mota_chitiet='$motachitiet', sp_gia='$gia', sp_soluong='$soluong', lsp_ma='$loai', nsx_ma='$nsx', sp_ngaycapnhat='".date('Y-m-d H:i:s')."' where sp_ma='$ma'";
            mysqli_query($conn,$sql3);
            echo"<meta http-equiv='refresh' content='0;URL=?khoatrang=quanlysanpham'/>";
           }
        }
   ?>

		
			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
					<div class="form-group">
						    
                            <label for="txtTen" class="col-sm-2 control-label">Tên sản phẩm(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtTen" id="txtTen" class="form-control" placeholder="Tên sản phẩm" value='<?php echo$tensp ?>'/>
							</div>
                      </div>   
                      <div class="form-group">   
                             <label for="" class="col-sm-2 control-label">Loại sản phẩm(*):  </label>
							<div class="col-sm-10">
							      <?php
                        LSPList($conn, $loai);
                    ?>
							</div>
                        </div>
                        
                        <div class="form-group">   
                            <label for="" class="col-sm-2 control-label">Hãng sản xuất(*):  </label>
							<div class="col-sm-10">
							      <?php NSXList($conn, $nsx); ?>
							</div>
                          </div>   
                          
                          <div class="form-group">  
                            <label for="lblGia" class="col-sm-2 control-label">Giá(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtGia" id="txtGia" class="form-control" placeholder="Giá" value='<?php echo$gia ?>'/>
							</div>
                            </div>   
                            
                            <div class="form-group">   
                            <label for="lblMoTa_Ngan" class="col-sm-2 control-label">Mô tả ngắn(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtMoTaNgan" id="txtMoTaNgan" class="form-control" placeholder="Mô tả ngắn" value='<?php echo$motangan ?>'/>
							</div>
                            </div>
                            
                             <div class="form-group">  
                            <label for="lblMoTaChiTiet" class="col-sm-2 control-label">Mô tả chi tiết(*):  </label>
							<div class="col-sm-10">
							      <textarea name="txtMoTaChiTiet" rows="4" class="ckeditor"><?php echo$motachitiet ?></textarea>
              <script language="javascript">
                                        CKEDITOR.replace( 'txtMoTaChiTiet',
                                        {
                                            skin : 'kama',
                                            extraPlugins : 'uicolor',
                                            uiColor: '#eeeeee',
                                            toolbar : [ ['Source','DocProps','-','Save','NewPage','Preview','-','Templates'],
                                                ['Cut','Copy','Paste','PasteText','PasteWord','-','Print','SpellCheck'],
                                                ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
                                                ['Form','Checkbox','Radio','TextField','Textarea','Select','Button','ImageButton','HiddenField'],
                                                ['Bold','Italic','Underline','StrikeThrough','-','Subscript','Superscript'],
                                                ['OrderedList','UnorderedList','-','Outdent','Indent','Blockquote'],
                                                ['JustifyLeft','JustifyCenter','JustifyRight','JustifyFull'],
                                                ['Link','Unlink','Anchor', 'NumberedList','BulletedList','-','Outdent','Indent'],
                                                ['Image','Flash','Table','Rule','Smiley','SpecialChar'],
                                                ['Style','FontFormat','FontName','FontSize'],
                                                ['TextColor','BGColor'],[ 'UIColor' ] ]
                                        });
										
                                    </script> 
                                  
							</div>
                            </div>
                            
                            <div class="form-group">  
                            <label for="lblSoLuong" class="col-sm-2 control-label">Số lượng(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtSoLuong" id="txtSoLuong" maxlength="10" id="txtGia" class="form-control" placeholder="Số lượng" value='<?php echo$soluong ?>'/>
							</div>
                            </div>
                            
                            
                            
					
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnCapNhat" id="btnCapNhat" value="Cập nhật"/>
                  <input type="button" class="btn btn-primary" name="btnBoQua"  id="btnBoQua" value="Bỏ qua" onclick="window.location='?khoatrang=quanlysanpham'" />
                              	
						</div>
					</div>
				</form>
		</div>


<script type="text/javascript" src="scripts/ckeditor/ckeditor.js"></script>