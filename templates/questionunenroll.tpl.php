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
		<h1>Are You Sure You Want to Unenroll from this Course?</h1>
		<ul class="course-list">
		<?php 
				$ids = $this->vars;
				$i =-1;
				foreach($ids as $k=>$c):
					$i++;
				if($i % count($ids) == $i):?>

			<li>
				<?php endif; ?>
			<div>
				<a href="#"><img src="images/<?php echo $ids[$i]['course_image']?>" alt="course image"></a>
				</div>
				<div>
				<a href="#"><span class="faculty-department">Faculty or Department</span>	
					<span class="course-title"><?php echo $ids[$i]['course_name']?></span>
					<span class="instructor">Course Instructor</span></a>
				</div>
				<div>
					<a href="profile.php" class="startnow-btn startnow-button">Cancel</a>
					<a href="unenrollconfirmed.php?courseid=<?php echo $ids[$i]['course_id']?>&course_name=<?php echo $ids[$i]['course_name']?>" class="startnow-btn unenroll-button">Okay</a>
				</div>
				<?php 
					if(($i % count($ids)) == 0):
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