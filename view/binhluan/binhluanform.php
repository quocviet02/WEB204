<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";

$idpro = $_REQUEST['idpro']; // giá trị được truyền qua nhờ phương thức get hoặc post

$dsbl = list_binhluan($idpro);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/css.css">
</head>

<body>
  <div class="mb">
    <div class="box_title">BÌNH LUẬN</div>
    <div class="box_content2  product_portfolio binhluan ">
      <!-- <iframe src="view/binhluan/binhluanform.php?idpro=<?= $id ?>" frameborder="0" width="100%" height="300px"></iframe> -->
      <table class="table_cmt">
        <?php
        foreach ($dsbl as $key => $value) {
          extract($value);
          $username = findOneNameUser($iduser);
          echo ' <tr>
                <td>' . $username['user'] . '</td>
                <td>' . $noidung . '</td>
                <td>' . $ngaybinhluan . '</td>
              </tr>';
        }
        ?>
      </table>
    </div>

    <div class="box_search">
      <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="hidden" name="idpro" value="<?= $idpro ?>">
        <?php
        if (isset($_SESSION['user']) && isset($_SESSION['user']['id'])) {
          $iduser = $_SESSION['user']['id'];
          echo '
            <input type="text" name="noidung"  >
            <input type="submit" name="guibinhluan" value="Gửi bình luận">
            ';
        }
        ?>
      </form>
    </div>
    <?php
    if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
      $noidung = $_POST['noidung'];
      $idpro = $_POST['idpro'];
      $iduser = $_SESSION['user']['id'];

      // var_dump($username);
      // die;
      $ngaybinhluan = date('h:i:sa d/m/Y');
      insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan);
      header("Location: " . $_SERVER['HTTP_REFERER']); //chuyển về trang trước đó
    }
    ?>
  </div>
</body>

</html>