
<div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH BÌNH LUẬN</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                <th></th>
                <th>ID</th>
                <th>NỘI DUNG</th>
                <th>NGƯỜI BÌNH LUẬN</th>
                <th>SẢN PHẨM</th>
                <th>NGÀY BÌNH LUẬN</th>
                <th></th>
            </tr>
            <?php
                foreach ($result as $key => $binhluan) {
                    extract($binhluan);
                    // var_dump($result);
                    // die;
                    $editAccout = "index.php?act=editAccout&id=".$id;
                    $deleteCmt = "index.php?act=deleteCmt&id=".$id;
                    $username = findOneNameUser($iduser);
                    $productName = findOneNameProduct($idpro);
                    echo '
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>'.($key+1).'</td>
                            <td>'.$noidung.'</td>
                            <td>'.$username['user'].'</td>
                            <td>'.$productName.'</td>
                            <td>'.$ngaybinhluan.'</td>
                            <td><a href="'.$deleteCmt.'"> <input type="button" value="Xóa"></a></td>
                        </tr>';
                }
            ?>  
           </table>
           </div>
           <div class="row mb10 ">
         <input class="mr20" type="button" value="CHỌN TẤT CẢ">
         <input  class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
<a href="index.php?act=addCate"> <input  class="mr20" type="button" value="NHẬP THÊM"></a>
           </div>
          </form>
         </div>
        </div>