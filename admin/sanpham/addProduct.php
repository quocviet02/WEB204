
<div class="row2">
    <div class="row2 font_title">
        <h1>THÊM MỚI SẢN PHẨM</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=addProduct" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 ">
                <label> Danh mục</label> <br>
                <select class="h" name="iddm" id="" >
                    <?php foreach ($result as $key => $listCate) {
                        extract($listCate);
                        echo '<option value="'.$id.'">'.$name.'</option>';
                    }?>
                    
                </select>
            </div>
            <div class="row2 mb10">
                <label>Tên sản phẩm </label> <br>
                <input type="text" name="tensp" placeholder="nhập vào tên">
            </div>
            <div class="row2 mb10">
                <label>Giá </label> <br>
                <input type="text" name="giasp" placeholder="nhập vào giá">
            </div>
            <div class="row2 mb10">
                <label>Hình ảnh</label> <br>
                <input type="file" name="hinhanhsp" >
            </div>
            <div class="row2 mb10">
                <label>Mô tả</label> <br>
                <textarea type="text" name="mota" placeholder="nhập vào mô tả"></textarea>
            </div>
            <div class="row mb10 ">
                <input class="mr20" type="submit" name="themmoi" value="THÊM MỚI">
                <input class="mr20" type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listProduct"><input class="mr20" type="button" value="DANH SÁCH"></a>
            </div>
            <?php
                if (isset($thongbao)&&($thongbao!=  "")) {
                    echo $thongbao;
                };
            ?>
        </form>
    </div>
</div>

<!-- END HEADER -->


</div>