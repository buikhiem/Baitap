<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng ký thành viên</title>
<link rel="stylesheet" href="style.css">
</head>
<?php
	include('config.php');
	if(isset($_POST['dangky']))
	{
		$username=$_POST['taikhoan'];
		$password=$_POST['matkhau'];
		if ($username == "" || $password == "" ) {
				   echo "<script> alert('Vui lòng nhập tài khoản và mật khẩu')</script>";
		
	}else{
		$file_path=$_FILES["file"]["tmp_name"];
		$file_name=$_FILES["file"]["name"];
		$new_path="uploads/".$file_name;
		move_uploaded_file($file_path,$new_path);
		$sql="insert into menber(username,password,avata) values('$username','$password','$new_path') ";
		mysql_query($sql);
		echo"<script> alert('Chúc mừng bạn đã đăng ký thành công') </script>";
		header('location:login.php');
	}
	
	}
?>
<body>
<div style="padding-left:500px;
padding-top:20px;">
<form action="dangky.php" method="post" enctype="multipart/form-data">
<table width="400" border="0" style="border-collapse:collapse;">
  <tr>
    <td height="40" colspan="2"><div align="center" style="font-size:24px;">Đăng ký thành viên </div></td>
  </tr>
  <tr>
    <td width="156" height="35">Tài khoản</td>
    <td width="428">
    <input type="text" name="taikhoan"/>
    </td>
  </tr>
  <tr>
    <td>Mật khẩu</td>
    <td>
    <input type="password" name="matkhau"/>
    </td>
  </tr>
  <tr>
    <td>Avata</td>
    <td>
    <input type="file" name="file" />
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
    <input type="submit" name="dangky" value="Đăng Ký" style="height:30px;"/>
    </td>
  </tr>
</table>
</form>
</div>
</body>
</html>