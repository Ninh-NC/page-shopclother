<?php
require "./model/pdo.php";
require "./model/sanpham.php";
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Shop</title>
    <!-- Boostrap CDN  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="css/style.css?v=1" />
</head>

<body>
    <nav class="sidebar">
        <a href="#" class="logo">Admin Shop</a>

        <div class="menu-content">
            <ul class="menu-items">
                <div class="menu-title">Trang Quản Trị</div>

                <li class="item">
                    <a href="index.php?act=sanpham">Sản phẩm</a>
                </li>
                <li class="item">
                    <a href="#">Danh mục</a>
                </li>

                <li class="item">
                    <a href="#">Tài khoản</a>
                </li>
            </ul>
        </div>
    </nav>

    <nav class="navbar">
        <i class="fa-solid fa-bars" id="sidebar-close"></i>
    </nav>

    <main class="main">
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
    </main>

    <script src="js/script.js"></script>
</body>

</html>