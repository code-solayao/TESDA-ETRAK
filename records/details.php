<?php
    session_start();
    if (!isset($_SESSION["username"])) {
        session_unset();
        session_destroy();
        header("Location: ../login/index.php");
        exit();
    }

    $id = 0;
    $district = "";
    $city = "";
    $tvi = "";
    $qualification_title = "";
    $sector = "";
    $full_name = "";
    $sex = "";
    $birthdate = "";
    $contact_number = "";
    $email = "";
    $scholarship_type = "";
    $address = "";
    $allocation = "";

    $verification_means = "";
    $verification_date = "";
    $verification_status = "";
    $follow_up_date_1 = "";
    $follow_up_date_2 = "";
    $response_status = "";
    $not_interested_reason = "";
    $referral_status = "";
    $referral_date = "";
    $no_referral_reason = "";
    $invalid_contact = "";

    $company_name = "";
    $company_address = "";
    $job_title = "";
    $employment_status = "";
    $hired_date = "";
    $submitted_documents_date = "";
    $interview_date = "";
    $not_hired_reason = "";

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        if (!isset($_GET["id"])) {
            header("Location: ../records/index.php");
            exit();
        }

        $connection = mysqli_connect("localhost", "root", "", "tesda_etrak_db");
        if ($connection->connect_error) 
            die("Connection failed: " . $connection->connect_error);

        $id = $_GET["id"];
        $sql = "CALL read_details($id)";
        $result = mysqli_query($connection, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            $district = $row["district"];
            $city = $row["city"];
            $tvi = $row["tvi"];
            $qualification_title = $row["qualification_title"];
            $sector = $row["sector"];
            $full_name = $row["full_name"];
            $sex = $row['sex'];
            $birthdate = $row["birthdate"];
            $contact_number = $row["contact_number"];
            $email = $row["email"];
            $scholarship_type = $row["scholarship_type"];
            $address = $row["address"];
            $allocation = $row["allocation"];

            $verification_means = $row["verification_means"];
            $verification_date = $row["verification_date"];
            $verification_status = $row["verification_status"];
            $follow_up_date_1 = $row["follow_up_date_1"];
            $follow_up_date_2 = $row["follow_up_date_2"];
            $response_status = $row["response_status"];
            $not_interested_reason = $row["not_interested_reason"];
            $referral_status = $row["referral_status"];
            $referral_date = $row["referral_date"];
            $no_referral_reason = $row["no_referral_reason"];
            $invalid_contact = $row["invalid_contact"];

            $company_name = $row["company_name"];
            $company_address = $row["company_address"];
            $job_title = $row["job_title"];
            $employment_status = $row["employment_status"];
            $hired_date = $row["hired_date"];
            $submitted_documents_date = $row["submitted_documents_date"];
            $interview_date = $row["interview_date"];
            $not_hired_reason = $row["not_hired_reason"];

            mysqli_close($connection);
        }
        else {
            header("Location: ../records/index.php");
            mysqli_close($connection);
            exit();
        }
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

        <div class="text-center mb-4">
            <h1 class="display-4">Record Details</h1>
                <a class="btn btn-primary" href="../records/edit.php?id=<?php echo $id; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                    </svg> Update
                </a>
            <a class="btn btn-outline-secondary" href="../records/index.php" data-toggle="modal" data-target="#modalDeleteRecord">Cancel</a>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteRecordModal">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                </svg> Delete
            </button>
        </div>
        <div class="tab-buttons">
            <button class="tablink" id="detailsTab">Details</button>
            <button class="tablink" id="verificationTab">Verification</button>
            <button class="tablink" id="employmentTab" disabled>Employment</button>
        </div>
        <div id="details" class="tabcontent">
            <dl>
                <dt>Name: </dt>
                <dd><?php echo $full_name ?></dd>
                <dt>Sex: </dt>
                <dd><?php echo $sex ?></dd>
                <dt>Date of Birth: </dt>
                <dd class="dateFormat"><?php echo $birthdate ?></dd>
                <dt>Contact Number: </dt>
                <dd><?php echo $contact_number ?></dd>
                <dt>E-mail Address: </dt>
                <dd><?php echo $email ?></dd>
                <dt>Address: </dt>
                <dd><?php echo $address ?></dd>
                <dt>Sector: </dt>
                <dd><?php echo $sector ?></dd>
                <dt>Qualification Title: </dt>
                <dd><?php echo $qualification_title ?></dd>
                <dt>District: </dt>
                <dd><?php echo $district ?></dd>
                <dt>City: </dt>
                <dd><?php echo $city ?></dd>
                <dt>Type of Scholarship: </dt>
                <dd><?php echo $scholarship_type ?></dd>
                <dt>Name of TVI: </dt>
                <dd><?php echo $tvi ?></dd>
                <dt>Year of Graduation: </dt>
                <dd><?php echo $allocation ?></dd>
            </dl>
        </div>
        <div id="verification" class="tabcontent" style="font-size: 1.3em;">
            <dl>
                <dt>Means of Verification: </dt>
                <dd><?php echo $verification_means ?></dd>
                <dt>Date of Verification: </dt>
                <dd class="dateFormat"><?php echo $verification_date ?></dd>
                <dt>Status of Verification: </dt>
                <dd id="verification_status"><?php echo $verification_status ?></dd>
                <?php
                    switch ($verification_status) {
                        case "Responded":
                            echo "
                            <dt>Status of Response: </dt>
                            <dd>$response_status</dd>
                            ";
                            
                            switch ($response_status) {
                                case "Interested":
                                    echo "
                                    <dt>Refer to Company? </dt>
                                    <dd id='referralStatus'>$referral_status</dd>
                                    ";

                                    if ($referral_status === "Yes") {
                                        echo "
                                        <dt>Date of Referral: </dt>
                                        <dd class='dateFormat'>$referral_date</dd>
                                        ";
                                    }
                                    else {
                                        echo "
                                        <dt>Reason (No Referral): </dt>
                                        <dd>$no_referral_reason</dd>
                                        ";
                                    }

                                case "Not Interested":
                                    echo "
                                    <dt>Reason (Not Interested): </dt>
                                    <dd>$not_interested_reason</dd>
                                    ";
                                    break;
                            }
                            break;

                        case "Not Responded":
                            echo "
                            <dt>First Follow-up Date: </dt>
                            <dd class='dateFormat'>$follow_up_date_1</dd>
                            <dt>Second Follow-up Date: </dt>
                            <dd class='dateFormat'>$follow_up_date_2</dd>
                            <dt>Invalid Contact? </dt>
                            <dd>$invalid_contact</dd>
                            ";
                            break;
                    }
                ?>
            </dl>
        </div>
        <div id="employment" class="tabcontent" style="font-size: 1.3em;">
            <dl>
                <dt>Company Name: </dt>
                <dd><?php echo $company_name ?></dd>
                <dt>Company Address: </dt>
                <dd><?php echo $company_address ?></dd>
                <dt>Job Title: </dt>
                <dd><?php echo $job_title ?></dd>
                <dt>Status of Employment: </dt>
                <dd><?php echo $employment_status ?></dd>
                <?php
                    switch ($employment_status) {
                        case "Hired":
                            echo "
                            <dt>Date Hired: </dt>
                            <dd class='dateFormat'>$hired_date</dd>
                            ";
                            break;
                        
                        case "Submitted Documents":
                            echo "
                            <dt>Submission of Documents Date: </dt>
                            <dd class='dateFormat'>$submitted_documents_date</dd>
                            ";
                            break;

                        case "For Interview":
                            echo "
                            <dt>Interview Date: </dt>
                            <dd class='dateFormat'>$interview_date</dd>
                            ";
                            break;

                        case "Not Hired":
                            echo "
                            <dt>Reason (Not Hired): </dt>
                            <dd>$not_hired_reason</dd>
                            ";
                            break;
                    }
                ?>
            </dl>
        </div>
        <!-- Modal -->
        <div class="modal" tabindex="-1" id="deleteRecordModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Record</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="lead">@Model.full_name</p>
                        <p>Are you sure to delete this record?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <form asp-action="Delete" asp-route-id="@Model.Id" method="post">
                            <button type="submit" class="btn btn-danger">Confirm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            
        </main>
    </div>

    <!-- <?php include "../sections/footer.php"; ?> -->
    <script src="../wwwroot/lib/jquery/dist/jquery.min.js"></script>
    <script src="../wwwroot/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../wwwroot/js/script.js"></script>
    <script src="../wwwroot/js/records/details.js"></script>
</body>
</html>