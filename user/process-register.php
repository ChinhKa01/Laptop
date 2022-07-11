<?php
session_start();
include("../connect.php");
$username =  $_POST['username'];
$email = $_POST['email'];
$pass =  $_POST['password'];
$pass_again = $_POST['password_again'];

$sql  = "SELECT * FROM users WHERE email = '$email'";
$rs = mysqli_query($connect, $sql);
$r = mysqli_num_rows($rs);

if (empty($username) || empty($email) || empty($pass) || empty($pass_again)) {
    echo "isEmpty";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "invalidEmail";
} else if ($pass != $pass_again) {
    echo "notSame";
} else if (strlen($pass) < 8) {
    echo "invalidPassword";
} else if ($r != 0) {
    echo "isExistEmail";
} else {
    $sql =  "INSERT INTO users (name, email, password, id_role) VALUES ('$username', '$email', '$pass','2')";
    $r  =  mysqli_query($connect, $sql);
    if ($r) {
        echo "success";
    }
}
