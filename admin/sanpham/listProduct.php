<div class="row2">
    <div class="row2 font_title">
        <h1>DANH SÁCH SẢN PHẨM</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=listProduct" method="POST">
            <div class="row2 mb10 formds_loai">
                <form action="" method="post">
                    <input type="text" name="kyw">
                    <select class="h" name="iddm" id="" >
                        <option value="0" selected>Tất cả</option>
                    <?php foreach ($resultCate as $key => $listCate) {
                        extract($listCate);
                        echo '<option value="'.$id.'">'.$name.'</option>';
                    }?>
                    
                </select>
                <input type="submit" name="listok" value="LỌC">
                </form>
                <table>
                    <tr>
                        <th></th>
                        <th>MÃ SẢN PHẨM</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>GIÁ SẢN PHẨM</th>
                        <th>HÌNH SẢN PHẨM</th>
                        <th>LƯỢT XEM SẢN PHẨM</th>
                        <th>MÔ TẢ SẢN PHẨM</th>
                        <img src="" alt="">
                        <th></th>
                    </tr>
                    <?php
                    foreach ($result as $key => $sanpham) {
                        extract($sanpham);
                        $hinh = "";
                        $editProduct = "index.php?act=updateProduct&id=" . $id;
                        $deleteProduct = "index.php?act=deleteProduct&id=" . $id;
                        $image = "../upload/".$img;
                        if (is_file($image)) {
                            $hinh = "<img src='".$image."' width='100px'>";
                        }
                        echo '
                        <tr>
                            <td><input type="checkbox" name="" id=""></td>
                            <td>' . ($key + 1) . '</td>
                            <td>' . $name . '</td>
                            <td>' . $price . '</td>
                            <td>' . $hinh . '</td>
                            <td>' . $luotxem . '</td>
                            <td>' . $mota . '</td>
                            <td><a href="' . $editProduct . '"><input type="button" value="Sửa"></a>  <a href="' . $deleteProduct . '"> <input type="button" value="Xóa"></a></td>
                        </tr>';
                    }
                    ?>
                </table>
            </div>
            <div class="row mb10 ">
                <input class="mr20" type="button" value="CHỌN TẤT CẢ">
                <input class="mr20" type="button" value="BỎ CHỌN TẤT CẢ">
                <a href="index.php?act=addProduct"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
            </div>
        </form>
    </div>
</div>
