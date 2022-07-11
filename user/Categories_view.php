<?php
if (!isset($_SESSION)) {
    session_start();
}
include("../connect.php");
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <?php include("head.php"); ?>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- header start -->
    <header>
        <div class="notifyjs-corner" style="top: 0px; right: 0px;"></div>
        <div class="header-area">
            <?php include("header.php"); ?>
            <div class="slider-area ">
                <div class="slider-active owl-carousel">
                    <div class="single-slider single-slider-hm1 bg-img height-100vh" style="background-image: url(assets/img/slider/Slider2.jpg);background-size:60% 60%;background-repeat : no-repeat;background-position:10px;">
                        <div class="slider-content slider-animation slider-content-style-1 slider-animated-1">
                            <h1 style="color:yellow" class="animated">Fashion</h1>
                            <p style="color: yellow " class="animated">Find your favorite device model. </p>
                        </div>
                        <div class="position-slider-img">
                            <div class="slider-img-1">
                                <img src="assets/img/slider/ " alt="">
                            </div>
                            <div class="slider-img-2">
                                <img class="tilter" src="assets/img/slider/Slider3.jpg" alt="">
                            </div>
                            <div class="slider-img-3">
                                <img src="assets/img/slider/8.png" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="single-slider single-slider-hm1 bg-img height-100vh" style="background-image: url(assets/img/slider/Slider1.jpg);background-size:40% 50%;background-repeat : no-repeat;background-position:300px;">
                        <div class="slider-content slider-animation slider-content-style-1 slider-animated-2">
                            <h1 class="animated">Young</h1>
                            <p class="animated">Explore in your own style. </p>
                        </div>
                        <div class="position-slider-img">
                            <div class="slider-img-1">
                                <img src="assets/img/slider/ " alt="">
                            </div>
                            <div class="slider-img-4 slider-mrg">
                                <img class="tilter" src="assets/img/slider/Slider4.jpg" alt="" style="background-color:yellow">
                            </div>
                            <div class="slider-img-3">
                                <img src="assets/img/slider/8.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </header>
    <!-- header end -->
    <!-- banner area start -->

    <!-- banner area end -->
    <!-- product area start -->
    <div class="product-area pt-115 pb-120">
        <div class="pl-100 pr-100">
            <div class="container-fluid">
                <?php
                $Cate_id = $_GET['Cate_id'];
                $Manu_id = $_GET['Manu_id'];
                $sql =  "SELECT * FROM categories WHERE id =  '$Cate_id'";
                $rs  = mysqli_query($connect, $sql);
                $r = mysqli_fetch_assoc($rs);
                if (empty($Manu_id)) {
                ?>
                    <div class="section-title text-center mb-60">
                        <h2><?= $r['name'] ?></h2>
                    </div>
                <?php
                    $sql3 =  "SELECT * FROM products WHERE id_category =  '$Cate_id'";
                } else {
                    $sql2 =  "SELECT * FROM manufacturers WHERE id =  '$Manu_id'";
                    $rs2  = mysqli_query($connect, $sql2);
                    $r2 = mysqli_fetch_assoc($rs2);
                    $sql3 =  "SELECT * FROM products WHERE id_category =  '$Cate_id' AND id_manufacturer  = '$Manu_id'";
                ?>
                    <div class="section-title text-center mb-60">
                        <h2><?= $r['name'] ?> : <?= $r2['name'] ?></h2>
                    </div>
                <?php } ?>
                <div class="product-style">
                    <div class="custom-row">
                        <?php
                        $rs3 = mysqli_query($connect, $sql3);
                        foreach ($rs3 as $r) {
                        ?>
                            <div class="custom-col-5 custom-col-style mb-65">
                                <div class="product-wrapper" style="text-align: center;">
                                    <div class="product-img">
                                        <a href="#" style="display:block;">
                                            <img style="width:50%; height:50%;" src="../images/<?= $r['image'] ?>" alt="">
                                        </a>
                                        <span><?= -$r['discount'] ?>%</span>
                                        <div class="product-action">
                                            <a class="btn-add-to-cart animate-left" title="Add To Cart" data-id="<?php echo $r['id']; ?>" style="color: white;">
                                                <i class="pe-7s-cart"></i>
                                            </a>
                                            <a class="btn-quick-view animate-right" title="Quick View" data-id="<?php echo $r['id'] ?>" data-toggle="modal" data-target="#exampleModal" style="color: white;">
                                                <i class="pe-7s-look"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a href="product-details.html" style="display:block;">
                                            <h4><?= $r['name'] ?></h4>
                                            <div style=" text-decoration: line-through;"><?= number_format(round($r['price'], -3)) ?><span style="text-decoration: underline;"><sup>đ</sup></span></div>
                                            <div style="color:red;font-weight: bold;font-size: 18px;"><?= number_format(round($r['price'] * (1 - $r['discount'] / 100), -3)) ?><span style="text-decoration: underline;"><sup>đ</sup></span></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div style="display:flex;justify-content:center;align-items:center;">
                    <a style="color: white;" href="index.php"><button class="button" style="background-color:black;color:white;">Trở về trang chủ</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- banner area two end -->
    <!-- all products area start -->
    <div class="all-products-area pt-115 pb-50">
        <div class="pl-100 pr-100">
            <!-- all products area end -->
            <!-- brand logo area start -->
            <div class="brand-logo-area pl-100 pr-100">
                <div class="ptb-135 gray-bg">
                    <div class="brand-logo-active owl-carousel">
                        <div class="single-brand">
                            <img src="assets/img/brand-logo/1.png" alt="">
                        </div>
                        <div class="single-brand">
                            <img src="assets/img/brand-logo/2.png" alt="">
                        </div>
                        <div class="single-brand">
                            <img src="assets/img/brand-logo/1.png" alt="">
                        </div>
                        <div class="single-brand">
                            <img src="assets/img/brand-logo/3.png" alt="">
                        </div>
                        <div class="single-brand">
                            <img src="assets/img/brand-logo/4.png" alt="">
                        </div>
                        <div class="single-brand">
                            <img src="assets/img/brand-logo/5.png" alt="">
                        </div>
                        <div class="single-brand">
                            <img src="assets/img/brand-logo/6.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- insta feed end -->
    <footer class="footer-area">
        <?php include("footer.php"); ?>
    </footer>
    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="pe-7s-close" aria-hidden="true"></span>
        </button>
        <div class="modal-dialog modal-quickview-width" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="qwick-view-left">
                        <div class="quick-view-learg-img">
                            <div class="quick-view-tab-content tab-content">
                                <div class="tab-pane active show fade" id="modal1" role="tabpanel">
                                    <img class="img" src="" style="width: 100%; height: 100%;" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="qwick-view-right">
                        <div class="qwick-view-content">
                            <h3 class="qwick-view-title"></h3>
                            <div class="price">
                                <span class="new"></span>
                                <span class="old"></span>
                            </div>
                            <div class="text-danger" style="font-weight: bold; font-size:20px"><span class="quantity"></span></div><br>
                            <div id="description">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- all js here -->
    <script>
        const formatter = new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD',
            minimumFractionDigits: 0
        })
        $(document).ready(function() {
            $(".btn-quick-view").click(function() {
                let id = $(this).data("id");
                $.ajax({
                    url: "quick-view.php",
                    type: 'GET',
                    data: {
                        id
                    },
                }).done(function(data) {
                    const product = JSON.parse(data);
                    $(".qwick-view-title").text(product['name']);
                    $(".old").text(formatter.format(product['price']));
                    $(".new").text(formatter.format(product['price'] * (1 - product['discount'] / 100)));

                    let des = product['description'];
                    let arr = des.split(";");
                    let div = document.getElementById("description");
                    div.innerHTML = "";
                    for (let i = 0; i < arr.length; i++) {
                        let p = document.createElement("div");
                        let node = document.createTextNode(arr[i]);
                        p.appendChild(node);
                        div.appendChild(p);
                    }

                    $(".img").attr('src', `../images/${product['image']}`);
                    if (product['quantity'] > 0) {
                        $(".quantity").text("Số lượng:" + product['quantity']);
                    } else {
                        $(".quantity").text("Đã hết sản phẩm");
                    }
                })
            })
            $(".btn-add-to-cart").click(function() {
                <?php if (isset($_SESSION['user'])) { ?>
                    let id = $(this).data('id');
                    $.ajax({
                        url: "add-to-cart.php",
                        type: "GET",
                        data: {
                            id
                        },
                    }).done(function(data) {
                        $.notify('Thêm vào giỏ hàng thành công!', 'success');
                        $(".product-count").text(data);
                    })
                <?php } else { ?>
                    $.notify('Bạn cần phải đăng nhập để sử dụng tính năng này!', 'warning');
                <?php } ?>
            })
            $(".cart").click(function() {
                <?php if (isset($_SESSION['user'])) { ?>
                    $(".cart").attr('href', 'show-cart.php');
                <?php } else { ?>
                    $.notify('Bạn cần phải đăng nhập để sử dụng tính năng này!', 'warning');
                <?php } ?>
            })
        })
        <?php if (isset($_SESSION['login-status'])) { ?>
            $.notify("Đăng nhập thành công!", "success");
        <?php } ?>
    </script>
    <?php include("script.php") ?>
</body>

</html>