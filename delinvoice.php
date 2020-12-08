<?php
require("connect.php");

//retrieve the id from the base request
$id = $_REQUEST['invoice_no'];

$sql = "DELETE FROM invoice WHERE invoice_no =" . $invoice_no;
if ($conn->query($sql) === TRUE) {
    echo "Invoice deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("Location: invoices.php");
?>