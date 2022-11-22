<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1.0">
    <title> Quwius | Console</title>
    <!-- <link rel="stylesheet" href="css/styles.css" type="text/css" media="screen"> -->
    <link href="css/console.css" rel="stylesheet" type="text/css">
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
                    <a href="console.php">Console</a>
                        <a id="logout" href="login.php?logout=true">Logout</a>
                    </div>
                </div>
            </div>
        </ul>
    </nav>
    <main id="main">
        <header class="row">
            <div class="col-12 title">
                <h3>Feed Your Curiosity, Take Online Courses from UWI.<br> Quwius | Console
                </h3>
            </div>
        </header>
        <br>
        <div class="row user">
            <div class="col-6">
                <h4 id="userHeader"><?php echo 'User: ' . $name?></h4>
            </div>

            <div class="col-6">
                <h4 id="userEmail"><?php echo 'Email: ' . $em ?></h4>
            </div>
        </div>

        <section>
            <div class="row">
                <div class="col-12">
                    <table>
                        <tr>
                            <td id="t" class="table-item"><a href="profile.php">Profile</a></td>
                            <td class="table-item"><a href="courses.php">Courses</a></td>
                            <td class="table-item"><a href="streams.php">Streams</a></td>
                            <td class="table-item"><a href="#">Enroll</a></td>

                        </tr>

                    </table>
                </div>
            </div>
        </section>
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

        <!-- <script src ="scripts/console.js"></script> -->
</body>

</html>