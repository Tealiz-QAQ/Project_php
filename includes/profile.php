<?php
require "common.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId    = $_SESSION['user_id'];
    $username  = $_POST['username'] ?? '';
    $firstName = $_POST['firstName'] ?? '';
    $lastName  = $_POST['lastName'] ?? '';
    $email     = $_POST['email'] ?? '';
    $phone     = $_POST['phone'] ?? '';
    $address   = $_POST['address'] ?? '';

    $stmt = $con->prepare("UPDATE users SET username=?, firstName=?, lastName=?, email=?, phone=?, address=? WHERE id=?");
    $stmt->bind_param("ssssssi", $username, $firstName, $lastName, $email, $phone, $address, $userId);
    $stmt->execute();
    
    // Redirect về trang chính
    header("Location: ../index.php?updated=1");
    exit();
}
