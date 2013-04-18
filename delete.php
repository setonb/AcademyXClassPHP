
<?php
$db = new mysqli("localhost","root","passwordx","dollarstore");
extract($_REQUEST);

//1. Was the submit button pressed
if (isset($id)) {
  	$db->query("DELETE FROM products WHERE id='$id'");
		header("location: index.php");
} else {
	//4. go back to index
	header("location: index.php");
}
?>
