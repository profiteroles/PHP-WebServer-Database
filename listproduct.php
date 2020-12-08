
<?php

require("connect.php");
$sql = "SELECT p.id AS pi, p.name AS pn, p.description AS pd, cost_price, size,supp_id,cat_id, s.name AS sn, c.name AS cn
FROM product AS p
JOIN category AS c
ON p.cat_id = c.id
JOIN supplier AS s
ON p.supp_id = s.id ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	//open table
	echo '<table class="table table-striped" id="outTable">';
	echo     "<tr>
				<th>Product Id</th>
				<th>Product Name</th>
				<th>Product Description</th>
				<th>Cost</th>
				<th>Size</th>
				<th>Supplier</th>
				<th>Category</th>
				<th>Select</th>
			</tr>";
	// output data of each row
	while ($row = $result->fetch_assoc()) {
		$id = $row['pi'];
		$name = $row["pn"];
		$description = $row["pd"];
		$cost_price = $row["cost_price"];
		$size = $row["size"];
		$supp_id = $row["sn"];
		$cat_id = $row["cn"];
		echo "<tr>
			<td onclick=popfields($id)>$id</td>
			<td>$name</td>
			<td>$description</td>
			<td>$cost_price</td>
			<td>$size</td>
			<td>$supp_id</td>
			<td>$cat_id</td>
			<td><a href='delproduct.php?id=$id'>Del</a></td>
		</tr>";
	}
	echo "</table>";
} else {
	echo "0 results";
}
$conn->close();
?>
