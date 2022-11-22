<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Login|Quwius</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen">
		<meta charset="utf-8">
	</head>
	<body>
		<nav>
			<a href="#"><img src="images/logo.png" alt="UWI online"></a>
			<ul>
				<li><a href="courses.php">Courses</a></li>
				<li><a href="streams.php">Streams</a></li>
				<li><a href="aboutus.php">About Us</a></li>
				<li><a href="login_display.php">Login</a></li>
				<li><a href="signup.php">Sign Up</a></li>
			</ul>
		</nav>
		<main>
		   <div class="login-box">
			<div class="login-box-body">
			<p class="login-box-msg">Be Curious - Sign In</p>
<!-- Error Messages -->
			<?php
 				if(!empty($errors)) : ?>
				<ul>
					<?php
				foreach($errors as $field=>$msg) : ?>
				<li><?php echo $field . ': ' . $msg ?> </li>
			<?php endforeach; ?>
			</ul>
			<?php endif; ?>

			<form action="validate.php" method="POST">
			  <div class="form-group has-feedback">
				<input type="text" name="emailuser" class="form-control" placeholder="Email"/>
			  </div>
			  <div class="form-group has-feedback">
				<input type="password" name="PassCheck"  class="form-control" placeholder="Password"/>
			  </div>
			  <div class="row">
				<div class="col-xs-8">    
				  <div class="checkbox icheck">
					<label>
					  <input type="checkbox"> Remember Me
					</label>
				  </div>                        
				</div><!-- /.col -->
				<div class="col-xs-4">
				<input type="hidden" name="js_validating" value=""/>
				  <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
				</div><!-- /.col -->
			  </div>
			</form>
			<br>
			<a href="signup.php" class="text-center">Sign Up</a>



       </div><!-- /.login-box-body -->
	  </div>
			<footer>
				<nav>
					<ul>
						<li>&copy;2015 Quwius Inc.</li>
						<li><a href="#">Company</a></li>
						<li><a href="#">Connect</a></li>
						<li><a href="#">Terms &amp; Conditions</a></li>
					</ul>
				</nav>
			</footer>
		</main>
	</body>
</html>