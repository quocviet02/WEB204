<div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH TÀI KHOẢN</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                <th></th>
                <th>MÃ</th>
                <th>TÊN ĐĂNG NHẬP</th>
                <th>MẬT KHẨU</th>
                <th>EMAIL</th>
                <th>ĐỊA CHỈ</th>
                <th>ĐIỆN THOẠI</th>
                <th>VAI TRÒ</th>
                <th></th>
            </tr>
            <?php
                foreach ($result as $key => $taikhoan) {
                    extract($taikhoan);
                    // var_dump($result);
                    // die;
                    $editAccout = "index.php?act=editAccout&id=".$id;
                    $deleteAccout = "index.php?act=deleteAccout&id=".$id;
                    echo '
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>'.($key+1).'</td>
                            <td>'.$user.'</td>
                            <td>'.$pass.'</td>
                            <td>'.$email.'</td>
                            <td>'.$address.'</td>
                            <td>'.$tel.'</td>
                            <td>'.($role == 1 ? "Người quản trị" : "Khách hàng").'</td>
                            <td><a href="'.$editAccout.'"><input type="button" value="Sửa"></a>  <a href="'.$deleteAccout.'"> <input type="button" value="Xóa"></a></td>
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