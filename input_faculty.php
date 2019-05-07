<!DOCTYPE html>

<head>
	<meta charset="utf-8" />
	<title>Syllabi Content Management</title>
	<link href="input.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<header>
		<h1>Add new faculty members on this page!</h1>
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
	
	<!-- Define a form for user input -->	
	<form action="add_faculty.php" method="post" id="input_form">
		<div id="threecolumn">
			<p>
				Faculty ID Number: * <br>
				<input type="text" name="Fac_ID" required>
			</p>
			<p>
				First Name: * <br>
				<input type="text" name="Fac_Fname" required>
			</p>
			<p>
				Last Name: * <br>
				<input type="text" name="Fac_Lname" required>
			</p>
			<p>
				Last term taught: * <br>
				<input type="text" name="Last_Term" required>
			</p>
			<p>
				Faculty Role: * <br>
				<select name="Fac_Role" required>
					<option value="" selected></option>
					<option value="Full-Time">Full-Time</option>
					<option value="Adjunct">Adjunct</option>
				</select>
			</p>
			<p>
				Hire Date: * <br>
				<input type="date" name="Hire_Date" required>
			</p>
			<p>
				Last Activity: <br>
				<input type="date" name="Last_Activity"><br>
			</p>
			<p>
				Department: * <br>
				<select name="Department" required>
					<option value="" selected></option>
					<option value="Computer Studies">Computer Studies</option>
					<option value="Business">Business</option>
				</select>
			</p>
			<p>
				Main Campus: * <br>
				<select name="Fac_Site" required>
					<option value="" selected></option>
					<option value="knight">Knight Campus (Warwick)</option>
					<option value="flanagan">Flanagan Campus (Lincoln)</option>
					<option value="liston">Liston Campus (Providence)</option>
					<option value="newport">Newport Campus (Newport)</option>
					<option value="westerly">Satellite Campus (Westerly)</option>
				</select>
			</p>
		</div><br>
		<div id="onecolumn">
			<!-- Create a button to submit user-entered data and link it to the form -->
			<button type="submit" form="input_form">Submit</button>
		</div>
	</form><br>
	
	<footer>
		<p>
			Copyright 2019 <br>
			Community College of Rhode Island
		</p>
	</footer>	
</body>

</html>