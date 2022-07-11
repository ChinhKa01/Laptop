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
    <header style="height:110px;">
        <div class="notifyjs-corner" style="top: 0px; right: 0px;"></div>
        <div class="header-area">
            <?php include("header.php"); ?>
        </div>
    </header>
    <div id="content">
        <?php
        $txtSearch =  trim(preg_replace("/\s+/", " ", $_POST['txtSearch']));
        $sql = "SELECT * FROM products WHERE name LIKE '%$txtSearch%'";
        $r = mysqli_query($connect, $sql);
        $arr =  mysqli_fetch_array($r);
        ?><br>
        <h4><a href="index.php">TRANG CHỦ</a> / TÌM KIẾM : "<?= $txtSearch ?>"</h4><br>
        <div class="tab-content">
            <div class="tab-pane active show fade" id="home1" role="tabpanel">
                <?php if (!empty($txtSearch) && !empty($arr)) { ?>
                    <div class="custom-row">
                        <?php
                        foreach ($r as $r3) {
                        ?>
                            <div class="custom-col-5 custom-col-style mb-65">
                                <div class="product-wrapper" style="text-align: center;">
                                    <div class="product-img">
                                        <a href="#" style="display:block;">
                                            <img style="width:70%; height:70%;" src="../images/<?= $r3['image'] ?>" alt="">
                                        </a>
                                        <span><?= -$r3['discount'] ?>%</span>
                                        <div class="product-action">
                                            <a class="btn-add-to-cart animate-left" title="Add To Cart" data-id="<?php echo $r3['id']; ?>" style="color: white;">
                                                <i class="pe-7s-cart"></i>
                                            </a>
                                            <a class="btn-quick-view animate-right" title="Quick View" data-id="<?php echo $r3['id'] ?>" data-toggle="modal" data-target="#exampleModal" style="color: white;">
                                                <i class="pe-7s-look"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <a href="product-details.html" style="display:block;">
                                            <h4><?= $r3['name'] ?></h4>
                                            <div style=" text-decoration: line-through;"><?= number_format(round($r3['price'], -3)) ?><span style="text-decoration: underline;"><sup>đ</sup></span></div>
                                            <div style="color:red;font-weight: bold;font-size: 18px;"><?= number_format(round($r3['price'] * (1 - $r3['discount'] / 100), -3)) ?><span style="text-decoration: underline;"><sup>đ</sup></span></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                <?php } else {
                    echo "
                    <div style='height: 200px;'>
                        <h2>Không tìm thấy sản phẩm nào!</h2>
                    </div>
                    ";
                } ?>
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