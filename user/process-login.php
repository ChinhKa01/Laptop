<?php
session_start();
include("../connect.php");
$email =  $_POST['email'];
$pass = $_POST['user-password'];
$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$pass'";
$rs  = mysqli_query($connect, $sql);
if (mysqli_num_rows($rs) != 0) {
    $r =  mysqli_fetch_array($rs);
    if ($r['id_role'] == 2) {
        $_SESSION['user'] = $r;
        header("Location:http://localhost/Technology/user/index.php");
    } else if ($r['id_role'] == 1) {
        $_SESSION['admin'] = $r;
        header("Location:http://localhost/Technology/admin/index.php");
    }
} else {
    $_SESSION["message"] = "Lost";
    header("Location:http://localhost/Technology/user/login.php");
}
