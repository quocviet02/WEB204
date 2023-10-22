<?php
function insert_taikhoan($email, $user, $pass)
{
    $sql = "insert into taikhoan(email,user,pass) values('$email','$user','$pass')";
    pdo_execute($sql);
}
function check_user($user,$pass)// chức năng đăng nhập
{
    $sql = "select * from taikhoan where user='".$user."' AND pass='".$pass."'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function check_email($email) // thực hienj chức năng quên mật khẩu
{
    $sql = "select * from taikhoan where email='".$email."'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function  update_taikhoan($id, $user, $pass, $email, $address, $tel)
{
    $sql = "update taikhoan set user='" . $user . "',pass='" . $pass . "',email='" . $email . "',address='" . $address . "',tel='" . $tel . "' where id=" . $id;
    pdo_execute($sql);
}
function loadall_taikhoan(){
    $sql = "select * from taikhoan order by id desc";
    $listAccout = pdo_query($sql);
    return $listAccout;
}
function delete_taikhoan($id)
{
    $sql = "delete from taikhoan where id=" . $id;
    pdo_query($sql);
}
function findOneAcc($id)
{
    $sql = "select * from taikhoan where id=" . $id;
    $sp = pdo_query_one($sql);
    return $sp;
}
?>
