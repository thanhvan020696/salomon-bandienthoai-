    <!-- Bootstrap --> 
    <link rel="stylesheet" type="text/css" href="../code/style.css"/>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-3.2.0.min.js"/></script>
   <script src="js/jquery.dataTables.min.js"/></script>
   <script src="js/dataTables.bootstrap.min.js"/></script>
   <script language="javascript">
     $(document).ready(function()
     { 
      var table = $('#tablesalomon').DataTable(
      {
        responsive: true,
        "language": {
          "lengthMenu": "Hiển thị _MENU_ dòng dữ liệu trên một trang",
           "info":" Hiển thị _START_ trong tổng số _TOTAL_ dòng dữ liệu",
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
  <script >
    function deleteConfirm()
    {
        if(confirm("are U sure??"))
        {
          return true;
        }
        else
        {
          return false;
        }
    }
  </script>
        <form name="frmXoa" method="post" action="">
        <h1>Danh sách loại sản phẩm</h1>
        <?php 
            include_once('connection.php');
            if(isset($_POST['btnXoa'] )&& isset($_POST['checkbox']))
            {
              for($i=0 ; $i< count($_POST['checkbox']); $i++ )
               {  echo$_POST['checkbox'][$i];
                    $maloai=$_POST['checkbox'][$i];
                    mysqli_query($conn, "DELETE FROM loaisanpham WHere lsp_ma='$maloai'");
                }
            }
            if(isset($_GET['ma']))
                { 
                  $ma=$_GET['ma'];
                  mysqli_query($conn,"DELETE from loaisanpham where lsp_ma=$ma");
                }
        ?>
        <p>
        <a href="?khoatrang=quanlyloaisanpham_themmoi" ><img src="images/add.png" alt="Thêm mới" width="16" height="16" border="0" ></a> Thêm mới
        </p>
        <table id="tablesalomon" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>

                    <th><strong>Chọn</strong></th>
                    <th><strong>Số thứ tự</strong></th>
                    <th><strong>Tên loại sản phẩm</strong></th>
                     <th><strong>Mô tả</strong></th>
                    <th><strong>Cập nhật</strong></th>
                    <th><strong>Xóa</strong></th>
                </tr>
             </thead>

			<tbody>
      <?php 
      include_once('connection.php');
      $sql="SELECT * FROM loaisanpham ";
      $result= mysqli_query($conn,$sql);
      $i=0;
      while ($row=mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $i=$i+1;
      
      ?>

			<tr>    
              <td ><input type="checkbox" name="checkbox[]" id="checkbox[]" value="<?php echo $row['lsp_ma'] ?>"> </td>
              <td><?php echo $i  ?></td>
              <td><?php echo $row['lsp_ten']  ?></td>
              <td><?php echo $row['lsp_mota']  ?></td>
             
              <td align='center' class='cotNutChucNang'><a href="?khoatrang=quanlyloaisanpham_capnhat&ma=<?php echo $row['lsp_ma']?> "><img src='images/edit.png' border='0' /></a></td>
              <td align='center' class='cotNutChucNang'><a href="?khoatrang=quanlyloaisanpham&ma=<?php echo $row['lsp_ma']?>" onclick="return deleteConfirm()" > <img src='images/delete.png' border='0' /> </a></td>
            </tr>
          <?php 

          } ?>
			</tbody>
        
        </table>  
        
        
        <!--Nút Thêm mới , xóa tất cả
        -->

        <div class="row" style="background-color:#FFF"> <!--Nút chức nang-->
            <div class="col-md-12">
            	<input class="btn btn-primary" type="submit" name="btnXoa" id="btnXoa" value="Chọn Xóa"onclick='return deleteConfirm()'>
            </div>
        </div><!--Nút chức nang-->
 </form>
   