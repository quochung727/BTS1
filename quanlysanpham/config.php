<?php
session_start();

// Cấu hình: 30 phút tự hủy (1800 giây)
$expire_time = 1800; 

if (!isset($_SESSION['users'])) $_SESSION['users'] = [];
if (!isset($_SESSION['products'])) $_SESSION['products'] = [];

$now = time();
foreach ($_SESSION['users'] as $email => $user) {
    if ($now - $user['created_at'] > $expire_time) {
        unset($_SESSION['users'][$email]);
        // Xóa sản phẩm của tài khoản hết hạn
        foreach ($_SESSION['products'] as $id => $prod) {
            if ($prod['owner'] === $email) unset($_SESSION['products'][$id]);
        }
        if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in']['email'] === $email) {
            unset($_SESSION['user_logged_in']);
        }
    }
}
?>