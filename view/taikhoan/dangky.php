<main class="catalog  mb ">

    <div class="boxleft">
        <div class="  mb">
            <div class="box_title">ĐĂNG KÝ THÀNH VIÊN</div>
            <div class="box_content">
                <div class="box_content form_account">
                    <form action="index.php?act=dangky" method="post">
                        <div>
                            <p>Email</p>
                            <input type="email" name="email" placeholder="email">
                        </div>
                        <div>
                            Tên đăng nhập
                            <input type="text" name="user" placeholder="user">
                        </div>
                        Mật khẩu
                        <div>
                            <input type="password" name="pass" placeholder="pass">
                        </div>
                        <input type="submit" value="Đăng ký" name="dangky">
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