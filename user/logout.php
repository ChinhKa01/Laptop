<?php
session_start();
unset($_SESSION['user']);
unset($_SESSION['cart']);
header('location:http://localhost/Technology/user/login.php');