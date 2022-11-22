<!DOCTYPE html>
<html lang="en-GB">
	<head>
		<title>Streams | Quwius</title>
		<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen">
		<meta charset="utf-8">
	</head>
	<body>
		<nav>
			<a href="#"><img src="images/logo.png" alt="UWI online"></a>
			<ul>
				<li><a href="index.php?controller=Courses">Courses</a></li>
				<li><a href="index.php?controller=Streams">Streams</a></li>
				<li><a href="index.php?controller=AboutUs">About Us</a></li>
				<li><a href="index.php?controller=Login">Login</a></li>
				<li><a href="index.php?controller=SignUp">Sign Up</a></li>
			</ul>
		</nav>
		<div id="streams-lead-in">
		<h1>Take specialized courses<br>
				Earn Streams Certifications</h1>
		</div>
		<header id="streams-header"></header>
		<main class="streams">
		<?php 
				$data = $this->vars;
				$i =-1;
				foreach($data as $k=>$c):
					$i++;
				if((($i % 4) == 0) == $i):?>

			<div class="centered">
			<?php endif; ?>
				<section class="streams">
				<a href="#"><img src="images/<?php echo $data[$i]['stream_image']?>" alt="<?php echo $data[$i]['stream_name']?>" title="<?php echo $data[$i]['stream_name']?>">
				<span class="course-title padded"><?php echo $data[$i]['stream_name']?></span>
				<span class="padded">Course Instructor</span></a>
				</section>
				<?php 
					if(($i % 4) == 3):
				?>
				</div>
				<?php 
					endif;
					endforeach; 
				?>
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