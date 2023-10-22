<main class="catalog  mb ">

    <div class="boxleft">
        <div class="  mb">

            <div class="box_title">CHI TIẾT ĐƠN HÀNG</div>
            <div class="box_content">
                <table class="table_cart">
                   
                    <?php
                    // var_dump($_SESSION['mycart']);

                    viewCart(1);
                    ?>
                    <!-- <tr>
                        <td>1</td>
                        <td><img src="../../img/anh0.jpg" height="70px" alt=""></td>
                        <td>Đồng hồ</td>
                        <td>50</td>
                        <td>2</td>
                        <td>100 VNĐ</td>
                        <td><input type="button" value="Xóa"></td>
                    </tr> -->
                </table>
            </div>
        </div>
    </div>
    <div class=" mb10 ">
        <a href="index.php?act=bill"><input class="mr20" type="button" value="Tiếp tục đặt hàng"></a>
        <a href="index.php?act=addCate"> <input class="mr20" type="button" value="NHẬP THÊM"></a>
    </div>
    <div class="boxright">

        <?php
        include 'view/boxright.php';
        ?>
    </div>

</main>