<?php 
include 'config.php';
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $error = "Mật khẩu xác nhận không khớp!";
    } else {
        // Lưu người dùng mới vào danh sách
       $_SESSION['users'][$email] = [
        'email' => $email,
        'password' => $password,
        'fullname' => $fullname,
        'created_at' => time() // Lưu mốc thời gian đăng ký
    ];
    header("Location: login.php?msg=registered");
        exit();
    }
}
include 'includes/header.php'; 
?>

<div class="card">
    <h2>Đăng Ký</h2>
    <?php if ($error) echo "<p style='color:red; margin-bottom:10px;'>$error</p>"; ?>
    <form action="" method="POST">
        <div class="form-group">
            <label>Họ và Tên</label>
            <input type="text" name="fullname" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Mật khẩu</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Xác nhận mật khẩu</label>
            <input type="password" name="confirm_password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mb-4">Tạo tài khoản</button>
    </form>
    <p>Đã có tài khoản? <a href="login.php" class="link">Đăng nhập ngay</a></p>
</div>

<?php include 'includes/footer.php'; ?>