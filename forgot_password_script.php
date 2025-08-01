<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['reset_email'];
    
    // TODO: kiểm tra email có tồn tại trong hệ thống hay không
    // TODO: nếu có thì gửi email khôi phục

    echo "<script>alert('Nếu email tồn tại, liên kết đặt lại mật khẩu sẽ được gửi.'); window.location.href='index.php';</script>";
}
?>
