<?php include ( "inc/connect.inc.php" ); ?>

<?php
// Fetch data from sample_menu table
$menu_query = pg_query($conn, "SELECT * FROM sample_menu");

// Fetch data from users table
$users_query = pg_query($conn, "SELECT * FROM users");

// Fetch data from cart table
$cart_query = pg_query($conn, "SELECT * FROM cart");

// Fetch data from bill table
$bill_query = pg_query($conn, "SELECT * FROM bill");

// Fetch data from feedback table
$feedback_query = pg_query($conn, "SELECT * FROM feedback");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Database Test</title>
	<link href="img/restaurant/favicon.ico" rel="icon">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .container {
            margin: auto;
            width: 80%;
            padding: 20px;
        }
    </style>
</head>

<body>
<button class="btn btn-primary" type="button" onclick="location.href='../index.php'">Back to Home</button>
    <div class="container">
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
            <?php while ($row = pg_fetch_assoc($menu_query)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['food_items']; ?></td>
                    <td><?php echo $row['is_breakfast'] ? 'Yes' : 'No'; ?></td>
                    <td><?php echo $row['is_lunch'] ? 'Yes' : 'No'; ?></td>
                    <td><?php echo $row['is_dinner'] ? 'Yes' : 'No'; ?></td>
                    <td><?php echo $row['is_veg'] ? 'Yes' : 'No'; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><img src="<?php echo $row['picture']; ?>" alt="Menu Item"></td>
                </tr>
            <?php } ?>
        </table>

        <h2>Users</h2>
        <table>
            <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>Phone Number</th>
                <th>Email ID</th>
                <th>Password Hash</th>
                <th>Role</th>
            </tr>
            <?php while ($row = pg_fetch_assoc($users_query)) { ?>
                <tr>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['user_name']; ?></td>
                    <td><?php echo $row['phone_number']; ?></td>
                    <td><?php echo $row['email_id']; ?></td>
                    <td><?php echo $row['password_hash']; ?></td>
                    <td><?php echo $row['role']; ?></td>
                </tr>
            <?php } ?>
        </table>

        <h2>Cart</h2>
        <table>
            <tr>
                <th>Cart ID</th>
                <th>User ID</th>
                <th>Food ID</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
            <?php while ($row = pg_fetch_assoc($cart_query)) { ?>
                <tr>
                    <td><?php echo $row['cart_id']; ?></td>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['food_id']; ?></td>
                    <td><?php echo $row['quantity']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['time']; ?></td>
                </tr>
            <?php } ?>
        </table>

        <h2>Bill</h2>
        <table>
            <tr>
                <th>Bill Number</th>
                <th>Cart ID</th>
                <th>User ID</th>
                <th>Total Price</th>
                <th>Date</th>
                <th>By User</th>
            </tr>
            <?php while ($row = pg_fetch_assoc($bill_query)) { ?>
                <tr>
                    <td><?php echo $row['bill_number']; ?></td>
                    <td><?php echo $row['cart_id']; ?></td>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['total_price']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['by_user']; ?></td>
                </tr>
            <?php } ?>
        </table>

        <h2>Feedback</h2>
        <table>
            <tr>
                <th>User Name</th>
                <th>Email ID</th>
                <th>Profession</th>
                <th>Message</th>
                <th>Picture</th>
            </tr>
            <?php while ($row = pg_fetch_assoc($feedback_query)) { ?>
                <tr>
                    <td><?php echo $row['user_name']; ?></td>
                    <td><?php echo $row['email_id']; ?></td>
                    <td><?php echo $row['profession']; ?></td>
                    <td><?php echo $row['messages']; ?></td>
                    <td><img src="<?php echo $row['picture']; ?>" alt="Menu Item" width="50" height="50"></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>

<?php pg_close($conn); ?>