<?php
session_start();
include "model/pdo.php";
include "model/sanpham.php";
include "model/danhmuc.php";
include "model/cart.php";
include "global.php";
include "view/header.php";
include "model/taikhoan.php";
if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = [];
}
$list_cate = list_danhmuc();
$spnew = list_sanpham_client();
$top10 = list_sanpham_client_top10();
if ((isset($_GET['act'])) && ($_GET['act'] !== '')) {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanphamct':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $id = $_GET['idsp'];
                $detail = findOneSP($_GET['idsp']);
                extract($detail);
                $productsameCate = product_same_kind($id, $iddm);
                include "view/detail_product.php";
            } else {
                include "view/home.php";
            }
            break;

        case 'sanpham':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $dssp = list_sanpham($kyw, $iddm);
            $name = findOneNameCate($iddm);
            include "view/sanpham.php";
            break;

        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email = $_POST['email'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                insert_taikhoan($email, $user, $pass);
                $thongbao = "Đã đăng ký thành công. Hãy đăng nhập";
            }
            include "view/taikhoan/dangky.php";
            break;
        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = check_user($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    header('Location: index.php');
                    // $thongbao = "Đăng nhập thành công";
                } else {
                    $thongbao = "Tài khoản không tồn tại";
                }
            }
            include "view/home.php";
            break;
        case 'editAccout':
            if (isset($_POST['edit']) && ($_POST['edit'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $address = $_POST['address'];
                $id = $_POST['id'];
                update_taikhoan($id, $user, $pass, $email, $address, $tel);
                $_SESSION['user'] = check_user($user, $pass);
                header('Location: index.php');
            }
            include "view/taikhoan/editAccout.php";
            break;
        case 'forgotPass':
            if (isset($_POST['sendMail']) && ($_POST['sendMail'])) {
                $email = $_POST['email'];
                $checkMail = check_email($email);
                if (is_array($checkMail)) {
                    $thongbao = "Your password is: " . $checkMail['pass'];
                } else {
                    $thongbao = "This email does not exist";
                }
            }
            include "view/taikhoan/forgotPass.php";
            break;
        case 'logout':
            session_unset();
            header('Location: index.php');
            break;
        case 'addtoCart':
            if (isset($_POST['addCart']) && ($_POST['addCart'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $soluong = 1;
                $thanhtien = $soluong * $price;
                $spadd = [$id, $name, $img, $price, $soluong, $thanhtien];
                array_push($_SESSION['mycart'], $spadd);
            }
            include "view/cart/viewcart.php";
            break;
        case 'deleteCart':
            if (isset($_GET['idcart']) && ($_GET['idcart'] >= 0)) {
                array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['mycart'] = [];
            }
            header('Location: index.php?act=viewcart');
            break;
        case 'viewcart':

            include "view/cart/viewcart.php";
            break;
        case 'bill':

            include "view/cart/bill.php";
            break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}

include "view/footer.php";
