<?php
session_start();
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
        <?php include("header2.php"); ?>
    </header>
    <!-- header end -->

    <!-- checkout-area start -->
    <div class="checkout-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="coupon-accordion">
                        <h1 class="cart-heading">Lịch sử mua hàng</h1>
                        <form action="#">
                            <div class="table-content table-responsive">
                                <table class="table table-hover">
                                    <?php
                                    $id_user = $_SESSION['user']['id'];
                                    $sql = "SELECT * FROM orders WHERE id_user = '$id_user'";
                                    $rs = mysqli_query($connect, $sql);
                                    $nbrRow = mysqli_num_rows($rs);
                                    if ($nbrRow != 0) {
                                    ?>
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Ngày tạo đơn</th>
                                                <th>Thành tiền</th>
                                                <th>Trạng thái</th>
                                                <th>Chi tiết đơn hàng </th>
                                                <th>Hành động</th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 0;
                                            foreach ($rs as $row) {
                                                $count++;
                                            ?>
                                                <tr>
                                                    <td><?= $count ?></td>
                                                    <td><?= $row['created_at'] ?></td>
                                                    <td><?= $row['total_price'] ?></td>
                                                    <td class="text-warning"><?php if($row['status'] == 'Đã duyệt'){
                                                        echo "<span class='text-success'>Đã duyệt</span>";
                                                    }else if($row['status'] == 'Đang xử lý'){
                                                        echo "<span class='text-danger'>Đang xử lý</span>";
                                                    } ?></td>
                                                    <td>
                                                        <a class="cart-btn text-success" href="order_detail.php?id=<?= $row['id'] ?>">Chi tiết</a>
                                                    </td>
                                                    <td>
                                                        <a class="cart-btn text-danger" href="delete_order.php?id=<?= $row['id'] ?>">Hủy đơn</a>
                                                    </td>
                                                </tr>
                                            <?php }
                                        } else { ?>
                                            <tr>
                                                <td>Bạn chưa có đơn hàng nào</td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                </table>
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
    <script>
        <?php
        if ($_SESSION['success'] == "OK") { ?>
            swal("success", "Đặt hàng thành công!", "success");
        <?php unset($_SESSION['success']);
        } else if ($_SESSION['success'] == "delete success") { ?>
            swal("success", "Hủy đặt hàng thành công!", "success");
        <?php unset($_SESSION['success']);
        } ?>
    </script>

    <!-- all js here -->
    <?php include("script.php"); ?>
</body>

</html>