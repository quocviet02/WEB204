<?php
session_start();
include "../model/pdo.php";
include "header.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/cart.php";
if (isset($_GET['act'])) {
    $act = $_GET['act'];

    switch ($act) {
       
        case 'addCate':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                insert_danhmuc($tenloai);
                $thongbao = "Thêm thành công";
            }
            include "danhmuc/addCate.php";
            break;
        case 'listCate':
            $result = list_danhmuc();
            include "danhmuc/listCate.php";
            break;
        case 'deleteCate':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);
            }

            $result = list_danhmuc();
            include "danhmuc/listCate.php";
            break;
        case 'updateCate':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = findOne($_GET['id']);
            };
            $resultCate = list_danhmuc();
            include "danhmuc/updateCate.php";
            break;
        case 'updateCateFinal':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                update_danhmuc($tenloai, $id);
                $thongbao = "Cập nhật thành công";
            }
            $result = list_danhmuc();
            include "danhmuc/listCate.php";
            break;





        case 'addProduct':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinhanhsp = $_FILES['hinhanhsp']['name'];
                $target_dir = '../upload/';
                $target_file = $target_dir . basename($_FILES['hinhanhsp']['name']);
                if (move_uploaded_file($_FILES["hinhanhsp"]["tmp_name"], $target_file)) {
                    echo "The file " . htmlspecialchars(basename($_FILES["hinhanhsp"]["name"])) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
                insert_sanpham($tensp, $giasp, $hinhanhsp, $mota, $iddm);
                $thongbao = "Thêm thành công";
            }
            $result = list_danhmuc();
            include "sanpham/addProduct.php";
            break;
        case 'listProduct':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = "";
                $iddm = 0;
            };
            $resultCate = list_danhmuc();
            $result = list_sanpham($kyw, $iddm);
            include "sanpham/listProduct.php";
            break;
        case 'deleteProduct':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            $result = list_sanpham("", 0);
            include "sanpham/listProduct.php";
            break;
        case 'updateProduct':

            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = findOneSP($_GET['id']);
            };
            // var_dump($sanpham);
            $resultCate = list_danhmuc();
            // var_dump($resultCate);
            // die;
            include "sanpham/updateProduct.php";
            break;
        case 'updateProductFinal':
            if (isset($_POST['capnhatP']) && ($_POST['capnhatP'])) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinhanhsp = $_FILES['hinhanhsp']['name'];
                $jfjf = [$id, $iddm, $tensp, $giasp, $mota, $hinhanhsp];
                // var_dump($jfjf);
                // die;
                $target_dir = '../upload/';
                $target_file = $target_dir . basename($_FILES['hinhanhsp']['name']);
                if (move_uploaded_file($_FILES["hinhanhsp"]["tmp_name"], $target_file)) {
                    echo "The file " . htmlspecialchars(basename($_FILES["hinhanhsp"]["name"])) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
                update_sanpham($id, $tensp, $iddm, $giasp, $mota, $hinhanhsp);
                // var_dump(update_sanpham($id, $tensp, $iddm, $giasp, $mota, $hinhanhsp));
                $thongbao = "Cập nhật thành công";
            }
            $result = list_sanpham("", 0);
            $resultCate = list_danhmuc();
            include "sanpham/listProduct.php";
            break;


        case 'dskh':
            $result = loadall_taikhoan();
            include "taikhoan/listAccout.php";
            break;
        case 'editAccout':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $acc = findOneAcc($_GET['id']);
            };
            include "taikhoan/updateAccout.php";
            break;
        case 'updateAccout':
            if (isset($_POST['edit']) && ($_POST['edit'])) {
                $id = $_POST['id'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $address = $_POST['address'];
                update_taikhoan($id, $user, $pass, $email, $address, $tel);

                $_SESSION['user'] = check_user($user, $pass);// sau khi cập nhật thì lấy thông tin user  mới lưu vào session
                // var_dump($_SESSION['user']);
                // die;
                header('Location: index.php?act=dskh');
            }
            include "taikhoan/updateAccout.php";
            break;
        case 'deleteAccout':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_taikhoan($_GET['id']);
            }
            $result = loadall_taikhoan();
            include "taikhoan/listAccout.php";
            break;
        case 'list_cmt':
            // $username = findOneNameUser($id);
            $result = list_binhluan(0);
            // var_dump($result['iduser']);
            // die;
            include "binhluan/list.php";
            break;
        case 'deleteCmt':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_binhluan($_GET['id']);
            }
            $result = list_binhluan(0);
            include "binhluan/list.php";
            break;
        case 'thongke':
            $result = list_thongke();
            include "thongke/list.php";
            break;

        case 'bieudo':
            $resultB = list_thongke();
            // var_dump($resultB);
            // die;
            include "thongke/bieudo.php";
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}

include "footer.php";
