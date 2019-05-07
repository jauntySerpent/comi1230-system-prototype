<!DOCTYPE html>

<head>
	<meta charset="utf-8" />
	<title>Syllabi Content Management</title>
	<link href="input.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<header>
		<h1>Add course section information on this page!</h1>
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
	<form action="add_course_section.php" method="post" id="input_form" >
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
				Course Number: *<br>
				<input type="text" name="Course_Num" required>
			</p>
			<p>
				Section Number: *<br>
				<input type="text" name="Section_Num" required>
			</p>
			<p>
				Faculty ID Number: *<br>
				<input type="text" name="Fac_ID" required>
			</p>
			<p>
				Term: *<br>
				<select name="Term" required>
					<option value="" selected></option>
					<option value="201910">Spring 2019</option>
					<option value="201920">Summer 2019</option>
					<option value="201930">Fall 2019</option>
				</select>
			</p>
			<p>
				CRN Number: * <br>
				<input type="text" name="CRN_Number" required>
			</p>
			<p>
				Syllabus Number: * <br>
				<input type="text" name="Syllabus_Num" required>
			</p>
			<p>
				Main Campus: * <br>
				<select name="Campus" required>
					<option value="" selected></option>
					<option value="knight">Knight Campus (Warwick)</option>
					<option value="flanagan">Flanagan Campus (Lincoln)</option>
					<option value="liston">Liston Campus (Providence)</option>
					<option value="newport">Newport Campus (Newport)</option>
					<option value="westerly">Satellite Campus (Westerly)</option>
				</select>
			</p>
			<p>
			Canceled (Yes/No): * <br>
				<select name="Canceled" required>
					<option value="" selected></option>
					<option value="Y">Yes</option>
					<option value="N">No</option>
				</select>
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