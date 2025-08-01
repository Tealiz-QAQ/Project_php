<?php
require "includes/common.php";
session_start();
if (!isset($_SESSION['username'])) {
    header('location: index.php');
}
$user_id = $_SESSION['user_id'];

// Truy vấn thông tin người dùng
$user_info_query = "SELECT CONCAT(first_name, ' ', last_name) AS full_name, phone, address FROM users WHERE id = $user_id";
$user_info_result = mysqli_query($con, $user_info_query);

if (!$user_info_result) {
    die("Lỗi truy vấn thông tin người dùng: " . mysqli_error($con));
}

$user_info = mysqli_fetch_assoc($user_info_result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Baker's Mart | Giỏ hàng</title> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Delius Swash Caps' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Andika' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const quantityInputs = document.querySelectorAll('.quantity');
        const totalCell = document.querySelector('.total');

        function updateTotal() {
            let sum = 0;
            quantityInputs.forEach(input => {
                const quantity = parseInt(input.value);
                const price = parseInt(input.dataset.price);
                const row = input.closest('tr');
                const rowTotal = quantity * price;
                row.querySelector('.price').textContent = rowTotal + ' VND';
                sum += rowTotal;
            });
            totalCell.textContent = sum + ' VND';
        }

        quantityInputs.forEach(input => {
            input.addEventListener('input', updateTotal);
        });
    });
</script>
<body>
<?php include 'includes/header_menu.php'; ?>
<div class="d-flex justify-content-center">
    <div class="col-md-6 my-5 table-responsive p-5">
        <?php
        // Hiển thị thông báo nếu có
        if (isset($_SESSION['message'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['message'] . "</div>";
            unset($_SESSION['message']); // Xóa thông báo sau khi hiển thị
        }
        ?>
        <div class="mb-4 p-3 border rounded bg-light">
    <h5 class="mb-3">Thông tin đơn hàng của <?php echo htmlspecialchars($user_info['full_name']); ?></h5>
</div>

        <table class="table table-striped table-bordered table-hover">
            <?php
            $sum = 0;
            $query = "SELECT products.price AS Price, products.id, products.name AS Name, users_products.quantity AS Quantity 
                      FROM users_products 
                      JOIN products ON users_products.item_id = products.id 
                      WHERE users_products.user_id='$user_id' AND status='Added To Cart'";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) >= 1) {
            ?>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while ($row = mysqli_fetch_array($result)) {
                        $total_price = $row["Price"] * $row["Quantity"];
                        $sum += $total_price;
                ?>
                    <tr>
                        <td>#<?php echo $row["id"]; ?></td>
                        <td><?php echo $row["Name"]; ?></td>
                        <td class='text-nowrap' style='min-width:130px'>
                            <a class='btn btn-sm btn-outline-secondary' href='cart-quantity.php?item_id=<?php echo $row["id"]; ?>&act=dec'>−</a>
                            <input type='text' readonly
                                   value='<?php echo $row["Quantity"]; ?>'
                                   class='text-center font-weight-bold'
                                   style='width:45px;border:none;background:transparent'>
                            <a class='btn btn-sm btn-outline-secondary' href='cart-quantity.php?item_id=<?php echo $row["id"]; ?>&act=inc'>+</a>
                        </td>
                        <td class='price'><?php echo number_format($total_price, 0, ',', '.'); ?> đ</td>
                    <td><a href='cart-remove.php?id=<?php echo $row['id']; ?>' class='remove_item_link'>Remove</a></td>
                <?php
                    }
                ?>
                </tr>
                <tr>
                    <td colspan="3" class="text-right font-weight-bold">Thành tiền</td>
                    <td class='total'><?php echo number_format($sum, 0, ',', '.'); ?> đ</td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#checkoutModal">Đặt hàng</a>
                    </td>
                </tr>
                </tbody>
            <?php
            } else {
               ## echo "<div><img src='images/emptycart.png' class='image-fluid' height='150' width='150'></div><br/>"; 
                echo "<div class='text-bold h5'>Hãy thêm mặt hàng trước!</div>";
            }
            ?>
        </table>
        <a href="products.php" class="btn btn-secondary">Quay về trang sản phẩm</a>
    </div>
</div>
<!--footer -->
<?php include 'includes/footer.php'; ?>
<!--footer end-->
<!-- Modal Checkout -->
<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <form method="post" action="confirm_order.php" class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Xác nhận thông tin đơn hàng</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <label>Họ và tên</label>
        <input type="text" class="form-control" name="fullname" value="<?php echo htmlspecialchars($user_info['full_name']); ?>" required>

        <label class="mt-2">Số điện thoại</label>
        <input type="text" class="form-control" name="phone" value="<?php echo htmlspecialchars($user_info['phone']); ?>" required>

        <label class="mt-2">Địa chỉ</label>
        <textarea class="form-control" name="address" required><?php echo htmlspecialchars($user_info['address']); ?></textarea>

        <hr>
        <?php
        // Lấy lại tổng tiền từ cơ sở dữ liệu
        $total_query = "SELECT SUM(products.price * users_products.quantity) AS total
                        FROM users_products
                        JOIN products ON users_products.item_id = products.id
                        WHERE users_products.user_id = $user_id AND users_products.status = 'Added To Cart'";
        $total_result = mysqli_query($con, $total_query);
        $total_price_checkout = mysqli_fetch_assoc($total_result)['total'];
        ?>
        <strong>Tổng tiền: <?php echo number_format($total_price_checkout, 0, ',', '.'); ?> đ</strong>
      </div>
      <div class="modal-footer">
        <button type="submit" name="confirm_order" class="btn btn-success">Xác nhận đặt hàng</button>
      </div>
    </form>
  </div>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</html>
