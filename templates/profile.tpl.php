<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Quwius</title>
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
				<li><a href="index.php?controller=Streams">Streams</a></li>
				<li><a href="index.php?controller=AboutUs">About Us</a></li>
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
		<h1>Profile Page</h1>
		<h2>Enrolled Courses</h2>
		<ul class="course-list">
		
		<?php 
				$data = $this->vars;
				//Get user is not enroll for any course give an error
				if(isset($data['Notice'])){
					echo '<h3 style="color: red; text-align: center;">'.$data['Notice'].'</h3>';
				} else {

				
				$i =-1;
				foreach($data as $k=>$c):
					$i++;
				if(($i % count($data)) == $i):?>


			<li>
				<?php endif; ?>
			<div>
				<a href="#"><img src="images/<?php echo $data[$i]['course_image']?>" alt="course image"></a>
				</div>
				<div>
				<a href="#"><span class="faculty-department">Faculty or Department</span>	
					<span class="course-title"><?php echo $data[$i]['course_name']?></span>
					<span class="instructor">Course Instructor</span></a>
				</div>
				<div>
					<a href="#" class="startnow-btn startnow-button">Go to Class!</a>
					<a href="questionunenroll.php?courseid=<?php echo $data[$i]['course_id']?>&course_name=<?php echo $data[$i]['course_name']?>" class="startnow-btn unenroll-button">Unenroll</a>
				</div>
				<?php 
					if(($i % count($data)) == 0):
				?>
			</li>
			<?php 
					endif;
					endforeach;
				}
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