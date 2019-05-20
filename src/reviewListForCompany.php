<?php
/*
References
https://www.youtube.com/watch?v=J5RHnJCy8AE
*/
include_once 'conn.php';

$userID = $_SESSION['userID'];

$query = "SELECT * FROM related WHERE companyID = '$userID'";
$result = $conn-> query($query);

if($result -> num_rows == 1)
{
	$info = $result->fetch_assoc();
	$query = "SELECT * FROM review WHERE reviewID = '$info[reviewID]'";
	$result = $conn-> query($query);

}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>MESA</title>
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
              <li><a href="home_page.php" class ="button primary">Home</a></li>
              <li><a href="employeeProfile.php" class ="button primary">Profile</a></li>
              <li><a href="companyList.php" class ="button primary">Companies</a></li>
              <li><a href="jobList.php" class ="button primary">Jobs</a></li>
              <li><a href="allProjectList.php" class ="button primary">Projects</a></li>
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
                  <th>Review ID</th>
									<th>Review Type</th>
                  <th>DISPLAY</th>
                  <th>REQUEST</th>
                </tr>
              </thead>
              <tbody>
								<?php


								while ($review = $result ->fetch_assoc())
                {
										$reviewID =  $review['reviewID'];
										$reviewType = findReviewType($reviewID);

                    $query = "SELECT * FROM related WHERE reviewID = '$reviewID'";
                    $result2 = $conn-> query($query);

                    $temp = $result2->fetch_assoc();
                    $companyID = $temp['companyID'];

                    $query = "SELECT * FROM company WHERE companyID = '$companyID'";
                    $result2 = $conn-> query($query);

                    $temp2 = $result2->fetch_assoc();

									//	$var = "<a href=\"#\" type=\"display\" name=\"disp\" value=$reviewID class=\"primary\" >DISPLAY</a>";
									$var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$reviewID\" name =\"submit\" class=\"primary\"/></li>	</ul>	</div>	</form>
  								</section>";
                  $req=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$reviewID\" name =\"request\" class=\"primary\"/></li>	</ul>	</div>	</form>
                  </section>";

                    echo "<tr><td>" . $review['reviewID'] . "</td><td>" . $reviewType . "</td><td>" . $var  ."</td><td>" . $req  ."</td></tr>";

                }
								if(isset($_POST['submit'])){
									$message =$_POST['submit'];
									$_SESSION['reviewID'] = $message;
									$reviewType = findReviewType($message);
									if($reviewType == "salary_review")
										header("Location: displaySalaryReview.php");

									else if($reviewType == "benefits_review")
										header("Location: displayBenefitsReview.php");

									else if($reviewType == "general_review")
										header("Location: displayGeneralReview.php");

									else if($reviewType == "interview_review")
										header("Location: displayInterviewReview.php");

								}
                if(isset($_POST['request'])){
									$message =$_POST['request'];
									//$_SESSION['reviewID'] = $message;
									$request_statement = "INSERT INTO requests(reviewID,companyID,adminID) VALUES ('$message',''$userID',0) ";
								}

								?>
              </tbody>
            </table>
          </div>

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
