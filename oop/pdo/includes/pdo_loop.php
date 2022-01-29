<?php
try {
    require_once '../includes/pdo_connect.php';
    $sql  = 'SELECT name, meaning, gender '; 
    $sql .= 'FROM names ';
    $sql .= 'ORDER BY name';
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PDO: SELECT Loop</title>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>
<body>
<h1>PDO: Looping Directly over a SELECT Query</h1>
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
    <!-- Loop through the rowset returned by the successful excution of sql statement -->
    <?php foreach ($db->query($sql) as $row) : ?>
    <?php print_r($row); exit; ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['meaning']; ?></td>
        <td><?php echo $row['gender']; ?></td>
    </tr>
<?php endforeach; ?>
</table>
</body>
</html>