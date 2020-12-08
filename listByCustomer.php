
<?php

require("connect.php");
$sql = "SELECT invoice_no, date, c.first_name AS cust, c.last_name AS cl, e.last_name AS el, e.first_name AS emp  
FROM invoice AS i
JOIN employee AS e
	ON i.cust_id = e.id
JOIN customer AS c
	ON i.cust_id = c.id
WHERE emp_id=" . $_POST['dropmenu'];
$result = $conn->query($sql);

if (isset($_POST['submit'])) {
	//open table
	$custName = null;
	echo '<table class="table table-striped" id="outTable">';
	echo     "<tr>
				<th>Invoice No</th>
				<th>Date</th>
				<th>Customer</th>
				<th>Employee</th>
				<th>Select</th>
			</tr>";
	// output data of each row
	while ($row = $result->fetch_assoc()) {
		$invoice_no = $row['invoice_no'];
		$date = $row["date"];
		$cust = $row["cust"] . " " . $row["cl"];
		$emp = $row["emp"] . " " . $row["el"];
		$custName = $cust;
		
		echo "<tr>
			<td onclick=popfields($invoice_no)>$invoice_no</td>
			<td>$date</td>
			<td>$cust</td>
			<td>$emp</td>			
			<td><a href='delinvoice.php?invoice_no=$invoice_no'>Del</a></td>
		</tr>";
	}
	echo "</table>";
	echo 'Customer Invoice ' . $custName . ' showing above table';
} 
$conn->close();
?>

