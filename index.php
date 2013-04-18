<!-- index.php -->
<?php
$db = new mysqli("localhost","root","passwordx","dollarstore");
$rs = $db->query("SELECT * FROM products");
?>

<html>
<head>
  <title>Product Listing</title>
</head>
<body>
	<p><a href="add.php">Add Product</a></p>

	<table border="1">
		<tr>
			<th>ID</th>
			<th>Product Name</th>
			<th>Price</th>
			<th>Action</th>
		</tr>

		<?php while ($r = $rs->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $r["id"]; ?></td>
			<td><?php echo $r["name"]; ?></td>
			<td><?php echo $r["price"]; ?></td>
			<td><a href="edit.php?id=<?php echo $r["id"]; ?>">Edit</a><a href="delete.php?id=<?php echo $r["id"]; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>

</body>
</html>
