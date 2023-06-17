<?php include 'inc/header.php'; ?>
<div class="main">
<h1>Online Exam System - User Login</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/test.png"/>
	</div>
	<div class="segment">
	<form action="" method="post">
		<table class="tbl">    
			 <tr>
			   <td>Email</td>
			   <td><input name="email" type="email" id="email" placeholder="Enter Your Email"  ></td>
			 </tr>
			 <tr>
			   <td>Password </td>
			   <td><input name="password" type="password" id="password" placeholder="Enter Password" ></td>
			 </tr>
			 
			  <tr>
			  <td></td>
			   <td><input type="submit" name="login" id="loginsubmit" value="Login">
			   </td>
			 </tr>
       </table>
	   </form>
	   <p>New User ? <a href="register.php">Signup</a> Free</p>

	   <span class="empty" style="display: none;"> Field Must Not be Empty. </span>
	   <span class="error" style="display: none;">Email or Password not match. </span>
	   <span class="disable" style="display: none;">Your Account is Disable. </span>

	</div>   
</div>
<?php include 'inc/footer.php'; ?>