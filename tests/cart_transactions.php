<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Cart Transactions</title>
    </head>

    <body>
        <h1>Cart Transactions</h1>

        <!-- Create Cart Item -->
        <h2>Create Cart Item</h2>
        <form action="../Pages/actions/cart.php" method="POST">
            <input type="hidden" name="action" value="create">
            <label for="user_id">User ID:</label>
            <label>
                <input type="text" name="user_id" required>
            </label>
            <br>
            <label for="food_id">Food Item ID:</label>
            <label>
                <input type="text" name="food_id" required>
            </label>
            <br>
            <label for="quantity">Quantity:</label>
            <label>
                <input type="number" name="quantity" required>
            </label>
            <br>
            <input type="submit" value="Create Cart Item">
        </form>

        <!-- Update Cart Item -->
        <h2>Update Cart Item</h2>
        <form action="../Pages/actions/cart.php" method="POST">
            <input type="hidden" name="action" value="update">
            <label for="cart_id">Cart ID:</label>
            <label>
                <input type="text" name="cart_id" required>
            </label>
            <br>
            <label for="user_id">User ID:</label>
            <label>
                <input type="text" name="user_id">
            </label>
            <br>
            <label for="food_id">Food Item ID:</label>
            <label>
                <input type="text" name="food_id">
            </label>
            <br>
            <label for="quantity">Quantity:</label>
            <label>
                <input type="number" name="quantity">
            </label>
            <br>
            <input type="submit" value="Update Cart Item">
        </form>

        <!-- Delete Cart Item -->
        <h2>Delete Cart Item</h2>
        <form action="../Pages/actions/cart.php" method="POST">
            <input type="hidden" name="action" value="delete">
            <label for="cart_id">Cart ID:</label>
            <label>
                <input type="text" name="cart_id" required>
            </label>
            <br>
            <input type="submit" value="Delete Cart Item">
        </form>

        <!-- View All Cart Items -->
        <h2>View All Cart Items</h2>
        <form action="../Pages/actions/cart.php" method="POST">
            <input type="hidden" name="action" value="view">
            <input type="submit" value="View All Cart Items">
        </form>

        <!-- View Cart Item by ID -->
        <h2>View Cart Item by ID</h2>
        <form action="../Pages/actions/cart.php" method="POST">
            <input type="hidden" name="action" value="show">
            <label for="cart_id">Cart ID:</label>
            <label>
                <input type="text" name="cart_id" required>
            </label>
            <br>
            <input type="submit" value="View Cart Item">
        </form>
    </body>

</html>
