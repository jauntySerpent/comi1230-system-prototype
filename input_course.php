<!DOCTYPE html>

<head>
	<meta charset="utf-8" />
	<title>Syllabi Content Management</title>
	<link href="input.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<header>
		<h1>Add new courses on this page!</h1>
		<img src="ccri_logo.png"/>
		
		<nav>
			<a href="view.php">View Content<alt="View Content" /></a>
			<a href="input_faculty.php">Add Faculty<alt="Add Faculty" /></a>
			<a href="input_course.php">Add Course<alt="Add Course" /></a>
			<a href="input_course_section.php">Add Course Section<alt="Add Course Section" /></a>
			<a href="input_syllabus.php">Upload Syllabus<alt="Upload Syllabus" /></a>
		</nav>
	</header>
	
<!-- Define a form for user input -->	
	<h2>Fields marked with an asterisk (*) are required.</h2>
	
	<form action="add_course.php" method="post" id="input_form">
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
				Department: * <br>
				<select name="Department" required>
					<option value="" selected></option>
					<option value="Computer Studies">Computer Studies</option>
					<option value="Business">Business</option>
				</select>
			</p>
			<p>
				Course Title: * <br>
				<input type="text" name="Title" required>
			</p>
			<p>
				Number of Credits: * <br>
				<input type="text" name="Credits" required>
			</p>
		</div><br>
		<div id="onecolumn">
			<!-- Create a button to submit user-entered data and link it to the form -->
			<button type="submit" form="input_form">Submit</button>
		</div>
	</form>
	

	
	<footer>
		<p>
			Copyright 2019 <br>
			Community College of Rhode Island
		</p>
	</footer>	
</body>

</html>