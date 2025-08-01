<?php
require ("includes/common.php");
session_start();

$username = $_POST['lusername'];
$username = mysqli_real_escape_string($con, $username);

$password = $_POST['lpassword'];
$password = mysqli_real_escape_string($con, $password);
$password = md5($password);

$query = "SELECT id, username, password, role FROM users WHERE username='" . $username . "' AND password='" . $password . "'";
$result = mysqli_query($con, $query);
$num = mysqli_num_rows($result);

if ($num == 0) {
    $m = "Please enter correct Username and Password";
    header('location: index.php?errorl=' . $m);
} else {
    $row = mysqli_fetch_array($result);
    $_SESSION['username'] = $row['username'];
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['role'] = $row['role']; // Lưu vai trò vào session

    // Chuyển hướng dựa trên vai trò
    if ($row['role'] == 'admin') {
        header('location: admin_dashboard.php'); // Trang quản trị cho admin
    } else {
        header('location: products.php'); // Trang sản phẩm cho user
    }
}
?>
