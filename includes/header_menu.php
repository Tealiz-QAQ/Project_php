<!--Navigation bar start-->
<nav class="navbar fixed-top navbar-expand-sm navbar-dark" id="navbar" style="background-color:rgba(0,0,0,0.5)">
    <div class="container">
        <a href="index.php" class="navbar-brand" style="font-family: 'Delius Swash Caps'">Baker's Mart</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="nav navbar-nav">
                <li class="nav-item dropdown">
                    <a href="" class="nav-link dropdown-toggle" id="navbar-drop" data-toggle="dropdown">
                        Sản phẩm
                    </a>
                    <div class="dropdown-menu" id="myDropdown">
                        <a href="category-material.php" class="dropdown-item">Nguyên liệu làm bánh</a>
                        <a href="category-decorate.php" class="dropdown-item">Trang trí</a>
                        <a href="category-ingredients.php" class="dropdown-item">Pha chế</a>
                        <a href="category-tool.php" class="dropdown-item">Dụng cụ</a>
                    </div>
                </li>
                <li class="nav-item"><a href="about.php" class="nav-link">About us</a></li>
                <?php if (isset($_SESSION['username'])) { ?>
                    <li class="nav-item"><a href="cart.php" class="nav-link">Giỏ hàng</a></li>
                <?php } ?>
            </ul>

            <?php if (isset($_SESSION['username'])) { ?>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a href="logout_script.php" class="nav-link"><i class="fa fa-sign-out"></i>Đăng xuất</a></li>
                    <li class="nav-item"><a href="#" class="nav-link" title="Thông tin cá nhân" data-toggle="modal" data-target="#editProfileModal"><i class="fa fa-user-circle"></i></a></li>
            <?php } else { ?>
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a href="#signup" class="nav-link" data-toggle="modal"><i class="fa fa-user"></i> Đăng ký</a></li>
                    <li class="nav-item"><a href="#login" class="nav-link" data-toggle="modal"><i class="fa fa-sign-in"></i> Đăng nhập</a></li>
                </ul>
            <?php } ?>
        </div>
    </div>
</nav>
<!--navigation bar end-->
    <!--Login trigger Modal-->
    <div class="modal fade" id="login" >
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content"style="background-color:rgba(255,255,255,0.95)">

            <div class="modal-header">
              <h5 class="modal-title">Đăng nhập</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <form action="login_script.php" method="post">
                 <div class="form-group">
                     <label for="username">Tên tài khoản:</label>
                     <input type="text" class="form-control"  name="lusername" placeholder="Enter username" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd"  name="lpassword" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-secondary btn-block" name="Submit">Đăng nhập</button>
              </form>
              <a href="#" data-toggle="modal" data-target="#forgotPasswordModal" data-dismiss="modal">Quên mật khẩu?</a>
            </div>
            <div class="modal-footer">
              <p class="mr-auto">Bạn chưa đăng ký? <a href="#signup" data-toggle="modal" data-dismiss="modal" >Đăng ký</a></p>
              <button type="button" class="btn btn-secondary" data-dismiss="modal" >Đóng</button>
            </div>
          </div>
        </div>
      </div>
<!--Login trigger Model ends-->
<!-- Forgot Password Modal -->
<div class="modal fade" id="forgotPasswordModal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color:rgba(255,255,255,0.95)">
      <div class="modal-header">
        <h5 class="modal-title">Quên mật khẩu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="forgot_password_script.php" method="post">
          <div class="form-group">
            <label for="resetEmail">Nhập email đã đăng ký:</label>
            <input type="email" class="form-control" id="resetEmail" name="reset_email" placeholder="example@gmail.com" required>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Gửi liên kết đặt lại mật khẩu</button>
        </form>
      </div>

      <div class="modal-footer">
        <p class="mr-auto">Đã nhớ mật khẩu? <a href="#login" data-toggle="modal" data-dismiss="modal">Đăng nhập lại</a></p>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

