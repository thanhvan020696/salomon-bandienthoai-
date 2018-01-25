<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/responsive.css">
<script src="js/jquery-3.2.0.min.js"/></script>
<script src="js/jquery.dataTables.min.js"/></script>
<script src="js/dataTables.bootstrap.min.js"/></script>

<h1>Đăng nhập</h1>
<?php
if(isset($_POST['btnLogin']))
{
    $user=$_POST['txtTenDangNhap'];
    $mk=$_POST['txtMatKhau'];
    $loi="";
    
    if($user=="" || $mk=="")
    {
        $loi.="khong duoc de rong <br>";
    }

    
    if($loi !="")
    {
        echo "$loi";
    }
    else

    {   include_once('connection.php');
        $mk=md5($mk);
        $sql="SELECT * FROM khachhang WHERE kh_tendangnhap='$user' and kh_matkhau='$mk' ";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)==1)
        {
           $row=mysqli_fetch_array($result);
           $_SESSION["tendangnhap"]=$user;
           $_SESSION["quantri"]=$row["kh_quantri"];
           
          echo "<meta http-equiv='refresh' content='0; URL=index.php'/>";

        }
        else
            echo"ton tai tai khoan nay";
    }
}
?>
<form id="form1" name="form1" method="POST" action="">
	<div class="row">
    <div class="form-group">
						    
        <label for="txtTenDangNhap" class="col-sm-2 control-label">Tài khoản(*):  </label>
		<div class="col-sm-10">
		      <input type="text" name="txtTenDangNhap" id="txtTenDangNhap" class="form-control" placeholder="Tên đăng nhập" value=""/>
		</div>
      </div>  
      
        <div class="form-group">
        <label for="txtMatKhau" class="col-sm-2 control-label">Mật khẩu(*):  </label>
		<div class="col-sm-10">
		      <input type="password" name="txtMatKhau" id="txtMatKhau" class="form-control" placeholder="Mật khẩu" value=""/>
		</div>
         </div> 
         
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
        	<input type="submit" name="btnLogin"  class="btn btn-primary" id="btnLogin" value="Đăng nhập"/>
            <label><input name="chkRemember" type="checkbox" id="chkRemember" value="1" class="checkbox-inline" /> Ghi nhớ đăng nhập</label>
        </div>
        
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
        	<p><a href="#" >Quên mật khẩu?</a>	
        </div>
        
   
 </div>
    
</form>
   