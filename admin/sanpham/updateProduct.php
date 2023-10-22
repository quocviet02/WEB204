<?php
   if(isset($sanpham) && is_array($sanpham)){
    extract($sanpham);
    $image = "../upload/".$img;
    if (is_file($image)) {
        $hinh = "<img src='".$image."' width='100px'>";
    }
};

?>
<div class="row2">
    <div class="row2 font_title">
        <h1>CẬP NHẬT SẢN PHẨM</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=updateProductFinal" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 form_content_container">
            <select name="iddm" id="" >
                        <option value="0" selected>Tất cả</option>
                    <?php foreach ($resultCate as $key => $listCate) {
                        extract($listCate);
                        if ($iddm==$id) {
                            echo '<option value="'.$id.'" selected>'.$name.'</option>';
                        }else{
                            echo '<option value="'.$id.'" >'.$name.'</option>';
                        }

                    } ?>
                </select>
                
            </div>
            <div class="row2 mb10">
                <label>Tên sản phẩm </label> <br>
                <?php $name = $sanpham["name"];?>
                <input type="text" name="tensp" placeholder="nhập vào tên" value="<?=$name?>">
            </div>
            <div class="row2 mb10">
                <label>Giá </label> <br>
                <input type="text" name="giasp" placeholder="nhập vào giá" value="<?=$price?>">
            </div>
            <div class="row2 mb10">
                <label>Hình ảnh</label> <br>
                <input type="file" name="hinhanhsp">
                <?=$hinh?>
            </div>
            <div class="row2 mb10">
                <label>Mô tả</label> <br>
                <textarea type="text" name="mota" placeholder="nhập vào mô tả" ><?=$mota?></textarea>
            </div>
            <div class="row mb10 ">
                <input type="hidden" name="id" value="<?=$sanpham['id']?>">
                <input class="mr20" type="submit" name="capnhatP" value="CẬP NHẬT">
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