<?php
// define variables and initialize with empty values
$nameErr = $addrErr = $emailErr = $howManyErr = $favFruitErr = "";
$name = $address = $email = $howMany = "";
$favFruit = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["name"])) {
		$nameErr = "Missing";
	}
	else {
		$name = $_POST["name"];
	}

	if (empty($_POST["address"])) {
		$addrErr = "Missing";
	}
	else {
		$address = $_POST["address"];
	}

	if (empty($_POST["email"]))  {
		$emailErr = "Missing";
	}
	else {
		$email = $_POST["email"];
	}

	if (!isset($_POST["howMany"])) {
		$howManyErr = "You must select 1 option";
	}
	else {
		$howMany = $_POST["howMany"];
	}

	if (empty($_POST["favFruit"])) {
		$favFruitErr = "You must select 1 or more";
	}
	else {
		$favFruit = $_POST["favFruit"];
	}
}
?>

<?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $website = test_input($_POST["website"]);
  $comment = test_input($_POST["comment"]);
  $gender = test_input($_POST["gender"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form Validation</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<!-- The validation rules for the form above are as follows:
	Field 	Validation Rules
	Name 	Required. + Must only contain letters and whitespace
	E-mail 	Required. + Must contain a valid email address (with @ and .)
	Website 	Optional. If present, it must contain a valid URL
	Comment 	Optional. Multi-line input field (textarea)
	Gender 	Required. Must select one -->

	<!-- Cross-site scripting (XSS) is a type of computer security vulnerability typically found in Web applications. XSS enables attackers to inject client-side script into Web pages viewed by other users. -->
	<!-- The name, email, and website fields are text input elements, and the comment field is a textarea -->
	<!-- but my advise is to stick to POST when using forms unless you have a good reason to pass user data in a viewable URL. -->

	<!-- Detecting a form submission is a little bit trickier when you’re using GET, 
		because just requesting the page to view the form will probably happen as a GET request as well. 
		One common work around is provide a name attribute to the submit button, 
		and check whether it is set in the $_GET array with isset(). For example: -->

		<!-- <input type="submit" name="submit" value="Submit"> -->
		<?php
	//if (isset($_GET["submit"])) {
    // process the form contents...
	//}
		?>



		<div class = "div">
			<form method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

				Name <input type="text" name="name" value="<?php echo htmlspecialchars($name); //This code is for amending the same code to the text box so that user does not have to retype it.?>"> <span class="error"><?php echo $nameErr;?></span> <br>
				Address <input type="text" name="address" value=""> <br>
				Email <input type="text" name="email" value=""> <br>
				<!-- How many pieces of fruit <input type="radio" name="howMany" value="zero"> 0 <br>
				do you eat per day?<input type="radio" name="howMany" value="one"> 1 <br>
				<input type="radio" name="howMany" value="two"> 2 <br>
				<input type="radio" name="howMany" value="twoplus"> More than 2 <br> -->

				How many pieces of fruit<input type="radio" name="howMany"
				<?php if (isset($howMany) && $howMany == "zero") echo "checked"; ?>
				value="zero"> 0 <br>
				<input type="radio" name="howMany"
				<?php if (isset($howMany) && $howMany == "one") echo "checked"; ?>
				value="one"> 1 <br>
				<input type="radio" name="howMany"
				<?php if (isset($howMany) && $howMany == "two") echo "checked"; ?>
				value="two"> 2 <br>
				<input type="radio" name="howMany"
				<?php if (isset($howMany) && $howMany == "twoplus") echo "checked"; ?>
				value="twoplus"> More than 2 <br>
				<br>

				My favourite fruit<select name="favFruit[]" size="4" multiple>
				<option value="apple">Apple</option>
				<option value="banana">Banana</option>
				<option value="plum">Plum</option>
				<option value="pomegranate">Pomegranate</option>
				<option value="strawberry">Strawberry</option>
				<option value="watermelon">Watermelon</option>
			</select> <br> <br>
			Would you like a brochure?<input type="checkbox" name="brochure" value="Yes">
			<br> <br>
			<input type="submit" name="submit" value="Submit">

		</form>
	</div>
</body>
</html>