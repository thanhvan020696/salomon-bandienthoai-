<!DOCTYPE html>
<?php

 
  session_start();
include_once("connection.php");
if(!isset($_SESSION["giohang"])){
      $_SESSION["giohang"] = array();
  }
?>



<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salomon - Siêu thị điện máy</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    
    <!-- Tao menu cap -->
    <link href="csseshop/bootstrap.min.css" rel="stylesheet">
    <link href="csseshop/font-awesome.min.css" rel="stylesheet">
    <link href="csseshop/prettyPhoto.css" rel="stylesheet">
    <link href="csseshop/price-range.css" rel="stylesheet">
    <link href="csseshop/animate.css" rel="stylesheet">
	<link href="csseshop/main.css" rel="stylesheet">
	<link href="csseshop/responsive.css" rel="stylesheet">
    
    <link href="css/salomon.css" rel="stylesheet">
    
<!--datatable-->
	<script src="js/jquery-3.2.0.min.js"/></script>
    <script src="js/jquery.dataTables.min.js"/></script>
    <script src="js/dataTables.bootstrap.min.js"/></script>
    
  </head>
  <body>
  
  <?php
include_once("connection.php");
?>

   <header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +84 7103 777 777</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> admin@salomon.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle" style="background-color:#069"><!--header-middle-->
			<div class="container" >
				<div>
					<div class="col-sm-6" >
						<div class="logo pull-left" >
							<a href="index.php" style="background-color:#069;color:#FFF">SALOMON <img src="images/logo.png"></a>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav" >
								<li ><a href="#" style="background-color:#069;color:#FFF"><i class="fa fa-user"></i> Tài khoản</a></li>
                                <li><a href="?khoatrang=giohang" style="background-color:#069;color:#FFF"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li> 
                                <?php
                                if(isset($_SESSION["tendangnhap"]) && $_SESSION["tendangnhap"] !="")
                                {
                                ?>
                                <li ><a href="?khoatrang=capnhatkhachhang" style="background-color:#069;color:#FFF"><i class="fa fa-lock"></i>chao <?php echo $_SESSION['tendangnhap']?> </a></li>
                                <li ><a href="?khoatrang=dangxuat" style="background-color:#069;color:#FFF"><i class="fa fa-lock"></i>Đăng xuat</a></li>
                                <?php
                            }
                            else
                            {
                                ?>
                                <li ><a href="?khoatrang=dangnhap" style="background-color:#069;color:#FFF"><i class="fa fa-lock"></i>Đăng nhập</a></li>
                                      <li><a href="?khoatrang=dangky" style="background-color:#069;color:#FFF"><i class="fa fa-star"></i>Đăng ký</a></li>
                                      <?php
                                      }
                                      ?>
                        
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php" class="active">Trang chủ</a></li>
								<li class="dropdown"><a href="#">Giới thiệu<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="">Lịch sử hình thành</a></li>
										<li><a href="">Hệ thống chi nhánh</a></li> 
										<li><a href="">Hình thức thanh toán</a></li> 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Quản lý danh mục<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="?khoatrang=quanlyloaisanpham">Loại sản phẩm</a></li>
										<li><a href="?khoatrang=quanlysanpham">Sản phẩm</a></li>
                                    </ul>
                                </li> 
								<li><a href="?khoatrang=giohang">Giỏ hàng</a></li>
                                <li><a href="?khoatrang=gopy">Góp ý</a></li>
								<li><a href="">Liên hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Tìm kiếm"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
  
    <?php
	if(isset($_GET['khoatrang']))
    {
         $khoatrang=$_GET['khoatrang'];
        if($khoatrang=='quanlyloaisanpham')
            include_once('quanly_loaisanpham.php');
        if($khoatrang=='quanlyloaisanpham_themmoi')
            include_once('quanly_loaisanpham_themmoi.php');
        if($khoatrang=='quanlyloaisanpham_capnhat')
            include_once('quanly_loaisanpham_capnhat.php');

        if($khoatrang=='quanlysanpham')
            include_once('quanly_sanpham.php');
        if($khoatrang=='quanlysanpham_capnhat')
            include_once('quanly_sanpham_capnhat.php');
        if($khoatrang=='quanlysanpham_themmoi')
            include_once('quanly_sanpham_themmoi.php');
        if($khoatrang=='quanlysanpham_hinhanh')
            include_once('quanly_sanpham_hinhanh.php');
          if($khoatrang=='dangnhap')
            include_once('dangnhap.php');
         if($khoatrang=='dangxuat')
            include_once('dangxuat.php');
         if($khoatrang=='dangky')
            include_once('dangky3.php');
        if($khoatrang=='capnhatkhachhang')
            include_once('capnhatkhachhang.php');
        if($khoatrang=='kichhoat')
            include_once('kichhoat.php');
        elseif($khoatrang=="quanly_chitietsanpham")
            include_once("quanly_chitietsanpham.php");
        //if($khoatrang=='danhsachloaisanpham')
          //  include_once('noidungtrangchu.php');
        if($khoatrang=='timkiem')
            include_once('timkiem.php');
        if($khoatrang=='giohang')
            include_once('giohang.php');
        if($khoatrang=='thanhtoan')
            include_once('thanhtoan.php');
    }
    else
        include_once('noidungtrangchu.php');
	?>
      
    
    <div class="footer-top-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="footer-about-us">
                        <h2>S<span>alomon</span></h2>
                        <p>Siêu thị điện máy Salomon là một trong những siêu thị điện máy phát triển nhanh và ổn định bất chấp tình hình kinh tế thuận lợi hay khó khăn. Chuỗi siêu thị Salomon được thành lập từ 2004 chuyên bán lẻ các sản phẩm kỹ thuật số di động bao gồm điện thoại di động, máy tính bảng, laptop và phụ kiện với hơn 1000 siêu thị tại 63 tỉnh thành trên khắp Việt Nam.</p>
                        <div class="footer-social">
                            <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Người dùng </h2>
                        <ul>
                            <li><a href="#">Tài khoản</a></li>
                            <li><a href="#">Hóa đơn</a></li>
                            <li><a href="#">Sở thích</a></li>
                            <li><a href="#">Nhà cung cấp</a></li>
                            <li><a href="#">Thông tin khác</a></li>
                        </ul>                        
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-menu">
                        <h2 class="footer-wid-title">Phân loại</h2>
                        <?php 
                        include_once('connection.php');
                        $result=mysqli_query($conn, "SELECT * from loaisanpham where (select count(*) from sanpham where sanpham.lsp_ma=loaisanpham.lsp_ma) > 0");
                        while($row=mysqli_fetch_array($result))
                        {
                        ?>
                        <ul>
                            <li><a href="?khoatrang=danhsachloaisanpham&maloai='<?Php echo $row['lsp_ma']?>'"><?Php echo $row['lsp_ten']?></a></li>
                            
                        </ul>   
                        <?php }?>                     
                    </div>
                </div>
                
                <div class="col-md-3 col-sm-6">
                    <div class="footer-newsletter">
                        <h2 class="footer-wid-title">Bản tin</h2>
                        <p>Đăng ký nhận bản tin của chúng tôi và nhận được các hợp đồng độc quyền của chúng tôi.</p>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="email" placeholder="Nhập địa chỉ email">
                                <input type="submit" value="Đăng ký">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer top area -->
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2017 Salomon. Bản quyền thuộc CUSC. <a href="http://www.cusc.vn" target="_blank">cusc.vn</a></p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="footer-card-icon">
                        <i class="fa fa-cc-discover"></i>
                        <i class="fa fa-cc-mastercard"></i>
                        <i class="fa fa-cc-paypal"></i>
                        <i class="fa fa-cc-visa"></i>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
    
    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
	<script type="text/javascript" src="js/script.slider.js"></script>
    
    <!--data table - dat dung vi tri nay-->
    <script src="js/jquery.dataTables.min.js"/></script>
    <script src="js/dataTables.bootstrap.min.js"/></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.bootstrap.min.css"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css"></script>
    
    
  </body>
</html>