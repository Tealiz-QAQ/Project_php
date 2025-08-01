<?php
require "includes/common.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    header("location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['confirm_order'])) {
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $names = explode(" ", $fullname);
    $first_name = $names[0];
    $last_name = implode(" ", array_slice($names, 1));

    // Cập nhật lại thông tin người dùng nếu có thay đổi
    $update_user = "UPDATE users SET first_name='$first_name', last_name='$last_name', phone='$phone', address='$address' WHERE id='$user_id'";
    mysqli_query($con, $update_user);

    // Lấy danh sách sản phẩm đã mua
    $query = "SELECT item_id, quantity FROM users_products WHERE user_id='$user_id' AND status='Added To Cart'";
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        $item_id = $row['item_id'];
        $quantity = $row['quantity'];

        $update_query = "UPDATE products SET soluong = GREATEST(soluong - $quantity, 0) WHERE id = '$item_id'";
        mysqli_query($con, $update_query);
    }

    // Cập nhật trạng thái đơn hàng
    $confirm_query = "UPDATE users_products SET status='Confirmed' WHERE user_id='$user_id' AND status='Added To Cart'";
    mysqli_query($con, $confirm_query);

    // Chuyển về trang sản phẩm
    header("refresh:4;url=products.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đặt hàng thành công</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'includes/header_menu.php'; ?>
<div class="container mt-5 pt-5">
    <div class="jumbotron text-center">
    <h3>✅ Đặt hàng thành công!</h3>
    <hr>
    <p>Cảm ơn bạn đã đặt hàng tại <strong>Baker's Mart</strong>.</p>
    <p>Vui lòng chú ý điện thoại để nhận cuộc gọi xác nhận.</p>
    <p>Thanh toán khi nhận hàng sau khi kiểm tra.</p>
    <p>Nếu có yêu cầu, vui lòng liên hệ: <strong>090x xxx xxx</strong></p>
    <hr>
    <p>Bạn sẽ được chuyển về <a href="products.php">trang sản phẩm</a> sau vài giây...</p>
</div>

</div>
<!-- footer-->
  <?php include 'includes/footer.php' ?>
<!--footer ends-->
</body>
</html>
