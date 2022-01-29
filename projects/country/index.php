<?php require_once("./includes/session.php"); ?>
<?php require_once("./includes/db_connection.php"); ?>
<?php require_once("./includes/functions.php"); ?>
<?php include("./includes/layouts/header.php"); ?>

<?php echo message(); ?>

<div id ="main">
	<div id = "navigation">
		
	</div>
	<div id = "page">
		<br>
		+ <a href="division.php">Add New Division</a> &nbsp;
		+ <a href="district.php">Add New District</a> &nbsp;
		+ <a href="upazila.php">Add New Upazila</a> &nbsp;
		<br>
		<br>

		<table border="1" width="700" height="auto" style="text-align: center" >
			<caption align="top">Division-District-Upazila list of Bangladesh.</caption>
			<tr>
				<th colspan="3">Division</th>
				<th>District</th>
				<th>Upazila</th>
			</tr>
			<?php 
				 $division_set = get_all_division(); 
				 while($division = mysqli_fetch_assoc($division_set)){ 
				 $district_array = find_district_for_division($division["id"]);   
				 $total_district = mysqli_num_rows($district_array)+1; 
			 ?>
			<tr >
				<td  style="vertical-align:middle" rowspan="<?php echo $total_district;?>" colspan="3" ><?php echo $division["name"]; ?></td>
			</tr>
			<?php while($district = mysqli_fetch_assoc($district_array)){ ?>
			<tr>
				<td style="vertical-align:middle"><?php echo $district["name"]; ?></td>
				<td>
					<?php 
						$upazila_array = find_upazila_for_district($district["id"]); 
						while($upazila = mysqli_fetch_assoc($upazila_array)){ 
							echo $upazila["name"]."<br>"; 
						} 
					?>
				</td>
			</tr>
			<?php } } ?>
		</table>
	</div>
</div>
	
<?php include("./includes/layouts/footer.php") ?> 

<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Table Structure</title>
</head>
<body>
	<table border="1" style="border-color:Aqua;height=100%;width=100%">
		<tr>
			<th colspan="3">Division</th>
			<th>District</th>
			<th>Upazila</th>
		</tr>
		<?php $division_set = get_division_name(); ?>
		<?php while($division = mysqli_fetch_assoc($division_set)){ ?>
		<?php $district_array = find_district_for_division($division["id"]);   ?>
		<?php $total_district = mysqli_num_rows($district_array); ?>
		<tr>
			<td rowspan="<?php echo $total_district+1;?>" colspan="3"><?php echo $division["name"]; ?></td>
		</tr>
		<?php while($district = mysqli_fetch_assoc($district_array)){ ?>
		<tr>
			<td><?php echo $district["name"]; ?></td>
			<td>
				<?php $upazila_array = find_upazila_for_district($district["id"]); ?>
				<?php while($upazila = mysqli_fetch_assoc($upazila_array)){ ?>
				<?php echo $upazila["name"]."<br>"; ?>
				<?php } ?>
			</td>
		</tr>
		<?php } ?>
		<?php } ?>
	</table>
</body>
</html>
=======
>>>>>>> af1aeea8e5d01165988f2bf0d0c3f9636d96c177
