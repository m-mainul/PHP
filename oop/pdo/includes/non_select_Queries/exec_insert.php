<?php
try {
    require_once '../../includes/pdo_connect.php';
    $sql = 'INSERT INTO names (name, meaning, gender)
            VALUES ("William", "resolute guardian", "boy")';
    $affected = $db->exec($sql); //exec() — Execute an SQL statement and return the number of affected rows 
    // var_dump($affected);
    echo $affected . ' row inserted with ID '.$db->lastInsertId();
} catch (Exception $e) {
    $error = $e->getMessage();
}
if (isset($error)) {
    echo $error;
}