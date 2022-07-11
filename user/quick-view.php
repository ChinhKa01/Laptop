<?php
include("../connect.php");
$id = $_GET["id"];
$sql  = "SELECT * FROM products WHERE id = $id";
$result  =  mysqli_query($connect, $sql);
$hash =  mysqli_fetch_assoc($result);
echo json_encode($hash);
