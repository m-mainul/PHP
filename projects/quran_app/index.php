<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Al-Quran</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="plugins/bootstrap-select/dist/css/bootstrap-select.min.css">
</head>
<body>
	<div class="container wrapper">
		<div class="row">
			<div class="col-md-3">
				<select name="suraa" class="form-control selectpicker" data-live-search="true" id = "suraa" title = "Select Sura Number">
				   <?php 
				   		for ($begin=1; $begin <= 114 ; $begin++) { 
				   			echo "<option value='".$begin."'>$begin</option>";
				   		} 
				   	?>
				</select>
			</div>

			<div class="col-md-3">
				<select name="aya_sura_a" class="form-control selectpicker" data-live-search="true" id = "ayat-sura-a" title = "Select Aya Number">
				</select>
			</div>

			<div class="col-md-3">
				<select name="surab" class="form-control selectpicker" data-live-search="true" id = "surab" title = "Select Sura Number">
				   <?php 
				   		for ($begin=1; $begin <= 114 ; $begin++) { 
				   			echo "<option value='".$begin."'>$begin</option>";
				   		} 
				   	?>
				</select>
			</div>

			<div class="col-md-3">
				<select name="ayat-sura-b" class="form-control selectpicker" data-live-search="true" id = "ayat-sura-b" title = "Select Aya Number">
				</select>
			</div>
		</div>

		<div class="row comment-box">
			<div class="col-md-6">
	           <textarea name="text_suraa_ayat_a" class="form-control" placeholder="Comment Box" id="text_suraa_ayat_a"></textarea>
			</div>

			<div class="col-md-6">
	           <textarea name="text_surab_ayat_b" class="form-control" placeholder="Comment Box" id="text_surab_ayat_b"></textarea>
			</div>
		</div>

		<div class="row serial-num">
			<div class="col-md-4"></div>

		    <div class="col-md-4">
		        <div class="input-group">
		            <span class="serial-text">Serial Number</span> <input type="text" name="serial-num" id="serial-num" class="form-control" /> 
		        </div>
		    </div>

			<div class="col-md-4"></div>
		</div>

		<div class="row">
			<label>Comments</label>
	        <textarea name="comments" class="form-control" placeholder="Comment Box" id="comments"></textarea>
		</div>

		<div class="row">
			<label>Notes</label>
	        <textarea name="notes" class="form-control" placeholder="Comment Box" id="notes"></textarea>
		</div>

	</div>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script type="text/javascript" src="main.js"></script>
</body>
</html>