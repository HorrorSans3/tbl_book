<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$bookTitle = $_POST['bookTitle'];
	$category = $_POST['category'];
	$Author = $_POST['Author'];
	$Publisher = $_POST['Publisher'];
	$yearPublished = $_POST['yearPublished'];
		
	// checking empty fields
	if(empty($bookTitle) || empty($category) || empty($Author) || empty($Publisher) || empty($yearPublished)) {
				
		if(empty($bookTitle)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($category)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($Author)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}
		if(empty($Publisher)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($yearPublished)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO tbl_book(bookTitle, category, Author, Publisher, yearPublished) VALUES(:bookTitle, :category, :Author, :Publisher, :yearPublished)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':bookTitle', $bookTitle);
		$query->bindparam(':category', $category);
		$query->bindparam(':Author', $Author);
		$query->bindparam(':Publisher', $Publisher);
		$query->bindparam(':yearPublished', $yearPublished);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
