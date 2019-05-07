<!DOCTYPE html>

<html>

<!-- 
Authors: 
Date: 
Class:
Professor: Michael Kelly
-->

<head>
	<meta charset="utf-8" />
	<title>Syllabi Content Management</title>
	<link href="input.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<header>
		<h1>View content on this page!</h1>
		<img src="ccri_logo.png"/>
		
		<nav>
			<a href="view.php">View Content<alt="View Content" /></a>
			<a href="input_faculty.php">Add Faculty<alt="Add Faculty" /></a>
			<a href="input_course.php">Add Course<alt="Add Course" /></a>
			<a href="input_course_section.php">Add Course Section<alt="Add Course Section" /></a>
			<a href="input_syllabus.php">Upload Syllabus<alt="Upload Syllabus" /></a>
		</nav>
	</header>
		
	<h2>Fields marked with an asterisk (*) are required.</h2>
	
	<h3>Search by course section:</h3>
	<!-- Define a form for user input -->
	<form action="query_data.php" method="get" id="form1">
		<div id="threecolumn">
			<p>
				Subject: * <br>
				<select name="Subject" required>
					<option value="" selected></option>
					<option value="COMI">COMI</option>
					<option value="COMP">COMP</option>
					<option value="CNVT">CNVT</option>
					<option value="CYBR">CYBR</option>
					<option value="BUSN">BUSN</option>
				</select>
			</p>
			<p>
				Course Number: * <br>
				<input type="text" name="Course_Num" required>
			</p>
			<p>
				Section Number: <br>
				<input type="text" name="Section_Num">
			</p>
			<p>
				Term: * <br>
				<input type="text" name="Term" required>
			</p>
		</div><br>
		<div id="onecolumn">
			<!-- Create a button to submit user-entered data and link it to the form -->	
			<button type="submit" form="form1">Submit</button>
		</div>
	</form><br>

	<h3>Search by syllabus number:</h3>
	<!-- Define a form for user input -->
	<form action="query_data.php" method="get" id="form2">
		<p>
			Syllabus Number:<br>
			<input type="text" name="Syllabus_Num">
		</p>
		<!-- Create a button to submit user-entered data and link it to the form -->
		<button type="submit" form="form2">Submit</button>
	</form><br>

	<footer>
		<p>
			Copyright 2019 <br>
			Community College of Rhode Island
		</p>
	</footer>	
</body>

</html>