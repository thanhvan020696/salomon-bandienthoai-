    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
        <form name="frmXoa" method="post" action="">
        <script type="text/javascript">
          function ask()
          {
            if(confirm("ARE U SURE"))
            {
              return true;
            }
            else
              return false;
          } 
        </script>
        <script src="js/jquery-3.2.0.min.js"/></script>
   <script src="js/jquery.dataTables.min.js"/></script>
   <script src="js/dataTables.bootstrap.min.js"/></script>
   <script>
     $(document).ready(function()
     { 
      var table = $('#tablesalomon').DataTable(
      {
        responsive: true,
        "language": {
          "lengthMenu": "Hiển thị _MENU_ dòng dữ liệu trên một trang",
           "info":" Hiển thị _START_ trong tổng số _TOTAL_ dòng dữuuuu liệu",
           "infoEmpty":"Dữ liệu rỗng",
           "emptyTable":"Chưa có dữ liệu nào",
           "processing":"Đang xử lý...", 
           "search":"Tìm kiếm",
           "loadingRecords":"Đang load dữ liệu",
          "zeroRecords":"không tìm thấy dữ liệu",
          "infoFiltered":"(Được từ tổng số _MAX_ dòng dữ liệu)",

          "paginate":
           {
            "first": "|<",
            "last": ">|",
            "next":">>",
            "previous":"<<"
         }
        },
        "lengthMenu": [[2, 5, 10, 15, 20, 25, 30, -1], [2, 5, 10, 15, 20, 25, 30, "all"]]


      });
      new $.fn.dataTable.FixedHeader( table );
     }
      );
   </script>
        <h1>Quản lý sản phẩm</h1>
        <?php
        include_once('connection.php');
        if(isset($_POST['btnXoa'] )&& isset($_POST['checkbox']))
            {
              for($i=0 ; $i< count($_POST['checkbox']); $i++ )
               {  
                    $masp=$_POST['checkbox'][$i];

                    mysqli_query($conn, "DELETE FROM sanpham Where sp_ma='$masp'");
                    echo"$masp";
                }
            }
        if(isset($_GET['ma']))
        {  $ma=$_GET['ma'];
          mysqli_query($conn, "DELETE FROM sanpham where sp_ma='$ma'");
        //  echo "<meta http-equiv='refresh' content='0; URL= quanly_sanpham.php'/>";
        }
        ?>
        <p>
        	<a href="?khoatrang=quanlysanpham_themmoi"><img src="images/add.png" alt="Thêm mới" width="16" height="16" border="0" /> Thêm mới</a>
        </p>
        <table id="tablesalomon" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>Chọn</strong></th>
                    <th><strong>Mã sản phẩm</strong></th>
                    <th><strong>Tên sản phẩm</strong></th>
                    <th><strong>Giá</strong></th>
                    <th><strong>Số lượng</strong></th>
                    <th><strong>Loại sản phẩm</strong></th>
                    <th><strong>Nhà sản xuất</strong></th>
                    <th><strong>Hình ảnh</strong></th>
                    <th><strong>Cập nhật</strong></th>
                    <th><strong>Xóa</strong></th>
                </tr>
             </thead>

			<tbody>
           <?php
           include_once('connection.php');
            $sql="SELECT * FROM sanpham a, nhasanxuat b, loaisanpham c WHERE a.lsp_ma=c.lsp_ma and b.nsx_ma=a.nsx_ma order by sp_ma desc" ;
            $result= mysqli_query($conn,$sql);

            while ($row=mysqli_fetch_array($result)) {
              
            $i=1;

            ?>
			<tr>
              <td><input type="checkbox" name="checkbox[]" value= "<?php echo $row['sp_ma']?>"></td>
              <td><?php echo $row['sp_ma']?></td>
              <td><?php echo $row['sp_ten']?></td>
              <td><?php echo $row['sp_gia']?></td>
              <td><?php echo $row['sp_soluong']?></td>
               <td><?php echo $row['lsp_ten']?></td>
              <td><?php echo $row['nsx_ten']?></td>   
             <td align='center' class='cotNutChucNang'>
            <a href="?khoatrang=quanlysanpham_hinhanh&ma=<?php echo $row['sp_ma']?>" > <img src='images/image_edit.png' border='0'  /> </a>
             </td>         
                <td align='center' class='cotNutChucNang'><a href="?khoatrang=quanlysanpham_capnhat&ma=<?php echo $row['sp_ma']?>" ><img src='images/edit.png' border='0'  /></a></td>
              <td align='center' class='cotNutChucNang'><a href="?khoatrang=quanlysanpham&ma=<?php echo $row['sp_ma']?>"onclick="return ask()"><img src='images/delete.png' border='0' />
              </td>
            </tr>
<?php } ?>
			</tbody>
        
        </table>  
        
        <div class="row" style="background-color:#FFF"> <!--Nút chức nang-->
            <div class="col-md-12">
              <input class="btn btn-primary" type="submit" name="btnXoa" id="btnXoa" value="Chọn Xóa"onclick='return deleteConfirm()'>
            </div>
        </div><!--Nút chức nang-->
 </form>
   