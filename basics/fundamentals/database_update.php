<?php 

	//$number = 2314;
	//$an_array = str_split($number);

	//echo $an_array[3];

	//str_split(string)


 ?>


$str=50108899772727;
$arr = str_split($str, 2);
$arr[count($arr)-2].="0";
$arr[count($arr)-3].="0";
$str=implode("",$arr);


SQL> WITH DATA AS
  2    ( SELECT 50108899772727 num FROM dual
  3    )
  4  SELECT to_number( SUBSTR(TO_CHAR(num), 1, 10)
  5    ||'0'
  6    || SUBSTR(TO_CHAR(num), 11, 2)
  7    ||'0'
  8    || SUBSTR(TO_CHAR(num), 13) ) num
  9  FROM DATA
 10  /

 UPDATE table_name
 SET column_name = to_number( SUBSTR(TO_CHAR(column_name), 1, 10)
  ||'0'
  || SUBSTR(TO_CHAR(column_name), 11, 2)
  ||'0'
  || SUBSTR(TO_CHAR(column_name), 13) )
   FROM TABLE
  WHERE LENGTH(column_name) = 14
/


<!-- <?php 
mysql_connect("localhost", "root", ""); //database connection
mysql_select_db("ftfl");

$result = mysql_query("select name from students_tbl");
//return the array and loop through each row
while ($row = mysql_fetch_array($result))
{
	echo $row['name'];
	echo "<br />";
}

print_r(str_split("Hello"));

if (isset($_POST['submitButton'])) {
// Get values from form\
	if (isset($_POST['newStudentText']) || $_POST['entryDateText']) {
		$id = $_POST['idText'];
		$name = $_POST['newStudentText'];
		$entry_date = $_POST['entryDateText'];
//inserting data order
		$student_single_record = "UPDATE students_tbl SET
		name = '$name',created='$entry_date' where id ='$id'";
//declare in the order variable
$student_information = mysql_query($student_single_record); //order executes
if ($student_information) {
	echo("Database is updated successfully");
} else {
	echo("Input data is fail");
}
}
else {
	echo("please fill up all the fields");
}
}


?> -->