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
		
		<!-- Create new record based on user-entered data -->
		<?php
		
			// Define variables to save user-entered data, resolve to null if blank. 
			$Syllabus_Num = $_POST["Syllabus_Num"] ?? null;
			$Upload_Date = $_POST["Upload_Date"] ?? null;
			$Fac_ID = $_POST["Fac_ID"] ?? null;
			
			$Max_File_Size = 15000000; //15 MB in bytes

			// The directory "/uploads/" refers to the directory "C:\uploads"
			$target_dir = "/uploads/";
			$file_Path = "C:\\uploads\\" . basename($_FILES["uploaded_file"]["name"]);
			$target_file = $target_dir . basename($_FILES["uploaded_file"]["name"]);
			$uploadOk = 1;
			$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			
			// Check if file already exists
			if (file_exists($target_file)) {
				echo "ERROR: Sorry, the file you tried to upload already exists.";
				$uploadOk = 0;
			}
			
			// Check file size is under 15 MB
			if ($_FILES["uploaded_file"]["size"] > $Max_File_Size) {
				echo "ERROR: Sorry, the file you tried to upload is too large.";
				$uploadOk = 0;
			}
			
			// Only allow certain file formats to be uploaded
			if($FileType != "pdf" && $FileType != "doc" && $FileType != "docx") {
				echo "Sorry, only PDF, DOC, and DOCX files are allowed.";
				$uploadOk = 0;
			}
			
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				echo " Your file was not uploaded.";
			}
			
			// if everything is ok, try to upload file 
			else {
				if (move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $target_file)) {
					echo "The file \"". basename( $_FILES["uploaded_file"]["name"]). "\"  has been uploaded.\n";
					echo nl2br("You can access the file by searching for syllabus reference number $Syllabus_Num.\n");
				
					echo "The file is located at " . $file_Path;
				} 
				else {
					echo "Sorry, there was an error uploading your file.";
				}
			}
						
			// Define database connection details
			$servername = "127.0.0.1";
			$username = "root";
			$password = "";
			$dbname = "system_prototype";
			
			
			
			// Attempt to connect to database and insert new records into table
			if ($uploadOk != 0) {
				
				// Escape the slashes in the path of the uploaded file
				$escaped_Path = addslashes($file_Path);
				try {
					$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
					// set the PDO error mode to exception
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "INSERT INTO syllabi (Syllabus_Num, Location, Upload_Date, Fac_ID) 
					VALUES ('$Syllabus_Num','$escaped_Path','$Upload_Date','$Fac_ID')";
					// use exec() because no results are returned
					$conn->exec($sql);
					
					//Display confirmation message to user
					echo "New record created successfully!";
				}
				// If attempt fails, then display an error message.
				catch(PDOException $e)
					{
					echo $sql . "<br>" . $e->getMessage();
					}

				$conn = null;
			}
		?>
		
		<br>
		<br>
		<a href="input_syllabus.php">Return to the add syllabus page<alt="View Content" /></a>
	</body>
</html>