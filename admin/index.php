<?php
require "./model/pdo.php";
require "./model/sanpham.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css?v=3">
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                </button>
            </div>
            <div class="img bg-wrap text-center py-4 bg-avatar">
                <div class="user-logo">
                    <div class="img avatar"></div>
                    <h3>Catriona Henderson</h3>
                </div>
            </div>
            <ul class="list-unstyled components mb-5">
                <li class="active">
                    <a href="index.php"><span class="fa fa-home mr-3"></span>Trang Chủ</a>
                </li>
                <li>
                    <a href="index.php?act=danhmuc"><span class="fa fa-bars mr-3"></span> Danh mục</a>
                </li>
                <li>
                    <a href="index.php?act=sanpham"><span class="fa fa-gift mr-3"></span> Sản phẩm</a>
                </li>
                <li>
                    <a href="index.php?act=taikhoan"><span class="fa fa-user mr-3"></span> Tài khoản</a>
                </li>
                <li>
                    <a href="index.php?act=bieudo"><span class="fa fa-bar-chart mr-3"></span> Biểu đồ</a>
                </li>
                <li>
                    <a href="index.php?act=binhluan"><span class="fa fa-support mr-3"></span> Bình luận</a>
                </li>
                <li>
                    <a href="#"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
                </li>
            </ul>
        </nav>

        <div id="content" class="p-4 p-md-5 pt-5">
            <?php
            if (isset($_GET["act"])) {
                $act = $_GET["act"];
                switch ($act) {
                    case 'sanpham':
                        include "./components/sanpham/listproduct.php";
                        break;
                    case 'addpro':
                        if (isset($_POST["btn_add"]) && isset($_FILES['fileImg'])) {
                            $tensp = $_POST["tensp"];
                            $gia = $_POST["gia"];
                            $mota = htmlspecialchars($_POST["mota"]);
                            $soluong = $_POST["soluong"];
                            $size = $_POST["size"];
                            $color = $_POST["color"];
                            $anhurl = $_FILES["fileImg"]["name"];
                            $danhmuc = $_POST["danhmuc"];
                            $target_dir = "./img/";
                            $target_file = $target_dir . basename($anhurl);
                            if (move_uploaded_file($_FILES["fileImg"]["tmp_name"], $target_file)) {
                                addpro($tensp, $gia, $soluong, $anhurl, $size, $color, $mota, $danhmuc);
                                echo '<script>alert("Thêm thành công")</script>';
                                header("Refresh: 0; url=index.php?act=sanpham");
                            } else {
                                echo "Sorry, there was an error uploading your file.";
                            }
                        }
                        include "./components/sanpham/addpro.php";
                        break;
                    case 'editpro':
                        if (isset($_POST["btn_add"])) {
                            $tensp = $_POST["tensp"];
                            $gia = $_POST["gia"];
                            $mota = htmlspecialchars($_POST["mota"]);
                            $soluong = $_POST["soluong"];
                            $danhmuc = $_POST["danhmuc"];
                            $size = $_POST["size"];
                            $color = $_POST["color"];
                            $luotxem = $_POST["luotxem"];
                            $anhurl = $_FILES["fileImg"]["name"];
                            $id = $_GET["id"];
                            if ($anhurl = "") {
                                $target_dir = "./img/";
                                $target_file = $target_dir . basename($anhurl);
                                if (move_uploaded_file($_FILES["fileImg"]["tmp_name"], $target_file)) {
                                    editpro($tensp, $gia, $soluong, $anhurl, $size, $color, $mota, $danhmuc, $id);
                                    header("Refresh: 0; url=index.php?act=sp");
                                } else {
                                    echo "Sorry, there was an error uploading your file.";
                                }
                            } else {
                                $sqladdsp = "UPDATE `duan1`.`sanpham` SET `ten`='$tensp', `gia`='$gia', `soluong`='$soluong', `size`='$size', `color`='$color', `mota`='$mota', `id_danhmuc`= '$danhmuc'  WHERE  `id`= '$id';";
                                pdo_execute($sqladdsp);
                                echo '<script>alert("Sua thanh cong")</script>';
                                header("Refresh: 0; url=index.php?act=sanpham");
                            }
                        }

                        include "./components/sanpham/editpro.php";
                        break;
                    case "deletepro":
                        $id = $_GET["id"];
                        deletepro($id);
                        header("Location: index.php?act=sanpham");
                        break;
                    default:
                        # code...
                        break;
                }
            } else {
                echo '<h1>Chào mừng bạn đến với trang Admin</h1>';
            }
            ?>
        </div>
    </div>
    <script src="./js/script.js"></script>
</body>

</html>