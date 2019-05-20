<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php
	include_once 'conn.php';
	$companyID = $_SESSION['userID'];

	$query = "SELECT * FROM company WHERE companyID = '$companyID'";
	$result = $conn-> query($query);
	$arr = $result ->fetch_assoc();

	$query2 = "SELECT * FROM user WHERE userID = '$companyID'";
	$result2 = $conn-> query($query2);
	$arr2 = $result2 ->fetch_assoc();

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
		<header id="header">
			<h1 id="logo"><a href="index.php"></a></h1>
			<nav id="nav">
				<ul>
					<li><a href="index.php">Home</a></li>
				</ul>
			</nav>
		</header>

    <!-- Form -->
      <section>
        <h3>Form</h3>
        <form method="post" action="#">
          <div class="row gtr-uniform gtr-50">
            <div class="col-2 col-12-xsmall">
              Name <input type="text" name="name" id="name" value= <?php echo $arr['name']  ?> />
            </div>
						<div class="col-2 col-12-xsmall">
              Website <input type="text" name="website" id="website" value=<?php echo $arr['website']  ?>>
            </div>
            <div class="col-2 col-12-xsmall">
              Industry <input type="text" name="industry" id="industry" value=<?php echo $arr['industry']  ?> />
            </div>
						<div class="col-2 col-12-xsmall">
              Sector <input type="text" name="sector" id=sector"" value=<?php echo $arr['sector']  ?> />
            </div>
            <div class="col-2 col-12-xsmall">
              Revenue <input type="text" name="revenue" id="revenue" value=<?php echo $arr['revenue']  ?>>
            </div>
						<div class="col-2 col-12-xsmall">
              Type <input type="text" name="type" id=type"" value=<?php echo $arr['type']  ?> />
            </div>
						<div class="col-2 col-12-xsmall">
              Headquarter <input type="text" name="headquarter" id="headquarter" value=<?php echo $arr['headquarter']  ?> />
            </div>
						<div class="col-2 col-12-xsmall">
              Phone Number 1 <input type="text" name="phone_number1" id="phone_number1" value=<?php echo $arr2['phone_number1']  ?>>
            </div>
						<div class="col-2 col-12-xsmall">
              Phone Number 2 <input type="text" name="phone_number2" id="phone_number2" value=<?php echo $arr2['phone_number2']  ?>>
            </div>
            <div class="col-6 col-12-xsmall">
              Email <input type="text" name="email" id="email" value=<?php echo $arr2['mail']  ?> />
            </div>
            <div class="col-6 col-12-xsmall">
              Password <input type="text" name="password" id="password" value=<?php echo $arr2['password']  ?> />
            </div>
						<div class="col-12-medium">
							Establish Date <input type="date" style="background-color:black;" name="establish_date" id="establish_date" value=<?php echo $arr['establish_date']  ?> />
						</div>
            <div class="col-12">
              <ul class="actions">
                <li><input type="submit" value="Update" name="update" class="primary" /></li>
								<li><a href="companyProfile.php" class ="button primary">Cancel</a></li>
              </ul>
            </div>
          </div>
        </form>
      </section>



		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="assets/js/editemployeeProfile.js"></script>

	</body>
</html>

<?php
$connection = mysqli_connect('dijkstra.ug.bcc.bilkent.edu.tr', 'ege.marasli', '8nhmQrdt', 'ege_marasli');

	if(isset($_POST['update']))
	{
		$message = "Incorrect mail or password";


		$newName = $_POST['name'];
		$newWebsite = $_POST['website'];
		$newIndustry = $_POST['industry'];
		$newSector = $_POST['sector'];
		$newRevenue = $_POST['revenue'];
		$newEstablishDate = $_POST['establish_date'];
		$newType = $_POST['type'];
		$newHeadquarter= $_POST['headquarter'];
		$newMail = $_POST['email'];
		$newPassword = $_POST['password'];
		$newPhoneNumber1 = $_POST['phone_number1'];
		$newPhoneNumber2 = $_POST['phone_number2'];

		$query = "UPDATE company SET name = '$newName', website='$newWebsite', industry ='$newIndustry',sector ='$newSector', revenue ='$newRevenue', establish_date ='$newEstablishDate', type ='$newType',headquarter ='$newHeadquarter' WHERE companyID = $companyID;";
		$result = $connection-> query($query);

		$query2 = "UPDATE user SET mail ='$newMail', password ='$newPassword', phone_number1 ='$newPhoneNumber1', phone_number2 ='$newPhoneNumber2' WHERE userID = $companyID;";
		$result = $connection-> query($query2);
		echo "<script type='text/javascript'>window.location = 'companyProfile.php' </script>";
	}
 ?>
