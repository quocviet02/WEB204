<?php
function insert_sanpham($tensp, $giasp, $hinhanhsp, $mota, $iddm)
{
    $sql = "insert into sanpham(name,price,img,mota,iddm) values('$tensp','$giasp','$hinhanhsp','$mota','$iddm')";
    pdo_execute($sql);
}
function delete_sanpham($id)
{
    $sql = "delete from sanpham where id=" . $id;
    pdo_query($sql);
}
function list_sanpham($kyw, $iddm)
{
    $sql = "select * from sanpham where 1";
    if ($kyw != "") {
        $sql .= " and name like '%" . $kyw . "%'";
    }
    if ($iddm > 0) {
        $sql .= " and iddm ='" . $iddm . "'";
    }
    $sql .= " order by name desc";
    $result = pdo_query($sql);
    return $result;
}
function list_sanpham_client()
{
    $sql = "select * from sanpham where 1 order by id desc limit 0,9";
    $result = pdo_query($sql);
    return $result;
}
function list_sanpham_client_top10()
{
    $sql = "select * from sanpham where 1 order by luotxem desc limit 0,10";
    $result = pdo_query($sql);
    return $result;
}
function findOneSP($id)
{
    $sql = "select * from sanpham where id=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}
function findOneNameCate($iddm)
{
    if ($iddm>0) {
        $sql = "select * from danhmuc where id=" . $iddm;
        $dm = pdo_query_one($sql);
        extract($dm);
        return $name;
    }else{
        return "";
    }
    
}
function product_same_kind($id,$iddm)
{
    $sql = "select * from sanpham where iddm=".$iddm." AND id <>" . $id;
    $result = pdo_query($sql);
    return $result;
}
function update_sanpham($id, $tensp, $iddm, $giasp, $mota, $hinhanhsp)
{
    if ($hinhanhsp !== "") {
        $sql = "update sanpham set name='" . $tensp . "',iddm='" . $iddm . "',price='" . $giasp . "',mota='" . $mota . "',img='" . $hinhanhsp . "' where id=" . $id;
    } else {
        $sql = "update sanpham set name='" . $tensp . "',iddm='" . $iddm . "',price='" . $giasp . "',mota='" . $mota . "' where id=" . $id;
    }
    // var_dump($sql);
    // die;
    pdo_execute($sql);
}
