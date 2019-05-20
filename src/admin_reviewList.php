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
		<title>Elements - Landed by HTML5 UP</title>
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
              <li><a href="home_page.php" class ="button primary">Home</a></li>
              <li><a href="employeeProfile.php" class ="button primary">Profile</a></li>
              <li><a href="companyList.php" class ="button primary">Companies</a></li>
              <li><a href="jobList.php" class ="button primary">Jobs</a></li>
              <li><a href="allProjectList.php" class ="button primary">Projects</a></li>
              <li><a href="index.php" class ="button primary">Logout</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h2>Review List</h2>
						</header>
						<!-- Table -->
            <form method="post" action="#">
			<input type="text" name="search" placeholder="Search Company">
			<select name="filter">
				<option value="all">Select Filter(All show all Requested Reviews)</option>
				<option value="reviewID">ReviewID</option>
			</select>
			<input type="submit" name="submit" value="Find">
      <select name="sort">
				<option value="all">Sort By</option>
				<option value="reviewID">ReviewID</option>
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
												<th>reviewID</th>
                        <th>Remove Review</th>
											</tr>
										</thead>
                    <tbody>
                    <?php
                    ob_start();
                    if(isset($_POST['submit']))
                    {

                          $filter = $_POST['filter'];
                          $search = $_POST['search'];
                          if($filter == 'all')
                          {
                            $query = "SELECT * FROM review WHERE requested = 1;";
                            $result = $conn -> query($query);

                            if($result -> num_rows > 0)
                            {

                                while ($row = $result ->fetch_assoc())
                                {
                                  $reviewID = $row['reviewID'];
                                  //$var2=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$companyID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>	</section>";

                                  $var=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$reviewID name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                  </section>";
                                    echo "<tr><td>" . $row['reviewID'] .  $var ."</td></tr>";
                                }


                            }
                          }
                          else
                          {
                            $query = "SELECT * FROM review where requested= 1 AND $filter LIKE '%$search%';";

                            $result = $conn -> query($query);

                            if($result -> num_rows > 0)
                            {

                                while ($row = $result ->fetch_assoc())
                                {
                                  $reviewID = $row['reviewID'];
                                  //$var2=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$companyID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>	</section>";

                                  $var=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$reviewID name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                  </section>";
                                    echo "<tr><td>" . $row['reviewID'] .  $var ."</td></tr>";
                                }


                            }
                        }
                      }

                        else if(isset($_POST['ascending_sort']))
                        {
                          $filter = $_POST['sort'];
                          $query = "SELECT * FROM review WHERE requested=1 ORDER BY $filter ASC;";
                          $result = $conn -> query($query);

                          if($result -> num_rows > 0)
                          {

                              while ($row = $result ->fetch_assoc())
                              {
                                $reviewID = $row['reviewID'];
                                //$var2=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$companyID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>	</section>";

                                $var=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$reviewID name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                </section>";
                                  echo "<tr><td>" . $row['reviewID'] .  $var ."</td></tr>";
                              }


                          }
                        }
                        else if(isset($_POST['descending_sort']))
                        {
                          $filter = $_POST['sort'];
                          $query = "SELECT * FROM review WHERE requested = 1 ORDER BY $filter DESC;";
                          $result = $conn -> query($query);

                          if($result -> num_rows > 0)
                          {

                              while ($row = $result ->fetch_assoc())
                              {
                                $reviewID = $row['reviewID'];
                                //$var2=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$companyID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>	</section>";

                                $var=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$reviewID name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                </section>";
                                  echo "<tr><td>" . $row['reviewID'] .  $var ."</td></tr>";
                              }


                          }
                        }
                        else
                        {
                          $query = "SELECT * FROM review WHERE requested = 1;";
                          $result = $conn -> query($query);

                          if($result -> num_rows > 0)
                          {

                              while ($row = $result ->fetch_assoc())
                              {
                                $reviewID = $row['reviewID'];
                                //$var2=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$companyID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>	</section>";

                                $var=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$reviewID name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                </section>";
                                  echo "<tr><td>" . $row['reviewID'] .  $var ."</td></tr>";
                              }


                          }
                        }

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
              if(isset($_POST['link']))
              {
                $toBeDeleted = $_POST['link'];
                $deletion_query = "DELETE FROM review where reviewID = '$toBeDeleted'";
                $deletion_result = $conn -> query($deletion_query);
                if ($deletion_result){
                  $message ="removed";
                  echo "<script type='text/javascript'>alert('$message');
                  window.location = 'admin_reviewList.php' </script>";
                }
              }
               ?>
