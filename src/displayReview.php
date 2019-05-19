<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<?php

include_once 'conn.php';


  $reviewID = $_SESSION['reviewID'];
	$reviewType = findReviewType($reviewID);
	$userID = $_SESSION['userID'];
	$query = "SELECT * FROM review WHERE reviewID = '$reviewID'";
	$result = $conn-> query($query);

	$info = $result->fetch_assoc();

		$query = "SELECT * FROM employee WHERE employeeID = '$userID'";
		$result = $conn-> query($query);

		$user = $result->fetch_assoc();
 ?>
<html>
	<head>
		<title>Landed by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

		<style>
			form {
				text-align: center;

			}
		</style>


	</head>
	<body class="is-preload landing">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1 id="logo"><a href="index.php"></a></h1>
					<nav id="nav">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="myReviewList.php" class ="button primary">Return to MyLists</a></li>
							<li>
								<a href="#" class ="button primary">Sign Up</a>
								<ul>
									<li><a href="left-sidebar.php">Employee Register</a></li>
									<li><a href="right-sidebar.php">Company Register</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</header>

				<!-- Form -->
        <section>
          <h3>MY REVIEWS</h3>
          <div class="table-wrapper">
            <table>
              <thead>
                <tr>
                  <th>Review Information</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr><td>Review ID: </td>	<td><?php echo $info['reviewID'] ?></td> </tr>
								<tr><td>Company Name: </td> <td>"COMPANY"</td> </tr>
								<tr><td>Type: </td> <td>"TYPE"</td> </tr>
								<tr><td>Employment Status: </td> <td><?php echo $info['Employment_status'] ?></td> </tr>
								<tr><td>Job Title: </td> <td><?php echo $info['job_title'] ?></td> </tr>
								<tr><td>Date: </td> <td><?php echo $info['publish_date'] ?></td> </tr>
								<tr><td>Rating: </td> <td><?php echo $info['rating'] ?></td> </tr>
								<tr><td>Location: </td> <td><?php echo $info['location'] ?></td> </tr>
								<tr><td>Visibility: </td> <td><?php echo $info['visibility'] ?></td> </tr>
								<tr><td>Publisher's Name: </td> <td><?php echo $user['first_name'] ?></td> </tr>

              </tbody>

            </table>
          </div>
					<pre>
						<code>
							<?php echo $info['comment'] ?>
						</code>
				</pre>
          <ul>

            <div>
                <a href="userProfile.php" class="button primary" style="text-align:center">My Profile</a>
            </div>
          </ul>

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
