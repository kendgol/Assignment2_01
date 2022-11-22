<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Quwius - Course Unenrollment</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen">
        <link rel="stylesheet" href="css/console.css" type="text/css" media="screen">
		<meta charset="utf-8">
	</head>
	<body>
		<nav>
			<a href="#"><img src="images/logo.png" alt="UWI online"></a>
			<ul>
            <li><a href="profile.php">Profile</a></li>
				<li><a href="courses.php">Courses</a></li>
				<li><a href="streams.php">Streams</a></li>
				<li><a href="aboutus.php">About Us</a></li>
				<li>
					  <!--Hamburger Menu -->
					  <div class="col-2">
                <div class="nav">
                    <label class="ham" id="label" for="toggle">&#9776;</label>

                    <input type="checkbox" id="toggle">
                    <div class="hlinks-responsive">
                        <!-- <a href="#">Account</a> -->
                        <a href="console.php">Console</a>
                        <a id="logout" href="login.php?logout=true">Logout</a>
                    </div>
                </div>
            </div>
			</ul>
		</nav>
		<main>
		<h1>Enrollment Confirmed</h1>
		<ul id="enroll-confirm">
			<li>
				<p style="text-align: center;"><?php echo $this->vars["Notice"];?> <br>Please click <a href="profile.php">this link</a> to go to your profile page or <a href="courses.php">this link</a> to return chosing additional courses</p>
			</li>

		</ul>
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