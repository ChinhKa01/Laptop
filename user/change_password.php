<?php
session_start();
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
    <!-- login-area start -->
    <div>
        <h1 style="text-align: center;"><span class="text-warning">Đổi mật khẩu</span></h1>
    </div>
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
                                $rs= mysqli_query($connect, $sql);
                                $r = mysqli_fetch_array($rs);
                                ?>
                                <div>
                                    <label for="">Email</label>
                                    <input type="text" name="txtEmail" required id = "email">
                                    <label for="">Mật khẩu cũ</label>
                                    <input type="password" name="oldPass" required id = "oldPass">
                                    <label for="">Mật khẩu mới</label>
                                    <input type="password" name="newPass" required id = "newPass">
                                    <label for="">Nhập lại mật khẩu mới</label>
                                    <input type="password" type="password" name="newPassAgain" required id="newPassAgain">
                                    <div class="button-box">
                                        <button style="cursor:pointer" class="default-btn floatright check">Cập nhật mật khẩu</button>
                                    </div>
                                </div>
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

    <script>
         $(document).ready(function() {
            $(".check").click(function(){
                let oldPass = document.getElementById("oldPass").value;
                let newPass = document.getElementById("newPass").value;
                let newPassAgain = document.getElementById("newPassAgain").value;
                let email = document.getElementById("email").value;
                $.ajax({
                    url: "process_edit_password.php",
                    type: "POST",
                    data: {
                        email,
                        oldPass,
                        newPass,
                        newPassAgain
                    },
                }).done(function(data) {
                    if(data == "isEmpty"){
                        swal("warning", "Bạn cần phải điền tất cả thông tin!","warning");
                    }
                    else if(data == "notCorrect") {
                        swal("warning", "Email hoặc mật khẩu không chính xác!","warning");
                    }
                    else if(data == "notSame"){
                        swal("warning", "Nhập lại mật khẩu không đúng!","warning");
                    }
                    else{
                        swal("success", "Đổi mật khẩu thành công","success");
                    }
                });
            });
         });
    </script>
    <!-- all js here -->
    <?php include("script.php") ?>
</body>

</html>