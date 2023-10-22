<main class="catalog  mb ">

    <div class="boxleft">
        <div class="  mb">
            <div class="box_title">Cập nhật tài khoản</div>
            <div class="box_content">
                <div class="box_content form_account">
                    <?php 
                        if (isset($_SESSION['user'])&&(is_array($_SESSION['user']))) {
                            extract($_SESSION['user']);

                        }
                    ?>
                <form action="index.php?act=editAccout" method="post">
                        <div>
                            <p>Email</p>
                            <input type="email" name="email" placeholder="email" value="<?=$email?>">
                        </div>
                        <div>
                            Tên đăng nhập
                            <input type="text" name="user" placeholder="user" value="<?=$user?>">
                        </div>
                        Mật khẩu
                        <div>
                            <input type="password" name="pass" placeholder="pass" value="<?=$pass?>">
                        </div>
                        <div>
                            <p>Địa chỉ</p>
                            <input type="text" name="address" placeholder="Địa chỉ" value="<?=$address?>">
                        </div>
                        <div>
                            <p>Điện thoại</p>
                            <input type="text" name="tel" placeholder="Điện thoại" value="<?=$tel?>">
                        </div>
                        <input type="hidden" name="id" value="<?=$id?>">
                        <input type="submit" value="Cập nhật" name="edit">
                        <input type="reset" value="Nhập lại">
                    </form>
                    <?php 
                        if (isset($thongbao)&& ($thongbao!="")) {
                            echo $thongbao;
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="boxright">

        <?php
        include 'view/boxright.php';
        ?>
    </div>

</main>