<?php
session_start();
if (isset($_SESSION['user'])) {
    include("../connect.php");
?>
    <!doctype html>
    <html class="no-js" lang="en">

    <head>
        <?php include("head.php") ?>
    </head>

    <body>
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- header start -->
        <header>
            <?php include("header2.php"); ?>
        </header>
        <!-- header end -->

        <!-- checkout-area start -->
        <?php
        $id_user = $_SESSION['user']['id'];
        $sql = "SELECT * FROM users WHERE id = '$id_user'";
        $rs = mysqli_query($connect, $sql);
        $r = mysqli_fetch_array($rs);
        ?>
        <div class="about-story pt-95 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="story-img">
                            <img style="width: 200px" class="avatar" src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" alt="" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="story-details pl-50">
                            <div class="story-details-top">
                                <h2><span>Thông tin khách hàng</span></h2>
                                <h4>Họ và tên: <?= $r['name'] ?></h4>
                                <h4>Địa chỉ: <?= $r['address'] ?></h4>
                                <h4>Số điện thoại: <?= $r['phone'] ?></h4>
                                <h4>Giới tính: <?= $r['gender'] ?></h4>
                            </div>
                            <a href="index.php">
                                <button type="button" style="cursor:pointer" class="btn btn-primary">Trở lại trang chủ</button>
                            </a>
                            <a href="edit_profile.php">
                                <button type="button" style="cursor:pointer" class="btn btn-secondary">Chỉnh sửa thông tin</button>
                            </a>
                            <a href="change_password.php">
                                <button type="button" style="cursor:pointer" class="btn btn-secondary">Đổi mật khẩu</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout-area end -->
        <footer class="footer-area">
            <?php include("footer.php"); ?>
        </footer>

        <script>
            <?php
            if ($_SESSION['success'] == "OK") { ?>
                swal("success", "Sửa thành công!", "success");
            <?php unset($_SESSION['success']);
            } ?>
        </script>
        <!-- all js here -->
        <?php include("script.php") ?>
    </body>

    </html>
<?php } else {
    header("Location:http://localhost/Technology/user/login.php");
} ?>