<?php
	include_once 'conn.php';
?>
<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Create a Job</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

      <!-- Header -->
				<header id="header">
					<nav id="nav">
						<ul>
							<li><a href="home_page.php">Home</a></li>
							<li><a href="elements.php">Elements</a></li>
							<li><a href="index.php" class="button primary">Logout</a></li>
						</ul>
					</nav>
				</header>


        			<!-- Main -->
        				<div id="main" class="wrapper style1">
        					<div class="container">
        						<header class="major">
        							<h2>Create a Job</h2>
        							<p>Specify the Properties of Your New Job!</p>
        						</header>
        						<div class="sign">


        							<!-- Form -->
											<section>
												<form method="post" action="#">
													<div class="row gtr-uniform gtr-50">
														<div class="col-12 col-12-xsmall">
															<input type="text" name="title" id="title" value="" placeholder="Title" />
														</div>
														<div class="col-12 col-12-xsmall">
															<input type="text" name="salary" id="salary" value="" placeholder="Salary" />
														</div>
														<div class="col-12 col-12-xsmall">
															<input type="text" name="post_date" id="post_date" value="" placeholder="Post Date" />
														</div>
														<div class="col-12 col-12-xsmall">
															<input type="text" name="education" id="education" value="" placeholder="Education" />
														</div>
														<div class="col-12 col-12-xsmall">
															<input type="text" name="position" id="position" value="" placeholder="Position" />
														</div>
														<div class="col-12 col-12-xsmall">
															<input type="text" name="experience" id="experience" value="" placeholder="Experience" />
														</div>
														<div class="col-12 col-12-xsmall">
															<input type="text" name="benefits" id="benefits" value="" placeholder="Benefits" />
														</div>
														<div class="col-12 col-12-xsmall">
															<input type="text" name="type" id="type" value="" placeholder="Type" />
														</div>
        											<div class="col-12">
        												<ul class="actions">
        													<li><input type="submit" value="Submit" name ="submit" class="primary"/></li>
        													<li><a href="createJob.php" class ="button primary">Cancel</a></li>
																	<li><a href="companyProfile.php" class ="button primary">Cancel</a></li>
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
				<?php

				$userID = $_SESSION['userID'];
				$error='';
				if(isset($_POST['submit']))
				{
						if($_POST['title']!="" && $_POST['salary']!="" && $_POST['post_date']!="" &&  $_POST['education']!="" && $_POST['position']!="" && $_POST['experience']!="" && $_POST['benefits']!="" && $_POST['type']!=""){
							$title = $_POST['title'];
							$salary = $_POST['salary'];
							$postDate = $_POST['post_date'];
							$education = $_POST['education'];
							$position = $_POST['position'];
							$experience = $_POST['experience'];
							$benefits = $_POST['benefits'];
							$type = $_POST['type'];
							$jobID = randomID_user();
							$_SESSION['jobID'] = $jobID;


							$qu = "SELECT * FROM job WHERE title = '$title' AND salary = '$salary' AND post_date = '$postDate' ";
							$res = $conn-> query($qu);
							if($res -> num_rows == 0){

								$query = "INSERT INTO job(companyID,title,salary,post_date,jobID,education,position,experience,benefits,type)
													VALUES('$userID','$title','$salary','$postDate','$jobID','$education','$position','$experience','$benefits','$type')";
								$result = $conn-> query($query);

								$query = "INSERT INTO publishes(companyID,jobID)
													VALUES('$userID','$jobID')";
								$result = $conn-> query($query);

								$message = "Job is created succesfully";
								echo "<script type='text/javascript'>alert('$message');
								window.location = 'jobPage.php' </script>";
							}

							else {
								$message = "Job Creation Failed!";
								echo "<script type='text/javascript'>alert('$message');</script>";
							}
						}
						else {
							$message = "Please fill the empty spaces";
							echo "<script type='text/javascript'>alert('$message');</script>";
						}

				}
				?>
