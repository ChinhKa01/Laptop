<?php
session_start();
include("../../connect.php");
$sql = "SELECT * FROM orders";
$result = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("../head.php"); ?>
</head>

<body class="loading" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <?php include("../menu.php"); ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <?php include("../header.php"); ?>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Danh sách hóa đơn</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row justify-content-center">
                        <table class="table table-striped table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên người nhận </th>
                                    <th>Số điện thoại người nhận</th>
                                    <th>Địa chỉ người nhận</th>
                                    <th>Tổng giá</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo đơn</th>
                                    <th>Duyệt đơn</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                foreach ($result as $item) {
                                    $id = $item["id"];
                                    $count++;
                                ?>
                                    <tr>
                                        <td><?= $count ?></td>
                                        <td><?= $item['name_receiver'] ?></td>
                                        <td><?= $item['phone_receiver'] ?></td>
                                        <td><?= $item['address_receiver'] ?></td>
                                        <td><?= number_format($item['total_price']) ?></td>
                                        <td><?php if ($item['status'] === "Đang xử lý") {
                                                echo "<span class='text-danger status$id'>Đang xử lý</span>";
                                            } else if ($item['status'] === "Đã duyệt") {
                                                echo "<span class='text-success status$id'>Đã duyệt</span>";
                                            } ?></td>
                                        <td><?= $item['created_at'] ?></td>
                                        <td>
                                            <?php if ($item['status'] === "Đang xử lý") { ?>
                                                <button style="width:70px" class="btn btn-success action <?= $item["id"] ?>" data-id="<?= $item["id"] ?>"><span id="<?= $item["id"] ?>">Duyệt</span></button>
                                            <?php
                                            } else if ($item['status'] === "Đã duyệt") { ?>
                                                <button style="width:70px" class="btn btn-danger action <?= $item["id"] ?>" data-id="<?= $item["id"] ?>"><span id="<?= $item["id"] ?>">Hủy</span></button>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $(".action").click(function() {
                            let id = $(this).data('id');
                            let action = $("#" + id).text();
                            $.ajax({
                                url: "process_order.php",
                                type: "GET",
                                data: {
                                    id,
                                    action      
                                },
                            }).done(function(data) {
                                if (data == "accept_success" && action === "Duyệt") {
                                    $("#" + id).text("Hủy");
                                    $("." + id).attr("class", "btn btn-danger action " + id);
                                    $(".status" + id).text("Đã duyệt");
                                    $(".status" + id).attr("class", "text-success status" + id);
                                    swal("success", "Đã duyệt đơn!", "success");
                                } else if (data == "cancel_success" && action === "Hủy") {
                                    $("#" + id).text("Duyệt");
                                    $("." + id).attr("class", "btn btn-success action " + id);
                                    $(".status" + id).text("Đang xử lý");
                                    $(".status" + id).attr("class", "text-danger status" + id);
                                    swal("success", "Đã hủy duyệt đơn!", "success");
                                }
                            });
                        })
                    })
                </script>

            </div>
            <!-- container -->

        </div>
        <!-- content -->

        <!-- Footer Start -->
        <?php include('../footer.php'); ?>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <?php include("../optionBackground.php"); ?>
    <!-- /Right-bar -->

    <!-- bundle -->
    <?php include("../script.php"); ?>
    <!-- end demo js-->
</body>

</html>