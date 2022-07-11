<?php
session_start();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include("head.php");?>
</head>

<body>
    <header>
    <header>
            <div class="header-top-furniture wrapper-padding-2 res-header-sm">
                <div class="container-fluid">
                    <div class="header-bottom-wrapper">
                        <div class="logo-2 furniture-logo ptb-30">
                            <a href="index.php">
                                <img src="assets/img/logo/2.png" alt="">
                            </a>
                        </div>
                        <div class="menu-style-2 furniture-menu menu-hover">
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
                                            <li><a href="contact.php">Liên hệ</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="about-us.php">About us</a></li>
                                    <li><a href="contact.php">Liên hệ</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-cart">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom-furniture wrapper-padding-2 border-top-3">
                <div class="container-fluid">
                    <div class="furniture-bottom-wrapper">
                        <div class="furniture-login">
                            <ul>
                                <li>Truy cập: <a href="login.php">Đăng nhập </a></li>
                                <li><a href="register.php">Đăng ký </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </header>
    <!-- header end -->
    <div>
        <h1 class="text-center text-warning">Đăng ký</h1>
    </div>
    <!-- login-area start -->
    <div class="register-area ptb-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-12 col-lg-6 col-xl-6 ml-auto mr-auto">
                    <div class="login">
                        <div class="login-form-container">
                            <div class="login-form">
                                <div>
                                    <input required type="text" id = "user-name" name="user-name" placeholder="Username">
                                    <input required type="text" name="email" id = "email" placeholder="Email">
                                    <input required type="password" name="user-password" id = "password" placeholder="Password">
                                    <input required type="password" name="user-password-again" id = "password-again" placeholder="Password Again">
                                    <div class="button-box">
                                        <button type="submit" class="default-btn floatright check">Đăng ký</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login-area end -->
    <footer class="footer-area">
        <?php include("footer.php"); ?>
    </footer>
    
    <script>
         $(document).ready(function() {
            $(".check").click(function(){
                let username = document.getElementById("user-name").value;
                let email = document.getElementById("email").value;
                let password = document.getElementById("password").value;
                let password_again = document.getElementById("password-again").value;
                $.ajax({
                    url: "process-register.php",
                    type: "POST",
                    data: {
                        username,
                        email,
                        password,
                        password_again
                    },
                }).done(function(data) {
                    if(data == "isEmpty"){
                        swal("warning", "Bạn cần phải điền tất cả thông tin!","warning");
                    }
                    else if(data == "invalidEmail") {
                        swal("warning", "Email nhập sai định dạng!","warning");
                    }
                    else if(data == "notSame") {
                        swal("warning", "Email không đồng nhất!","warning");
                    }
                    else if(data == "invalidPassword") {
                        swal("warning", "Mật khẩu phải từ 8 ký tự trở lên!","warning");
                    }
                    else if(data == "isExistEmail"){
                        swal("warning", "Email này đã tồn tại!","warning");
                    }
                    else if(data == "success"){
                        swal("success", "Đăng ký thành công","success");
                    }
                });
            });
         });
    </script>
    <!-- all js here -->
    <?php include("script.php"); ?>
</body>

</html>