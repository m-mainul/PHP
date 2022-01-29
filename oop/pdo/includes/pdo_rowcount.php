<?php
    try {
        require_once '../includes/pdo_connect.php';
        // $count = $db->query('SELECT COUNT(*) FROM names WHERE name = "Alice" ');
        $count = $db->query('SELECT COUNT(*) FROM names');
        var_dump($count);
        // $count = $db->query('SELECT COUNT(*) FROM names ');
        $numrows = $count->fetchColumn();
        var_dump($db);
        var_dump($numrows);
        if($numrows){
            $sql  = 'SELECT name, meaning, gender '; 
            $sql .= 'FROM names ';
            // $sql .= 'WHERE name = "Alice" ';
            $sql .= 'ORDER BY name';
            $result = $db->query($sql);
        }
        // $numrows = $result->rowCount(); // rowcount() return the number of rows in the result set.
    } catch (Exception $e) {
         $error = $e->getMessage();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>PDO: Counting Rows</title>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>
<body>
<h1>PDO: Counting Rows in a Result Set</h1>
<?php if (isset($error)) {
    echo "<p>$error</p>";
}
echo "<p>Total results found: {$numrows}.</p>";
if($numrows) :
?>
<table>
    <tr>
        <th>Name</th>
        <th>Meaning</th>
        <th>Gender</th>
    </tr>
    <?php while($row = $result->fetch()) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['meaning']; ?></td>
            <td><?php echo $row['gender']; ?></td>
        </tr>
    <?php } ?>
</table>
<?php endif; ?>
</body>
</html>