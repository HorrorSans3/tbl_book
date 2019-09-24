<html>
<head>
	<title>Add Data</title>
	<link rel="stylesheet" type="text/css" href="add.css">
</head>

<body>
<?php

include_once("config.php");

if(isset($_POST['Submit'])) {	
	$bookTitle = $_POST['bookTitle'];
	$category = $_POST['category'];
	$Author = $_POST['Author'];
	$Publisher = $_POST['Publisher'];
	$yearPublished = $_POST['yearPublished'];
		

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

		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 

		$sql = "INSERT INTO tbl_book(bookTitle, category, Author, Publisher, yearPublished) VALUES(:bookTitle, :category, :Author, :Publisher, :yearPublished)";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':bookTitle', $bookTitle);
		$query->bindparam(':category', $category);
		$query->bindparam(':Author', $Author);
		$query->bindparam(':Publisher', $Publisher);
		$query->bindparam(':yearPublished', $yearPublished);
		$query->execute();
		
		echo "<center><font color='green'><h3 id='succ'>Data added successfully.</h3>";
		echo "<br/><a href='index.php' id='view'>View Result</a></center>";
	}
}
?>
</body>
</html>
