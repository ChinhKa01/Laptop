<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();
    if ($_SESSION['admin']) {
        include("../head.php"); ?>
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
                                <h4 class="page-title">Sửa sản phẩm</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <div class="row justify-content-center">
                        <div class="col-xl-10 col-lg-10 ">
                            <?php
                            include("../../connect.php");
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM products WHERE id = '$id'";
                            $rs = mysqli_query($connect, $sql);
                            $r = mysqli_fetch_assoc($rs);
                            ?>
                            <form action="process_edit_product.php" method="post" enctype="multipart/form-data">
                                <table class="table table-striped table-centered mb-0">
                                    <tr>
                                        <th>Danh Mục</th>
                                        <td>
                                            <select name="id_category">
                                                <?php
                                                $sql2 = "SELECT * FROM categories";
                                                $rs2 = mysqli_query($connect, $sql2);
                                                while ($r2 = mysqli_fetch_assoc($rs2)) {
                                                ?>
                                                    <option <?php if ($r2['id'] == $r['id_category']) {
                                                                echo ("selected");
                                                            } ?> value="<?= $r2['id'] ?>"><?= $r2['name'] ?></option>
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
                                                $sql3 = "SELECT * FROM manufacturers";
                                                $rs3 = mysqli_query($connect, $sql3);
                                                while ($r3 = mysqli_fetch_assoc($rs3)) {
                                                ?>
                                                    <option <?php if ($r3['id'] == $r['id_manufacturer']) {
                                                                echo ("selected");
                                                            } ?> value="<?= $r3['id'] ?>"><?= $r3['name'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tên Sản Phẩm</th>
                                        <td><input required type="text" name="name" value="<?= $r['name'] ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Hình Ảnh</th>
                                        <td>
                                            <img src="../../images/<?= $r['image'] ?>" alt="ảnh minh họa" style="width: 100px">
                                            <input required type="file" name="img">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Giá</th>
                                        <td><input type="text" name="price" value="<?= $r['price'] ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Giảm giá</th>
                                        <td>
                                            <select name="discount" selected="<?= $r['discount'] ?>">
                                                <?php
                                                for ($i = 0; $i <= 30; $i = $i + 10) {
                                                ?>
                                                    <option value="<?= $i ?>" <?php if ($r['discount'] ==  $i) {
                                                                                    echo ("selected");
                                                                                } ?>><?= $i ?>%</option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Số Lượng</th>
                                        <td><input type="text" name="quantity" value="<?= $r['quantity'] ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>Mô Tả</th>
                                        <td><textarea required name="description" rows="5" cols="60"><?= $r['description'] ?></textarea></td>
                                    </tr>

                                    <tr>
                                        <th>Hành động</th>
                                        <td><button type="submit" class="btn btn-warning">Sửa</button></td>
                                    </tr>
                                    <input type="hidden" name="id" value="<?= $r['id'] ?>">
                                </table>
                            </form>
                        </div>
                    </div>

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
<?php } else {
        header("Location:http://localhost/Technology/user/login.php");
    } ?>