<!--Signup model start-->
<div class="modal fade" id="signup">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content" style="background-color:rgba(255,255,255,0.95)">

      <div class="modal-header">
        <h5 class="modal-title">Đăng ký</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form action="signup_script.php" method="post">
          <div class="form-group">
            <label for="username">Tên tài khoản:</label>
            <input type="text" class="form-control" name="username" placeholder="Username" required>
            <?php if(isset($_GET['error'])){ echo "<span class='text-danger'>".$_GET['error']."</span>" ;} ?>
          </div>

          <div class="form-group">
            <label for="pwd">Mật khẩu:</label>
            <input type="password" class="form-control" id="pwd" name="password" placeholder="Password" required>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="validation1">Họ:</label>
              <input type="text" class="form-control" id="validation1" name="firstName" placeholder="First Name" required>
            </div>
            <div class="form-group col-md-6">
              <label for="validation2">Tên:</label>
              <input type="text" class="form-control" id="validation2" name="lastName" placeholder="Last Name">
            </div>
          </div>

          <div class="form-group">
            <label for="email">Địa chỉ Email:</label>
            <input type="email" class="form-control" name="eMail" placeholder="Enter email" required>
          </div>

          <div class="form-group">
            <label for="phone">Số điện thoại:</label>
            <input type="text" class="form-control" name="phone" placeholder="Phone Number" pattern="[0-9]{10}" required>
          </div>

          <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <input type="text" class="form-control" name="address" placeholder="Address" required>
          </div>

          <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="agreeCheck" required>
            <label for="agreeCheck" class="form-check-label">Đồng ý <a href="#" data-toggle="modal" data-target="#termsModal">điều khoản và điều kiện</a></label>
          </div>

          <button type="submit" class="btn btn-primary btn-block" name="Submit">Đăng ký</button>
        </form>
      </div>

      <div class="modal-footer">
        <p class="mr-auto">Đã có tài khoản?
          <a href="#login" data-toggle="modal" data-dismiss="modal">Đăng nhập</a>
        </p>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
      </div>

    </div>
  </div>
</div>
<!--Signup trigger model ends-->
<!-- Modal: Điều khoản và điều kiện -->
<div class="modal fade" id="termsModal" tabindex="-1" role="dialog" aria-labelledby="termsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content" style="background-color: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="termsModalLabel">Điều khoản và điều kiện</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>1. Giới thiệu</strong></p>
        <p>Chào mừng bạn đến với cửa hàng dụng cụ làm bánh của chúng tôi. Bằng việc sử dụng dịch vụ, bạn đồng ý với các điều khoản sau.</p>

        <p><strong>2. Sản phẩm và dịch vụ</strong></p>
        <p>Tất cả sản phẩm được cung cấp đều đảm bảo chất lượng như mô tả. Chúng tôi có quyền thay đổi giá và mô tả bất kỳ lúc nào.</p>

        <p><strong>3. Đặt hàng và thanh toán</strong></p>
        <p>Khách hàng cần cung cấp thông tin chính xác khi đặt hàng. Thanh toán được thực hiện qua các phương thức được hỗ trợ tại thời điểm mua hàng.</p>

        <p><strong>4. Chính sách hoàn trả</strong></p>
        <p>Chúng tôi chấp nhận đổi trả trong vòng 7 ngày kể từ ngày nhận hàng nếu sản phẩm lỗi hoặc không đúng mô tả.</p>

        <p><strong>5. Quyền riêng tư</strong></p>
        <p>Chúng tôi cam kết bảo vệ thông tin cá nhân của bạn. Vui lòng xem <a href="#" data-toggle="modal" data-target="#policyModal">chính sách bảo mật</a> để biết thêm chi tiết.
        </p>

        <p><strong>6. Liên hệ</strong></p>
        <p>Mọi thắc mắc vui lòng liên hệ qua email: <a href="mailto:bakersmaket.hotro@gmail.com">bakersmaket.hotro@gmail.com</a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tôi đã đọc</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal: Chính sách bảo mật (Bootstrap chuẩn) -->
<div class="modal fade" id="policyModal" tabindex="-1" role="dialog" aria-labelledby="policyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content" style="background-color: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="policyModalLabel">Chính sách bảo mật</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>1. Mục đích thu thập thông tin</strong></p>
        <p>Chúng tôi thu thập thông tin cá nhân của khách hàng nhằm phục vụ cho quá trình mua hàng, giao hàng và hỗ trợ khách hàng một cách tốt nhất.</p>

        <p><strong>2. Phạm vi thu thập thông tin</strong></p>
        <p>Thông tin được thu thập bao gồm: họ tên, địa chỉ, số điện thoại, email và các thông tin thanh toán nếu có.</p>

        <p><strong>3. Thời gian lưu trữ thông tin</strong></p>
        <p>Thông tin cá nhân sẽ được lưu trữ cho đến khi khách hàng yêu cầu xóa hoặc khi chúng tôi không còn sử dụng chúng cho mục đích kinh doanh.</p>

        <p><strong>4. Cam kết bảo mật thông tin</strong></p>
        <p>Chúng tôi cam kết không chia sẻ, bán hoặc cho thuê thông tin cá nhân của bạn cho bên thứ ba vì mục đích thương mại. Mọi thông tin của bạn được lưu trữ và bảo vệ an toàn.</p>

        <p><strong>5. Quyền của khách hàng</strong></p>
        <p>Bạn có quyền yêu cầu xem, chỉnh sửa hoặc xóa thông tin cá nhân của mình bằng cách liên hệ với chúng tôi qua email hoặc số điện thoại hỗ trợ.</p>

        <p><strong>6. Thay đổi chính sách</strong></p>
        <p>Chúng tôi có thể cập nhật chính sách bảo mật này bất kỳ lúc nào. Mọi thay đổi sẽ được thông báo trên trang web.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tôi đã đọc</button>
      </div>
    </div>
  </div>
</div>
