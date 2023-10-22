<div class="mb">
    <div class="box_title">TÀI KHOẢN</div>
    <div class="box_content form_account">
        <?php
        if (isset($_SESSION['user'])) {
            extract($_SESSION['user'])


        ?>
            <h4>Xin chào <?= $user ?></h4><br>
            <li class="form_li"><a href="index.php?act=viewcart">Xem giỏ hàng</a></li>
            <li class="form_li"><a href="index.php?act=forgotPass">Quên mật khẩu</a></li>
            <li class="form_li"><a href="index.php?act=editAccout">Cập nhật tài khoản</a></li>
            <?php if($role==1){?>
            <li class="form_li"><a href="admin/index.php">Đăng nhập admin</a></li>
            <?php }?>
            <li class="form_li"><a href="index.php?act=logout">Đăng xuất</a></li>
        <?php   } else {

        ?>
            <form action="index.php?act=dangnhap" method="post">
                <h4>Tên đăng nhập</h4><br>
                <input type="text" name="user" id="">
                <h4>Mật khẩu</h4><br>
                <input type="password" name="pass" id=""><br>
                <input type="checkbox" name="" id="">Ghi nhớ tài khoản?
                <br><input type="submit" name="dangnhap" value="Đăng nhập">
                <li class="form_li"><a href="index.php?act=dangky">Hoặc đăng ký</a></li>
            </form>
            <?php
            if (isset($thongbao) && ($thongbao != "")) {
                echo $thongbao;
            }
            ?>
        <?php } ?>
    </div>
</div>
<div class="mb">
    <div class="box_title">DANH MỤC</div>
    <div class="box_content2 product_portfolio">
        <ul>
            <?php
            foreach ($list_cate as $key => $cate) {
                extract($cate);
                $linkdm = 'index.php?act=sanpham&iddm=' . $id;
                echo '<li><a href="' . $linkdm . '">' . $name . '</a></li>';
            }
            ?>
            <!-- <li><a href="">Đồng hồ </a></li>
               <li><a href="">Laptop</a></li>
               <li><a href="">Điện thoại</a></li>
               <li><a href="">Ipad</a></li>
               <li><a href="">Tivi</a></li> -->
        </ul>
    </div>
    <div class="box_search">
        <form action="index.php?act=sanpham" method="POST">
            <input type="text" name="kyw" id="" placeholder="Từ khóa tìm kiếm">
            <input type="submit" name="search" value="Tìm kiếm">
        </form>
    </div>
</div>
<!-- DANH MỤC SẢN PHẨM BÁN CHẠY -->
<div class="mb">
    <div class="box_title">SẢN PHẨM BÁN CHẠY</div>
    <div class="box_content">
        <?php
        foreach ($top10 as $key => $value) {
            extract($value);
            $linksp = "index.php?act=sanphamct&idsp=" . $id;
            $image_pathtop10 = $img_path . $img;
            echo '
                  <div class="selling_products" style="width:100%;">
                  <img src="' . $image_pathtop10 . '" alt="anh">
                  <a href="' . $linksp . '">' . $name . '</a>
               </div>
                  ';
        }
        ?>
    </div>
</div>