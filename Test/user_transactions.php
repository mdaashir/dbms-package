<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>User Transactions</title>
    </head>

    <body>
        <h1>User Transactions</h1>

        <!-- Create User -->
        <h2>Create User</h2>
        <form action="../Pages/actions/user.php" method="POST">
            <input type="hidden" name="action" value="create">
            <label for="user_name">User Name:</label>
            <label>
                <input type="text" name="user_name" required>
            </label>
            <br>
            <label for="phone_number">Phone Number:</label>
            <label>
                <input type="text" name="phone_number">
            </label>
            <br>
            <label for="email_id">Email ID:</label>
            <label>
                <input type="email" name="email_id" required>
            </label>
            <br>
            <label for="password">Password:</label>
            <label>
                <input type="password" name="password" required>
            </label>
            <br>
            <input type="submit" value="Create User">
        </form>

        <!-- Update User -->
        <h2>Update User</h2>
        <form action="../Pages/actions/user.php" method="POST">
            <input type="hidden" name="action" value="update">
            <label for="id">User ID:</label>
            <label>
                <input type="text" name="id" required>
            </label>
            <br>
            <label for="user_name">User Name:</label>
            <label>
                <input type="text" name="user_name">
            </label>
            <br>
            <label for="phone_number">Phone Number:</label>
            <label>
                <input type="text" name="phone_number">
            </label>
            <br>
            <label for="email_id">Email ID:</label>
            <label>
                <input type="email" name="email_id">
            </label>
            <br>
            <label for="password">Password:</label>
            <label>
                <input type="password" name="password">
            </label>
            <br>
            <input type="submit" value="Update User">
        </form>

        <!-- Delete User -->
        <h2>Delete User</h2>
        <form action="../Pages/actions/user.php" method="POST">
            <input type="hidden" name="action" value="delete">
            <label for="id">User ID:</label>
            <label>
                <input type="text" name="id" required>
            </label>
            <br>
            <input type="submit" value="Delete User">
        </form>

        <!-- View All Users -->
        <h2>View All Users</h2>
        <form action="../Pages/actions/user.php" method="POST">
            <input type="hidden" name="action" value="view">
            <input type="submit" value="View All Users">
        </form>

        <!-- View User by ID -->
        <h2>View User by ID</h2>
        <form action="../Pages/actions/user.php" method="POST">
            <input type="hidden" name="action" value="show">
            <label for="id">User ID:</label>
            <label>
                <input type="text" name="id" required>
            </label>
            <br>
            <input type="submit" value="View User">
        </form>
    </body>

</html>
