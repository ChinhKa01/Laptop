<div class="header-left-sidebar" style="width:16%;">
    <div class="logo" style="position:absolute;top:30px;left:-40px">
        <a href="index.php"><img style="width:110%;height:110%" src="assets/img/logo/logo.png" alt=""></a>
    </div>
    <div class="main-menu menu-hover" style="position:absolute;top:-8px">
        <nav>
            <ul>
                <li><a href="Categories_view.php?Cate_id=1&&Manu_id=0">LAPTOP</a>
                    <ul class="single-dropdown">
                        <li><a href="Categories_view.php?Cate_id=1&&Manu_id=1">Apple</a></li>
                        <li><a href="Categories_view.php?Cate_id=1&&Manu_id=4">Dell</a></li>
                        <li><a href="Categories_view.php?Cate_id=1&&Manu_id=5">Asus</a></li>
                    </ul>
                </li>
                <li><a href="Categories_view.php?Cate_id=2&&Manu_id=0">SMART WATCH</a>
                    <ul class="single-dropdown">
                        <li><a href="Categories_view.php?Cate_id=2&&Manu_id=1">Apple</a></li>
                        <li><a href="Categories_view.php?Cate_id=2&&Manu_id=2">Samsung</a></li>
                        <li><a href="Categories_view.php?Cate_id=2&&Manu_id=3">Xiaomi</a></li>
                    </ul>
                </li>
                <li><a href="Categories_view.php?Cate_id=3&&Manu_id=0">MOBILE</a>
                    <ul class="single-dropdown">
                        <li><a href="Categories_view.php?Cate_id=3&&Manu_id=1">Apple</a></li>
                        <li><a href="Categories_view.php?Cate_id=3&&Manu_id=2">Samsung</a></li>
                        <li><a href="Categories_view.php?Cate_id=3&&Manu_id=3">Xiaomi</a></li>
                    </ul>
                </li>
                <li><a href="Categories_view.php?Cate_id=4&&Manu_id=0">TABLET</a>
                    <ul class="single-dropdown">
                        <li><a href="Categories_view.php?Cate_id=4&&Manu_id=1">Apple</a></li>
                        <li><a href="Categories_view.php?Cate_id=4&&Manu_id=2">Samsung</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<div class="header-right-sidebar">
    <div class="header-search-cart-login">
        <div class="logo">
            <a href="index.php">
                <img src="assets/img/logo/logo.png" alt="">
            </a>
        </div>
        <div class="header-search">
            <form action="Search.php" method="post">
                <input name="txtSearch" placeholder="Tìm kiếm ..." type="text">
                <button>
                    <i class="ti-search"></i>
                </button>
            </form>
        </div>
        <div class="header-login">
            <?php if (isset($_SESSION['user'])) { ?>
                <ul>
                    <li><a href="profile.php">Xin Chào: <?= $_SESSION['user']['name'] ?></a></li>
                    <li><a href="logout.php">Đăng xuất</a></li>
                </ul>
            <?php } else { ?>
                <ul>
                    <li><a href="login.php">Đăng nhập</a></li>
                    <li><a href="register.php">Đăng ký</a></li>
                </ul>
            <?php } ?>
        </div>
        <div class="header-cart cart-res">
            <a class="cart icon-cart">
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