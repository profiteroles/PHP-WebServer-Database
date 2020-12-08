
<?php

require("connect.php");
$sql = "SELECT  c.name AS cat,p.name AS prod, s.name AS sup, p.id ,p.description, cost_price, size,supp_id,cat_id 
FROM product as p
JOIN supplier as s
	ON p.supp_id = s.id
JOIN category as c
	ON p.cat_id = c.id
WHERE cat_id=" . $_POST['dropmenu'];
$result = $conn->query($sql);

if (isset($_POST['submit'])) {
	//open table
	$supName = null;
	echo '<table class="table table-striped" id="outTable">';
	echo     "<tr>
	<th>Product Id</th>
	<th>Product Name</th>
	<th>Product Description</th>
	<th>Cost</th>
	<th>Size</th>
	<th>Category</th>
	<th>Select</th>
			</tr>";
	// output data of each row
	while ($row = $result->fetch_assoc()) {
		$id = $row['id'];
		$name = $row["prod"];
		$description = $row["description"];
		$cost_price = $row["cost_price"];
		$size = $row["size"];
		$sup = $row["sup"];
		$cat = $row["cat"];
		$supName = $sup;
		echo "<tr>
			<td onclick=popfields($id)>$id</td>
			<td>$name</td>
			<td>$description</td>
			<td>$cost_price</td>
			<td>$size</td>
			<td>$cat</td>
			<td><a href='delproduct.php?id=$id'>Del</a></td>
		</tr>";
	}
	echo "</table>";
	echo 'Supplier ' . $catName . ' showing above table';
}
$conn->close();
?>
