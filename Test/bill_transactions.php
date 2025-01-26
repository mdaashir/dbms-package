<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Bill Transactions</title>
    </head>

    <body>
        <h1>Bill Transactions</h1>

        <!-- Create Bill -->
        <h2>Create Bill</h2>
        <form action="../Pages/actions/bill.php" method="POST">
            <input type="hidden" name="action" value="create">
            <label for="user_id">User ID:</label>
            <input type="text" name="user_id" required>
            <br>
            <label for="cart_id">Cart ID:</label>
            <input type="text" name="cart_id" required>
            <br>
            <input type="submit" value="Create Bill">
        </form>

        <!-- Update Bill -->
        <h2>Update Bill</h2>
        <form action="Pages/actions/bill.php" method="POST">
            <input type="hidden" name="action" value="update">
            <label for="bill_number">Bill Number:</label>
            <input type="text" name="bill_number" required>
            <br>
            <label for="user_id">User ID:</label>
            <input type="text" name="user_id">
            <br>
            <label for="cart_id">Cart ID:</label>
            <input type="text" name="cart_id">
            <br>
            <input type="submit" value="Update Bill">
        </form>

        <!-- Delete Bill -->
        <h2>Delete Bill</h2>
        <form action="Pages/actions/bill.php" method="POST">
            <input type="hidden" name="action" value="delete">
            <label for="bill_number">Bill Number:</label>
            <input type="text" name="bill_number" required>
            <br>
            <input type="submit" value="Delete Bill">
        </form>

        <!-- View All Bills -->
        <h2>View All Bills</h2>
        <form action="../Pages/actions/bill.php" method="POST">
            <input type="hidden" name="action" value="view">
            <input type="submit" value="View All Bills">
        </form>

        <!-- View Bill by Number -->
        <h2>View Bill by Number</h2>
        <form action="Pages/actions/bill.php" method="POST">
            <input type="hidden" name="action" value="show">
            <label for="bill_number">Bill Number:</label>
            <input type="text" name="bill_number" required>
            <br>
            <input type="submit" value="View Bill">
        </form>
    </body>

</html>
