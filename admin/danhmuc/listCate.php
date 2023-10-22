<div class="row2">
         <div class="row2 font_title">
          <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
         </div>
         <div class="row2 form_content ">
          <form action="#" method="POST">
           <div class="row2 mb10 formds_loai">
           <table>
            <tr>
                <th></th>
                <th>MÃ LOẠI</th>
                <th>TÊN LOẠI</th>
                <th></th>
            </tr>
            <?php
                foreach ($result as $key => $danhmuc) {
                    extract($danhmuc);
                    $editCate = "index.php?act=updateCate&id=".$id;
                    $deleteCate = "index.php?act=deleteCate&id=".$id;
                    echo '
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>'.($key+1).'</td>
                            <td>'.$name.'</td>
                            <td><a href="'.$editCate.'"><input type="button" value="Sửa"></a>  <a href="'.$deleteCate.'"> <input type="button" value="Xóa"></a></td>
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