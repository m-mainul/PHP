<?php
// This program will checking a result set before display it 
// If it found the result then load the table otherwise not.
// To check whether a query has result to store it on a variable and then check it by a conditional expression and load the table if results found
// If the result set empty the variable will be false.
try {
    require_once '../includes/pdo_connect.php';
    $sql  = 'SELECT name, meaning, gender '; 
    $sql .= 'FROM names ';
    $sql .= 'WHERE name = "David" ';
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
    <title>PDO: Testing the First Row</title>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>
<body>
    <h1>PDO: Checking a Result Set before Display</h1>
    <?php if (isset($error)) {
        echo "<p>$error</p>";
    }
    $row = $result->fetch();
    if(!$row) :
        echo '<p>No results found.</p>';
    else :
        ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Meaning</th>
            <th>Gender</th>
        </tr>
        <?php do { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['meaning']; ?></td>
            <td><?php echo $row['gender']; ?></td>
        </tr>
        <?php } while($row = $result->fetch()); ?>
    </table>
<?php endif; ?>
</body>
</html>