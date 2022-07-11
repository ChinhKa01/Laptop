<?php
session_start();
if (isset($_SESSION['user'])) {
    include("../connect.php");
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

        <!-- checkout-area start -->
        <div class="checkout-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="coupon-accordion">
                            <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                            <div id="checkout_coupon" class="coupon-checkout-content">
                                <div class="coupon-info">
                                    <form action="#">
                                        <p class="checkout-coupon">
                                            <input type="text" placeholder="Coupon code" />
                                            <input type="submit" value="Apply Coupon" />
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <form action="process_checkout.php" method="post" id="sub">
                            <div class="checkbox-form">
                                <h3>Hóa đơn</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Họ tên người nhận <span class="required">*</span></label>
                                            <input type="text" required placeholder="" name="txtName" id="txtName" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Số điện thoại <span class="required">*</span></label>
                                            <input type="text" required placeholder="" name="txtNbrPhone" id="txtNbrPhone" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Địa chỉ nhận hàng <span class="required">*</span></label>
                                            <input type="text" required placeholder="Vui lòng điền chính xác địa điểm nhận hàng" name="txtAdd" id="txtAdd" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Ghi chú đơn hàng</label>
                                            <textarea name="txtNote" id="checkout-mess" cols="60" rows="10" placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: những lưu ý đặc biệt khi giao hàng."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="order_total" id="order_total">
                            <input type="hidden" name="method_payment" id="method_payment">
                        </form>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="your-order">
                            <h3>Chi tiết hóa đơn</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (isset($_SESSION['cart'])) {
                                            $cart  = $_SESSION['cart'];
                                            $cart_total =  0;
                                            foreach ($cart as $key => $value) { ?>
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        <?= $value['name'] ?> <strong class="product-quantity"> × <?= $value['quantity'] ?></strong>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">
                                                            <?php $total = $value['quantity'] * $value['price'];
                                                            $cart_total  +=  $total;
                                                            echo $total; ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount"><?php echo $cart_total ?></span></strong></td>
                                        </tr>
                                    <?php } ?>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div class="panel-group" id="faq">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h5 class="panel-title" style="display:flex;"><input type="radio" checked value="trực tiếp" name="method" id="" style="width:4%;height:20px;"><a data-toggle="collapse" aria-expanded="true" data-parent="#faq" href="#payment-1" style="margin-left: 10px;">Thanh toán trực tiếp</a></h5>
                                            </div>
                                            <div id="payment-1" class="panel-collapse collapse show">
                                                <div class="panel-body">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h5 class="panel-title" style="display:flex;"><input type="radio" value="chuyển khoản" name="method" id="" style="width:4%;height:20px;"><a class="collapsed" style="margin-left: 10px;" data-toggle="collapse" aria-expanded="false" data-parent="#faq" href="#payment-2">Chuyển khoản ngân hàng</a></h5>
                                            </div>
                                            <div id="payment-2" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h5 class="panel-title" style="display:flex;"><input type="radio" value="3" name="method" id="" style="width:4%;height:20px;"><a class="collapsed" style="margin-left: 10px;" data-toggle="collapse" aria-expanded="false" data-parent="#faq" href="#payment-3">PayPal</a></h5>
                                            </div>
                                            <div id="payment-3" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-button-payment">
                                        <input type="submit" value="Đặt hàng" onclick="sub()" />
                                    </div>
                                    <script>
                                        function sub() {
                                            $("#order_total").attr("value", <?= $cart_total ?>);
                                            let submit = document.getElementById("sub");
                                            let method_arr = document.getElementsByName("method");
                                            for (var i = 0; i < method_arr.length; i++) {
                                                if (method_arr[i].checked === true) {
                                                    $("#method_payment").attr("value", method_arr[i].value);
                                                }
                                            }
                                            let name = document.getElementById("txtName").value;
                                            let nbrPhone = document.getElementById("txtNbrPhone").value;
                                            let add = document.getElementById("txtAdd").value;
                                            if (name != "" && nbrPhone != "" && add != "") {
                                                submit.submit();
                                            } else {
                                                $.notify("Bạn cần phải nhập đầy đủ thông tin!", "error");
                                            }
                                        }
                                    </script>
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
        <?php include("script.php"); ?>
    </body>

    </html>
<?php } else {
    header("Location:http://localhost/Technology/user/login.php");
} ?>