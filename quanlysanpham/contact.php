<?php include 'includes/header.php'; ?>
<div class="card">
    <h2 class="text-center">Liên Hệ Với Chúng Tôi</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label>Họ và Tên</label>
            <input type="text" class="form-control" name="fullname" placeholder="Nhập họ tên" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Nhập email" required>
        </div>
        <div class="form-group">
            <label>Chủ đề</label>
            <input type="text" class="form-control" name="subject" placeholder="Nhập chủ đề" required>
        </div>
        <div class="form-group">
            <label>Nội dung</label>
            <textarea class="form-control" name="message" placeholder="Nhập nội dung tin nhắn" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary text-center">Gửi Tin Nhắn</button>
    </form>
</div>
<?php include 'includes/footer.php'; ?>