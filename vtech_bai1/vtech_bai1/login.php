<?php
	session_start();
	$username=$password="";
	 if(isset($_POST['dangnhap']))
	 {
		$username=$_POST['taikhoan'];
	$password=$_POST['matkhau']; 
	if(isset($_POST['check']))
	{
		setcookie("taikhoan",$username,time()+60*60);
		setcookie("matkhau",$password,time()+60*60);
	}
	 }
	if(isset($_COOKIE["taikhoan"]))
	{
		$username=$_COOKIE["taikhoan"];
		$password=$_COOKIE["matkhau"];
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng Nhập</title>
<link rel="stylesheet" href="style.css"/>
</head>
<?php
 if(isset($_POST['dangnhap']))
 {
	 //ket noi co so du lieu
	include('config.php');

	$username=$_POST['taikhoan'];
	$password=$_POST['matkhau'];
	//kiem tra form
	if(!$username || !$password)
	{
		echo"<script> alert('Vui lòng nhập tài khoản và mật khẩu của bạn')</script>"; 
		echo"<a href='javascript: history.go(-1)'>Trở lại</a>";
		exit();
	}
	
	
	  $sql=mysql_query("select * from menber where username='$username' and password='$password'");
	 
	  if(mysql_num_rows($sql) != 0)
	  {
		 
		  echo"<script> alert('Đăng nhập thành công')</script>"; 
		  $_SESSION['username'] = $username;
    echo 'Xin chào <span style="color:red;font-size:20px;">'.$username.".</span> .Bạn đã đăng nhập thành công.
	<a href='index.php'>Về trang chủ</a>";
    die();
		
	  }
	  else{
		 echo"<script> alert('Đăng nhập thất bại')</script>";
	  }
 }
 ?>

<body>


<form action="login.php" method="post">

<div id="khung">

<table width="320" height="168" border="0" class="a">
  <tr>
    <td height="43" colspan="2"><div align="center" style="color:#F5B412; font-size:24px;">Đăng Nhập</div></td>
  </tr>
  <tr>
    <td width="122"><div align="center">Tài Khoản</div></td>
    <td width="182"><input type="text" name="taikhoan" value="<?=$username;?>" /></td>
  </tr>
  <tr>
    <td><div align="center">Mật Khẩu</div></td>
    <td><input type="password" name="matkhau" value="<?=$password;?>"/></td>
  </tr>
  <tr>
    <td style="padding-left:30px;">
    <a href="dangky.php">Đăng ký</a>
    </td>
    <td><input type="checkbox" name="check" />Lưu mật khẩu</td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="dangnhap" value="Đăng Nhập" style="height:30px;"/>                
      <input type="reset" name="huy" value="Hủy"  style="height:30px;" />
    </div>
    </td>
  </tr>
</table>

</div>
</form>

</body>
</html>