<?php
try {
    require_once '../includes/pdo_connect.php';
    $sql  = 'SELECT name, meaning, gender '; 
    $sql .= 'FROM names ';
    $sql .= 'ORDER BY name';
    // fetchAll() returns the results once and store them as a multidimensional array
    $result = $db->query($sql);
    // $all = $result->fetchAll();// return both index and associative array
    // $all = $result->fetchAll(PDO::FETCH_ASSOC); // return associative array
    $all = $result->fetchAll(PDO::FETCH_NUM); // return indexed array
} catch (Exception $e) {
     $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PDO: Fetching All Rows</title>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>
<body>
<h1>PDO: Fetching All Rows in a Result Set</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
}
?>
<pre>
    <!-- The top level array is the row and the second array is the column -->
    <?php print_r($all); ?>
</pre>
<!-- <table>
    <tr>
        <th>Name</th>
        <th>Meaning</th>
        <th>Gender</th>
    </tr>
    <?php while($row = $result->fetch()) : ?>
    <tr>
        <td><?php echo $row[0]; ?></td>
        <td><?php echo $row['meaning']; ?></td>
        <td><?php echo $row['gender']; ?></td>
    </tr>
    <?php endwhile; ?>
</table> -->
</body>
</html>