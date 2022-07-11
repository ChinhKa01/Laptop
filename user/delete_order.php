<?php
session_start();
include("../connect.php");
$id_order = $_GET['id'];
$sql = "DELETE FROM order_product WHERE id_order = '$id_order'";
$rs = mysqli_query($connect, $sql);

$sql = "DELETE FROM orders WHERE id = '$id_order'";
$rs = mysqli_query($connect, $sql);
if ($rs) {
    $_SESSION['success'] = "delete success";
    header("Location:http://localhost/Technology/user/order_history.php");
}
