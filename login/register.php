<?php
    session_start();
    $_SESSION["user_id"] = null;
    $_SESSION["username"] = null;

    $validation_message = "";
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        create_user($validation_message);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-TRAK - Create account</title>
    <link rel="stylesheet" href="../wwwroot/lib/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../wwwroot/css/style.css" />
    <link rel="stylesheet" href="../wwwroot/css/login/style.css"; />
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
    function create_user(&$validation_message) {
        include("../sections/database.php");
        $connection = mysqli_connect($db_server, $db_user, $db_password, $db_schema);
        if ($connection->connect_error) {
            die("<strong>Connection failed. </strong><br />" . $connection->connect_error);
        }

        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
        $hash_password = password_hash($password, PASSWORD_DEFAULT);
    
        $sql = "CALL create_user('$username', '$hash_password');";

        try {
            mysqli_query($connection, $sql);
            $validation_message = "<strong>Account created successfully!</strong>";
        }
        catch (mysqli_sql_exception $ex) {
            $validation_message = "<strong>Cannot create account.</strong> <br />" . $ex;
        }
    }
?>