<?php

include_once("config.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$bookTitle=$_POST['bookTitle'];
	$category=$_POST['category'];
	$Author=$_POST['Author'];
	$Publisher=$_POST['Publisher'];
	$yearPublished=$_POST['yearPublished'];	

	if(empty($bookTitle) || empty($category) || empty($Author) || empty($Publisher) || empty($yearPublished)) {	
			
		if(empty($bookTitle)) {
			echo "<font color='red'>Title field is empty.</font><br/>";
		}
		
		if(empty($category)) {
			echo "<font color='red'>Category field is empty.</font><br/>";
		}
		
		if(empty($Author)) {
			echo "<font color='red'>Author field is empty.</font><br/>";
		}	
		if(empty($Publisher)) {
			echo "<font color='red'>Publisher field is empty.</font><br/>";
		}
		
		if(empty($yearPublished)) {
			echo "<font color='red'>Year Published field is empty.</font><br/>";
		}		
	} else {	

		$sql = "UPDATE tbl_book SET bookTitle=:bookTitle, category=:category, Author=:Author, Publisher=:Publisher, yearPublished=:yearPublished WHERE id=:id";
		$query = $dbConn->prepare($sql);
				
		$query->bindparam(':id', $id);
		$query->bindparam(':bookTitle', $bookTitle);
		$query->bindparam(':category', $category);
		$query->bindparam(':Author', $Author);
		$query->bindparam(':Publisher', $Publisher);
		$query->bindparam(':yearPublished', $yearPublished);
		$query->execute();
		

		header("Location: index.php");
	}
}
?>
<?php

$id = $_GET['id'];


$sql = "SELECT * FROM tbl_book WHERE id=:id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$bookTitle = $row['bookTitle'];
	$category = $row['category'];
	$Author = $row['Author'];
	$Publisher = $row['Publisher'];
	$yearPublished = $row['yearPublished'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Title</td>
				<td><input type="text" name="bookTitle" value="<?php echo $bookTitle;?>"></td>
			</tr>
			<tr> 
				<td>Category</td>
				<td><input type="text" name="category" value="<?php echo $category;?>"></td>
			</tr>
			<tr> 
				<td>Author</td>
				<td><input type="text" name="Author" value="<?php echo $Author;?>"></td>
			</tr>
			<tr> 
				<td>Publisher</td>
				<td><input type="text" name="Publisher" value="<?php echo $Publisher;?>"></td>
			</tr>
			<tr> 
				<td>Year Published</td>
				<td><input type="text" name="yearPublished" value="<?php echo $yearPublished;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
