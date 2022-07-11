<?php
    include("../../connect.php");
    session_start();
    $id = $_POST['id'];
    $tenSP = $_POST['name'];
    $gia =$_POST['price'];
    $giamgia =$_POST['discount'];
    $soluong =$_POST['quantity'];
    $mota = $_POST['description'];
    $maDM = $_POST['id_category'];
    $maNSX = $_POST['id_manufacturer'];
    $path = "../../public/images/";
	$file = $path.basename($_FILES['img']['name']);
	if(!file_exists($file)){
		$rs = move_uploaded_file($_FILES['img']['tmp_name'], $file);
	}
    $anh = $_FILES['img']['name'];
    $sql="UPDATE products 
          SET name = '$tenSP',price = '$gia',discount = '$giamgia' ,quantity = '$soluong',image ='$anh',description = '$mota',id_category = '$maDM',id_manufacturer = '$maNSX'
          WHERE id = $id";
$rs2 = mysqli_query($connect, $sql);
if ($rs2) {
    $_SESSION['success'] = "Sửa thành công";
    header("location:index.php");
}
