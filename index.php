<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TESDA - E-TRAK</title>
</head>
<body>
    <div class="form-group">
        <form action="index.php" method="post">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control">
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>
<?php
    $username = $_POST["username"];
    $password = $_POST["password"];

    echo "username: {$username} <br />";
    echo "password: {$password}";
?>