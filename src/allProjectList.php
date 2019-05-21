<?php
include_once 'conn.php';
$type = $_SESSION['userID'];
 ?>
<!DOCTYPE HTML>
<!--
	Landed by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>All Projects List</title>
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
    					<li><a href="allJobsList.php" class ="button primary">Jobs</a></li>
    					<li><a href="allProjectList.php" class ="button primary">Projects</a></li>
						</ul>
					</nav>
				</header>

			<!-- Main -->
				<div id="main" class="wrapper style1">
					<div class="container">
						<header class="major">
							<h2>Project List</h2>
							<p>You can find every projects here.</p>
						</header>
						<!-- Table -->
            <form method="post" action="#">
			<input type="text" name="search" placeholder="Search Projects">
			<select name="filter">
				<option value="all">Select Filter(Show all projects)</option>
        <option value="name">Company Name</option>
				<option value="title">Project Title</option>
			</select>
			<input type="submit" name="submit" value="Find">
      <select name="sort">
				<option value="all">Sort By</option>
        <option value="name">Company Name</option>
				<option value="title">Project Title</option>
			</select>
			<input type="submit" name="ascending_sort" value="Ascending Sort">
      <input type="submit" name="descending_sort" value="Descending Sort">
      <input type="submit" name="filter_finished" value="Filter Finished Projects">
      <input type="submit" name="filter_ongoing" value="Filter Ongoing Projects">
		</form>
							<section>
								<h4>Alternate</h4>
								<div class="table-wrapper">
									<table>
										<thead>
											<tr>
                        <th>Company Name</th>
												<th>Project Title</th>
												<th>Status</th>
                        <th>Link to Project Page</th>
											</tr>
										</thead>
                    <tbody>
                    <?php
                    if(isset($_POST['submit']))
                    {
                          $filter = $_POST['filter'];
                          $search = $_POST['search'];
                          if($filter == 'all')
                          {
                            $query = "SELECT * FROM project";
                            $result = $conn -> query($query);

                            if($result -> num_rows > 0)
                            {

                                while ($row = $result ->fetch_assoc())
                                {
                                  $projectID = $row['projectID'];
                                  $companyID = $row['companyID'];
                                  $queryCompany = "SELECT name FROM company WHERE companyID = '$companyID';";
                                  $resultCompany = $conn -> query($queryCompany);
                                  $companyName = $resultCompany ->fetch_assoc();
                                  $companyName = $companyName['name'];

                                  $var=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$projectID name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                  </section>";

                                  echo "<tr><td>"  . $companyName . "</td><td>". $row['title'] . "</td><td>" . $row['status'] .  "</td><td>" . $var ."</td></tr>";
                                }
                            }
                          }
                          else
                          {
                            if($filter == 'name')
                            {

                              $query = "SELECT * FROM (SELECT * FROM project NATURAL JOIN company) as q WHERE q.name LIKE '%$search%';";
                              $result = $conn -> query($query);

                              if($result -> num_rows > 0)
                              {

                                  while ($row = $result ->fetch_assoc())
                                  {
                                    $projectID = $row['projectID'];
                                    $companyID = $row['companyID'];
                                    $queryCompany = "SELECT name FROM company WHERE companyID = '$companyID';";
                                    $resultCompany = $conn -> query($queryCompany);
                                    $companyName = $resultCompany ->fetch_assoc();
                                    $companyName = $companyName['name'];

                                    $var=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$projectID name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                    </section>";

                                    echo "<tr><td>"  . $companyName . "</td><td>". $row['title'] . "</td><td>" . $row['status'] .  "</td><td>" . $var ."</td></tr>";
                                  }
                              }
                            }
                            else
                            {
                              $query = "SELECT * FROM project where $filter LIKE '%$search%';";

                              $result = $conn -> query($query);

                              if($result -> num_rows > 0)
                              {
                                while ($row = $result ->fetch_assoc())
                                {
                                  $projectID = $row['projectID'];
                                  $companyID = $row['companyID'];
                                  $queryCompany = "SELECT name FROM company WHERE companyID = '$companyID';";
                                  $resultCompany = $conn -> query($queryCompany);
                                  $companyName = $resultCompany ->fetch_assoc();
                                  $companyName = $companyName['name'];

                                  $var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$projectID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                  </section>";
                                  echo "<tr><td>"  . $companyName . "</td><td>". $row['title'] . "</td><td>" . $row['status'] .  "</td><td>" . $var ."</td></tr>";
                                }

                              }
                            }

                        }
                      }

                        else if(isset($_POST['ascending_sort']))
                        {
                          $filter = $_POST['sort'];
                          if($filter == 'name')
                          {
                            $query = "SELECT * FROM (SELECT * FROM project NATURAL JOIN company) as q ORDER BY q.name ASC;";
                            $result = $conn -> query($query);

                            while ($row = $result ->fetch_assoc())
                            {
                              $projectID = $row['projectID'];
                              $companyID = $row['companyID'];
                              $queryCompany = "SELECT name FROM company WHERE companyID = '$companyID';";
                              $resultCompany = $conn -> query($queryCompany);
                              $companyName = $resultCompany ->fetch_assoc();
                              $companyName = $companyName['name'];

                              $var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$projectID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                              </section>";
                              echo "<tr><td>"  . $companyName . "</td><td>". $row['title'] . "</td><td>" . $row['status'] .  "</td><td>" . $var ."</td></tr>";
                            }

                          }
                          else
                          {
                            $query = "SELECT * FROM project ORDER BY $filter ASC;";
                            $result = $conn -> query($query);

                            while ($row = $result ->fetch_assoc())
                            {
                              $projectID = $row['projectID'];
                              $companyID = $row['companyID'];
                              $queryCompany = "SELECT name FROM company WHERE companyID = '$companyID';";
                              $resultCompany = $conn -> query($queryCompany);
                              $companyName = $resultCompany ->fetch_assoc();
                              $companyName = $companyName['name'];

                              $var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$projectID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                              </section>";
                              echo "<tr><td>"  . $companyName . "</td><td>". $row['title'] . "</td><td>" . $row['status'] .  "</td><td>" . $var ."</td></tr>";
                            }
                          }


                        }
                        else if(isset($_POST['descending_sort']))
                        {
                          $filter = $_POST['sort'];
                          if($filter == 'name')
                          {
                            $query = "SELECT * FROM (SELECT * FROM project NATURAL JOIN company) as q ORDER BY q.name DESC;";
                            $result = $conn -> query($query);

                            while ($row = $result ->fetch_assoc())
                            {
                              $projectID = $row['projectID'];
                              $companyID = $row['companyID'];
                              $queryCompany = "SELECT name FROM company WHERE companyID = '$companyID';";
                              $resultCompany = $conn -> query($queryCompany);
                              $companyName = $resultCompany ->fetch_assoc();
                              $companyName = $companyName['name'];

                              $var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$projectID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                              </section>";
                              echo "<tr><td>"  . $companyName . "</td><td>". $row['title'] . "</td><td>" . $row['status'] .  "</td><td>" . $var ."</td></tr>";
                            }

                          }
                          else
                          {
                            $query = "SELECT * FROM project ORDER BY $filter DESC;";

                            $result = $conn -> query($query);

                            if($result -> num_rows > 0)
                            {
                              while ($row = $result ->fetch_assoc())
                              {
                                $projectID = $row['projectID'];
                                $companyID = $row['companyID'];
                                $queryCompany = "SELECT name FROM company WHERE companyID = '$companyID';";
                                $resultCompany = $conn -> query($queryCompany);
                                $companyName = $resultCompany ->fetch_assoc();
                                $companyName = $companyName['name'];

                                $var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$projectID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                </section>";
                                echo "<tr><td>"  . $companyName . "</td><td>". $row['title'] . "</td><td>" . $row['status'] .  "</td><td>" . $var ."</td></tr>";
                              }
                            }
                          }


                          }
                          else if(isset($_POST['filter_finished']))
                          {
                            $query = "SELECT * FROM project where status = 'Finished'";
                            $result = $conn -> query($query);

                            if($result -> num_rows > 0)
                            {

                                while ($row = $result ->fetch_assoc())
                                {
                                  $projectID = $row['projectID'];
                                  $companyID = $row['companyID'];
                                  $queryCompany = "SELECT name FROM company WHERE companyID = '$companyID';";
                                  $resultCompany = $conn -> query($queryCompany);
                                  $companyName = $resultCompany ->fetch_assoc();
                                  $companyName = $companyName['name'];

                                  $var=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$projectID name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                  </section>";

                                  echo "<tr><td>"  . $companyName . "</td><td>". $row['title'] . "</td><td>" . $row['status'] .  "</td><td>" . $var ."</td></tr>";
                                }
                            }
                          }
                          else if(isset($_POST['filter_ongoing']))
                          {
                            $query = "SELECT * FROM project where status = 'Ongoing'";
                            $result = $conn -> query($query);

                            if($result -> num_rows > 0)
                            {

                                while ($row = $result ->fetch_assoc())
                                {
                                  $projectID = $row['projectID'];
                                  $companyID = $row['companyID'];
                                  $queryCompany = "SELECT name FROM company WHERE companyID = '$companyID';";
                                  $resultCompany = $conn -> query($queryCompany);
                                  $companyName = $resultCompany ->fetch_assoc();
                                  $companyName = $companyName['name'];

                                  $var=	"<section><form method=\"post\" action=\"\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=$projectID name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                                  </section>";

                                  echo "<tr><td>"  . $companyName . "</td><td>". $row['title'] . "</td><td>" . $row['status'] .  "</td><td>" . $var ."</td></tr>";
                                }
                            }
                          }
                        else
                        {
                          $query = "SELECT * FROM project;";
                          $result = $conn -> query($query);

                          if($result -> num_rows > 0)
                          {
                            while ($row = $result ->fetch_assoc())
                            {
                              $projectID = $row['projectID'];
                              $companyID = $row['companyID'];
                              $queryCompany = "SELECT name FROM company WHERE companyID = '$companyID';";
                              $resultCompany = $conn -> query($queryCompany);
                              $companyName = $resultCompany ->fetch_assoc();
                              $companyName = $companyName['name'];

                              $var=	"<section><form method=\"post\" action=\"#\" name = \"login\"> <div class=\"col-12\">	<ul class=\"actions\"> <li><input type=\"submit\" value=\"$projectID\" name =\"link\" class=\"primary\"/></li>	</ul>	</div>	</form>
                              </section>";
                              echo "<tr><td>"  . $companyName . "</td><td>". $row['title'] . "</td><td>" . $row['status'] .  "</td><td>" . $var ."</td></tr>";                          }
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
                $message =$_POST['link'];
                $_SESSION['projectID'] = $message;
                header("Location: projectPage.php");
              }
               ?>
