<?php
function viewCart($delete)
{
    global $img_path;
    $sum = 0;
    $i = 0;
    if ($delete==1) {
        $xoaCartth = '<td>Thao tác</td>';
        $xoaCarttd2='<td></td>';
    }else{
        $xoaCartth ="";
        $xoaCarttd2="";
    }
    echo ' <tr>
    <td>Hình ảnh</td>
    <td>Sản phẩm</td>
    <td>Đơn giá</td>
    <td>Số lượng</td>
    <td>Thành tiền</td>
    '.$xoaCartth.'
    </tr>';

    foreach ($_SESSION['mycart'] as $cart) {
        // var_dump($cart[2]);
        $image_path = $cart[2];
        // var_dump($image_path);

        // die;
        $ttien = $cart[3] * $cart[4];
        $sum += $ttien;
        if ($delete==1) {
            $xoaCarttd = '<td><a href="index.php?act=deleteCart&idcart=' . $i . '"><input type="button" value="Xóa"></a></td>';            
        }else{           
            $xoaCarttd ="";
        }
        echo '
                   
                    <tr>
                    
                    <td><img src="' . $image_path . '" height="60px" alt=""></td>
                    <td>' . $cart[1] . '</td>
                    <td>' . $cart[3] . '</td>
                    <td>' . $cart[4] . '</td>
                    <td>' . $ttien . 'VNĐ</td>
                    ' . $xoaCarttd . '
                  </tr>
                    ';
        $i += 1;
    }
    echo '
                        <tr>
                        <td class="sum_cart" colspan ="4" >Tổng đơn hàng</td>
                        <td>' . $sum . 'VNĐ</td>
                        '.$xoaCarttd2.'
                    </tr>
                ';
}



function list_thongke(){
    $sql = "select danhmuc.id as madm,danhmuc.name as tendm, count(sanpham.id) as countsp, min(sanpham.price) as minprice, max(sanpham.price) as maxprice, avg(sanpham.price) as avgprice";
    $sql.=" from sanpham left join danhmuc on danhmuc.id=sanpham.iddm";
    $sql.=" group by danhmuc.id order by danhmuc.id desc";
    $listtk = pdo_query($sql);
    return $listtk;
}
?>
