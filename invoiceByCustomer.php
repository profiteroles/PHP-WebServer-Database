<!DOCTYPE html>

<html lang="en">

<head>
    <title>Telegora Mall - Invoices</title>
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
            <h1 class="col-lg-9">Invoices</h1>
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
                            <li><a href="invoiceByCustomer.php" class="active">Invoices by Customer</a></li>
                            <li><a href="invoiceByEmployee.php">Invoices by Employee</a></li>
                        </ul>
                    </nav>
                </div>
                <main class="col-lg-9">
                    <article class="col-lg-12">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="form-group">
                                <h2>Invoices By Customer</h2>
                                <label>Choose Customer</label>                                
                                <?php include 'selectInvoiceCust.php'; ?>
                                <?php include 'listByCustomer.php';?>
                            </div>                        
                        </form>                        
                    </article>                    
                </main>
            </section>
        </main>
    </div>
</body>

</html>