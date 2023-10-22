<div class="row2">
    <div class="row2 font_title">
        <h1>THÊM MỚI LOẠI HÀNG HÓA</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=addCate" method="POST">
            <div class="row2 mb10 form_content_container">
                <label> Mã loại </label> <br>
                <input type="text" name="maloai" placeholder="nhập vào mã loại">
            </div>
            <div class="row2 mb10">
                <label>Tên loại </label> <br>
                <input type="text" name="tenloai" placeholder="nhập vào tên">
            </div>
            <div class="row mb10 ">
                <input class="mr20" type="submit" name="themmoi" value="THÊM MỚI">
                <input class="mr20" type="reset" value="NHẬP LẠI">
                <a href="index.php?act=listCate"><input class="mr20" type="button" value="DANH SÁCH"></a>
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