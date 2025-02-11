<?php
    session_start();
    if (!isset($_SESSION["username"]))
        header("Location: ../login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TESDA - E-TRAK</title>
</head>
<body>
    <?php include "../sections/header.php"; ?>
    <div>
        <h1>TESDA E-TRAK</h1>
        <p>A project for Employment Monitoring System</p>
    </div>

    <div>
        <a href="https://lookerstudio.google.com/reporting/9d6c7c0a-dcfb-4dda-ba67-589c230b57bd/page/GzuKE?fbclid=IwY2xjawGZXIlleHRuA2FlbQIxMAABHWw1eJ0SY4OlJju7W9T7gV5eNEVFGy5QgPEYOM0jkeni293iDCwtfhtkkQ_aem_jBd-8gTDT5g2pEeWlbhpFQ" 
            target="_blank">Dashboard</a>
        <br />
        <a href="../records/index.php">View Records</a>
    </div>
</body>
</html>
<?php
    $username = $_SESSION["username"];
    echo "Welcome, {$username}!";
?>