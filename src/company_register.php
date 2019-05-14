
<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Left Sidebar - Landed by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1 id="logo"><a href="index.php">Künefele Beni</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li>
								<a href="#">Layouts</a>
								<ul>
									<li><a href="left-sidebar.php">Left Sidebar</a></li>
									<li><a href="right-sidebar.php">Right Sidebar</a></li>
									<li><a href="no-sidebar.php">No Sidebar</a></li>
									<li>
										<a href="#">Submenu</a>
										<ul>
											<li><a href="#">Option 1</a></li>
											<li><a href="#">Option 2</a></li>
											<li><a href="#">Option 3</a></li>
											<li><a href="#">Option 4</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li><a href="elements.php">Elements</a></li>
							<li><a href="#" class="button primary">Sign Up</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h2>Company Sign Up</h2>
							<p>Fill the given from to register (*areas are mandatory)</p>
						</header>
						<div class="sign">


							<!-- Form -->
								<section>
									<form method="post" action="#">
										<div class="row gtr-uniform gtr-50">
											<div class="col-8 col-12-xsmall">
												<input type="text" name="name" id="name" value="" placeholder="*Name" />
											</div>
											<div class="col-4 col-12-xsmall">
												<input type="text" name="sector" id="sector" value="" placeholder="Sector" />
											</div>
											<div class="col-4 col-12-xsmall">
												<input type="text" name="headquarter" id="headquarter" value="" placeholder="*Headquarter" />
											</div>
											<div class="col-6 col-12-xsmall">
												<input type="email" name="email" id="email" value="" placeholder="*Email" />
											</div>
											<div class="col-6 col-12-xsmall">
												<input type="password" name="password" id="password" value="" placeholder="*Password" />
											</div>
											<div class="col-12">
												<select name="type" id="type">
													<option value="">*Type</option>
													<option value="1">Private</option>
													<option value="2">Public</option>
												</select>
											</div>
											<div class="col-12-medium">
												Establish Date: <input type="date" style="background-color:black;" name="establish_date">
											</div>
											<div class="col-12-medium">
												<input type="checkbox" id="human" name="human" checked>
												<label for="human">I am a human and not a robot</label>
											</div>
											<div class="col-12">
												<ul class="actions">
													<li><input type="submit" value="Sign Up" name ="submit" class="primary"/></li>
													<li><input type="reset" value="Reset" /></li>
												</ul>
											</div>
										</div>
									</form>
								</section>
					</div>
				</div>
		</div>

	</body>
</html>