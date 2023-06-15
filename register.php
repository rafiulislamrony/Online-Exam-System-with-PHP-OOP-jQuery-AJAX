<?php include 'inc/header.php'; ?>
<div class="main">
<h1>Online Exam System - User Registration</h1>
	<div class="segment" style="margin-right:30px;">
		<img src="img/regi.png"/>
	</div>
	<div class="segment">
	<form action="" method="post">
		<table>
		<tr>
           <td>Name</td>
           <td><input type="text" name="name"></td>
         </tr>
		<tr>
           <td>Username</td>
           <td><input name="name" type="text" id="name"></td>
         </tr>
         <tr>
           <td>Password</td>
           <td><input type="password" name="pass"></td>
         </tr>
         
         <tr>
           <td>E-mail</td>
           <td><input name="email" type="text" ></td>
         </tr>
         <tr>
           <td></td>
           <td><input type="submit" name="Submit" value="Signup">
           </td>
         </tr>
       </table>
	   </form>
	   <p>Already Registered ? <a href="index.php">Login</a> Here</p>
	</div>


	
</div>
<?php include 'inc/footer.php'; ?>