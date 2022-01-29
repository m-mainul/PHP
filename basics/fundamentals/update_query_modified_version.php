<?php 

		/*$link = mysqli_connect("localhost", "root", "");
		mysql_select_db("bbsdb", $link);*/

		$servername = "localhost";
		$username = "root";
		$password = "";

// Create connection
		$conn = mysqli_connect($servername, $username, $password);

// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		//echo "Connected successfully";

		$sql = mysqli_query($conn,"SELECT * FROM books");

		//$sql = "SELECT books_no FROM books";


		/*if ($result=mysqli_query($conn,$sql))
		{
  // Return the number of rows in result set
			$rowcount=mysql_affected_rows($result);
			//echo $rowcount;
			printf("Result set has %d rows.\n",$rowcount);
  // Free result set
			mysqli_free_result($result);
		}*/

		//if($query)
		
			//$numrows = mysqli_num_rows($conn,$query);
			//return $numrows;

		//else
			//die("something failed");

		//$numrows = mysql_num_rows($query);

		$numrows = mysql_num_rows($sql);

		//$result = "select books_no from books;


		
		for ($i=1; $i <=$numrows-3; $i++) { 
			$result = mysqli_query($conn,"select books_no from books where id = $i");
			while ($row = mysqli_fetch_array($result))
			{
				$original_value =  $row['books_no'];
			//$an_array = str_split($value);

			//$value1 = stristr(haystack, needle)($value);

				$value = substr($original_value, 0,10);
				$value1 = substr($original_value,10,2);
				$value2 = substr($original_value, 12,2);

			//str_replace(search, replace, subject)
			//$original_value = mysqli_query("select books_no from books where id = 1");
				$concat = mysqli_query("update books 
					set books_no = concat(concat($value,0),concat($value1,0),$value2) 
					where id = $i");
			//print_r($row);
				echo $value2;
			//echo "<br />";
			}

		}

		mysqli_close($conn);

/*UPDATE books
 SET books_no = to_number( SUBSTR(TO_CHAR(books_no), 1, 10)
  ||'0'
  || SUBSTR(TO_CHAR(books_no), 11, 2)
  ||'0'
  || SUBSTR(TO_CHAR(books_no), 13) )
   FROM TABLE
   WHERE LENGTH(books_no) = 14*/







   ?>