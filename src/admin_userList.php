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
		<title>MESA</title>
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
              <!--
              <li><a href="home_page.php" class ="button primary">Home</a></li>
              <li><a href="employeeProfile.php" class ="button primary">Profile</a></li>
              <li><a href="companyList.php" class ="button primary">Companies</a></li>
              <li><a href="jobList.php" class ="button primary">Jobs</a></li>
              <li><a href="projectList.php" class ="button primary">Projects</a></li>
              -->
              <li><a href="index.php" class ="button primary">Logout</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h2>User List</h2>
						</header>
						<!-- Table -->
            <form method="post" action="#">
			<input type="text" name="search" placeholder="Search Company">
			<select name="filter">
				<option value="all">Select Filter(All show all users)</option>
				<option value="mail">type</option>
				<option value="name">name</option>
				<option value="userID">userID</option>
        <option value="mail">mail</option>
			</select>
			<input type="submit" name="submit" value="Find">
      <select name="sort">
				<option value="all">Sort By</option>
        <option value="mail">type</option>
				<option value="name">name</option>
				<option value="userID">userID</option>
        <option value="mail">mail</option>
			</select>
			<input type="submit" name="ascending_sort" value="Ascending Sort">
      <input type="submit" name="descending_sort" value="Descending Sort">
		</form>
							<section>
								<h4>Alternate</h4>
								<div class="table-wrapper">
									<table>
										<thead>
											<tr>
												<th>UserID</th>
                        <th>Mail</th>
                        <th>Link to Profile Page</th>
											</tr>
										</thead>
                    <tbody>
                    <?php
                    ob_start();
                    //if(isset($_POST['submit']))
                    //{

                          //$filter = $_POST['filter'];
                          //$search = $_POST['search'];
                          $query = "SELECT * FROM user;";
                          $result = $conn -> query($query);

                          if($result -> num_rows > 0)
                          {

                              while ($row = $result ->fetch_assoc())
                              {
                                $userID = $row['userID'];
                                $type_query = "SELECT * FROM employee WHERE employeeID ='$userID'";
                                $type_result = $conn -> query($type_query);
                                $admin_query = "SELECT * FROM admin WHERE adminID ='$userID'";
                                $admin_result = $conn -> query($admin_query);

                                if ($type_result -> num_rows == 1){
                                  $type = 'employee';
                                }
                                else if ($type_result -> num_rows == 0 && $admin_result -> num_rows == 0){
                                  $type = 'company';
                                }
                                $remove_txt = 'remove';
                                $var=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$userID name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                </section>";
                                $remove_button = "<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$remove_txt name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                </section>";
                                  echo "<tr><td>" .  $row['userID'] . "</td><td>" . $row['mail'] . "</td><td>" .  $var ."</td></tr>";
                              }
                          }
                        //}

                    ?>
                    </tbody>
										<tfoot>
											<tr>
												<td colspan="2"></td>
											</tr>
										</tfoot>

									</table>
								</div>
							</section>

              <?php
              if(isset($_POST['link']) && $type == 'company')
              {
                $message =$_POST['link'];
                $_SESSION['companyID'] = $message;
                header("Location: companyPage.php");
              }
              else if(isset($_POST['link']) && $type == 'employee')
              {
                $message =$_POST['link'];
                $_SESSION['companyID'] = $message;
                header("Location: employeeProfile.php"); //for now
              }
               ?>
