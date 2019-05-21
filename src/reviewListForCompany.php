<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->

<?php
/*
References
https://www.youtube.com/watch?v=J5RHnJCy8AE
*/
include_once 'conn.php';
$conn = mysqli_connect('dijkstra.ug.bcc.bilkent.edu.tr', 'ege.marasli', '8nhmQrdt', 'ege_marasli');

if(! $conn)
{
    die('Connection Error!!! ' . mysqli_error());
}

  $companyID = $_SESSION['companyID'];


$query = "SELECT * FROM related WHERE companyID = '$companyID'";
$res = $conn-> query($query);






?>

<html>
	<head>
		<title>Review List</title>
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
              <li><a href="index.php" class ="button primary">Logout</a></li>
						</ul>
					</nav>
				</header>

				<!-- Form -->
        <section>
          <h3>MY REVIEWS</h3>
              <p>You can see all reviews here. If your requests are accepted, they will disappear.</p>
          <div class="table-wrapper">
            <table>
              <thead>
                <tr>
                  <th>Review ID</th>
                  <th>Publisher Name</th>
									<th>Review Type</th>
                  <th>DISPLAY</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
								<?php


								while ($review = $res ->fetch_assoc())
                {

										$reviewID =  $review['reviewID'];
										$reviewType = findReviewType($reviewID);

                    $query = "SELECT * FROM publishes WHERE reviewID = '$reviewID'";
                    $result3 = $conn-> query($query);

                    $temp3 = $result3->fetch_assoc();

                    $publisherID = $temp3['employeeID'];

                    $query = "SELECT * FROM employee WHERE employeeID = '$publisherID'";
                    $result2 = $conn-> query($query);

                    $temp2 = $result2->fetch_assoc();

  									//	$var = "<a href=\"#\" type=\"display\" name=\"disp\" value=$reviewID class=\"primary\" >DISPLAY</a>";
  									$var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$reviewID\" name =\"submit\" class=\"primary\"/></li>	</ul>	</div>	</form>
    								</section>";

                    //$status = $_SESSION['status'];
                    /*
                    if($status == "accept")
                      echo "<tr><td>" . $review['reviewID'] . "</td><td>" . $temp2['first_name'] . "</td><td>" . $reviewType . "</td><td>" . $var . "</td><td>" . "ACCEPTED" ."</td></tr>";

                    if($status == "decline")
                      echo "<tr><td>" . $review['reviewID'] . "</td><td>" . $temp2['first_name'] . "</td><td>" . $reviewType . "</td><td>" . $var . "</td><td>" . "DECLINED" ."</td></tr>";
                    else if($status == "pending") {
                      echo "<tr><td>" . $review['reviewID'] . "</td><td>" . $temp2['first_name'] . "</td><td>" . $reviewType . "</td><td>" . $var . "</td><td>" . "p" ."</td></tr>";
                    }
                    */
                    $query_pend = "SELECT * FROM review WHERE reviewID = '$reviewID' AND requested=1";
                    $result_pend = $conn-> query($query_pend);

                    $temp_pend = $result_pend->fetch_assoc();
                    if ($result_pend -> num_rows >0){
                    echo "<tr><td>" . $review['reviewID'] . "</td><td>" . $temp2['first_name'] . "</td><td>" . $reviewType . "</td><td>" . $var."</td><td>" . "waiting for removal"  ."</td></tr>";
                  }
                  else{
                  echo "<tr><td>" . $review['reviewID'] . "</td><td>" . $temp2['first_name'] . "</td><td>" . $reviewType . "</td><td>" . $var."</td><td>" . "not requested"  ."</td></tr>";
                }

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
