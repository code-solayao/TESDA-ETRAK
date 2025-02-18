<?php
    session_start();
    $_SESSION["user_id"] = null;
    $_SESSION["username"] = null;

    $validation_message = "";
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        login_user($validation_message);
    }
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
        <?php
            if (!empty($validation_message)) { ?>
                <div class="text-center">
                    <p><?php echo $validation_message ?></p>
                </div>
        <?php } ?>
    </div>
    
    <script src="../wwwroot/lib/jquery/dist/jquery.min.js"></script>
    <script src="../wwwroot/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
    function login_user(&$validation_message) {
        include("../sections/database.php");
        $connection = mysqli_connect($db_server, $db_user, $db_password, $db_schema);
        if ($connection->connect_error) {
            die("<strong>Connection failed. </strong><br />" . $connection->connect_error);
        }

        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $id = 0;
        $hash_password = "";
        $created = null;

        $sql = $connection->prepare("CALL login_user(?);");
        $sql->bind_param("s", $username);
        $sql->execute();
        $sql->store_result();

        if ($sql->num_rows === 0) {
            $validation_message = "<strong>Username not found</strong>";
            $sql->close();
            $connection->close();
            return;
        }

        $sql->bind_result($id, $hash_password, $created);
        $sql->fetch();

        if (!password_verify($password, $hash_password)) {
            $validation_message = "<strong>Incorrect password</strong>";
            $sql->close();
            $connection->close();
            return;
        }

        $_SESSION["user_id"] = $id;
        $_SESSION["username"] = $username;
        $sql->close();

        header("Location: ../home/index.php");
        $connection->close();
        exit;
    }
?>