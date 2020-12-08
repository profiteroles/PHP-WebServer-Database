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
</head>

<body>
    <div class="row">
        <header class="col-lg-12 bg-info">
            <img class="col-lg-3" src="Telegora_Logo.gif" alt="Telegora Mall Logo" />
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
                            <li><a href="addcustomer.php" class="active">Add Customer</a></li>
                            <li><a href="updatecustomer.php">Update Customer</a></li>
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
                            <h2>Add Customer</h2>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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
                        <?php
                        } else {
                            //initialise empty string so we can add to it if needed
                            $error_msg = ""; //you can use $error_msg = string.empty

                            //get the first name
                            if (!empty($_POST['first_name'])) {
                                $first_name = $_POST['first_name'];
                                //remove any unwanted characters
                                $first_name = filter_var($first_name, FILTER_SANITIZE_STRING);
                            } else {
                                $error_msg .= "<p>Please provide the customer\'s First Name</p>";
                            }

                            //get the last name
                            if (!empty($_POST['last_name'])) {
                                $last_name = $_POST['last_name'];
                                //remove any unwanted characters
                                $last_name = filter_var($last_name, FILTER_SANITIZE_STRING);
                            } else {
                                $error_msg .= "<p>Please provide the customer\'s Last Name</p>";
                            }

                            //get the phone
                            if (!empty($_POST['phone'])) {
                                $phone = $_POST['phone'];
                                //remove any unwanted characters
                                $phone = filter_var($phone, FILTER_SANITIZE_STRING);
                            } else {
                                $error_msg .= "<p>Please provide the customer's Phone Number</p>";
                            }

                            //get the address
                            if (!empty($_POST['address'])) {
                                $address = $_POST['address'];
                                //remove any unwanted characters
                                $address = filter_var($address, FILTER_SANITIZE_STRING);
                                //check if it has the correct address structure
                                if ($address === false) {
                                    $error_msg .= "<p>address provided is not valid.</p>";
                                }
                            } else {
                                $error_msg .= "<p>Please provide the customer\'s  Number</p>";
                            }

                            //get the suburb
                            if (!empty($_POST['suburb'])) {
                                $suburb = $_POST['suburb'];
                                //remove any unwanted characters
                                $suburb = filter_var($suburb, FILTER_SANITIZE_STRING);
                            } else {
                                $error_msg .= "<p>Please provide the customer\'s Suburb</p>";
                            }

                            //get the URL
                            if (!empty($_POST['post_code'])) {
                                $post_code = $_POST['post_code'];
                                //remove any unwanted characters
                                $post_code = filter_var($post_code, FILTER_VALIDATE_INT);
                                if ($post_code === false) {
                                    $error_msg .= "<p>Post Code is not Valid</p>";
                                }
                            } else {
                                $error_msg .= "<p>Please provide the customer's Post Code</p>";
                            }

                            if ((!$error_msg) == "") {
                                echo "<p>Error: </p> . $error_msg";

                                echo "<p>Please go go <a href='addcustomer.php'>back and try again.<p>";
                            } else {

                                //get the connection script
                                require("connect.php");

                                //if all fields are filled then we acan addd the data to the db
                                $first = mysqli_real_escape_string($conn, $first);
                                $last = mysqli_real_escape_string($conn, $last);
                                $phone = mysqli_real_escape_string($conn, $phone);
                                $address = mysqli_real_escape_string($conn, $address);
                                $suburb = mysqli_real_escape_string($conn, $suburb);
                                $post_code = mysqli_real_escape_string($conn, $post_code);


                                //create the query 
                                $sql = "INSERT INTO customer 
					 			(first_name, last_name, phone, address, suburb, post_code) 
					 			VALUES 
					 			('$first_name','$last_name','$phone','$address','$suburb','$post_code')";

                                //run the query
                                if ($conn->query($sql) === true) {
                                    echo "<p>Success</p>";
                                } else {
                                    echo "Error!" . $conn->error;
                                }
                            }

                        }
                        ?>
                    </article>
                    <article class="col-lg-12">
                        <!--<h2>Customer List</h2>-->
                        <label>  </label>
                        <?php include 'listcustomer.php'; ?>
                    </article>
                </main>
            </section>
        </main>
    </div>
</body>

</html>