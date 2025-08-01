<?php
require("includes/common.php");
session_start();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
    $check_query = "SELECT * FROM users_products 
                    WHERE user_id = '$user_id' 
                      AND item_id = '$item_id' 
                      AND status = 'Added To Cart'";
    $result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($result) > 0) {
        // Nếu sản phẩm đã có, KHÔNG làm gì cả (đã có trong giỏ hàng rồi)
        // Người dùng sẽ chỉnh số lượng thủ công
    } else {
        // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới với số lượng = 1
        $insert_query = "INSERT INTO users_products(user_id, item_id, status, quantity) 
                 VALUES('$user_id', '$item_id', 'Added To Cart', 1)";

        mysqli_query($con, $insert_query) or die(mysqli_error($con));
    }

    // Quay lại trang sản phẩm hoặc giỏ hàng
    header("location: cart.php");
} else {
    // Nếu không có id hợp lệ, quay lại trang sản phẩm
    header("location: products.php");
}
?>
