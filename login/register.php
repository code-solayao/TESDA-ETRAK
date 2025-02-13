<?php
    session_start();
    $_SESSION["username"] = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-TRAK - Create account</title>
    <link rel="stylesheet" href="../wwwroot/lib/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../wwwroot/css/style.css" />
    <link rel="stylesheet" href="../wwwroot/css/login/style.css" />
</head>
<body>
    <div class="form-box">
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <div class="form-header">
                <h1>New Account</h1>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" name="username" placeholder="Username" required />
            </div>
            <div class="input-box">
                <input type="password" class="input-field" name="password" placeholder="Password" required />
            </div>
            <div class="input-submit">
                <button type="submit" class="submit-btn" name="register" id="submit">
                    <label for="submit">Create</label>
                </button>
            </div>
            <div class="action-link">
                <p>Return to <a href="index.php">login</a>.</p>
            </div>
        </form>
    </div>
    
    <script src="../wwwroot/lib/jquery/dist/jquery.min.js"></script>
    <script src="../wwwroot/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
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