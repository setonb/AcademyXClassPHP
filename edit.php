<!-- index.php -->
<?php
$db = new mysqli("localhost","root","passwordx","dollarstore");
extract($_REQUEST);


//1. Was the submit button pressed
if (isset($action)) {

  //2. Do form validation
	if (empty($name) || !isset($name)) {
		$error[] = "Please enter a product name";
	}
	if (!is_numeric($price) || $price < 0 || $price > 3.0) {
		$error[] = "Please enter a price less than \$3.0";
	}

	//3. Everything OK. Update the database, return to the index page
	if (!isset($error)) {
		print_r ($error);
		print "blah blah blah";
		$x = "UPDATE products SET name='$name',price='$price' WHERE id='$id'";
		print $x;
		$db->query($x);
		//header("location: index.php");

	}
} else {
	//4. The first time to the page, laod the data from the database and store in variables through the extract function.
	$rs = $db->query("SELECT * FROM products WHERE id='$id'");
	extract($rs->fetch_assoc());
}
?>

<html>
<head>
	<title>Edit Products</title>
</head>
<body>
	<h1>Edit Product</h1>
	<?php
	//5. Output any error messages
	if (isset($error)) {
		foreach ($error as $e) {
		echo "<p style='color:red'>$e</p>";
		}
	}
	?>
	<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
		<input type="test" name="id" value="<?php echo $id; ?>"/>
		<p>Product Name: <input type="text" name="name" value="<?php echo $name; ?>"/></p>
		<p>Price: <input type="text" name="price" value="<?php echo $price; ?>"/></p>
		<p><input type="submit" name="action" value="Save Product" /></p>
	</form>

</body>
</html>
