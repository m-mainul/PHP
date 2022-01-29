<div id="footer">Copyright <?php echo date("Y"); //This will return the current date in year?>, Widget Corp</div>
</body>
</html>
<?php 
 	global $connection;
 	
	if ($connection) {
		mysqli_close($connection);
	}	
?> 