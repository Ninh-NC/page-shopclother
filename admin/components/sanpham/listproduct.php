<a href="index.php?act=addpro" class="btn btn-secondary mb-3" style="margin: 0 10px">ADD</a>
<table class="table" style="margin:10px">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Tên</th>
            <th scope="col">Giá</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Size</th>
            <th scope="col">Màu</th>
            <th scope="col">Ảnh</th>
            <th scope="col">Mô tả</th>
            <th scope="col">Danh mục</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $listpro = loadAll_sp();
        foreach ($listpro as $pro) {
            extract($pro);

        ?>
            <tr>
                <th scope="row">#</th>
                <td><?= $ten ?></td>
                <td><?= $gia ?></td>
                <td><?= $soluong ?></td>
                <td><?= $size ?></td>
                <td><?= $color ?></td>
                <td><img src="./img/<?= $anh ?>" alt="" style="height:200px;"></td>
                <td>
                    <p class="mota" style="width:300px"><?= $mota ?></p>
                </td>
                <td><?= $tendm ?></td>
                <td><a href="index.php?act=editpro&id=<?php echo $id  ?>" class="btn btn-secondary"> EDIT</a>
                    <a onClick="return confirm('Are you sure you want to delete?')" href="index.php?act=deletepro&id=<?php echo $id  ?>" class="btn btn-secondary"> DELETE</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>