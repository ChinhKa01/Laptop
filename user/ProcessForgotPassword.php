<?php
session_start();
include("../connect.php");
$email = $_GET['email'];

$sql  = "SELECT * FROM users WHERE email = '$email'";
$rs = mysqli_query($connect, $sql);
$r = mysqli_num_rows($rs);

if(empty($email)){
    echo "isEmpty";
}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "invalidEmail";
}
else if($r == 0){
    echo "isNotExistEmail";
}
else{
    $row = mysqli_fetch_array($rs);
    echo $row['password'];
}