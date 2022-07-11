<?php
session_start();
include("../connect.php");
$name  =  $_POST['txtName'];
$nbrPhone  = $_POST['txtNbrPhone'];
$address = $_POST['txtAdd'];
$note  = $_POST['txtNote'];
$method_payment  = $_POST['method_payment'];
$order_total = $_POST['order_total'];
$id_user =  $_SESSION['user']['id'];
$sql  =  "INSERT INTO orders (id_user,name_receiver,phone_receiver,address_receiver,notes,status,total_price,payment_method)
VALUES ('$id_user','$name','$nbrPhone','$address','$note','Đang xử lý','$order_total','$method_payment')";
$rs = mysqli_query($connect, $sql);

$sql2 = "SELECT MAX(id) as id FROM orders WHERE id_user = '$id_user'";
$rs2 = mysqli_query($connect, $sql2);
$arr = mysqli_fetch_array($rs2);
$id_order = $arr['id'];

$cart = $_SESSION['cart'];
foreach ($cart as $key => $val) {
    $quan = $val['quantity'];
    $sql3 = "INSERT INTO order_product (id_order, id_product, quantity_order) VALUES ('$id_order', '$key','$quan')";
    $rs3 = mysqli_query($connect, $sql3);
}
if ($rs) {
    unset($_SESSION['cart']);
    $_SESSION['success'] = "OK";
    header("Location:http://localhost/Technology/user/order_history.php");
}
