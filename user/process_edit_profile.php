<?php
include("../connect.php");
session_start();
$txtName = $_POST['txtName'];
$txtAdd = $_POST['txtAdd'];
$txtPhone = $_POST['txtPhone'];
$gender = $_POST['gender'];
$id_user = $_SESSION['user']['id'];

$sql = "UPDATE users SET name = '$txtName',address = '$txtAdd',phone = '$txtPhone',gender ='$gender' WHERE id = '$id_user'";
$rs= mysqli_query($connect, $sql);
if($rs){
    $_SESSION['success'] = "OK";
    header("Location:http://localhost/Technology/user/profile.php");
}
?>