<!DOCTYPE html>
<html>
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
		</header><br>
		<!-- Select record(s) from database based on user-entered data and display all rows that meet the criteria in a table -->
		<?php
			
			// Define variables to save user-entered data, resolve to null if blank. 
			$Subject = $_GET["Subject"] ?? null;
			$Course_Num = $_GET["Course_Num"] ?? null;
			$Section_Num = $_GET["Section_Num"] ?? null;
			$Term = $_GET["Term"] ?? null;
			$Syllabus_Num = $_GET["Syllabus_Num"] ?? null;
			
			// Combine user-entered values for $Subject and $Course_Num because they are stored in the same table column
			$Course_Num = $Subject . $Course_Num;
			
			//Determine which table headers to display
			if($Course_Num != null && $Term != null) {
				echo "<table style='border: solid 1px black;'>";
				echo "<tr><th>Course Number</th><th>Section Number</th><th>Faculty ID</th><th>Term</th><th>CRN</th><th>Syllabus Number</th><th>Campus</th><th>Cancelled?</th><th>Syllabus File Location</th><th>Upload Date</th></tr>";
			}
			else {
				echo "<table style='border: solid 1px black;'>";
				echo "<tr><th>Syllabus Number</th><th>File Location</th><th>Upload Date</th><th>Faculty ID Number</th></tr>";
			}
			
			// Create table to display data
			class TableRows extends RecursiveIteratorIterator { 
				function __construct($data) { 
					parent::__construct($data, self::LEAVES_ONLY); 
				}

				function current() {
					//comment out this line, which makes all the returned data links
					//return "<td style='width:150px;border:1px solid black;'><a href=\"" . parent::current(). "\" />" . parent::current(). "</a></td>";
					return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
				}

				function beginChildren() { 
					echo "<tr>"; 
				} 

				function endChildren() { 
					echo "</tr>" . "\n";
				} 
			} 
			
			// Define database connection details
			$servername = "127.0.0.1";
			$username = "root";
			$password = "";
			$dbname = "system_prototype";

			// Attempt to connect to database and insert new records into table
			if ($Subject != null && $Course_Num != null && $Section_Num != null && $Term != null) {
				try {
					$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$stmt = $conn->prepare("SELECT * FROM course_section LEFT JOIN syllabi ON course_section.Syllabus_Num = syllabi.Syllabus_Num WHERE Course_Num = '$Course_Num' AND Section_Num = '$Section_Num' AND Term = '$Term'"); 
					$stmt->execute();

					// set the resulting array to associative
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
					foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
						echo $v;
					}
				}
				catch(PDOException $e) {
					echo "Error: " . $e->getMessage();
				}
				$conn = null;
				echo "</table>";
			}
			// If the user does not enter a section number, omit it from the search.
			elseif ($Course_Num != null && $Term != null) {
				try {
					$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$stmt = $conn->prepare("SELECT * FROM course_section LEFT JOIN syllabi ON course_section.Syllabus_Num = syllabi.Syllabus_Num WHERE Course_Num = '$Course_Num' AND Term = '$Term'"); 
					$stmt->execute();

					// set the resulting array to associative
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
					foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
						echo $v;
					}
				}
				catch(PDOException $e) {
					echo "Error: " . $e->getMessage();
				}
				$conn = null;
				echo "</table>";
			}
			// If syllabus number is not null, then assume that the user wants to search for a syllabus number.
			else {
				if ($Syllabus_Num != null) {
					try {
						$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$stmt = $conn->prepare("SELECT * FROM syllabi WHERE Syllabus_Num = '$Syllabus_Num'"); 
						$stmt->execute();
						
						// set the resulting array to associative
						$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
						foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
							echo $v;
						}
					}
					catch(PDOException $e) {
						echo "Error: " . $e->getMessage();
					}
				
				$conn = null;
				echo "</table>";
				}
				else {
					echo "Please enter a search query";
				}				
			}	
		?>
		<br>
		<br>
		<a href="view.php">View another record<alt="View Content" /></a>
		
		<footer>
			<p>
				Copyright 2019 <br>
				Community College of Rhode Island
			</p>
		</footer>
	</body>
</html>