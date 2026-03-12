<?php include '../includes/header.php'; ?>
<div class="card">
    <h2 class="text-center">Cập Nhật Sản Phẩm</h2>
    <form action="index.php" method="POST">
        <input type="hidden" name="id" value="1"> 
        
        <div class="form-group">
            <label>Tên Sản Phẩm</label>
            <input type="text" class="form-control" name="product_name" value="Áo Thun Đen" required>
        </div>
        <div class="form-group">
            <label>Giá (VNĐ)</label>
            <input type="number" class="form-control" name="price" value="200000" required>
        </div>
        <div class="form-group">
            <label>Mô Tả</label>
            <textarea class="form-control" name="description">Đây là mô tả mẫu của áo thun đen...</textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-4">Cập Nhật Sản Phẩm</button>
    </form>
    <div class="text-center">
        <a href="index.php" class="link">Quay lại danh sách sản phẩm</a>
    </div>
</div>
<?php include '../includes/footer.php'; ?>