<!DOCTYPE html>

<html lang="en">

<head>
    <title>Telegora Mall - Product Update</title>
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
                    document.forms["inputform"]["description"].value = document.getElementById("outTable").rows[i].cells[1].innerHTML;
                    document.forms["inputform"]["cost_price"].value = document.getElementById("outTable").rows[i].cells[2].innerHTML;
                    document.forms["inputform"]["size"].value = document.getElementById("outTable").rows[i].cells[2].innerHTML;
                    document.forms["inputform"]["supp_id"].value = document.getElementById("outTable").rows[i].cells[3].innerHTML;
                    document.forms["inputform"]["cat_id"].value = document.getElementById("outTable").rows[i].cells[4].innerHTML;
                }
            }
        }
    </script>
</head>

<body>
    <div class="row">
        <header class="col-lg-12 bg-info">
            <img class="col-lg-3" src="Telegora_Logo.gif" alt="Telegora Mall Logo" />
            <h1 class="col-lg-9">Product</h1>
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
                            <li><a href="addproduct.php">Add Product</a></li>
                            <li><a href="updateproduct.php" class="active">Update Product</a></li>
                            <li><a href="bySupplier.php">Products by Supplier</a></li>
                            <li><a href="byCategory.php">Products by Category</a></li>
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
                            <h2>Update Product</h2>
                            <form name="inputform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="form-group">
                                    <label for="id">Product ID:</label>
                                    <input type="text" class="form-control" id="id" name="id" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="name">Product Name:</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <input type="text" class="form-control" id="description" name="description">
                                </div>
                                <div class="form-group">
                                    <label for="cost_price">Cost:</label>
                                    <input type="text" class="form-control" id="cost_price" name="cost_price">
                                </div>
                                <div class="form-group">
                                    <label for="size">Size:</label>
                                    <input type="text" class="form-control" id="size" name="size">
                                </div>
                                <div class="form-group">
                                    <label for="supp_id">Supplier:</label>
                                    <input type="text" class="form-control" id="supp_id" name="supp_id">
                                </div>
                                <div class="form-group">
                                    <label for="cat_id">Category:</label>
                                    <input type="int" class="form-control" id="cat_id" name="cat_id">
                                </div>
                                <button type="submit" name="submit" class="btn btn-default">Submit</button>
                            </form>
                    </article>

                    <article class="col-lg-12">
                        <!--<h2>Product List</h2>-->
                        <div>
                            <label> </label>
                        </div>
                        <?php include 'listproduct.php'; ?>
                    </article>
                <?php
                        } else { ?>
                    <article class="col-lg-12">


                    <?php
                            //create connection
                            require("connect.php");

                            $id = $_POST["id"];
                            $name = $_POST["name"];
                            $description = $_POST["description"];
                            $cost_price = $_POST["cost_price"];
                            $size = $_POST["size"];
                            $supp_id = $_POST["supp_id"];
                            $cat_id = $_POST["cat_id"];

                            $sql = "UPDATE product 
                                    SET 
                                    name = '$name', 
                                    description = '$description',
                                    cost_price = '$cost_price',
                                    size = '$size', 
                                    supp_id = '$supp_id', cat_id = '$cat_id' 
                                    WHERE id = '$id'";
                            if ($conn->query($sql) === TRUE) {
                                echo "<p>Record updated successfully</p>
                                      <p>Click <a href='updateproduct.php'>here</a> to go back</p>";
                            } else {
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