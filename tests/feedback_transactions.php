<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback Transactions</title>
</head>
<body>
    <h1>Feedback Transactions</h1>

    <!-- Create Feedback -->
    <h2>Create Feedback</h2>
    <form action="../Pages/actions/feedback.php" method="POST">
        <input type="hidden" name="action" value="create">
        <label for="user_name">User Name:</label>
        <label>
            <input type="text" name="user_name" required>
        </label>
        <br>
        <label for="email_id">Email ID:</label>
        <label>
            <input type="email" name="email_id" required>
        </label>
        <br>
        <label for="profession">Profession:</label>
        <label>
            <input type="text" name="profession">
        </label>
        <br>
        <label for="messages">Messages:</label>
        <label>
            <input type="text" name="messages" required>
        </label>
        <br>
        <label for="picture">Picture URL:</label>
        <label>
            <input type="text" name="picture">
        </label>
        <br>
        <input type="submit" value="Create Feedback">
    </form>

    <!-- Update Feedback -->
    <h2>Update Feedback</h2>
    <form action="../Pages/actions/feedback.php" method="POST">
        <input type="hidden" name="action" value="update">
        <label for="email_id">Email ID:</label>
        <label>
            <input type="email" name="email_id" required>
        </label>
        <br>
        <label for="user_name">User Name:</label>
        <label>
            <input type="text" name="user_name">
        </label>
        <br>
        <label for="profession">Profession:</label>
        <label>
            <input type="text" name="profession">
        </label>
        <br>
        <label for="messages">Messages:</label>
        <label>
            <input type="text" name="messages">
        </label>
        <br>
        <label for="picture">Picture URL:</label>
        <label>
            <input type="text" name="picture">
        </label>
        <br>
        <input type="submit" value="Update Feedback">
    </form>

    <!-- Delete Feedback -->
    <h2>Delete Feedback</h2>
    <form action="../Pages/actions/feedback.php" method="POST">
        <input type="hidden" name="action" value="delete">
        <label for="email_id">Email ID:</label>
        <label>
            <input type="email" name="email_id" required>
        </label>
        <br>
        <input type="submit" value="Delete Feedback">
    </form>

    <!-- View All Feedback -->
    <h2>View All Feedback</h2>
    <form action="../Pages/actions/feedback.php" method="POST">
        <input type="hidden" name="action" value="view">
        <input type="submit" value="View All Feedback">
    </form>

    <!-- View Feedback by Email -->
    <h2>View Feedback by Email</h2>
    <form action="../Pages/actions/feedback.php" method="POST">
        <input type="hidden" name="action" value="show">
        <label for="email_id">Email ID:</label>
        <label>
            <input type="email" name="email_id" required>
        </label>
        <br>
        <input type="submit" value="View Feedback">
    </form>
</body>
</html>
