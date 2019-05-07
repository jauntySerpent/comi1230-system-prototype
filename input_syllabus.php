<!DOCTYPE html>

<head>
	<meta charset="utf-8" />
	<title>Syllabi Content Management</title>
	<link href="input.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<header>
		<h1>Upload a new syllabus on this page!</h1>
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
	
	<form action="add_syllabus.php" method="post" enctype="multipart/form-data" id="input_form">
		<div id="threecolumn">
			<p>
				Syllabus Number: * <br>
				<input type="text" name="Syllabus_Num" required>
			</p>
			<p>
				Upload Date: * <br>
				<input type="date" name="Upload_Date" required>
			</p>
			<p>
				<!-- (Note: This must be a valid, pre-existing Faculty ID Number!) -->
				Faculty ID Number: * <br>
				<input type="text" name="Fac_ID" required>
			</p>
			<p>
				Upload File: * <br>
				<input type="file" name="uploaded_file" id="uploaded_file" required>
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