 <meta charset="utf-8">
<?php session_start();

if (isset($_SESSION['username'])){
	session_destroy();
    unset($_SESSION['username']); // xóa session login
}
?>
<a href="index.php">Đăng Nhập</a>