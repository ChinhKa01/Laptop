<?php
session_start();
if(isset($_SESSION['user'])){
    unset($_SESSION['user']);
    unset($_SESSION['cart']);
}else if(isset($_SESSION['admin'])){
    unset($_SESSION['admin']);
}
header('location:http://localhost/Technology/user/login.php');