<?php
require "includes/common.php";
session_start();

$username = $_POST['username'];
$username = mysqli_real_escape_string($con, $username);

$pass = $_POST['password'];
$pass = mysqli_real_escape_string($con, $pass);
$pass = md5($pass);

$first = $_POST['firstName'];
$first = mysqli_real_escape_string($con, $first);

$last = $_POST['lastName'];
$last = mysqli_real_escape_string($con, $last);

$email = $_POST['eMail']; 
$email = mysqli_real_escape_string($con, $email);

$phone = $_POST['phone']; 
$phone = mysqli_real_escape_string($con, $phone);

$address = $_POST['address']; 
$address = mysqli_real_escape_string($con, $address);

// Kiểm tra username đã tồn tại
$query_username = "SELECT * FROM users WHERE username='$username'";
$result_username = mysqli_query($con, $query_username);
if (mysqli_num_rows($result_username) != 0) {
    $m = "Đã tồn tại tên tài khoản này, vui lòng chọn tên khác";
    header('location: index.php?error=' . urlencode($m));
    exit();
}

// Insert user
$insert_query = "INSERT INTO users (email_id, first_name, last_name, phone, address, username, password) 
                 VALUES ('$email', '$first', '$last', '$phone', '$address', '$username', '$pass')";
mysqli_query($con, $insert_query);

// Lấy id người dùng mới đăng ký
$user_id = mysqli_insert_id($con);
$_SESSION['username'] = $username;
$_SESSION['user_id'] = $user_id;

// Chuyển hướng
$_SESSION['success_message'] = "Đăng ký thành công! Chào mừng bạn đến với Baker's Mart.";
header('location: products.php');
?>