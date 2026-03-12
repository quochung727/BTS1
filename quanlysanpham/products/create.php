<?php include '../includes/header.php'; ?>
<div class="card">
    <h2>Thêm Sản Phẩm Mới</h2>
    <form action="index.php" method="POST">
        <div class="form-group">
            <label>Tên Sản Phẩm</label>
            <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" required>
        </div>
        <div class="form-group">
            <label>Giá (VNĐ)</label>
            <input type="number" class="form-control" placeholder="Nhập giá sản phẩm" required>
        </div>
        <div class="form-group">
            <label>Mô Tả</label>
            <textarea class="form-control" placeholder="Nhập mô tả sản phẩm"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-4">Thêm Sản Phẩm</button>
    </form>
    <a href="index.php" class="link">Quay lại danh sách sản phẩm</a>
</div>
<?php include '../includes/footer.php'; ?>