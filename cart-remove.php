<?php
require "includes/common.php";
session_start();
if (isset($_POST['id']) && is_numeric($_POST['id'])) {
    $item_id = $_POST["id"];
    $user_id = $_SESSION['user_id'];
    $query = "DELETE FROM users_products WHERE item_id='$item_id' AND user_id='$user_id'";
    $res = mysqli_query($con, $query);
    if ($res) {
        echo 'success';
    } else {
        echo 'error';
    }
}
?>