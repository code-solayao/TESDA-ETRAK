<?php
    session_start();
    $_SESSION["username"] = null;

    $db_server = "localhost";
    $db_user = "root";
    $db_password = "";
    $database = "tesda_etrak_db";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-TRAK - Login</title>
    <link rel="stylesheet" href="../wwwroot/lib/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../wwwroot/css/style.css" />
    <link rel="stylesheet" href="../wwwroot/css/login/style.css" />
</head>
<body>
    <div class="form-box">
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
            <div class="form-header">
                <h1>Login</h1>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" name="username" placeholder="Username" required />
            </div>
            <div class="input-box">
                <input type="password" class="input-field" name="password" placeholder="Password" required />
            </div>
            <div class="input-submit">
                <button type="submit" class="submit-btn" name="login" id="submit">
                    <label for="submit">Log In</label>
                </button>
            </div>
            <div class="action-link">
                <p>Create an account <a href="register.php">here</a>.</p>
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

    if (!isset($_POST["login"])) 
        return;

    if (empty($_POST["username"]) || empty($_POST["password"])) {
        echo "Please fill out all fields <br />";
        return;
    }

    

    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
    $id = null;
    $hash_password = null;

    $connection = mysqli_connect("localhost", "root", "", "tesda_etrak_db");
    if ($connection->connect_error) 
        die("Connection failed: " . $connection->connect_error);

    $sql = $connection->prepare("SELECT id, password FROM users WHERE username = ?");
    $sql->bind_param("s", $username);
    $sql->execute();
    $sql->store_result();

    if ($sql->num_rows === 0) {
        echo "User not found";
    }
    else {
        $sql->bind_result($id, $hash_password);
        $sql->fetch();

        if (!password_verify($password, $hash_password)) 
            echo "Incorrect password";
        else {
            // $_SESSION["user_id"] = $id;
            $_SESSION["username"] = $username;

            header("Location: ../home/index.php");
            exit();
        }
    }

    $sql->close();
    $connection->close();
?>