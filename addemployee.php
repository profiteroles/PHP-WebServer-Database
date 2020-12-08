<!DOCTYPE html>

<html lang="en">

<head>
    <title>Telegora Mall - Employee Add</title>
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
            <img class="col-lg-3"src="Telegora_Logo.gif" alt="Telegora Mall Logo" />
            <h1 class="col-lg-9">Employee</h1>
        </header>
    </div>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li> <a href="index.php">Home Page</a> </li>
                <li><a href="customer.php">Customer</a> </li>
                <li> <a href="employee.php" class="active">Employee</a> </li>
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
                            <li><a href="addemployee.php" class="active">Add Employee</a></li>
                            <li><a href="updateemployee.php">Update Employee</a></li>
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
                            <h2>Add Employee</h2>
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
                                    <label for="position">Position:</label>
                                    <input type="text" class="form-control" id="position" name="position">
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date of Birth:</label>
                                    <input type="date" class="form-control" id="dob" name="dob">
                                </div>
                                <div class="form-group">
                                    <label for="tfn">Tel No:</label>
                                    <input type="int" class="form-control" id="tfn" name="tfn">
                                </div>
                                <div class="form-group">
                                    <label for="start_date">Start Date:</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date">
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
                                $error_msg .= "<p>Please provide the Employee's First Name</p>";
                            }

                            //get the last name
                            if (!empty($_POST['last_name'])) {
                                $last_name = $_POST['last_name'];
                                //remove any unwanted characters
                                $last_name = filter_var($last_name, FILTER_SANITIZE_STRING);
                            } else {
                                $error_msg .= "<p>Please provide the Employee's Last Name</p>";
                            }

                            //get the position
                            if (!empty($_POST['position'])) {
                                $position = $_POST['position'];
                                //remove any unwanted characters
                                $position = filter_var($position, FILTER_SANITIZE_STRING);
                            } else {
                                $error_msg .= "<p>Please provide the Employee's position</p>";
                            }

                            //get the dob
                            if (!empty($_POST['dob'])) {
                                $dob = $_POST['dob'];
                                //remove any unwanted characters
                                $dob = filter_var($dob, FILTER_SANITIZE_STRING);
                                //check if it has the correct dob structure
                                if ($dob === false) {
                                    $error_msg .= "<p>Date of birth provided is not valid.</p>";
                                }
                            } else {
                                $error_msg .= "<p>Please provide the Employee's Birthday</p>";
                            }

                            //get the telefon no
                            if (!empty($_POST['tfn'])) {
                                $tfn = $_POST['tfn'];
                                //remove any unwanted characters
                                $tfn = filter_var($tfn, FILTER_SANITIZE_NUMBER_INT);
                            } else {
                                $error_msg .= "<p>Please provide the Employee's Telefon No</p>";
                            }

                            //get the date
                            if (!empty($_POST['start_date'])) {
                                $start_date = $_POST['start_date'];
                                //remove any unwanted characters
                                $start_date = filter_var($start_date, FILTER_SANITIZE_NUMBER_FLOAT);
                                if ($start_date === false) {
                                    $error_msg .= "<p>Post Code is not Valid</p>";
                                }
                            } else {
                                $error_msg .= "<p>Please provide the Employee's Starting Date</p>";
                            }                           

                            if (!empty($error_msg)) {
                                echo "<p>Error: </p> . $error_msg";

                                echo "<p>Please go <a href='addemployee.php'>back and try again.<p>";
                            } else {

                                //get the connection script
                                require("connect.php");

                                //if all fields are filled then we acan addd the data to the db
                                $first = mysqli_real_escape_string($conn, $first);
                                $last = mysqli_real_escape_string($conn, $last);
                                $position = mysqli_real_escape_string($conn, $position);
                                $dob = mysqli_real_escape_string($conn, $dob);
                                $tfn = mysqli_real_escape_string($conn, $tfn);
                                $start_date = mysqli_real_escape_string($conn, $start_date);

                                //create the query 
                                $sql = "INSERT INTO employee 
					 			(first_name, last_name, position, dob, tfn, start_date) 
					 			VALUES 
					 			('$first_name','$last_name','$position','$dob','$tfn','$start_date')";

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
                        <!--<h2>Employee List</h2>-->
                        <div>
                            <label>  </label>
                        </div>
                        <?php include 'listemployee.php'; ?>
                    </article>
                </main>
            </section>
        </main>
    </div>
</body>

</html>