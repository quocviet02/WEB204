<?php
function insert_binhluan($noidung, $iduser, $idpro, $ngaybinhluan)
{
    $sql = "insert into binhluan(noidung,iduser,idpro,ngaybinhluan) values('$noidung','$iduser','$idpro','$ngaybinhluan')";
    pdo_execute($sql);
}
function list_binhluan($idpro)
{

    $sql = "select * from binhluan where 1";
    if ($idpro > 0) {
        $sql .= " AND idpro='" . $idpro . "'";
    } else {
        $sql .= " order by id desc";
    }
    $result = pdo_query($sql);
    return $result;
}
function findOneNameUser($id)
{
    if ($id > 0) {
        $sql = "select * from taikhoan where id=" . $id;
        $name = pdo_query_one($sql);
        extract($name);
        return $name;
    } else {
        return "";
    }
}
function findOneNameProduct($id)
{
    if ($id>0) {
        $sql = "select * from sanpham where id=" . $id;
        $name = pdo_query_one($sql);
        if (is_array($name)) {
            extract($name);
        }
        
        return $name;
    }else{
        return "";
    }
    
}
function delete_binhluan($id){
    $sql = "delete from binhluan where id=".$id;
    pdo_query($sql);
}
?>
