<?php
include("../../connect.php");
session_start();
try {
    $id = trim($_POST['id']);
    $sql = "DELETE FROM products WHERE id = '$id'";
    $rs = mysqli_query($connect, $sql);
    $_SESSION['success'] = "Xóa thành công";
    header("location:index.php");
} catch (Exception) {
    $_SESSION['warning'] = "Xóa không thành công";
    header("location:index.php");
}
