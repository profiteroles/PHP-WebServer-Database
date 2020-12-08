<!DOCTYPE html>

<html lang="en">

<head>
    <title>Telegora Mall - Employee Update</title>
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
                    document.forms["inputform"]["position"].value = document.getElementById("outTable").rows[i].cells[2].innerHTML;
                    document.forms["inputform"]["dob"].value = document.getElementById("outTable").rows[i].cells[2].innerHTML;
                    document.forms["inputform"]["tfn"].value = document.getElementById("outTable").rows[i].cells[3].innerHTML;
                    document.forms["inputform"]["start_date"].value = document.getElementById("outTable").rows[i].cells[4].innerHTML;
                }
            }

        }
    </script>
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
                            <li><a href="addemployee.php">Add Employee</a></li>
                            <li><a href="updateemployee.php" class="active">Update Employee</a></li>
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
                            <h2>Update Employee</h2>
                            <form name="inputform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="form-group">
                                    <label for="id">Employee ID:</label>
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
                                    <label for="phone">Position:</label>
                                    <input type="text" class="form-control" id="phone" name="phone">
                                </div>
                                <div class="form-group">
                                    <label for="dob">Date of Birth:</label>
                                    <input type="date" class="form-control" id="dob" name="dob">
                                </div>
                                <div class="form-group">
                                    <label for="tfn">Telephone No:</label>
                                    <input type="text" class="form-control" id="tfn" name="tfn">
                                </div>
                                <div class="form-group">
                                    <label for="start_date">Start Date:</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date">
                                </div>
                                <button type="submit" name="submit" class="btn btn-default">Submit</button>
                            </form>
                    </article>
                    <article class="col-lg-12">
                        <!--<h2>Employee List</h2>-->
                        <?php include 'listemployee.php'; ?>
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
                            $position = $_POST["position"];
                            $dob = $_POST["dob"];
                            $tfn = $_POST["tfn"];
                            $start_date = $_POST["start_date"];
    
                            $sql = "UPDATE employee 
                                    SET 
                                    first_name = '$first_name', 
                                    last_name = '$last_name',
                                    position = '$position',
                                    dob = '$dob', 
                                    tfn = '$tfn', start_date = '$start_date' 
                                    WHERE id = '$id'";
                            if ($conn->query($sql) === TRUE) 
                            {
                                echo "<p>Record updated successfully</p>
                                      <p>Click <a href='updateemployee.php'>here</a> to go back</p>";
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