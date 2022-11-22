<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Quwius</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen">
		<link href="css/console.css" rel="stylesheet" type="text/css">
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
		<h1>Courses</h1>
		<ul class="course-list">
		<?php 
				$data = $this->vars;
				$i =-1;
				foreach($data as $k=>$c):
					$i++;
				if(($i % count($data)) == $i):?>

			
			<li>
			<?php endif; ?>
			<div>
				<a href="#"><img src="images/<?php echo $data[$i]['course_image']?>" alt="<?php echo $data[$i]['course_name']?>"></a>
				</div>
				<div>
				<a href="#"><span class="faculty-department">Faculty or Department</span>	
					<span class="course-title"><?php echo $data[$i]['course_name']?></span>
					<span class="instructor">Course Instructor</span></a>
				</div>
				<div>
					<p>Get Curious.</p>
					<a href="enroll.php?courseid=<?php echo $data[$i]['course_id']?>&course_name=<?php echo $data[$i]['course_name']?>" class="startnow-button startnow-btn">Start Now!</a>
				</div>
				<?php 
					if(($i % count($data)) == 0):
				?>
			</li>
				<?php 
					endif;
					endforeach; 
				?>
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