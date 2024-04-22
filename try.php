<?php 
    // Include the database connection file
    include("inc/connect.inc.php");

    // Function to handle form submission for inserting data
    function insertData($conn) {
        // Check if form is submitted
        if(isset($_POST['submit_insert'])) {
            // Retrieve data from form
            $food_items = $_POST['food_items'];
            $is_breakfast = isset($_POST['is_breakfast']) ? 'TRUE' : 'FALSE';
            $is_lunch = isset($_POST['is_lunch']) ? 'TRUE' : 'FALSE';
            $is_dinner = isset($_POST['is_dinner']) ? 'TRUE' : 'FALSE';
            $is_veg = isset($_POST['is_veg']) ? 'TRUE' : 'FALSE';
            $description = $_POST['description'];
            $price = $_POST['price'];

            // Insert data into sample_menu table
            $insert_query = pg_query($conn, "CALL insert_menu('$food_items',$is_breakfast,$is_lunch,$is_dinner,$is_veg,'$description',$price)");

            // Check if insertion was successful
            if($insert_query) {
                echo "<script>alert('Data inserted successfully');</script>";
            } else {
                echo "<script>alert('Error inserting data');</script>";
            }
        }
    }

    // Function to handle form submission for updating data
    function updateData($conn) {
        // Check if form is submitted
        if(isset($_POST['submit_update'])) {
            // Retrieve data from form
            $id = $_POST['update_id'];
            $price = $_POST['update_price'];

            // Update price in sample_menu table based on ID
            $update_query = pg_query($conn, "CALL update_menu($id,$price)");

            // Check if update was successful
            if($update_query) {
                echo "<script>alert('Price updated successfully');</script>";
            } else {
                echo "<script>alert('Error updating price');</script>";
            }
        }
    }

        // Function to handle form submission for deleteing data
        function deleteData($conn) {
            // Check if form is submitted
            if(isset($_POST['submit_delete'])) {
                // Retrieve data from form
                $id = $_POST['delete_id'];

                $delete_query = pg_query($conn, "CALL delete_menu($id)");
    
                // Check if delete was successful
                if($delete_query) {
                    echo "<script>alert('Record deleted successfully');</script>";
                } else {
                    echo "<script>alert('Error delete record');</script>";
                }
            }
        }

    // Call insertData function
    insertData($conn);

    // Call updateData function
    updateData($conn);

    // Call deleteData function
    deleteData($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Database - Insert & Update</title>
    <link href="img/restaurant/favicon.ico" rel="icon">
    <style>
        /* Styles for the form */
        form {
            margin-bottom: 20px;
        }
        form input[type="text"], form input[type="number"], form input[type="url"] {
            margin-bottom: 10px;
            width: 100%;
            padding: 8px;
        }
        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }
        /* Styles for tables */
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div>
        <button type="submit" onclick="location.href='test.php'">View Table</button>
        <button class="btn btn-primary" type="button" onclick="location.href='index.php'">Back to Home</button>
        <!-- <a href="test.php" type="button">View Table</a> -->
    </div>
    <div class="container">
        <!-- Insert Form -->
        <h2>Add New Menu Item</h2>
        <form method="post">
            <input type="text" name="food_items" placeholder="Food Items" required><br>
            <input type="checkbox" name="is_breakfast"> Is Breakfast<br>
            <input type="checkbox" name="is_lunch"> Is Lunch<br>
            <input type="checkbox" name="is_dinner"> Is Dinner<br>
            <input type="checkbox" name="is_veg"> Is Veg<br>
            <input type="text" name="description" placeholder="Description" required><br>
            <input type="number" name="price" placeholder="Price" required><br>
            <input type="submit" name="submit_insert" value="Insert">
        </form>

        <!-- Update Form -->
        <h2>Update Menu Item Price</h2>
        <form method="post">
            <input type="number" name="update_id" placeholder="ID to Update" required><br>
            <input type="number" name="update_price" placeholder="New Price" required><br>
            <input type="submit" name="submit_update" value="Update">
        </form>

        <!-- Delete Form -->
        <h2>Delete Menu Item</h2>
        <form method="post">
            <input type="number" name="delete_id" placeholder="ID to Delete" required><br>
            <input type="submit" name="submit_delete" value="Delete">
        </form>

        <!-- Sample Menu Table -->
        <h2>Sample Menu</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Food Items</th>
                <th>Is Breakfast</th>
                <th>Is Lunch</th>
                <th>Is Dinner</th>
                <th>Is Veg</th>
                <th>Description</th>
                <th>Price</th>
                <th>Picture</th>
            </tr>
            <?php 
                // Fetch data from sample_menu table
                $menu_query = pg_query($conn, "SELECT * FROM sample_menu ORDER BY id ASC");
                while ($row = pg_fetch_assoc($menu_query)) {
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['food_items']; ?></td>
                <td><?php echo $row['is_breakfast'] ? 'Yes' : 'No'; ?></td>
                <td><?php echo $row['is_lunch'] ? 'Yes' : 'No'; ?></td>
                <td><?php echo $row['is_dinner'] ? 'Yes' : 'No'; ?></td>
                <td><?php echo $row['is_veg'] ? 'Yes' : 'No'; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><img src="<?php echo $row['picture']; ?>" alt="Menu Item" width="50" height="50"></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>

<?php pg_close($conn); ?>