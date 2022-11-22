<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Quwius</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen">
		<meta charset="utf-8">
	</head>
	<body>
		<nav>
			<a href="/"><img src="images/logo.png" alt="Quwius"></a>
			<ul>
				<li><a href="courses.php">Courses</a></li>
				<li><a href="streams.php">Streams</a></li>
				<li><a href="aboutus.php">About Us</a></li>
				<li><a href="login_display.php">Login</a></li>
				<li><a href="signup.php">Sign Up</a></li>
			</ul>
		</nav>
		<div id="lead-in">
		<h1>Feed Your Curiosity,<br>
				Take Online Courses from UWI</h1>

			<form name="course_search" method="post" action="index.php?controller=">
				<div class="wide-thick-bordered" >
				<input class="c-banner-search-input" type="text" name="formSearch" value="" placeholder="Find the right course for you">
				<button class="c-banner-search-button"></button>
				</div>
			</form>
		</div>
		<header></header>
		<main>
			<h1>Most Popular</h1>
			<?php
				$popular = $this->vars[1];
			?>
			<!-- Most Popular courses -->
			<?php 
				$i =-1;
				foreach($popular as $k=>$c):
					$i++;
				if(($i % 4) == 0):?>
			

			<div class="centered">

				<?php endif; ?>

				<section>
				<a href="#"><img src="images/<?php echo $popular[$i]['course_image']?>" alt="<?php echo $popular[$i]['course_name']?>" title="<?php echo $popular[$i]['course_name']?>">
				<span class="course-title"><?php echo $popular[$i]['course_name']?></span>
				<span>Course Instructor</span></a>
				</section>

				<?php 
					if(($i % 4) == 3):
				?>
				</div>
				<?php 
					endif;
					endforeach; 
				?>



		<h1>Learner Recommended</h1>
			<?php
				$recommended = $this->vars[0];
			?>
			<!-- Most Popular courses -->
			<?php 
				$i =-1;
				foreach($recommended as $k=>$c):
					$i++;
				if(($i % 4) == 0):?>
			

			<div class="centered">

				<?php endif; ?>

				<section>
				<a href="#"><img src="images/<?php echo $recommended[$i]['course_image']?>" alt="<?php echo $recommended[$i]['course_name']?>" title="<?php echo $recommended[$i]['course_name']?>">
				<span class="course-title"><?php echo $recommended[$i]['course_name']?></span>
				<span>Course Instructor</span></a>
				</section>

				<?php 
					if(($i % 4) == 3):
				?>
				</div>
				<?php 
					endif;
					endforeach; 
				?>


			<footer>
				<nav>
					<ul>
						<li>&copy;2018 Quwius Inc.</li>
						<li><a href="#">Company</a></li>
						<li><a href="#">Connect</a></li>
						<li><a href="#">Terms &amp; Conditions</a></li>
					</ul>
				</nav>
			</footer>
		</main>
	</body>
</html>