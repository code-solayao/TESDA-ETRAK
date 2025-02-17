<?php
    include("../sections/session_manager.php");

    $validation_message = "";
    include("../sections/database.php");
    try {
        $connection = mysqli_connect($db_server, $db_user, $db_password, $db_schema);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            delete_records_all($connection, $validation_message);
        }

        mysqli_close($connection);
    }
    catch (mysqli_sql_exception $ex) {
        $validation_message = "<strong>Cannot establish database connection.</strong> <br />" . $ex;
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
    <link rel="stylesheet" href="../wwwroot/css/records/index.css" />
</head>
<body>
    <?php include("../sections/header.php"); ?>
    <div class="container">
        <main role="main" class="pb-3">

            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <h1 class="display-4">Data Records</h1>
                    </div>
                    <div class="col-6 text-end pt-3">
                        <a class="btn btn-primary btn-lg" href="create.php" role="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-plus" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5" />
                                <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                                <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
                            </svg> Create Entry
                        </a>
                        <button type="button" class="btn btn-danger btn-lg" data-bs-toggle="modal" data-bs-target="#deleteAllRecordsModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                            </svg> Clear All Records
                        </button>
                    </div>
                </div>
            </div>
            <div class="table-responsive table-wrapper">
                <?php
                    if (!empty($validation_message)) { ?>
                        <div class="text-center">
                            <p><?php echo $validation_message ?></p>
                        </div>
                <?php } ?>
                <table id="recordsTable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="table-header">No.</th>
                            <th class="table-header">Last name</th>
                            <th class="table-header">First name</th>
                            <th class="table-header">Middle name</th>
                            <th class="table-header">Ext.</th>
                            <th class="table-header">Status of Employment</th>
                            <th class="table-header">Year of Graduation</th>
                            <th class="table-header">Qualification Title</th>
                            <th class="table-header"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            try {
                                $connection = mysqli_connect($db_server, $db_user, $db_password, $db_schema);

                                $sql = $connection->prepare("CALL read_records();");
                                $sql->execute();
                                $result = $sql->get_result();

                                while ($graduate = $result->fetch_assoc()) { 
                                    echo "
                                    <tr>
                                        <td class='table-data'>$graduate[id]</td>
                                        <td class='table-data'>$graduate[last_name]</td>
                                        <td class='table-data'>$graduate[first_name]</td>
                                        <td class='table-data'>$graduate[middle_name]</td>
                                        <td class='table-data'>$graduate[extension_name]</td>
                                        <td class='table-data'>$graduate[employment_status]</td>
                                        <td class='table-data'>$graduate[allocation]</td>
                                        <td class='table-data'>$graduate[qualification_title]</td>
                                        <td>
                                            <a class='btn btn-secondary btn-sm' href='../records/details.php?id=$graduate[id]'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-book-half' viewBox='0 0 16 16'>
                                                    <path d='M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783' />
                                                </svg> View
                                            </a>
                                        </td>
                                    </tr>
                                    ";
                                }

                                mysqli_close($connection);
                            }
                            catch (mysqli_sql_exception $ex) {
                                $validation_message = "<strong>ERROR! </strong><br />" . $ex;
                                echo $validation_message;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- Modal -->
            <div class="modal" tabindex="-1" id="deleteAllRecordsModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Clear All Records</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>The following action cannot be undone. Are you sure to clear all records here?</p>
                        </div>
                        <div class="modal-footer">
                            <form action="index.php" method="post">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" class="btn btn-primary" name="delete_all" value="Confirm" role="button" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <script src="../wwwroot/lib/jquery/dist/jquery.min.js"></script>
    <script src="../wwwroot/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
    function delete_records_all($connection, &$validation_message) {
        if (!isset($_POST["delete_all"]))
            return;

        $sql = "CALL delete_records_all()";
        try {
            mysqli_query($connection, $sql);
        } 
        catch (mysqli_sql_exception) {
            $validation_message = "Database error: " . $connection->error;
        }
    }
?>