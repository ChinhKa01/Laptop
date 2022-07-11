<?php
session_start();
if (isset($_SESSION['user'])) {
?>
    <!doctype html>
    <html class="no-js" lang="en">

    <head>
        <?php include("head.php"); ?>
    </head>

    <body>
        <header>
            <?php include("header2.php"); ?>
        </header>
        <!-- header end -->

        <!-- shopping-cart-area start -->
        <div class="cart-main-area pt-95 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <h1 class="cart-heading">Giỏ hàng</h1>
                        <?php if (isset($_SESSION['cart'])) {
                            if (empty($_SESSION['cart'])) {
                                echo "<p>Không có sản phẩm trong giỏ hàng!</p>";
                            } else { ?>
                                <div>
                                    <div class="table-content table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Hủy</th>
                                                    <th>Ảnh</th>
                                                    <th>Tên sản phẩm</th>
                                                    <th>Giá</th>
                                                    <th>Số lượng</th>
                                                    <th>Thành tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $cart = $_SESSION['cart'];
                                                $cart_total = 0;
                                                foreach ($cart as $key => $value) { ?>
                                                    <tr>
                                                        <td class="product-remove"><a href="delete-cart.php?id=<?= $key ?>"><i class="pe-7s-close"></i></a></td>
                                                        <td class="product-thumbnail">
                                                            <a href="#"><img style="width:100%; height:100%;" src="../images/<?= $value['image'] ?>" alt=""></a>
                                                        </td>
                                                        <td class="product-name"><a href="#"> <?= $value['name'] ?> </a></td>
                                                        <td class="product-price-cart"><span class="amount"><?= $value['price'] ?></span></td>
                                                        <td class="product-quantity">
                                                            <button class="plus btn btn-primary" data-id="<?= $key ?>" style="font-size:25px">+</button>
                                                            <input class="quantity<?= $key ?>" value="<?= $value['quantity'] ?>" type="text" readonly style="text-align:center;">
                                                            <button class="sub btn btn-primary" data-id="<?= $key ?>" style="font-size:25px">-</button>
                                                        </td>
                                                        <td class="product-subtotal total<?= $key ?>"><?php
                                                                                                        $total = $value['price'] * $value['quantity'];
                                                                                                        $cart_total += $total;
                                                                                                        echo $total;
                                                                                                        ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="coupon-all">
                                                <div class="coupon2">
                                                    <a style="color: white;" href="delete-cart.php"><button class="button" style="background-color:black;color:white;">Xóa giỏ hàng</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5 ml-auto">
                                            <div class="cart-page-total">
                                                <h2>Tổng giỏ hàng</h2>
                                                <ul>
                                                    <li>Số sản phẩm:<span><?= count($cart) ?></span></li>
                                                    <li>Tổng tiền:<span class="cart-total"><?php echo $cart_total ?></span></li>
                                                </ul>
                                                <a href="checkout.php">Thanh toán</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                        } else {
                            echo "<p>Không có sản phẩm trong giỏ hàng!</p>";
                        } ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- shopping-cart-area end -->
        <footer class="footer-area">
            <?php include("footer.php"); ?>
        </footer>
        <script>
            $(document).ready(function() {
                var count = 0;
                $(".plus").click(function() {
                    let id = $(this).data("id");
                    let method = "+";
                    $.ajax({
                        url: "update_cart.php",
                        type: "GET",
                        data: {
                            id,
                            method,
                        },
                    }).done(function(data) {
                        const x = JSON.parse(data);
                        $(".quantity" + id).attr("value", x['quantity']);
                        $(".total" + id).text(x['total']);

                        //cập nhật lại tổng tiền cart
                        let sum = 0;
                        <?php
                        foreach ($cart as $key => $value) { ?>
                            sum += parseInt($(".total" + <?= $key ?>).text());
                        <?php } ?>
                        $(".cart-total").text(sum);
                    });
                })
                $(".sub").click(function() {
                    let id = $(this).data("id");
                    let method = "-";
                    $.ajax({
                        url: "update_cart.php",
                        type: "GET",
                        data: {
                            id,
                            method,
                        },
                    }).done(function(data) {
                        const x = JSON.parse(data);
                        if (x['quantity'] > 0) {
                            $(".quantity" + id).attr("value", x['quantity']);
                            $(".total" + id).text(x['total']);
                        }

                        //cập nhật lại tổng tiền cart
                        let sum = 0;
                        <?php
                        foreach ($cart as $key => $value) { ?>
                            sum += parseInt($(".total" + <?= $key ?>).text());
                        <?php } ?>
                        $(".cart-total").text(sum);
                    });
                })
            });
        </script>
        <!-- all js here -->
        <?php include("script.php") ?>
    </body>

    </html>
<?php } else {
    header("Location:http://localhost/Technology/user/login.php");
} ?>