<?php
include 'db.php';
$msg='';
$time=(time());
if(!empty($_POST['email']) && isset($_POST['email']) &&  !empty($_POST['password']) &&  isset($_POST['password']) )
{
// username and password sent from Form
$email=mysql_real_escape_string($_POST['email']); 
$password=mysql_real_escape_string($_POST['password']); 

$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';

if(preg_match($regex, $email))
{  

$password=md5($password); // Encrypted password

$activation=md5($email.time()); // Encrypted email+timestamp

$count=mysql_query("SELECT uid FROM users WHERE email='$email'");
if(mysql_num_rows($count) < 1)
{
mysql_query("INSERT INTO users(email,password,activation) VALUES('$email','$password','$activation');");


/*
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['activation']) && !empty($_GET['activation'])){
    // Verify data
    $email = mysql_escape_string($_GET['email']); // Set email variable
    $activation = mysql_escape_string($_GET['activation']); // Set hash variable
	
	$search = mysql_query("SELECT email, activation, status FROM users WHERE email='".$email."' AND activation='".$activation."' AND status='0'") or die(mysql_error()); 
$match  = mysql_num_rows($search);
echo $match;
*/
if(!empty($_GET['code']) && isset($_GET['code']))
{
	$code=mysql_real_escape_string($_GET['code']);
}
if(!empty($_GET['email']) && isset($_GET['email']))
{
	$code=mysql_real_escape_string($_GET['email']);
}
}
include 'smtp/Send_Mail.php';
$to=$email;
$subject="Email verification";
//$body='Hi, <br/> <br/> We need to make sure you are human. Please verify your email and get started using your Website account. //<br/> <br/> http://localhost:81/email_activation/activation.php?code='.$activation.''

//;
$body='Hi, <br/> <br/> We need to make sure you are human. Please verify your email and get started using your Website account. //<br/> <br/> http://localhost:81/email_activation/activation.php?email='.$email.'&time='.$time.'&code='.$activation.'';
Send_Mail($to,$subject,$body);
$msg= "Registration successful, please activate email.";
	

}
else
{
$msg= '<font color="#cc0000">The email is already taken, please try new.</font>';	
}



}
else
{
   $msg = '<font color="#cc0000">The email you have entered is invalid, please try again.</font>';  
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>PHP Email Verification Script</title>
<link rel="stylesheet" href="style.css"/>
</head>

<body>
<div id="main">
<h1>PHP Email Verification Script</h1>

<form action="" method="post">
<label>Email</label> <input type="text" name="email" class="input" autocomplete="off"/>
<label>Password </label><input type="password" name="password" class="input" autocomplete="off"/><br/>
<input type="submit" class="button button-primary" value="Registration" /> <span class='msg'><?php echo $msg; ?></span> 
</form>	
</div>
</body>
</html>