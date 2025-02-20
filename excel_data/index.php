<?php
    include("../sections/session_manager.php");

    require 'vendor/autoload.php'; // Load PHPSpreadsheet
    //use PhpOffice\PHPSpreadsheet\IOFactory;

    if ($_FILES["excelFile"]["name"]) {
        $fileName = $_FILES["excelFile"]["tmp_name"];

        try {
            // Load the Excel file
            //$spreadsheet = IOFactory::load($fileName);
            $worksheet = $spreadsheet->getActiveSheet();
            $data = $worksheet->toArray(); // Convert Excel data to an array

            echo "<h2>Excel Data: </h2><table border='1'>";
            foreach ($data as $row) {
                echo "<tr>";
                foreach ($row as $cell) {
                    echo "<td>" . htmlspecialchars($cell) . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }
        catch (Exception $e) {
            echo "Error loading file: " . $e->getMessage();
        }
    }
    else {
        echo "No file uploaded.";
    }

    function save_data_to_mysql() {
        include("../sections/database.php");
        $connection = mysqli_connect($db_server, $db_user, $db_password, $db_schema);
        if ($connection->connect_error) {
            die("<strong>Connection failed. </strong><br />" . $connection->connect_error);
        }
    
        foreach ($data as $row) {
            $column1 = $connection->real_escape_string($row[0]);
            $column2 = $connection->real_escape_string($row[1]);
            $sql = "INSERT INTO table (column1, column2) VALUES ('$column1', '$column2')";
            $connection->query($sql);
        }
        $connection->close();
        echo "Data imported successfully!";
    }
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

        <h2>Upload Excel File</h2>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="excelFile" required />
            <input type="submit" name="upload" value="Upload" />
        </form>
            
        </main>
    </div>

    <!-- <?php include "../sections/footer.php"; ?> -->
    <script src="../wwwroot/lib/jquery/dist/jquery.min.js"></script>
    <script src="../wwwroot/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../wwwroot/js/script.js"></script>
</body>
</html>