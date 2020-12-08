<!DOCTYPE html>

<html lang="en">

<head>
    <title>Telegora Mall - Supplier Add</title>
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
            <h1 class="col-lg-9">Supplier</h1>
        </header>
    </div>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li> <a href="index.php">Home Page</a> </li>
                <li><a href="customer.php">Customer</a> </li>
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
                            <li><a href="addsupplier.php" class="active">Add Supplier</a></li>
                            <li><a href="updatesupplier.php">Update Supplier</a></li>
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
                            <h2>Add Supplier</h2>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="form-group">
                                    <label for="name">Supplier Name:</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone:</label>
                                    <input type="text" class="form-control" id="phone" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail:</label>
                                    <input type="text" class="form-control" id="email" name="email">
                                </div>
                                <button type="submit" name="submit" class="btn btn-default">Submit</button>
                            </form>
                        <?php
                        } else {
                            //initialise empty string so we can add to it if needed
                            $error_msg = ""; //you can use $error_msg = string.empty

                            //get the name
                            if (!empty($_POST['name'])) {
                                $name = $_POST['name'];
                                //remove any unwanted characters
                                $name = filter_var($name, FILTER_SANITIZE_STRING);
                            } else {
                                $error_msg .= "<p>Please provide the Supplier's Name</p>";
                            }

                            //get the phone
                            if (!empty($_POST['phone'])) {
                                $phone = $_POST['phone'];
                                //remove any unwanted characters
                                $phone = filter_var($phone, FILTER_SANITIZE_STRING);
                            } else {
                                $error_msg .= "<p>Please provide the Supplier's Phone Number</p>";
                            }

                            //get the address
                            if (!empty($_POST['email'])) {
                                $email = $_POST['email'];
                                //remove any unwanted characters
                                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                                //check if it has the correct address structure
                                if ($email === false) {
                                    $error_msg .= "<p>address provided is not valid.</p>";
                                }
                            } else {
                                $error_msg .= "<p>Please provide the Supplier's E-mail Address</p>";
                            }
                            
                            if (!empty($error_msg)) {
                                echo "<p>Error: </p> . $error_msg";

                                echo "<p>Please go <a href='addsupplier.php'>back and try again.<p>";
                            } else {

                                //get the connection script
                                require("connect.php");

                                //if all fields are filled then we acan addd the data to the db
                                $name = mysqli_real_escape_string($conn, $name);
                                $phone = mysqli_real_escape_string($conn, $phone);
                                $email = mysqli_real_escape_string($conn, $email);;


                                //create the query 
                                $sql = "INSERT INTO supplier 
					 			(name, phone, email) 
					 			VALUES 
					 			('$name','$phone','$email')";

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
                        <!--<h2>Supplier List</h2>-->
                        <div>
                            <label> </label>
                        </div>
                        <?php include 'listsupplier.php'; ?>
                    </article>
                </main>
            </section>
        </main>
    </div>
</body>

</html>