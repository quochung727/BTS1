<?php 
include 'config.php'; // Đảm bảo đã có session_start() và giả lập users
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_found = false;

    // Kiểm tra tài khoản trong bộ nhớ Session
    foreach ($_SESSION['users'] as $user) {
        if ($user['email'] === $email) {
            $user_found = true;
            if ($user['password'] === $password) {
                // Đăng nhập thành công -> Lưu thông tin vào Session
                $_SESSION['user_logged_in'] = $user;
                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Mật khẩu không chính xác!";
            }
            break;
        }
    }

    if (!$user_found) {
        $error = "Tài khoản không tồn tại. Vui lòng đăng ký!";
    }
}

include 'includes/header.php'; 
?>

<div class="card">
    <h2 class="text-center">Đăng Nhập</h2>
    
    <?php if ($error): ?>
        <p style="color: #e74c3c; background: #fdf2f2; padding: 10px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; border: 1px solid #facccc;">
            <?php echo $error; ?>
        </p>
    <?php endif; ?>

    <?php if (isset($_GET['msg']) && $_GET['msg'] == 'registered'): ?>
        <p style="color: #27ae60; background: #f2fdf5; padding: 10px; border-radius: 8px; margin-bottom: 20px; font-size: 14px; border: 1px solid #ccfadd;">
            Đăng ký thành công! Hãy đăng nhập.
        </p>
    <?php endif; ?>
    
    <form action="" method="POST">
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Nhập email của bạn" required>
        </div>
        <div class="form-group">
            <label>Mật khẩu</label>
            <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" required>
        </div>
        
        <button type="submit" class="btn btn-primary mb-4">Đăng Nhập</button>
    </form>
    
    <div class="text-center">
        <p style="font-size: 14px; color: #666;">
            Chưa có tài khoản? <a href="register.php" class="link">Đăng ký ngay</a>
        </p>
        <p class="mt-3">
            <a href="reset-password.php" class="link" style="font-size: 13px;">Quên mật khẩu?</a>
        </p>
    </div>
</div>

<?php include 'includes/footer.php'; ?>