<?php session_start();?>
<link rel="stylesheet" type="text/css" href="http://www.cookingarte.com/css/index.css" />
<?
include'header.inc.php';
?>
<title>Cookingarte</title>
<script type="text/javascript" src="http://www.cookingarte.com/js/index.js"></script>
<?php if(!isset($_SESSION['id'])){
	include 'no_s_logs.inc.php';
?>
<div class="reg_login_tab">
<table class="reg_table">
	<tr>
<form action="http://www.cookingarte.com/signup.php?" method="POST">
		<td>
		<div class='name_img info'>
			<div>First name</div>
		</div>
		<input type="text" name="reg_name" class="r_name" />
		</td>
		<td>
		<div class='email_img info'>
			<div>Email</div>
		</div>
		<input type="email" name="reg_email" class='r_email' />
		</td>
		<td>
		<div class='password_img info'>
			<div>Password</div>
		</div>
		<input type="password" name="reg_password_1" class="password" />
		</td>
		<td>
		<div class='r_password_img info'>
			<div>Retype password</div>
		</div>
		<input type="password" name="reg_password_2" class="r_password" />
		</td>
		<td style="width:100px"><input type="submit" name="reg_submit" value="Sign up" class="reg_submit" /></td>
	</tr>
</table>
<table>
	<tr class="reg_load">
		<td class="show_error" hidden><span class="load_error"></span></td>
		<td><input hidden type="submit" name="reg_submit" Value="Sign Up" class="load_submit" id="reg_submit" /></td>
</form>
	</tr>
</table>
<table class="login_table">
  <form action="http://www.cookingarte.com/login.php" method="POST">
	<tr>
		<td>
		<div class='l_email_img info'>
			<div>Email</div>
		</div>
		<input type="email" name="login_email" class='login_email' id='login_email' />
		</td>
		<td>
		<div class='l_password_img info'>
			<div>Password</div>
		</div>
		<input type="password" name="login_password" class="login_password" id='login_password' />
		</td>
		<td>
		<input type="submit"  value="Login " name="login_submit" class="login_submit" id="login_submit"/>
		</td>
	</tr>
  </form>
</table>
<div class="toggle" id="toggle"><p class="toggle_login">Already have account</p>
<p class="toggle_reg">Register</p></div>
</div>
<?php }else if(isset($_SESSION['id'])){
		include 'logs.inc.php';
?>
<div class='user_nav_tab'>
<div class="user_tab">
	<div class="user_tab_1">
		<ul>
			<li><a href="http://www.c711k.com/profile.php?id=<?php echo$_SESSION['id'];?>">Profile</a></li>
			<li><a href="http://www.c711k.com/article.php">Browse</a></li>
			<li><a href="http://www.c711k.com/contribution.php">Dishes</a></li>
		</ul>
	</div>
	<div class="user_tab_2">
		<ul>
			<li><a href="http://www.c711k.com/write_dish.php">Create dish</a></li>
			<li><a href="http://www.c711k.com/list_chef.php">Chefs</a></li>
			<li><a href="http://www.c711k.com/list_foodie.php">Foodies</a></li>
		</ul>
	</div>
	<div class="user_tab_3">
		<ul>
			<li><a href="http://www.c711k.com/pedit.php">Settings</a></li>
			<li><a href="http://www.c711k.com/changea.php">Change avatar</a></li>
			<li><a href="http://www.c711k.com/logout.php">Log out</a></li>
		</ul>
	</div>
	<div class="user_tab_4">
		<a href="profile.php?id=<?php echo $_SESSION['id'];?>"><img src="http://www.cookingarte.com/uploads/user_avatar/small/<?php echo $_SESSION['avatar']; ?>" height="68" width="120" alt="<?php echo $_SESSION['f_name'];?>" class="tab_profile_pic" /></a>
	</div>
</div>
</div>
<?php }?>
<div class="container">
<p>You can share your fav dish with your friends and also know what is your friends fav dish.</p>
</div>
<div class="footer">
 <ul>
 	<?php if(!isset($_SESSION['id'])){
 		echo '<li><a href="http://www.c711k.com/signup.php">Create account</a></li>';
 		echo '<li><a href="http://www.c711k.com/login.php">Login</a></li>';
 	}
 	?>
	<li><a href="http://www.c711k.com/article.php">Browse list of dishes</a></li>
	<li><a href="http://www.c711k.com/list_chef.php">List of Chef</a></li>
	<li><a href="http://www.c711k.com/list_foodie.php">List of Foodies</a></li>
 </ul>
</div>
</body>
</html>
