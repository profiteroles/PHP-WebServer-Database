
<?php

require("connect.php");
$sql = "SELECT invoice_no, date, cust_id,emp_id 
		FROM invoice
		ORDER BY cust_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	//open table
	echo '<table class="table table-striped" id="outTable">';
	echo     "<tr>
				<th>Invoice No</th>
				<th>Date</th>
				<th>Customer ID</th>
				<th>Employee ID</th>
				<th>Select</th>
			</tr>";
	// output data of each row
	while ($row = $result->fetch_assoc()) {
		$invoice_no = $row['invoice_no'];
		$date = $row["date"];
		$cust_id = $row["cust_id"];
		$emp_id = $row["emp_id"];
		
		echo "<tr>
			<td onclick=popfields($invoice_no)>$invoice_no</td>
			<td>$date</td>
			<td>$cust_id</td>
			<td>$emp_id</td>			
			<td><a href='delinvoice.php?invoice_no=$invoice_no'>Del</a></td>
		</tr>";
	}
	echo "</table>";
} else {
	echo "0 results";
}
$conn->close();
?>
