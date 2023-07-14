<div class="text-white mb-4 text-center " style="width:200px; padding:5px ; border:1px soild #eee; background:orangered;">Thêm mới sản phẩm</div>
<form class="row g-3" method="post" action="" enctype="multipart/form-data" style="padding:0 10px;">
    <div class="col-md-6">
        <label for="mahanghoa" class="form-label">Mã sản phẩm</label>
        <input type="text" class="form-control" id="mahanghoa" placeholder="Auto number" disabled>
    </div>
    <div class="col-md-6">
        <label for="tenhanghoa" class="form-label">Tên sản phẩm</label>
        <input type="text" class="form-control" name="tensp">
    </div>
    <div class="col-md-6">
        <label for="dongia" class="form-label">Đơn giá</label>
        <input type="text" class="form-control" name="gia">
    </div>
    <div class="col-md-6">
        <label for="giamgia" class="form-label">Mô tả</label>
        <textarea rows='3' cols='30' type="text" class="form-control" name="mota"></textarea>
    </div>

    <div class="col-md-6">
        <label for="soluong" class="form-label">Số lượng</label>
        <input type="text" class="form-control" name="soluong">
    </div>
    <div class="col-md-6">
        <label for="soluong" class="form-label">Size</label>
        <div class="d-flex justify-content-start  align-items-center gap-3">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="size-1" name="size" value="XS">
                <label class="custom-control-label" for="size-1">XS</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="size-2" name="size" value="S">
                <label class="custom-control-label" for="size-2">S</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="size-3" name="size" value="M">
                <label class="custom-control-label" for="size-3">M</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="size-4" name="size" value="L">
                <label class="custom-control-label" for="size-4">L</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="size-5" name="size" value="XL">
                <label class="custom-control-label" for="size-5">XL</label>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <label for="fileImg" class="form-label">Hình ảnh</label>
        <input type="file" class="form-control" name="fileImg">
    </div>
    <div class="col-md-6">
        <label for="soluong" class="form-label">Màu</label>
        <div class="d-flex justify-content-start  align-items-center gap-3">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="color-1" name="color" value="Black">
                <label class="custom-control-label" for="color-1">Black</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="color-2" name="color" value="White">
                <label class="custom-control-label" for="color-2">White</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="color-3" name="color" value="Red">
                <label class="custom-control-label" for="color-3">Red</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="color-4" name="color" value="Blue">
                <label class="custom-control-label" for="color-4">Blue</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" class="custom-control-input" id="color-5" name="color" value="Green">
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
                <option value="<?php echo $item['id_danhmuc'] ?>"><?= $item['tendm'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-12">
        <button type="submit" class="btn btn-primary" name="btn_add">Thêm mới</button>
        <button type="reset" class="btn btn-primary">Nhập lại</button>
        <a href="index.php?act=sanpham" type="submit" class="btn btn-primary">Danh sách</a>
    </div>
</form>