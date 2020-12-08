<!DOCTYPE html>

<html lang="en">

<head>
    <title>Telegora Mall - Customer</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--this is html comment-->
    <script>
        // function to populate the input fields when a row in the table is clicked
        function popfields(x) {
            var tabRows = document.getElementById("outTable").rows.length;
            for (var i = 1; i < tabRows; i++) {
                if (document.getElementById("outTable").rows[i].cells[0].innerHTML == x) {
                    document.forms["inputform"]["id"].value = document.getElementById("outTable").rows[i].cells[0].innerHTML;
                    document.forms["inputform"]["first_name"].value = document.getElementById("outTable").rows[i].cells[1].innerHTML;
                    document.forms["inputform"]["last_name"].value = document.getElementById("outTable").rows[i].cells[1].innerHTML;
                    document.forms["inputform"]["phone"].value = document.getElementById("outTable").rows[i].cells[2].innerHTML;
                    document.forms["inputform"]["address"].value = document.getElementById("outTable").rows[i].cells[2].innerHTML;
                    document.forms["inputform"]["suburb"].value = document.getElementById("outTable").rows[i].cells[3].innerHTML;
                    document.forms["inputform"]["post_code"].value = document.getElementById("outTable").rows[i].cells[4].innerHTML;
                }
            }

        }
    </script>
</head>

<body>
    <div class="row">
        <header class="col-lg-12 bg-info">
            <img class="col-lg-3"src="Telegora_Logo.gif" alt="Telegora Mall Logo" />
            <h1 class="col-lg-9">Customer</h1>
        </header>
    </div>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li> <a href="index.php">Home Page</a> </li>
                <li><a href="customer.php" class="active">Customer</a> </li>
                <li> <a href="employee.php">Employee</a> </li>
                <li><a href="supplier.php">Supplier</a> </li>
                <li><a href="product.php">Product</a> </li>
                <li><a href="invoices.php">Invoices</a> </li>
            </ul>
        </div>
    </nav>
    <div class="row">
        <main class="col-lg-9">
            <section class="row">
                <div class="col-lg-3">
                    <nav class="sidebar-nav">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="addcustomer.php">Add Customer</a></li>
                            <li><a href="updatecustomer.php" class="active">Update Customer</a></li>
                        </ul>
                    </nav>
                </div>
                <main class="col-lg-9">
                    <article class="col-lg-12">
                        <?php
                        //check if the form has been submitted
                        //if not, show the form
                        if (!isset($_POST['submit'])) //this must be the name of the submit button on the form
                        {
                        ?>
                            <h2>Update Customer</h2>
                            <form name="inputform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="form-group">
                                    <label for="id">Customer ID:</label>
                                    <input type="text" class="form-control" id="id" name="id" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone:</label>
                                    <input type="text" class="form-control" id="phone" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address:</label>
                                    <input type="text" class="form-control" id="address" name="address">
                                </div>
                                <div class="form-group">
                                    <label for="suburb">Suburb:</label>
                                    <input type="text" class="form-control" id="suburb" name="suburb">
                                </div>
                                <div class="form-group">
                                    <label for="post_code">Post Code:</label>
                                    <input type="text" class="form-control" id="post_code" name="post_code">
                                </div>
                                <button type="submit" name="submit" class="btn btn-default">Submit</button>
                            </form>
                    </article>
                    <article class="col-lg-12">
                        <!--<h2>Customer List</h2>-->
                        <?php include 'listcustomer.php'; ?>
                    </article>
                        <?php
                        } else {?>
                            <article class="col-lg-12">
                                
                            
                            <?php
                            //create connection
                            require("connect.php");
    
                            $id = $_POST["id"];
                            $first_name = $_POST["first_name"];
                            $last_name = $_POST["last_name"];
                            $phone = $_POST["phone"];
                            $address = $_POST["address"];
                            $suburb = $_POST["suburb"];
                            $post_code = $_POST["post_code"];
    
                            $sql = "UPDATE customer 
                                    SET 
                                    first_name = '$first_name', 
                                    last_name = '$last_name',
                                    phone = '$phone',
                                    address = '$address', 
                                    suburb = '$suburb', post_code = '$post_code' 
                                    WHERE id = '$id'";
                            if ($conn->query($sql) === TRUE) 
                            {
                                echo "<p>Record updated successfully</p>
                                      <p>Click <a href='updatecustomer.php'>here</a> to go back</p>";
                            } 
                            else 
                            {
                                echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
                            }
    
                            $conn->close();
                        }
                ?>
                </article>
                </main>
            </section>
        </main>
    </div>
</body>

</html>