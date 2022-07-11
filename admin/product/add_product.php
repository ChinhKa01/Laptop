<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    if (isset($_SESSION["admin"])) {
        include("../head.php");
    ?>
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
                <!-- Topbar Start -->
                <?php include("../header.php"); ?>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="page-title">Thêm sản phẩm</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row justify-content-center">
                        <div class="col-xl-10 col-lg-10 ">
                            <form action="process_add_product.php" method="post" enctype="multipart/form-data">
                                <table class="table table-striped table-centered mb-0">
                                    <tr>
                                        <th>Danh Mục</th>
                                        <td>
                                            <select name="id_category">
                                                <?php
                                                include("../../connect.php");
                                                $sql = "SELECT * FROM categories";
                                                $rs = mysqli_query($connect, $sql);
                                                while ($r = mysqli_fetch_assoc($rs)) {
                                                ?>
                                                    <option value="<?= $r['id'] ?>"><?= $r['name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nhà Sản Xuất</th>
                                        <td>
                                            <select name="id_manufacturer">
                                                <?php
                                                include("../../connect.php");
                                                $sql2 = "SELECT * FROM manufacturers";
                                                $rs2 = mysqli_query($connect, $sql2);
                                                while ($r2 = mysqli_fetch_assoc($rs2)) {
                                                ?>
                                                    <option value="<?= $r2['id'] ?>"><?= $r2['name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tên Sản Phẩm</th>
                                        <td> <input required type="text" name="product_name" style="width:62%"></td>
                                    </tr>
                                    <tr>
                                        <th>Giá</th>
                                        <td><input type="number" name="price" required min="1000" max="1000000000" step="1000"></td>
                                    </tr>
                                    <tr>
                                        <th>Giảm giá</th>
                                        <td>
                                            <select name="discount">
                                                <option value="0">0%</option>
                                                <option value="10">10%</option>
                                                <option value="20">20%</option>
                                                <option value="30">30%</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Số Lượng</th>
                                        <td><input type="number" name="quantity" required min="1" max="10000" step="1"></td>
                                    </tr>

                                    <tr>
                                        <th>Hình Ảnh</th>
                                        <td><input required type="file" name="img"></td>
                                    </tr>
                                    <tr>
                                        <th>Mô Tả</th>
                                        <td><textarea required name="description" rows="5" cols="60"></textarea></td>
                                    </tr>
                                    <tr>
                                        <th>Hành Động</th>
                                        <td><button type="submit" class="btn btn-primary">Thêm</button></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- container -->

            </div>
            <!-- content -->

            <!-- Footer Start -->
            <?php include("../footer.php"); ?>
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
<?php } else {
        header("Location:http://localhost/Technology/user/login.php");
    } ?>