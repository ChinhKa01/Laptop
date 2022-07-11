<?php
include("../../connect.php");
session_start();
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
                                <h4 class="page-title">Tất cả sản phẩm</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row justify-content-center">
                        <table class="table table-striped table-centered mb-0" style="text-align:center">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Nhà Sản Xuất</th>
                                    <th> Danh Mục</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Hình Ảnh</th>
                                    <th>Giá</th>
                                    <th>Giảm giá</th>
                                    <th>Số Lượng</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM products";
                                $rs = mysqli_query($connect, $sql);
                                $count = 0;
                                foreach ($rs as $r) {
                                    $count++;
                                ?>
                                    <tr>
                                        <td><?= $count ?></td>
                                        <td>
                                            <?php
                                            $resul = $r['id_manufacturer'];
                                            $sql2 = "SELECT * FROM manufacturers WHERE id = '$resul'";
                                            $rs2 = mysqli_query($connect, $sql2);
                                            $r2 = mysqli_fetch_assoc($rs2);
                                            ?>
                                            <?= $r2['name'] ?>
                                        </td>
                                        <td>
                                            <?php
                                            $resul2 = $r['id_category'];
                                            $sql3 = "SELECT * FROM categories WHERE id = '$resul2'";
                                            $rs3 = mysqli_query($connect, $sql3);
                                            $r3 = mysqli_fetch_assoc($rs3)
                                            ?>
                                            <?= $r3['name'] ?>
                                        </td>
                                        <td style="max-width:200px"><?= $r['name'] ?></td>
                                        <td><img src="../../images/<?= $r['image'] ?>" alt="" style="width: 100px"></td>
                                        <td><?= number_format($r['price']) ?></td>
                                        <td><?= $r['discount'] ?>%</td>
                                        <td><?= $r['quantity'] ?></td>
                                        <td>
                                            <a href="edit_product.php?id=<?= $r['id'] ?>">
                                                <button class="btn btn-warning" style="margin-top:2px;">Sửa</button>
                                            </a>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger" onclick="xoa(<?= $r['id'] ?>)">Xóa</button>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>

                        </table>
                        <form action="remove_product.php" method="post" id="xoa">
                            <input type="hidden" id="id" name="id">
                        </form>
                    </div>
                    <script>
                        function xoa(id) {
                            swal({
                            title: "Bạn có chắc muốn xóa?",
                            icon: "warning",
                            buttons: [
                                'No',
                                'Yes'
                            ],
                            dangerMode: true,
                            }).then(function(isConfirm) {
                            if (isConfirm) {
                                var f = document.getElementById('xoa');
                                document.getElementById('id').value = id;
                                f.submit();
                            }
                            });
                        }
                        <?php if (isset($_SESSION['success'])) { ?>
                            <?php
                            if ($_SESSION['success'] == "Thêm thành công") { ?>
                                swal("Success", "Thêm sản phẩm thành công", "success");
                            <?php
                            } else if ($_SESSION['success'] == "Sửa thành công") {
                            ?>
                                swal("Success", "Sửa sản phẩm thành công", "success");
                            <?php } else if ($_SESSION['success'] == "Xóa thành công") {
                            ?>
                                swal("Success", "Xóa sản phẩm thành công", "success");
                            <?php }
                            unset($_SESSION['success']); ?>
                        <?php } ?>
                        <?php if (isset($_SESSION['warning'])) {
                            if ($_SESSION['warning'] == "Xóa không thành công") {
                        ?>
                                swal("warning", "Sản phẩm này đã có trong giỏ hàng , không  thể xóa!", "warning");
                        <?php
                            }
                            unset($_SESSION['warning']);
                        }
                        ?>
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