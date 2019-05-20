<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
session_start();
$connection = mysqli_connect('dijkstra.ug.bcc.bilkent.edu.tr', 'ege.marasli', '8nhmQrdt', 'ege_marasli');
?>
<html>
	<head>
		<title>Home</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload landing">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<nav id="nav">
						<ul>
							<?php
								$type = $_SESSION['UserType'];
								if($type =="employee"){
									echo "<li><a href=\"employeeProfile.php\"class=\"button primary\">Profile</a></li>";
									echo "<li><a href=\"companyList.php\"class=\"button primary\">Companies</a></li>";
									echo "<li><a href=\"myReviewList.php\"class=\"button primary\">My Reviews</a></li>";
									echo "<li><a href=\"allJobsList.php\"class=\"button primary\">Jobs</a></li>";
									echo "<li><a href=\"allProjectList.php\"class=\"button primary\">Projects</a></li>";
								}
								else {
									echo "<li><a href=\"companyProfile.php\"class=\"button primary\">Profile</a></li>";
								}
							?>
							<li><a href="index.php" class="button primary">Logout</a></li>
						</ul>
					</nav>
				</header>

			<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header>
							<h2>Welcome Home Page!</h2>
							<p>You can see the jobs, projects, and feed...</p>
						</header>
						<span class="image"><img src="images/davidwiththeguys.gif" alt="" /></span>
					</div>
					<a href="#one" class="goto-next scrolly">Next</a>
				</section>

			<!-- One -->
				<section id="one" class="spotlight style1 bottom">
					<span class="image fit main"><img src="images/career1.jpg" alt="" /></span>
					<div class="content">
						<div class="container">
							<div class="row">
								<div class="col-12-medium">
									<header>
										<h2>Notifications</h2>
										<p>You can see the jobs which you are accepted here!</p>
									</header>
								</div>

							</div>
						</div>
					</div>
					<a href="#two" class="goto-next scrolly">Next</a>
				</section>

			<!-- Two -->
				<section id="two" class="spotlight style2 right">
					<span class="image fit main"><img src="images/career2.jpg" alt="" /></span>
					<div class="content">
						<header>
							<h2>Job offers for you!</h2>
							<p>Job offers are customized based on your profile.</p>
						</header>
						<p><!-- WILL ADD JOB LIST HERE --></p>
						<ul class="actions">
							<!--<li><a href="#" class="button">Learn More</a></li> -->
						</ul>
					</div>
					<a href="#three" class="goto-next scrolly">Next</a>
				</section>

			<!-- Three -->
				<section id="three" class="spotlight style3 left">
					<span class="image fit main bottom"><img src="images/career3.png" alt="" /></span>
					<div class="content">
						<header>
							<h2>Projects you may interest!</h2>
							<p> Projects which are done by the companies you are following:</p>
						</header>
						<p><!-- ADD PROJECTS BY FOLLOWED COMPANIES HERE --></p>
						<ul class="actions">
							<!--<li><a href="#" class="button">Learn More</a></li> -->
						</ul>
					</div>
					<a href="#four" class="goto-next scrolly">Next</a>
				</section>

			<!-- Four -->
				<section id="four" class="wrapper style1 special fade-up">
					<div class="container">
						<header class="major">
							<h2>More!</h2>
							<p></p>
						</header>
						<div class="box alt">
							<div class="row gtr-uniform">
								<section class="col-4 col-6-medium col-12-xsmall">
									<span class="icon alt major fa-area-chart"></span>
									<h3>Reviews</h3>
									<p></p>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall">
									<span class="icon alt major fa-comment"></span>
									<h3>Write a review</h3>
									<p>You can write a review for a company</p>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall">
									<span class="icon alt major fa-flask"></span>
									<h3>Projects</h3>
									<p></p>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall">
									<span class="icon alt major fa-paper-plane"></span>
									<h3>Apply for a job</h3>
									<p></p>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall">
									<span class="icon alt major fa-file"></span>
									<h3>Update CV</h3>
									<p></p>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall">
									<span class="icon alt major fa-lock"></span>
									<h3>Privacy & Terms</h3>
									<p></p>
								</section>
							</div>
						</div>
						<footer class="major">
							<ul class="actions special">
								<li><a href="#" class="button">Contact Us</a></li>
							</ul>
						</footer>
					</div>
				</section>

			<!-- Five -->
				<section id="five" class="wrapper style2 special fade">
					<div class="container">
						<header>
							<h2>I feel depressed</h2>
							<p></p>
						</header>
						<form method="post" action="#" class="cta">
							<div class="row gtr-uniform gtr-50">
								<div class="col-8 col-12-xsmall"><input type="email" name="email" id="email" placeholder="Your Email Address" /></div>
								<div class="col-4 col-12-xsmall"><input type="submit" value="Get Started" class="fit primary" /></div>
							</div>
						</form>
					</div>
				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon alt fa-linkedin"><span class="label">LinkedIn</span></a></li>
						<li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon alt fa-github"><span class="label">GitHub</span></a></li>
						<li><a href="#" class="icon alt fa-envelope"><span class="label">Email</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>

				</footer>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
