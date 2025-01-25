<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create User</title>
</head>
<body>
    <h1>Create User</h1>
    <form action="Public/actions/user.php" method="POST">
        <input type="hidden" name="action" value="create">
        <label for="user_name">User Name:</label>
        <input type="text" name="user_name" required>
        <br>
        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number">
        <br>
        <label for="email_id">Email ID:</label>
        <input type="email" name="email_id" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="Create User">
    </form>
</body>
</html>
