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
        <div>
            <h1 style="text-align: center;"><span class="text-warning">Thông tin khách hàng</span></h1>
        </div>
        <!-- login-area start -->
        <div class="register-area ptb-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-12 col-lg-6 col-xl-6 ml-auto mr-auto">
                        <div class="login">
                            <div class="login-form-container">
                                <div class="login-form">
                                    <?php
                                    $id_user = $_SESSION['user']['id'];
                                    $sql = "SELECT * FROM users WHERE id = $id_user";
                                    $rs = mysqli_query($connect, $sql);
                                    $r = mysqli_fetch_array($rs);
                                    ?>
                                    <form action="process_edit_profile.php" method="post">
                                        <label for="">Họ và tên</label>
                                        <input type="text" name="txtName" required value="<?= $r['name'] ?>">
                                        <label for="">Địa chỉ</label>
                                        <input type="text" name="txtAdd" required value="<?= $r['address'] ?>">
                                        <label for="">Số điện thoại</label>
                                        <input type="number" name="txtPhone" required value="<?= $r['phone'] ?>">
                                        <div style="display: flex;">
                                            <label for="">Giới tính:</label>
                                            <input type="radio" name="gender" id="" value="Nam" style="width:4%;height:20px;margin-left: 5%;" <?php if ($r['gender'] == 'Nam') echo 'checked="checked"'; ?>>Nam
                                            <input type="radio" name="gender" id="" value="Nữ" style="width:4%;height:20px;margin-left: 5%;" <?php if ($r['gender'] == 'Nữ') echo 'checked="checked"'; ?>>Nữ
                                        </div>
                                        <div class="button-box">
                                            <button style="cursor:pointer" type="submit" class="default-btn floatright">Lưu thông tin</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout-area end -->
        <footer class="footer-area">
            <?php include("footer.php"); ?>
        </footer>

        <!-- all js here -->
        <?php include("script.php") ?>
    </body>

    </html>
<?php } else {
    header("Location:http://localhost/Technology/user/login.php");
} ?>