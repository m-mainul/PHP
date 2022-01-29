<?php 

	$link = mysql_connect("localhost", "root", "");
	mysql_select_db("bbsdb", $link);


/*$result = mysql_query("SELECT * FROM books", $link);
$num_rows = mysql_num_rows($result);

for ($i=0; $i < $num_rows ; $i++) { 
	$result[$i] = mysql_query("select books_no from books");
}
$result = mysql_query("select books_no from books");

print_r($result);*/


for ($i=0; $i <1 ; $i++) { 
	while ($row[$i] = mysql_fetch_array($result))
	{
		//$value = $row['books_no']; 
		echo $row['books_no'];
		//echo $value;
		echo "<br />";
	}
}
/*while ($row = mysql_fetch_array($result))
{
	//echo $row['books_no'];
	print_r($row);
	echo "<br />";
}*/


//echo "$num_rows Rows\n";

/*$dsn = 'mysql:dbname=bbsdb;host=localhost;port=3306';
$username = 'root';
$password = '';
try {
    $db = new PDO($dsn, $username, $password); // also allows an extra parameter of configuration
} catch(PDOException $e) {
    die('Could not connect to the database:<br/>' . $e);
}

$result = mysql_query("SELECT * FROM books", $db);
$num_rows = mysql_num_rows($result);

echo "$num_rows Rows\n";*/



?>