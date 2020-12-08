
<?php

require("connect.php");
$sql = "SELECT id, first_name, last_name,phone, address, suburb, post_code 
		FROM customer";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	//open table
	echo '<table class="table table-striped" id="outTable">';
	echo     "<tr>
				<th>Customer Id</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Phone</th>
				<th>Address</th>
				<th>Suburb</th>
				<th>Postcode</th>
				<th>Select</th>
			</tr>";
	// output data of each row
	while ($row = $result->fetch_assoc()) {
		$id = $row['id'];
		$first_name = $row["first_name"];
		$last_name = $row["last_name"];
		$phone = $row["phone"];
		$address = $row["address"];
		$suburb = $row["suburb"];
		$post_code = $row["post_code"];
		echo "<tr>
			<td onclick=popfields($id)>$id</td>
			<td>$first_name</td>
			<td>$last_name</td>
			<td>$phone</td>
			<td>$address</td>
			<td>$suburb </td>
			<td>$post_code</td>
			<td><a href='delcustomer.php?id=$id'>Del</a></td>
		</tr>";
	}
	echo "</table>";
} else {
	echo "0 results";
}
$conn->close();
?>
