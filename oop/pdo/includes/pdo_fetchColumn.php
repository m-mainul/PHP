<?php
try {
    require_once '../includes/pdo_connect.php';
    $sql  = 'SELECT name, meaning, gender '; 
    $sql .= 'FROM names ';
    $sql .= 'ORDER BY name';
    $result = $db->query($sql);
} catch (Exception $e) {
     $error = $e->getMessage();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PDO: Fetching a Single Column</title>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>
<body>
<h1>PDO: Fetching All Rows in a Result Set</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
}
?>
<table>
    <tr>
        <th>Column</th>
    </tr>
    <!-- fetchColumn() returns a single column -->
    <!-- fetchColumn() is probably used for list -->
    <?php while($col = $result->fetchColumn(1)) : // by default return first column //argument will be set if we want the column as our expected.?> 
    <tr>
        <td><?php echo $col; ?></td>
    </tr>
    <?php endwhile; ?>
</table>
</body>
</html>