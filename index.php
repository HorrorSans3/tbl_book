<?php
include_once("config.php");

$result = $dbConn->query("SELECT * FROM tbl_book ORDER BY id DESC");
?>

<html>
<head>	
	<title>Homepage</title>
	<link rel="stylesheet" type="text/css" href="a.css">

</head>

<body class="body">
<a href="add.html" id="new">Add New Data</a><br/><br/>

	<table>

	<tr>
		<td class="thead">Title</td>
		<td class="thead">Category</td>
		<td class="thead">Author</td>
		<td class="thead">Publisher</td>
		<td class="thead">Year Published</td>
		<td class="thead">Date Added</td>
		<td class="thead">Update</td>
	</tr>
	<?php 	
	while($row = $result->fetch(PDO::FETCH_ASSOC)) { 		
		echo "<tr>";
		echo "<td>".$row['bookTitle']."</td>";
		echo "<td>".$row['category']."</td>";
		echo "<td>".$row['Author']."</td>";
		echo "<td>".$row['Publisher']."</td>";
		echo "<td>".$row['yearPublished']."</td>";	
		echo "<td>".$row['Date Added']."</td>";	
		echo "<td><a class=\"edits\" href=\"edit.php?id=$row[id]\">Edit</a> | <a class=\"edits\" href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
</body>
</html>
