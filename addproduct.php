<!DOCTYPE html>

<html lang="en">

<head>
    <title>Telegora Mall - Product Add</title>
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
                            <li><a href="addproduct.php" class="active">Add Product</a></li>
                            <li><a href="updateproduct.php">Update Product</a></li>
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
                            <h2>Add Product</h2>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="form-group">
                                    <label for="name">Name:</label>
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
                                    <input type="text" class="form-control" id="cat_id" name="cat_id">
                                </div>
                                <button type="submit" name="submit" class="btn btn-default">Submit</button>
                            </form>
                        <?php
                        } else {
                            //initialise empty string so we can add to it if needed
                            $error_msg = ""; //you can use $error_msg = string.empty

                            //get the product name
                            if (!empty($_POST['name'])) {
                                $name = $_POST['name'];
                                //remove any unwanted characters
                                $name = filter_var($name, FILTER_SANITIZE_STRING);
                            } else {
                                $error_msg .= "<p>Please provide the Name of the product</p>";
                            }

                            //get the description
                            if (!empty($_POST['description'])) {
                                $description = $_POST['description'];
                                //remove any unwanted characters
                                $description = filter_var($description, FILTER_SANITIZE_STRING);
                            } else {
                                $error_msg .= "<p>Please provide the description of the product</p>";
                            }

                            //get the cost_price
                            if (!empty($_POST['cost_price'])) {
                                $cost_price = $_POST['cost_price'];
                                //remove any unwanted characters
                                $cost_price = filter_var($cost_price, FILTER_SANITIZE_STRING);
                            } else {
                                $error_msg .= "<p>Please provide the cost of the product</p>";
                            }

                            //get the size
                            if (!empty($_POST['size'])) {
                                $size = $_POST['size'];
                                //remove any unwanted characters
                                $size = filter_var($size, FILTER_SANITIZE_STRING);
                                //check if it has the correct size structure
                                if ($size === false) {
                                    $error_msg .= "<p>Invalid Product Size</p>";
                                }
                            } else {
                                $error_msg .= "<p>Please provide the Size of the product</p>";
                            }

                            //get the supplier
                            if (!empty($_POST['supp_id'])) {
                                $supp_id = $_POST['supp_id'];
                                //remove any unwanted characters
                                $supp_id = filter_var($supp_id, FILTER_SANITIZE_NUMBER_INT);
                            } else {
                                $error_msg .= "<p>Please provide the supplier of this product</p>";
                            }

                            //get the category ID
                            if (!empty($_POST['cat_id'])) {
                                $cat_id = $_POST['cat_id'];
                                //remove any unwanted characters
                                $cat_id = filter_var($cat_id, FILTER_SANITIZE_NUMBER_INT);
                                if ($cat_id === false) {
                                    $error_msg .= "<p>Category is not Valid</p>";
                                }
                            } else {
                                $error_msg .= "<p>Please provide the Category of the product</p>";
                            }

                            if (!empty($error_msg)) {
                                echo "<p>Error: </p> . $error_msg";

                                echo "<p>Please go <a href='addproduct.php'>back and try again.<p>";
                            } else {

                                //get the connection script
                                require("connect.php");

                                //if all fields are filled then we acan addd the data to the db
                                $name = mysqli_real_escape_string($conn, $name);
                                $description = mysqli_real_escape_string($conn, $description);
                                $cost_price = mysqli_real_escape_string($conn, $cost_price);
                                $size = mysqli_real_escape_string($conn, $size);
                                $supp_id = mysqli_real_escape_string($conn, $supp_id);
                                $cat_id = mysqli_real_escape_string($conn, $cat_id);

                                //create the query 
                                $sql = "INSERT INTO product 
					 			(name, description, cost_price, size, supp_id, cat_id) 
					 			VALUES 
					 			('$name','$description','$cost_price','$size','$supp_id','$cat_id')";

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
                        <!--<h2>product List</h2>-->
                        <div>
                            <label> </label>
                        </div>
                        <?php include 'listproduct.php'; ?>
                    </article>
                </main>
            </section>
        </main>
    </div>
</body>

</html>