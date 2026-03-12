<?php 
// 1. Khởi động cấu hình và Session
include 'config.php';

// 2. Kiểm tra bảo mật: Nếu chưa đăng nhập thì đá về trang login
if (!isset($_SESSION['user_logged_in'])) {
    header("Location: login.php");
    exit();
}

// Lấy thông tin người dùng từ Session cho gọn
$user = $_SESSION['user_logged_in'];

include 'includes/header.php'; 
?>

<div style="width: 100%; max-width: 900px; margin-bottom: 30px;">
    <h1 style="font-size: 28px; color: #2c3e50;">Chào mừng quay trở lại, <span style="color: #5b4bfb;"><?php echo htmlspecialchars($user['fullname']); ?></span>! 👋</h1>
    <p style="color: #718096; margin-top: 5px;">Dưới đây là tổng quan hệ thống của bạn ngày hôm nay.</p>
</div>

<div class="dashboard-stats" style="width: 100%; max-width: 900px;">
    <div class="stat-box">
        <h3>Tổng Sản Phẩm</h3>
        <div class="number">24</div>
        <p style="font-size: 12px; color: #27ae60; margin-top: 10px;">↑ 12% so với tháng trước</p>
    </div>

    <div class="stat-box">
        <h3>Người Dùng</h3>
        <div class="number">
            <?php echo count($_SESSION['users']); ?>
        </div>
        <p style="font-size: 12px; color: #718096; margin-top: 10px;">Tài khoản đang hoạt động</p>
    </div>

    <div class="stat-box">
        <h3>Đơn Hàng Mới</h3>
        <div class="number">15</div>
        <p style="font-size: 12px; color: #e67e22; margin-top: 10px;">Đang chờ xử lý</p>
    </div>
</div>

<div class="card large" style="margin-top: 20px;">
    <h3 style="margin-bottom: 20px; color: #2c3e50;">Hành động nhanh</h3>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
        
        <div style="padding: 20px; border: 1px dashed #cbd5e0; border-radius: 12px; text-align: center;">
            <p style="margin-bottom: 15px; font-size: 14px; color: #4a5568;">Quản lý kho hàng của bạn ngay tại đây.</p>
            <a href="products/index.php" class="btn btn-primary" style="width: auto;">Xem Danh Sách Sản Phẩm</a>
        </div>

        <div style="padding: 20px; border: 1px dashed #cbd5e0; border-radius: 12px; text-align: center;">
            <p style="margin-bottom: 15px; font-size: 14px; color: #4a5568;">Thêm mặt hàng mới vào cửa hàng.</p>
            <a href="products/create.php" class="btn btn-secondary" style="width: auto;">+ Thêm Sản Phẩm Mới</a>
        </div>

    </div>
</div>

<?php include 'includes/footer.php'; ?>