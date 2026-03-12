<?php
session_start();

// Khởi tạo một "giả lập" database người dùng nếu chưa có
if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [
        ['email' => 'admin@gmail.com', 'password' => '123456', 'fullname' => 'Quản trị viên']
    ];
}
?>