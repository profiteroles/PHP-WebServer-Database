
<?php

require("connect.php");
$sql = "SELECT id, name, phone, email 
		FROM supplier";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	//open table
	echo '<table class="table table-striped" id="outTable">';
	echo     "<tr>
				<th>Supplier Id</th>
				<th>Supplier Name</th>
				<th>Phone</th>
				<th>E-mail</th>
				<th>Select</th>
			</tr>";
	// output data of each row
	while ($row = $result->fetch_assoc()) {
		$id = $row['id'];
		$name = $row["name"];
		$phone = $row["phone"];
		$email = $row["email"];
		echo "<tr>
			<td onclick=popfields($id)>$id</td>
			<td>$name</td>
			<td>$phone</td>
			<td>$email </td>
			<td><a href='delsupplier.php?id=$id'>Del</a></td>
		</tr>";
	}
	echo "</table>";
} else {
	echo "0 results";
}
$conn->close();
?>
