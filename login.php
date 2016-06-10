<?php session_start();
if(!isset($_SESSION['id'])){
?>
<link rel="stylesheet" type="text/css" href="http://www.cookingarte.com/css/login.css" />
<?
include'header.inc.php';?>
<title>Login Cookingarte</title>
<?
function email_confirmed($email){
 $mysqli=mysqli_connect('Censored');
 $query_2_in="SELECT * FROM `user_confirm` WHERE `email`='$email'";
 $query_2=mysqli_query($mysqli,$query_2_in);
 while($r_2=mysqli_fetch_assoc($query_2)){
 $db_confirm=$r_2['confirm'];
 }
 if($db_confirm==0){
 return false;
 }else if($db_confirm==1){
 return true;
 }
}
function log_in($login_email,$login_password){
$mysqli=mysqli_connect('Censored');
$b_password=htmlentities($login_password);
$password=mysqli_real_escape_string($mysqli,$b_password);
$md5_password=md5($password);
$b_email=htmlentities($login_email);
$email=mysqli_real_escape_string($mysqli,$b_email);
$query_1_in="SELECT * FROM `user` WHERE `email`='$email'";
$query_1=mysqli_query($mysqli,$query_1_in);
$query_1_rows=mysqli_num_rows($query_1);
if($query_1_rows==1){
//an user is present
	while($r=mysqli_fetch_assoc($query_1)){
		$db_password=$r['password'];
		$db_id=$r['id'];
		$db_email=$r['email'];
		}
		if($db_password==$md5_password){
		
		//password match
		if(email_confirmed($db_email)===false){
		
			echo"<div class='feedback'><p>You have to activate your email. <br />Please check your email inbox or might be in your spam and activate your email</p></div>";
		}
		else if(email_confirmed($db_email)===true){
			$query_3_in="SELECT * FROM `user_info` WHERE `id`='$db_id'";
			$query_3=mysqli_query($mysqli,$query_3_in);
			while($r_3=mysqli_fetch_assoc($query_3)){
				$_SESSION['id']=$r_3['id'];
				$_SESSION['f_name']=$r_3['f_name'];
				$_SESSION['l_name']=$r_3['l_name'];
				$_SESSION['avatar']=$r_3['avatar'];
			}
			?>
			<script type="text/javascript">
			window.location.replace('http://www.cookingarte.com');
			</script>
			<?
		}
		}//end of password checking
		else{
			echo"<<div class='feedback'><p>Wrong password</p><p>Please check whether caps lock is on</p></div>";
			
		}
	}//end of if for checking user
	else{
	echo"<div class='feedback'><p>This email is not yet registered.Please try again</p><p><a href='http://www.c711k.com/signup.php'>Sign up</a></p></div>";
	}
}//end of log_in function
if(isset($_POST['login_submit'])){
$mysqli=mysqli_connect('Censored');
$b_login_email=htmlentities(strtolower($_POST['login_email']));
$login_email=mysqli_real_escape_string($mysqli,$b_login_email);
$b_login_password=htmlentities($_POST['login_password']);
$login_password=mysqli_real_escape_string($mysqli,$b_login_password);
if(!empty($login_email)&&!empty($login_password)){
log_in($login_email,$login_password);
}else{echo"<div class='feedback'><p class='error'>Please enter the details</p></div>";}
}
//login form
	?>		<div class='form'>
			<form action='?' method='POST'>
			<p>Email</p>
			<p><input type='email' name='login_email' class='login_email' id='login_email' /></p>
			<p>Password</p>
			<p><input type='password' name='login_password' class='login_password' id='login_password' /></p>
			<p>
			<span class='loading'><img src='http://www.cookingarte.com/images/loading_small.gif' /></span>
			<input type='submit' value='Login' name='login_submit' class='login_submit' id='login_submit'/>
			</p>
			</form>
			<span class='sign_up'><span class='p'>Create an account </span><span><a href='http://www.c711k.com/signup.php'>Sign up</a></span></span>
			</div>
			<script type="text/javascript" src="http://www.cookingarte.com/js/login.js"></script>
			</body>
			<?
}else{
header('Location:index.php');
}//end of session checking
?>