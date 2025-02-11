<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TESDA - E-TRAK</title>
</head>
<body>
    <div>
        <h1>Log In</h1>
    </div>

    <div>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <input type="submit" name="login" value="Log In">
                <br />
                <input type="reset" value="Clear">
            </div>
        </form>
    </div>
    <div>
        <button onclick="window.location.href = 'register.php';">Register</button>
    </div>
    
</body>
</html>
<?php
    if ($_SERVER["REQUEST_METHOD"] !== "POST") 
        return;

    if (!isset($_POST["login"])) 
        return;

    if (empty($_POST["username"]) || empty($_POST["password"])) {
        echo "Please fill out all fields <br />";
        return;
    }

    session_start();

    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    $connection = mysqli_connect("localhost", "root", "", "tesda_etrak_db");

    if ($connection->connect_error) 
        die("Connection failed: " . $connection->connect_error);

    $sql = $connection->prepare("SELECT id, password FROM users WHERE username = ?");
    $sql->bind_param("s", $username);
    $sql->execute();
    $sql->store_result();

    if ($sql->num_rows === 0) {
        echo "User not found";
        return;
    }
    else {
        $sql->bind_result($id, $hash_password);
        $sql->fetch();

        if (!password_verify($password, $hash_password)) 
            echo "Incorrect password";
        else {
            $_SESSION["user_id"] = $id;
            $_SESSION["username"] = $username;

            header("Location: ../home/index.php");
            exit();
        }
    }

    $sql->close();
    $connection->close();
?>