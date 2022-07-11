<div class="header-top-furniture wrapper-padding-2 res-header-sm">
    <div class="container-fluid">
        <div class="header-bottom-wrapper">
            <div class="logo-2 furniture-logo ptb-30">
                <a href="index.php"><img src="assets/img/logo/logo.png" alt=""></a>
            </div>
            <div class="menu-style-2 furniture-menu menu-hover" style="margin-left: 15%;">
                <nav>
                    <ul>
                        <li><a href="index.php">Trang chủ</a>
                            <ul class="single-dropdown">
                                <li><a href="Categories_view.php?Cate_id=1&&Manu_id=0">Laptop</a></li>
                                <li><a href="Categories_view.php?Cate_id=2&&Manu_id=0">Smart watch</a></li>
                                <li><a href="Categories_view.php?Cate_id=3&&Manu_id=0">Mobile</a></li>
                                <li><a href="Categories_view.php?Cate_id=4&&Manu_id=0">Tablet</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Web pages</a>
                            <ul class="single-dropdown">
                                <li><a href="index.php">Trang chủ</a></li>
                                <li><a href="about-us.php">Giới thiệu</a></li>
                                <li><a href="index.php">Danh mục</a></li>
                                <li><a href="login.php">Đăng nhập</a></li>
                                <li><a href="register.php">Đăng ký</a></li>
                                <li><a href="show-cart.php">Giỏ hàng</a></li>
                                <li><a href="checkout.php">Thanh toán</a></li>
                                <li><a href="contact.php">Liên hệ</a></li>
                            </ul>
                        </li>
                        <li><a href="">About us</a></li>
                        <li><a href="">Liên hệ</a></li>
                    </ul>
                </nav>
            </div>
            <div class="header-login" style="display:flex;align-items:center;">
                <?php if (isset($_SESSION['user'])) { ?>
                    <ul>
                        <li><a href="profile.php"><i class="ti-user"></i></a></li>
                        <li><a href="logout.php">Đăng xuất</a></li>
                    </ul>
                <?php } else { ?>
                    <ul>
                        <li><a href="login.php">Đăng nhập</a></li>
                        <li><a href="register.php">Đăng ký</a></li>
                    </ul>
                <?php } ?>
            </div>
            <div class="header-cart">
                <a class="icon-cart-furniture">
                    <i class="ti-shopping-cart"></i>
                    <span class="product-count shop-count pink">
                        <?php if (empty($_SESSION['cart'])) {
                            echo 0;
                        } else {
                            echo count($_SESSION['cart']);
                        }
                        ?>
                    </span>
                </a>
                <?php if (isset($_SESSION['user'])) { ?>
                    <ul class="cart-dropdown">
                        <li class="cart-btn-wrapper">
                            <a class="cart-btn btn-hover" href="show-cart.php" style="width:50%;">Giỏ hàng</a>
                            <a class="cart-btn btn-hover" href="order_history.php" style="width:50%;">Lịch sử mua hàng</a>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</div>