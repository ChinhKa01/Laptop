<?php
session_start();
if (isset($_GET['id'])) {
    $id  =  $_GET['id'];
    unset($_SESSION['cart'][$id]);
    header("Location:http://localhost/Technology/user/show-cart.php");
} else {
    unset($_SESSION['cart']);
    header("Location:http://localhost/Technology/user/show-cart.php");
}
