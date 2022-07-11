<?php
session_start();
$id = $_GET['id'];
$method =  $_GET['method'];
if ($method == "+") {
    $_SESSION['cart'][$id]['quantity']++;
} else if ($method == "-"  && $_SESSION['cart'][$id]['quantity'] > 1) {
    $_SESSION['cart'][$id]['quantity']--;
}
$quantity = $_SESSION['cart'][$id]['quantity'];
$price = $_SESSION['cart'][$id]['price'];
$total = $_SESSION['cart'][$id]['quantity'] * $_SESSION['cart'][$id]['price'];
$arr = array("quantity" => $quantity, "price" => $price, "total" => $total);
echo json_encode($arr);
