<?php
include("../connect.php");
session_start();
$email = $_POST['email'];
$oldPass = $_POST['oldPass'];
$newPass = $_POST['newPass'];
$newPassAgain = $_POST['newPassAgain'];
$user_id = $_SESSION['user']['id'];

$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$oldPass'";
$rs = mysqli_query($connect, $sql);
$r = mysqli_num_rows($rs);

if (empty($oldPass) || empty($newPass) || empty($newPassAgain) || empty($email)) {
    echo "isEmpty";
} else if ($r == 0) {
    echo "notCorrect";
} else if ($newPass != $newPassAgain) {
    echo "notSame";
} else {
    $sql = "UPDATE users SET password = '$newPass' WHERE id = '$user_id'";
    $rs = mysqli_query($connect, $sql);
    if ($rs) {
        echo "success";
    }
}
