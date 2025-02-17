<?php
    include("../sections/session_manager.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TESDA - E-TRAK</title>
    <link rel="stylesheet" href="../wwwroot/lib/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../wwwroot/css/style.css" />
</head>
<body>
    <?php include "../sections/header.php"; ?>
    <div class="container">
        <main role="main" class="pb-3">

            <div class="text-center">
                <h1 class="display-4">Welcome</h1>
                <p>This is a new project of the <strong>Employment Monitoring System</strong></p>
            </div>
        
            <div class="text-center">
                <a href="https://lookerstudio.google.com/reporting/9d6c7c0a-dcfb-4dda-ba67-589c230b57bd/page/GzuKE?fbclid=IwY2xjawGZXIlleHRuA2FlbQIxMAABHWw1eJ0SY4OlJju7W9T7gV5eNEVFGy5QgPEYOM0jkeni293iDCwtfhtkkQ_aem_jBd-8gTDT5g2pEeWlbhpFQ" 
                    class="btn btn-primary mb-2" target="_blank">Dashboard</a>
                <br />
                <a href="../records/index.php" class="btn btn-primary mb-4">View Records</a>
            </div>
            
        </main>
    </div>

    <!-- <?php include "../sections/footer.php"; ?> -->
    <script src="../wwwroot/lib/jquery/dist/jquery.min.js"></script>
    <script src="../wwwroot/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>