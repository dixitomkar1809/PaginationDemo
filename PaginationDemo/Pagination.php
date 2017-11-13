<html>
<head>
	<title>PHP Faceoff - Pagination Demo</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>

<body>
	<div class="container-fluid">
		<div class="jumbotron"><h1>PHP Faceoff</h1>
			<h5>By Omkar Nandkumar Dixit</h5>
			<!-- <div class="row"> -->
				<!-- <div class="col-lg-12 col-md-12"> -->
					<?php
						error_reporting(0);
						mysql_connect("localhost","root", "1234");
						mysql_select_db("paginationdemo");

						$page = $_GET["page"];

						if($page =="" || $page<="1"){
							$page1 = 1;
							$page = 1;
						}
						else {
							$page1 = ($page * 5) - 5;
						}

						$result = mysql_query("select * from data limit $page1,5");
						echo "<table class='table table-striped table-hover table-bordered'><thead><th>CIK</th><th>Company Name</th><th>Form Type</th><th>Date Filed</th><th>Filing URL</th></thead>";
						while($row = mysql_fetch_array($result))
						{

							echo "<tr><td>" . $row['CIK'] . "</td><td>" . $row['CompanyName'] .   "</td><td>" . $row['FormType'] .  "</td><td>" . $row['DateFiled'] .  "</td><td><a href=".$row['FilingURL'].">" . $row['FilingURL']  ."</a></td></tr>";
							echo "<br>";

						}
						echo "</table>";

						$result1 = mysql_query("select * from data");
						// $result1 = mysql_query($conn, $query1);
						$count = mysql_num_rows($result1);

						$a = $count / 5;
						$a = ceil($a);
						echo "<br>";
						// echo $a;
						$lastpage=0;
						$firstpage=0;
						// if($page == $a){
						// 	$lastpage = 1;
						// 	echo "last page";
						// }
						// if($page ==1) {
						// 	$firstpage = 1;
						// 	echo "first page";
						// }
					?>
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<p style="font-size: 1em">Page <?php echo $page ?> of <?php echo $a ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-4 col-sm-4 text-left">
							<a class='btn btn-info' href="pagination.php?page=1">First</a>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 text-center">
							<a class='btn btn-primary center' href="pagination.php?page=<?php echo $page-1; ?>">Previous</a> <a class='btn btn-success' href="pagination.php?page=<?php echo $page+1; ?>">Next</a>
						</div>
						<div class="col-lg-4 col-md-4 col-sm-4 text-right">
							<a class='btn btn-danger' href="pagination.php?page=<?php echo $a; ?>">Last</a>
						</div> 
					</div><br>
					<?php
						for($b = 1;$b<=$a;$b++){
							if($b< 11){
								?>
								<ul class="pagination pagination-sm">
								 <li><a href="Pagination.php?page=<?php echo $b; ?>""><?php echo $b. " ";?></a></li>
								</ul><?php
									
							}							 
						}
					?>	
				<!-- </div> -->
			<!-- </div> -->
		</div>
	</div>
</body>
</html>