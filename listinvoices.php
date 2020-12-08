
<?php

require("connect.php");
$sql = "SELECT i.invoice_no AS ino, date, c.first_name AS cust, c.last_name AS cl,  e.first_name AS emp
FROM invoice AS i
JOIN customer AS c
	ON i.cust_id = c.id
JOIN employee AS e
	ON i.emp_id = e.id
ORDER BY invoice_no";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	//open table
	echo '<table class="table table-striped" id="outTable">';
	echo     "<tr>
				<th>Invoice No</th>
				<th>Date</th>
				<th>Customer ID</th>
				<th>Employee ID</th>
			</tr>";
	// output data of each row
	while ($row = $result->fetch_assoc()) {
		$invoice_no = $row['ino'];
		$date = $row["date"];
		$cust_id = $row["cust"] ." ". $row["cl"];
		$emp_id = $row["emp"];
		
		echo "<tr>
			<td><a href='invoice.php?invNo=$invoice_no'>INV_$invoice_no</a></td>
			<td>$date</td>
			<td>$cust_id</td>
			<td>$emp_id</td>					
		</tr>";
	}
	echo "</table>";
} else {
	echo "0 results";
}
$conn->close();
?>
