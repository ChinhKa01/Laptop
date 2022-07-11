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
    <div class="checkout-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="coupon-accordion">
                        <h1 class="cart-heading">Chi tiết hóa đơn</h1>
                            <div class="table-content table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Hình ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $id_order =  $_GET['id'];
                                            $sql = "SELECT * FROM order_product INNER JOIN products 
                                            ON order_product.id_product = products.id WHERE id_order = '$id_order'";
                                            $rs = mysqli_query($connect, $sql);
                                            $count = 0;
                                            $sum = 0;
                                            foreach($rs as $row) {
                                                $count++;
                                        ?>
                                        <tr>
                                            <td><?=$count?></td>
                                            <td><img src="../images/<?=$row['image']?>" alt="" style="width:40%;height:40%;"></td>
                                            <td><?=$row['name']?></td>
                                            <td><?=$row['price']?></td>
                                            <td><?=$row['quantity_order']?></td>
                                            <td><?php
                                            $order_total = $row['quantity_order'] * $row['price'];
                                            $sum += $order_total;
                                            echo $order_total;
                                            ?>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                            <h2>Tổng hóa đơn</h2>
                                            <ul>
                                                <li>Số sản phẩm:<span><?= $count ?></span></li>
                                                <li>Tổng tiền:<span class="cart-total"><?php echo $sum ?></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <!-- ACCORDION END -->
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