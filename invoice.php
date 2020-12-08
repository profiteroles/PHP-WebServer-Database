<!DOCTYPE html>

<html lang="en">

<head>
    <title>Telegora Mall</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--this is html comment-->
</head>

<body>
    <div class="row" <main class="col-lg-12">
        <section class="center">
            <main class="col-lg-5">
              
                        
                        <?php
                        $inv_id = $_GET['invNo'];
                        echo "<center><h2><b>INVOICE NO: $inv_id </b></h2></center>";
                        require("connect.php");
                        $sql = "SELECT i.invoice_no AS ino, date, c.first_name AS cust, c.last_name AS cl, e.first_name AS emp  
                        FROM invoice AS i
                        INNER JOIN employee AS e
                            ON i.emp_id = e.id
                        INNER JOIN customer AS c
                             ON i.cust_id = c.id
                        WHERE i.invoice_no= $inv_id";
                        $result = $conn->query($sql);

                        echo '<table class="table table-striped" id="outTable">';
                        echo     "<tr>
                                <th>Customer Name</th>
                                <th>Employer Name</th>
                                <th>Date</th>
                            </tr>";
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                            $cust = $row["cust"] . " " . $row["cl"];
                            $emp = $row["emp"];
                            $date = $row["date"];

                            echo "<tr>
                            <td>$cust</td>
                            <td>$emp</td>
                            <td>$date</td>
                        </tr>";
                        }
                        echo "</table>";
                        ?>            
                <?php
                require("connect.php");
                $sql = "SELECT il.invoice_no AS ilno, p.name AS pn,p.cost_price AS cp
                FROM invoice_line AS il
                JOIN product AS p
                    ON il.prod_id = p.id
                JOIN invoice as i
                    ON il.invoice_no = i.invoice_no
                WHERE i.invoice_no=$inv_id";
                $result = $conn->query($sql);

                echo '<table class="table table-striped" id="outTable">';
                echo     "<tr>
                                <th>Product</th>
                                <th>Unit Price</th>
                                <th>Qty</th>
                                <th>Amount</th>
                            </tr>";
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $product = $row["pn"];
                    $unitPrice = $row["cp"];
                    $qty = 5;
                    $amount = ($qty * $unitPrice);
                    $total += $amount;

                    echo "<tr>
                            <td>$product</td>
                            <td>$unitPrice</td>
                            <td>$qty</td>
                            <td>$amount</td>
                        </tr>";
                }

                echo "<tr>
                            <td></td>
                            <td></td>
                            <td><b>Total Amount</b></td>
                            <td>$total</td>
                            
                        </tr>";
                echo "</table>";

                ?>
            </main>
        </section>
        </main>
    </div>
</body>

</html>