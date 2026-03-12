<?php include '../includes/header.php'; ?>
<div class="card large">
    <h2>Danh Sách Sản Phẩm</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Sản Phẩm</th>
                <th>Giá</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Áo Thun Đen</td>
                <td>200.000 VNĐ</td>
                <td>
                    <a href="update.php?id=1" class="btn btn-primary btn-small">Sửa</a>
                    <a href="#" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Quần Jeans Xanh</td>
                <td>500.000 VNĐ</td>
                <td>
                    <a href="update.php?id=2" class="btn btn-primary btn-small">Sửa</a>
                    <a href="#" class="btn btn-danger">Xóa</a>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="mt-4 text-center">
        <a href="create.php" class="btn btn-primary" style="width: auto;">Thêm Sản Phẩm</a>
    </div>
</div>
<?php include '../includes/footer.php'; ?>