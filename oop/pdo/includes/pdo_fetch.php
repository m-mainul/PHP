<?php
try {
    require_once '../includes/pdo_connect.php';
    $sql  = 'SELECT name, meaning, gender '; 
    $sql .= 'FROM names ';
    $sql .= 'ORDER BY name';
    // Execute the query and store the enter results set into $result
    $result = $db->query($sql);
    // var_dump($result);
    // print_r($result);
    // exit;
} catch (Exception $e) {
     $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PDO: Fetching a Row</title>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>
<body>
<h1>PDO: Fetching the Next Row</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
}
?>
<table>
    <tr>
        <th>Name</th>
        <th>Meaning</th>
        <th>Gender</th>
    </tr>
    <!-- Fetch will return one row at a time -->
    <?php while($row = $result->fetch()) : ?>
    <tr>
        <td><?php echo $row[0]; ?></td>
        <td><?php echo $row['meaning']; ?></td>
        <td><?php echo $row['gender']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>
</body>
</html>