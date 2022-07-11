<?php
include("../connect.php");
session_start();
$id =  $_GET['id'];
$sql = "SELECT * FROM products WHERE id = $id";
$r = mysqli_query($connect, $sql);
$rs = mysqli_fetch_assoc($r);
if (isset($_SESSION['cart'])) {
    $cart =  $_SESSION['cart'];
} else {
    $cart =  [];
}
if($rs['quantity'] > 0) {
    if (array_key_exists($id, $cart) ) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id]  = array('name' => $rs['name'], 'image' => $rs['image'], 'quantity' => 1, 'price' => $rs['price']);
    }
    $_SESSION['cart'] = $cart;
    //trừ số lượng sản phẩm đã order trong bảng product
    $newQuan = $rs['quantity'] - 1;
    $sql = "UPDATE products SET quantity = '$newQuan' WHERE id = '$id'";
    mysqli_query($connect, $sql);
    //Đổ số lượng sản phẩm vào data ajax của btn-add-to-cart để hiển thị số lượng sản phẩm trong giỏ hàng hiện tại
    echo count($_SESSION['cart']);
} else {
    echo "ErrorOrder";
}
