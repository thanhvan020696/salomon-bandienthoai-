<link rel="stylesheet" type="text/css" href="style.css"/>
<meta charset="utf-8" />
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/responsive.css">
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="js/jquery-3.2.0.min.js"/></script>
<script src="js/jquery.dataTables.min.js"/></script>
<script src="js/dataTables.bootstrap.min.js"/></script>
<script type="text/javascript">
 var RecaptchaOptions = {
    theme : 'white'
 };
 </script>
<div class="container">
        <h2>Đăng ký thành viên</h2>
        <?php
        include_once('connection.php');
        $api_url ='https://www.google.com/recaptcha/api/siteverify';
        $site_key='6LcBwj0UAAAAAB9XeeKN-hDf8MB2ZKIOcnry29Q7';
        $secret_key='6LcBwj0UAAAAAGSGygMqjhK8cRNkxKAVs5NnRCVX';
        if(isset($_POST['btnDangKy']))
        {
          $user=$_POST['txtTenDangNhap'];
          $mk1=$_POST['txtMatKhau1'];
          $mk2=$_POST['txtMatKhau2'];
          $hoten=$_POST['txtHoTen'];
          $email=$_POST['txtEmail'];
          $diachi=$_POST['txtDiaChi'];
           $sdt=$_POST['txtDienThoai'];
           if(isset($_POST['grpGioiTinh']))
           {
            $gt=$_POST['grpGioiTinh'];
           }
           $ngay=$_POST['slNgaySinh'];
            $thang=$_POST['slThangSinh'];
             $nam=$_POST['slNamSinh'];
          $loi="";
          $site_key_post= $_POST['g-recaptcha-response'];
          //lay ip cua khach
          if(!empty($_SERVER['HTTP_CLIENT_IP']))
          {
            $remoteip=$_SERVER['HTTP_CLIENT_IP'];
          }
          else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
          {
             $remoteip=$_SERVER['HTTP_X_FORWARDED_FOR'];
          }
          else
            $remoteip=$_SERVER['REMOTE_ADDR'];
          //tao link ket noi
          $api_url= $api_url.'?secret='.$secret_key.'&response='.$site_key_post.'&remoteip='.$remoteip;
          //lay ket qua tra ve tu google
          $response= file_get_contents($api_url);
          // du lieu tra ve dang json
          $response= json_decode($response);
          if(!($response->success))
          {
            $loi="capcha khong dung";
          }
          if($user==""||$mk1==""||$mk2==""||$hoten==""||$email==""||$diachi=="")
          {
            $loi.="vui lap nhap vao truong co *<br>";
          }
          if (!isset($gt)) {
            $loi.="chon gioi tinh<br>";
          }
          if($mk1!=$mk2)
              {
                $loi.="mat khau phai trung <br>";
              }
              if(strlen($mk1)<=5)
              {
                $loi.="mk nhiu hon 5<br>";
              }
              if(strpos($email, "@")===false)
              {
                $loi.="dia chi mail khong hop le<br>";
              }
              if($ngay=='0'||$thang=="0"||$nam=="0")
              {
                $loi.="nhap ngaythangnam <br>";
              }
              if($loi!="")
              {
                echo "<p style= color:red > $loi</p> ";
              } 
              else
                 {  include_once('sendmailLib.php');
                    $randomcode= md5(rand());
                   $sql1="SELECT * from khachhang where kh_tendangnhap='$user' or kh_email='$email'";
                   $result1=mysqli_query($conn,$sql1);
                   if($row=mysqli_num_rows($result1)==0)
                     {
                        $sql="INSERT INTO khachhang(kh_cmnd, kh_diachi, kh_dienthoai, kh_email, kh_gioitinh, kh_makichhoat ,kh_matkhau, kh_namsinh, kh_ngaysinh, kh_quantri, kh_ten, kh_tendangnhap, kh_thangsinh, kh_trangthai) VALUES('','$diachi','$sdt','$email','$gt','$randomcode','".md5($mk1)."','$nam','$ngay',0,'$hoten','$user','$thang',0)";
                         mysqli_query($conn,$sql);
                         
                         $noidungmail=" <p> chuc mung ban $hoten da dang ky thanh cong tai website salomon</p>". "<p>vui long nhap vao link sao de kich hoat: 
                         <a href='http://localhost/salomon9/index.php?khoatrang=kichhoat&taikhoan=$user&ma=$randomcode'> http://localhost/salomon9/kichhoat.php?taikhoan=$user&ma=$randomcode</a>
                         </p>";
                         sendGMail("testmailweb02@gmail.com","web02#cusc","ban quan tri salomon",array(array($email, $hoten)), array(array("testmailweb02@gmail.com","ban quan tri salomon")),"mail kich hoat tai khoan salonmon", $noidungmail);
                         echo"<script language='javascrip'window.location='index.php'</scrip>";
                    } 
                    else
                      echo"<p style= color:red> email hoac ten dang nhap da ton tai</p>";
                 
               }

        }
        ?>

			 	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
					<div class="form-group">
						    
                            <label for="txtTen" class="col-sm-2 control-label">Tên tài khoản(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtTenDangNhap" id="txtTenDangNhap" class="form-control" placeholder="Tên đăng nhập" value=""/>
							</div>
                      </div>  
                      
                       <div class="form-group">   
                            <label for="" class="col-sm-2 control-label">Mật khẩu(*):  </label>
							<div class="col-sm-10">
							      <input type="password" name="txtMatKhau1" id="txtMatKhau1" class="form-control" placeholder="Mật khẩu"/>
							</div>
                       </div>     
                       
                       <div class="form-group"> 
                            <label for="" class="col-sm-2 control-label">Nhập lại mật khẩu(*):  </label>
							<div class="col-sm-10">
							      <input type="password" name="txtMatKhau2" id="txtMatKhau2" class="form-control" placeholder="Xác nhận mật khẩu"/>
							</div>
                       </div>     
                       
                       <div class="form-group">                               
                            <label for="lblHoten" class="col-sm-2 control-label">Họ tên(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtHoTen" id="txtHoTen" value="" class="form-control" placeholder="Họ tên"/>
							</div>
                       </div> 
                       
                       <div class="form-group">      
                            <label for="lblEmail" class="col-sm-2 control-label">Email(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtEmail" id="txtEmail" value="" class="form-control" placeholder="Email"/>
							</div>
                       </div>  
                       
                        <div class="form-group">   
                             <label for="lblDiaChi" class="col-sm-2 control-label">Địa chỉ(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtDiaChi" id="txtDiaChi" value="" class="form-control" placeholder="Địa chỉ"/>
							</div>
                        </div>  
                        
                         <div class="form-group">  
                            <label for="lblDienThoai" class="col-sm-2 control-label">Điện thoại(*):  </label>
							<div class="col-sm-10">
							      <input type="text" name="txtDienThoai" id="txtDienThoai" value="" class="form-control" placeholder="Điện thoại" />
							</div>
                         </div> 
                         
                          <div class="form-group">  
                            <label for="lblGioiTinh" class="col-sm-2 control-label">Giới tính(*):  </label>
							<div class="col-sm-10">                              
                                      <label class="radio-inline"><input type="radio" name="grpGioiTinh" value="0" id="grpGioiTinh"  />Nam</label>
                 
                                      <label class="radio-inline"><input type="radio" name="grpGioiTinh" value="1" id="grpGioiTinh"  />

                                      Nữ</label>

							</div>
                          </div> 
                          
                          <div class="form-group"> 
                            <label for="lblNgaySinh" class="col-sm-2 control-label">Ngày sinh(*):  </label>
                            <div class="col-sm-10 input-group">
                                <span class="input-group-btn">
                                  <select name="slNgaySinh" id="slNgaySinh" class="form-control" >
                						<option value="0">Chọn ngày</option>
										<?php
                                            for($i=1;$i<=31;$i++)
                                             {
                                                 if($i==$ngaysinh){
                                                     echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
                                                 }
                                                 else{
                                                 echo "<option value='".$i."'>".$i."</option>";
                                                 }
                                             }
                                        ?>
                				 </select>
                                </span>
                                <span class="input-group-btn">
                                  <select name="slThangSinh" id="slThangSinh" class="form-control">
                					<option value="0">Chọn tháng</option>
									<?php
                                        for($i=1;$i<=12;$i++)
                                         {
                                              if($i==$thangsinh){
                                                 echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
                                             }
                                             else{
                                             echo "<option value='".$i."'>".$i."</option>";
                                             }
                                         }
                                    ?>
                				</select>
                                </span>
                                <span class="input-group-btn">
                                  <select name="slNamSinh" id="slNamSinh" class="form-control">
                                    <option value="0">Chọn năm</option>
                                    <?php
                                        for($i=1970;$i<=2010;$i++)
                                         {
                                             if($i==$namsinh){
                                                 echo "<option value='".$i."' selected=\"selected\">".$i."</option>";
                                             }
                                             else{
                                             echo "<option value='".$i."'>".$i."</option>";
                                             }
                                         }
                                    ?>
                                </select>
                                </span>
                           </div>
                      </div>	
                      <div class="form-group">   
                            <label for="" class="col-sm-2 control-label">Ma An Toan(*):  </label>
              <div class="col-sm-10">
                    <div class="g-recaptcha" data-sitekey="<?php echo $site_key?>"></div>
              </div>
                       </div> 
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
						      <input type="submit"  class="btn btn-primary" name="btnDangKy" id="btnDangKy" value="Đăng ký"/>
                              	
						</div>
                     </div>
				</form>
</div>
    

