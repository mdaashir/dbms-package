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
            <input type="text" name="food_items" required>
            <br>
            <label for="is_breakfast">Is Breakfast:</label>
            <input type="checkbox" name="is_breakfast">
            <br>
            <label for="is_lunch">Is Lunch:</label>
            <input type="checkbox" name="is_lunch">
            <br>
            <label for="is_dinner">Is Dinner:</label>
            <input type="checkbox" name="is_dinner">
            <br>
            <label for="is_veg">Is Veg:</label>
            <input type="checkbox" name="is_veg">
            <br>
            <label for="description">Description:</label>
            <input type="text" name="description">
            <br>
            <label for="price">Price:</label>
            <input type="text" name="price">
            <br>
            <label for="picture">Picture URL:</label>
            <input type="text" name="picture">
            <br>
            <input type="submit" value="Create Menu Item">
        </form>

        <!-- Update Menu Item -->
        <h2>Update Menu Item</h2>
        <form action="../Pages/actions/sample_menu.php" method="POST">
            <input type="hidden" name="action" value="update">
            <label for="id">Menu Item ID:</label>
            <input type="text" name="id" required>
            <br>
            <label for="food_items">Food Item:</label>
            <input type="text" name="food_items">
            <br>
            <label for="is_breakfast">Is Breakfast:</label>
            <input type="checkbox" name="is_breakfast">
            <br>
            <label for="is_lunch">Is Lunch:</label>
            <input type="checkbox" name="is_lunch">
            <br>
            <label for="is_dinner">Is Dinner:</label>
            <input type="checkbox" name="is_dinner">
            <br>
            <label for="is_veg">Is Veg:</label>
            <input type="checkbox" name="is_veg">
            <br>
            <label for="description">Description:</label>
            <input type="text" name="description">
            <br>
            <label for="price">Price:</label>
            <input type="text" name="price">
            <br>
            <label for="picture">Picture URL:</label>
            <input type="text" name="picture">
            <br>
            <input type="submit" value="Update Menu Item">
        </form>

        <!-- Delete Menu Item -->
        <h2>Delete Menu Item</h2>
        <form action="../Pages/actions/sample_menu.php" method="POST">
            <input type="hidden" name="action" value="delete">
            <label for="id">Menu Item ID:</label>
            <input type="text" name="id" required>
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
            <input type="text" name="id" required>
            <br>
            <input type="submit" value="View Menu Item">
        </form>
    </body>

</html>
