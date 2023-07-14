<?php
function addpro($tensp, $gia, $soluong, $anhurl, $size, $color, $mota, $danhmuc)
{
    $sqladdsp = "INSERT INTO `duan1`.`sanpham` (`ten`, `gia`, `soluong`, `anh`, `size`, `color`, `mota`, `id_danhmuc`) VALUES ('$tensp', '$gia', '$soluong', '$anhurl', '$size', '$color', '$mota', '$danhmuc');";
    pdo_execute($sqladdsp);
}
function editpro($tensp, $gia, $soluong, $anhurl, $size, $color, $mota, $danhmuc, $id)
{
    $sqladdsp = "UPDATE `duan1`.`sanpham` SET `ten`='$tensp', `gia`='$gia', `soluong`='$soluong', `size`='$size', `color`='$color', `mota`='$mota', `id_danhmuc`= '$danhmuc' , `anh` = '$anhurl' WHERE  `id`= '$id';";
    pdo_execute($sqladdsp);
}
function deletepro($id)
{
    $sql = "DELETE from sanpham where id = '$id'";
    pdo_execute($sql);
}
function loadAll_sp()
{
    $sql = "SELECT * from sanpham inner join danhmuc on sanpham.id_danhmuc = danhmuc.id_danhmuc";
    $listpro =  pdo_query($sql);
    return $listpro;
}
function loadone_sp($id)
{
    $sql = "SELECT * from sanpham inner join danhmuc on sanpham.id_danhmuc = danhmuc.id_danhmuc where id = '$id'";
    $product =  pdo_query_one($sql);
    return $product;
}
