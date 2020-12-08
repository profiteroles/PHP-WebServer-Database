<!DOCTYPE html>

<html lang="en">

<head>
    <title>Telegora Mall - Supplier Update</title>
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
                    document.forms["inputform"]["name"].value = document.getElementById("outTable").rows[i].cells[1].innerHTML;
                    document.forms["inputform"]["phone"].value = document.getElementById("outTable").rows[i].cells[2].innerHTML;
                    document.forms["inputform"]["email"].value = document.getElementById("outTable").rows[i].cells[3].innerHTML;
                }
            }

        }
    </script>
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
                            <li><a href="addsupplier.php">Add Supplier</a></li>
                            <li><a href="updatesupplier.php" class="active">Update Supplier</a></li>
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
                            <h2>Update Supplier</h2>
                            <form name="inputform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="form-group">
                                    <label for="id">Supplier ID:</label>
                                    <input type="text" class="form-control" id="id" name="id" readonly>
                                </div>
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
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <button type="submit" name="submit" class="btn btn-default">Submit</button>
                            </form>
                    </article>
                    <article class="col-lg-12">
                        <!--<h2>Supplier List</h2>-->
                        <?php include 'listsupplier.php'; ?>
                    </article>
                        <?php
                        } else {?>
                            <article class="col-lg-12">
                                
                            
                            <?php
                            //create connection
                            require("connect.php");
    
                            $id = $_POST["id"];
                            $name = $_POST["name"];
                            $phone = $_POST["phone"];
                            $email = $_POST["email"];
    
                            $sql = "UPDATE supplier 
                                    SET 
                                    name = '$name', 
                                    phone = '$phone',
                                    email = '$email',
                                    WHERE id = '$id'";
                            if ($conn->query($sql) === TRUE) 
                            {
                                echo "<p>Record updated successfully</p>
                                      <p>Click <a href='updatesupplier.php'>here</a> to go back</p>";
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