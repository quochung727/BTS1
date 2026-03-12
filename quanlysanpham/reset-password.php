<?php 
include 'config.php'; // Chứa session_start() và danh sách users
$error = "";
$success = "";
$step = 1; // Bước 1: Nhập email, Bước 2: Nhập mật khẩu mới
$email_to_reset = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // XỬ LÝ BƯỚC 1: KIỂM TRA EMAIL
    if (isset($_POST['check_email'])) {
        $email = $_POST['email'];
        $user_found = false;

        foreach ($_SESSION['users'] as $user) {
            if ($user['email'] === $email) {
                $user_found = true;
                $email_to_reset = $email;
                $step = 2; // Chuyển sang bước nhập mật khẩu mới
                break;
            }
        }

        if (!$user_found) {
            $error = "Email này không tồn tại trong hệ thống!";
        }
    }

    // XỬ LÝ BƯỚC 2: CẬP NHẬT MẬT KHẨU MỚI
    if (isset($_POST['update_password'])) {
        $email = $_POST['reset_email'];
        $new_pass = $_POST['new_password'];
        $confirm_pass = $_POST['confirm_new_password'];

        if ($new_pass !== $confirm_pass) {
            $error = "Mật khẩu xác nhận không khớp!";
            $step = 2;
            $email_to_reset = $email;
        } else {
            // Cập nhật lại mật khẩu trong Session
            foreach ($_SESSION['users'] as $key => $user) {
                if ($user['email'] === $email) {
                    $_SESSION['users'][$key]['password'] = $new_pass;
                    $success = "Đã cập nhật mật khẩu mới thành công!";
                    $step = 3; // Hoàn tất
                    break;
                }
            }
        }
    }
}

include 'includes/header.php'; 
?>

<div class="card">
    <h2 class="text-center">Đặt Lại Mật Khẩu</h2>
    
    <?php if ($error) echo "<p style='color:red; margin-bottom:15px; font-size:14px;'>$error</p>"; ?>
    
    <?php if ($step == 1): ?>
        <p style="margin-bottom: 20px; color: #666; font-size: 14px;">Nhập email bạn đã đăng ký để tìm lại tài khoản.</p>
        <form action="" method="POST">
            <div class="form-group">
                <label>Email của bạn</label>
                <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
            </div>
            <button type="submit" name="check_email" class="btn btn-primary mb-4">Tiếp tục</button>
        </form>

    <?php elseif ($step == 2): ?>
        <p style="margin-bottom: 20px; color: #666; font-size: 14px;">Đang đặt lại mật khẩu cho: <strong><?php echo $email_to_reset; ?></strong></p>
        <form action="" method="POST">
            <input type="hidden" name="reset_email" value="<?php echo $email_to_reset; ?>">
            <div class="form-group">
                <label>Mật khẩu mới</label>
                <input type="password" name="new_password" class="form-control" placeholder="Nhập mật khẩu mới" required>
            </div>
            <div class="form-group">
                <label>Xác nhận mật khẩu mới</label>
                <input type="password" name="confirm_new_password" class="form-control" placeholder="Nhập lại mật khẩu mới" required>
            </div>
            <button type="submit" name="update_password" class="btn btn-primary mb-4">Cập Nhật Mật Khẩu</button>
        </form>

    <?php elseif ($step == 3): ?>
        <div style="padding: 20px 0;">
            <p style="color:green; font-weight:bold; margin-bottom:20px;"><?php echo $success; ?></p>
            <a href="login.php" class="btn btn-primary">Quay lại Đăng Nhập</a>
        </div>
    <?php endif; ?>

    <?php if ($step != 3): ?>
        <div class="text-center mt-3">
            <a href="login.php" class="link">Quay lại Đăng Nhập</a>
        </div>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>