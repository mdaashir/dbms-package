<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Sample Menu Transactions</title>
    </head>

    <body>
        <h1>Sample Menu Transactions</h1>

        <!-- Create Menu Item -->
        <h2>Create Menu Item</h2>
        <form action="../Pages/actions/sample_menu.php" method="POST">
            <input type="hidden" name="action" value="create">
            <label for="food_items">Food Item:</label>
            <label>
                <input type="text" name="food_items" required>
            </label>
            <br>
            <label for="is_breakfast">Is Breakfast:</label>
            <label>
                <input type="checkbox" name="is_breakfast">
            </label>
            <br>
            <label for="is_lunch">Is Lunch:</label>
            <label>
                <input type="checkbox" name="is_lunch">
            </label>
            <br>
            <label for="is_dinner">Is Dinner:</label>
            <label>
                <input type="checkbox" name="is_dinner">
            </label>
            <br>
            <label for="is_veg">Is Veg:</label>
            <label>
                <input type="checkbox" name="is_veg">
            </label>
            <br>
            <label for="description">Description:</label>
            <label>
                <input type="text" name="description">
            </label>
            <br>
            <label for="price">Price:</label>
            <label>
                <input type="text" name="price">
            </label>
            <br>
            <label for="picture">Picture URL:</label>
            <label>
                <input type="text" name="picture">
            </label>
            <br>
            <input type="submit" value="Create Menu Item">
        </form>

        <!-- Update Menu Item -->
        <h2>Update Menu Item</h2>
        <form action="../Pages/actions/sample_menu.php" method="POST">
            <input type="hidden" name="action" value="update">
            <label for="id">Menu Item ID:</label>
            <label>
                <input type="text" name="id" required>
            </label>
            <br>
            <label for="food_items">Food Item:</label>
            <label>
                <input type="text" name="food_items">
            </label>
            <br>
            <label for="is_breakfast">Is Breakfast:</label>
            <label>
                <input type="checkbox" name="is_breakfast">
            </label>
            <br>
            <label for="is_lunch">Is Lunch:</label>
            <label>
                <input type="checkbox" name="is_lunch">
            </label>
            <br>
            <label for="is_dinner">Is Dinner:</label>
            <label>
                <input type="checkbox" name="is_dinner">
            </label>
            <br>
            <label for="is_veg">Is Veg:</label>
            <label>
                <input type="checkbox" name="is_veg">
            </label>
            <br>
            <label for="description">Description:</label>
            <label>
                <input type="text" name="description">
            </label>
            <br>
            <label for="price">Price:</label>
            <label>
                <input type="text" name="price">
            </label>
            <br>
            <label for="picture">Picture URL:</label>
            <label>
                <input type="text" name="picture">
            </label>
            <br>
            <input type="submit" value="Update Menu Item">
        </form>

        <!-- Delete Menu Item -->
        <h2>Delete Menu Item</h2>
        <form action="../Pages/actions/sample_menu.php" method="POST">
            <input type="hidden" name="action" value="delete">
            <label for="id">Menu Item ID:</label>
            <label>
                <input type="text" name="id" required>
            </label>
            <br>
            <input type="submit" value="Delete Menu Item">
        </form>

        <!-- View All Menu Items -->
        <h2>View All Menu Items</h2>
        <form action="../Pages/actions/sample_menu.php" method="POST">
            <input type="hidden" name="action" value="view">
            <input type="submit" value="View All Menu Items">
        </form>

        <!-- View Menu Item by ID -->
        <h2>View Menu Item by ID</h2>
        <form action="../Pages/actions/sample_menu.php" method="POST">
            <input type="hidden" name="action" value="show">
            <label for="id">Menu Item ID:</label>
            <label>
                <input type="text" name="id" required>
            </label>
            <br>
            <input type="submit" value="View Menu Item">
        </form>
    </body>

</html>
