<?php
include("../../connect.php");
session_start();
$tenSP = $_POST['product_name'];
$gia = $_POST['price'];
$discount = $_POST['discount'];
$soluong = $_POST['quantity'];
$mota = $_POST['description'];
$maDM = $_POST['id_category'];
$maNSX = $_POST['id_manufacturer'];
$path = "../../images/";
$file = $path . basename($_FILES['img']['name']);
if (!file_exists($file)) {
    $rs = move_uploaded_file($_FILES['img']['tmp_name'], $file);
}
$anh = $_FILES['img']['name'];
$sql = "insert into products (name,price,discount,quantity,image,description,id_category,id_manufacturer)
            values('$tenSP','$gia','$discount','$soluong','$anh','$mota','$maDM','$maNSX')";
$rs1 = mysqli_query($connect, $sql);
if ($rs1) {
    $_SESSION['success'] = "Thêm thành công";
    header("location:index.php");
}
