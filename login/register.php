<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TESDA - E-TRAK</title>
</head>
<body>
    <div>
        <h1>Create New Account</h1>
    </div>

    <div>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <input type="submit" name="register" value="Register">
                <br />
                <input type="reset" value="Clear">
            </div>
        </form>
    </div>
    <div>
        <button onclick="window.location.href = '../login/index.php';">Back</button>
    </div>
</body>
</html>
<?php
    if ($_SERVER["REQUEST_METHOD"] !== "POST") 
        return;

    if (!isset($_POST["register"])) 
        return;

    if (empty($_POST["username"]) || empty($_POST["password"])) {
        echo "Please fill in all fields <br />";
        return;
    }

    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    $connection = mysqli_connect("localhost", "root", "", "tesda_etrak_db");

    if ($connection->connect_error) 
        die("Connection failed: " . $connection->connect_error);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hash_password')";

    if ($connection->query($sql) === TRUE) {
        echo "Account created successfully";
    } else {
        echo "Error: " . $connection->error;
    }

    $connection->close();
?>