<?php
    session_start();
    $_SESSION["username"] = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TESDA - ETRAK</title>
    <link rel="stylesheet" href="wwwroot/lib/bootstrap/dist/css/bootstrap.min.css" />
    <style>
        .content-centered {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
    <div class="container">
        <main role="main" class="pb-3">

            <div class="text-center content-centered">
                <h1 class="display-4">Welcome to the <strong>E-TRAK</strong> website by TESDA</h1>
                <a class="btn btn-primary" href="login/index.php">Go to Login</a>
            </div>
            
        </main>
    </div>

    <!-- <?php include "sections/footer.php"; ?> -->
    <script src="wwwroot/lib/jquery/dist/jquery.min.js"></script>
    <script src="wwwroot/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>