<main class="catalog  mb ">

    <div class="boxleft">
        <div class="  mb">
            <div class="box_title">Thông tin đặt hàng</div>
            <div class="box_content">
                <div class="box_content form_account">
                        <?php
                            if (isset($_SESSION['user'])) {
                                $user = $_SESSION['user']['user'];
                                $email = $_SESSION['user']['email'];
                                $address = $_SESSION['user']['address'];
                                $tel = $_SESSION['user']['tel'];
                            }else{
                                $user = "";
                                $email = "";
                                $address = "";
                                $tel = "";
                            }
                        ?>
                        <div>
                            <p>Email</p>
                            <input type="email" name="email" placeholder="email" value="<?=$email?>">
                        </div>
                        <div>
                            Người đặt hàng
                            <input type="text" name="user" placeholder="name" value="<?=$user?>">
                        </div>
                        <div>
                            Địa chỉ
                            <input type="text" name="address" placeholder="address" value="<?=$address?>">
                        </div>
                        Điện thoại
                        <div>
                            <input type="text" name="tel" placeholder="tel" value="<?=$tel?>">
                        </div>
                        <!-- <input type="submit" value="Đăng ký" name="dangky">
                        <input type="reset" value="Nhập lại"> -->
                    
                    <?php 
                        if (isset($thongbao)&& ($thongbao!="")) {
                            echo $thongbao;
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="  mb">
            <div class="box_title">Phương thức thanh toán</div>
            <div class="box_content">
                <div class="box_content form_account">
                    <table>
                        <tr class="">
                            <td class="thanhtoan"><input type="radio" name="pttt" checked id="">Thanh toán khi nhận hàng</td>
                            <td><input type="radio" name="pttt"  id="">Chuyển khoản ngân hàng</td>
                            <td><input type="radio" name="pttt"  id="">Thanh toán online</td>
                        </tr>
                    </table>
                    <?php 
                        if (isset($thongbao)&& ($thongbao!="")) {
                            echo $thongbao;
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="  mb">
            <div class="box_title">Thông tin giỏ hàng</div>
            <div class="box_content">
                <div class="box_content form_account">
                <table>
                    
                    <?php
                    viewCart(0);
                    ?>
                </table>
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