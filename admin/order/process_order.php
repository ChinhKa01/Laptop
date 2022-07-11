<?php
session_start();
include("../../connect.php");
$id = $_GET["id"];
$action = $_GET["action"];
if ($action == "Duyệt") {
    $sql = "UPDATE `orders` SET `status`='Đã duyệt' WHERE id = $id";
    $rs  = mysqli_query($connect, $sql);
    if($rs){
        echo "accept_success";
    }
} else if ($action == "Hủy") {
    $sql = "UPDATE `orders` SET `status`='Đang xử lý' WHERE id = $id";
    $rs = mysqli_query($connect, $sql);
    if($rs){
        echo "cancel_success";
    }
}

