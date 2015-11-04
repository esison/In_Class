<?php 
require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);
$query = "SELECT author, title, year FROM classics ORDER BY year";
$result = $conn->query($query);
if (!$result) die($conn->error);
$rows = $result->num_rows;
echo "<table border=\"1\">";
for ($j = 0 ; $j < $rows ; ++$j) {
	$result->data_seek($j);
	$row = $result->fetch_row();
	echo('<tr>');
	echo ("<td>" .$row[0]."</td><td>".$row[1]."</td><td>".$row[2]. "</td>");
	echo('</tr>');
	}
	echo "</table><p></p>";
$result->close();
$conn->close();
?>
