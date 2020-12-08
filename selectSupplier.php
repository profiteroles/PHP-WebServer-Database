<form action="listBySupplier.php" method="post">
    <?php
    //connect to the database
    require('connect.php');

    // get query result of suppliers
    $res = mysqli_query($conn, "SELECT id, name FROM supplier");


    // echo mysqli_num_rows($res);
    // exit;
    // check for a zero length result
    if (mysqli_num_rows($res) > 0) {
        // Open the select box
        echo "<select id='dropmenu' name='dropmenu'>";

        // Display the first option of the select box
        echo "<option value = '0'> Select Supplier...</option>";

        // iterate through the result and process each supplier
        while ($row = mysqli_fetch_array($res)) {
            // the ID remains "hidden" but we use this as the identifier 
            // only the name is displayed
            echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
        }

        // close the select
        echo "</select>";
        ?>
        <label>  </label>
        <?php
        
        echo '<button type="submit" name="submit" id="submit" class="btn btn-default">Get Supplier</button>';
        if (isset($_POST['submit'])) {

        }
        // free the resources
        mysqli_free_result($res);
    }
    // close the connection
    mysqli_close($conn);
    ?>
</form>