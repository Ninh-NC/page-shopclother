<?php
$id = $_GET["id"];
$product = loadone_sp($id);
?>
<div class="text-white mb-4 text-center " style="width:200px; padding:5px ; border:1px soild #eee; background:orangered;">Edit Product</div>
<form class="row g-3" method="post" action="" enctype="multipart/form-data" style="padding:0 10px;">
    <div class="col-md-6">
        <label for="tenhanghoa" class="form-label">Tên sản phẩm</label>
        <input type="text" class="form-control" name="tensp" value="<?php echo $product['ten'] ?>">
    </div>
    <div class="col-md-6">
        <label for="dongia" class="form-label">Đơn giá</label>
        <input type="text" class="form-control" name="gia" value="<?php echo $product['gia'] ?>">
    </div>
    <div class="col-md-6">
        <label for="giamgia" class="form-label">Mô tả</label>
        <textarea rows='3' cols='30' type="text" class="form-control" name="mota">
        <?php echo $product['mota'] ?>
        </textarea>
    </div>

    <div class="col-md-6">
        <label for="soluong" class="form-label">Số lượng</label>
        <input type="text" class="form-control" name="soluong" value="<?php echo $product['soluong'] ?>">
    </div>
    <div class="col-md-6">
        <label for="soluong" class="form-label">Size</label>
        <div class="d-flex justify-content-start  align-items-center gap-3">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" <?php if ($product['size'] == 'XS') echo 'checked' ?> id="size-1" name="size" value="XS">
                <label class="custom-control-label" for="size-1">XS</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="size-2" <?php if ($product['size'] == 'S') echo 'checked' ?> name="size" value="S">
                <label class="custom-control-label" for="size-2">S</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="size-3" <?php if ($product['size'] == 'M') echo 'checked' ?> name="size" value="M">
                <label class="custom-control-label" for="size-3">M</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="size-4" <?php if ($product['size'] == 'L') echo 'checked' ?> name="size" value="L">
                <label class="custom-control-label" for="size-4">L</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="size-5" name="size" <?php if ($product['size'] == 'XL') echo 'checked' ?> value="XL">
                <label class="custom-control-label" for="size-5">XL</label>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <label for="fileImg" class="form-label">Hình ảnh</label>
        <input type="file" class="form-control" name="fileImg">
        <img src="./img/<?php echo $product['anh'] ?>" alt="" style="height:200px">
    </div>

    <div class="col-md-6">
        <label for="soluong" class="form-label">Màu</label>
        <div class="d-flex justify-content-start  align-items-center gap-3">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="color-1" name="color" <?php if ($product['color'] == 'Black') echo 'checked' ?> value="Black">
                <label class="custom-control-label" for="color-1">Black</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="color-2" name="color" <?php if ($product['color'] == 'White') echo 'checked' ?> value="White">
                <label class="custom-control-label" for="color-2">White</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="color-3" name="color" <?php if ($product['color'] == 'Red') echo 'checked' ?>value="Red">
                <label class="custom-control-label" for="color-3">Red</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="color-4" name="color" <?php if ($product['color'] == 'Blue') echo 'checked' ?> value="Blue">
                <label class="custom-control-label" for="color-4">Blue</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="color-5" name="color" <?php if ($product['color'] == 'Green') echo 'checked' ?> value="Green">
                <label class="custom-control-label" for="color-5">Green</label>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <label for="danhmuc" class="form-label">Loại hàng</label>
        <select name="danhmuc" class="form-select text-uppercase">
            <option selected>Choose...</option>
            <?php
            $sql = "SELECT * FROM danhmuc";
            $dm =  pdo_query($sql);
            foreach ($dm as $item) {
            ?>
                <option value="<?php echo $item['id_danhmuc'] ?>" <?php if ($product['id_danhmuc'] = $item['id_danhmuc']) echo 'selected' ?>><?= $item['tendm'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary" name="btn_add">Edit</button>
        <button type="reset" class="btn btn-primary">Reset</button>
        <a href="index.php?act=sanpham" type="submit" class="btn btn-primary">List</a>
    </div>
</form>