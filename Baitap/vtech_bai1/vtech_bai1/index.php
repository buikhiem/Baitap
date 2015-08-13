<?php
	session_start();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng Nhập</title>
</head>
<?php
       if (isset($_SESSION['username'])){
           echo 'Bạn đã đăng nhập với tên là <span style="color:red;font-size:20px;">'.$_SESSION['username']."</span><br/>";
		  
           echo 'Click vào đây để <a href="logout.php">Logout</a>';
       }
       else{
           echo 'Bạn chưa đăng nhập';
		   header('location:login.php');
       }
       ?>
<body>
</body>
</html>