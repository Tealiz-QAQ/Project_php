<?php
function check_if_added_to_cart($item_id) {
    require 'common.php';
    if (!isset($_SESSION['user_id'])) return false;

    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM users_products WHERE item_id='$item_id' AND user_id ='$user_id' AND status='Added to cart'";
    $result = mysqli_query($con, $query);
    return mysqli_num_rows($result) > 0;
}
?>
