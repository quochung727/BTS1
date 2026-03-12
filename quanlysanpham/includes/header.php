<?php
// Gọi file cấu hình để kiểm tra Session
include_once (strpos($_SERVER['REQUEST_URI'], '/products/') !== false) ? '../config.php' : 'config.php';

// Tự động xác định đường dẫn gốc để không bị lỗi link khi vào thư mục con
$base_url = (strpos($_SERVER['REQUEST_URI'], '/products/') !== false) ? '../' : './';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>css/style.css">
</head>
<body>
    <nav class="navbar">
        <a href="<?php echo $base_url; ?>index.php" class="logo">MY LOGO</a>
        
        <div class="nav-links">
            <a href="<?php echo $base_url; ?>index.php">Trang Chủ</a>
            <a href="<?php echo $base_url; ?>contact.php">Liên Hệ</a>

            <?php if (isset($_SESSION['user_logged_in'])): ?>
                <a href="<?php echo $base_url; ?>dashboard.php" style="font-weight: bold; color: #5b4bfb;">
                    Hi, <?php echo $_SESSION['user_logged_in']['fullname']; ?>
                </a>
                <a href="<?php echo $base_url; ?>logout.php" class="btn-logout" style="color: #e74c3c;">Đăng Xuất</a>
            <?php else: ?>
                <a href="<?php echo $base_url; ?>login.php">Đăng Nhập</a>
                <a href="<?php echo $base_url; ?>register.php">Đăng Ký</a>
            <?php endif; ?>
        </div>
    </nav>
    <div class="container">