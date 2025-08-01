<?php
require "includes/common.php";
session_start();

if (
    isset($_GET['item_id']) && is_numeric($_GET['item_id']) &&
    isset($_GET['act']) && in_array($_GET['act'], ['inc', 'dec'])
) {
    $item_id = (int)$_GET['item_id'];
    $user_id = $_SESSION['user_id'];
    $act     = $_GET['act'];

    // Lấy số lượng hiện tại
    $row = mysqli_fetch_assoc(
        mysqli_query(
            $con,
            "SELECT quantity FROM users_products
             WHERE user_id=$user_id AND item_id=$item_id AND status='Added To Cart'"
        )
    );

    if ($row) {
        $qty = (int)$row['quantity'];
        $qty = ($act === 'inc') ? $qty + 1 : max($qty - 1, 1);   // không để < 1

        mysqli_query(
            $con,
            "UPDATE users_products
             SET quantity=$qty
             WHERE user_id=$user_id AND item_id=$item_id AND status='Added To Cart'"
        );
    }
}
header("Location: cart.php");
exit;
