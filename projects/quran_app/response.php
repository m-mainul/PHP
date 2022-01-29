<?php 

include_once 'db_connection.php';
function confirm_query($result_set){ 
	global $connection;

	if(!$result_set){
		die("Database query failed:".mysqli_error($connection). __LINE__ .' in ' .__FILE__ );  
	}
}

if(isset($_POST['sura_a'], $_POST['ayat_a'], $_POST['sura_b'], $_POST['ayat_b'])) {
	$query  = "SELECT serial_no, notes, comments";
	$query .= " FROM notes_comments_serial_no";
	$query .= " WHERE sura_a=".$_POST['sura_a'];
	$query .= " AND ayat_a=".$_POST['ayat_a'];
	$query .= " AND sura_b=".$_POST['sura_b'];
	$query .= " AND ayat_b=".$_POST['ayat_b'];

	mysqli_query($connection, "SET NAMES UTF8");
	$result = mysqli_query($connection, $query);
	confirm_query($result);
	if($record = mysqli_fetch_object($result)){
		echo json_encode($record);
		exit;
	}

	echo '';
	exit;
}

if(isset($_POST['suraa_no'], $_POST['ayat_no'])) {
	$query  = "SELECT text";
	$query .= " FROM text_ayat";
	$query .= " WHERE sura_no=".$_POST['suraa_no'];
	$query .= " AND ayat_no=".$_POST['ayat_no'];

	mysqli_query($connection, "SET NAMES UTF8");
	$result = mysqli_query($connection, $query);
	confirm_query($result);
	if($ayat_text = mysqli_fetch_object($result)){
		echo $ayat_text->text;
		exit;
	}

	echo '';
	exit;
}

if(isset($_POST['suraa_no'])){
	$query  = "SELECT aya_no ";
	$query .= " FROM sura_aya_no";
	$query .= " WHERE sura_no=".$_POST['suraa_no'];

	$result = mysqli_query($connection, $query);
	$options = '';
	confirm_query($result);
		if($sura_no = mysqli_fetch_object($result)){
			for ($begin=1; $begin <= $sura_no->aya_no ; $begin++) { 
				$options.="<option value='$begin'>$begin</option>";
			}
		}
		
	echo $options;
	exit;

}



