<?php
try {
    require_once '../../includes/pdo_connect.php';
    $sql = 'INSERT INTO names ( ';
    $sql .=	'name, meaning, gender';
    $sql .= ') VALUES (';
    $sql .= '"William", "resolute guardian", "boy"';
    $sql .= ')';
	$result = $db->query($sql);
	var_dump($result);
	// echo $result->queryString;
    echo $result->queryString;
} catch (Exception $e) {
    $error = $e->getMessage();
}
if (isset($error)) {
    echo $error;
}