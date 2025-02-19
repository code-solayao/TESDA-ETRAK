<?php
    include("../sections/session_manager.php");

    $id = $_GET["id"];
    $district = "";
    $city = "";
    $tvi = "";
    $qualification_title = "";
    $sector = "";
    $last_name = "";
    $first_name = "";
    $middle_name = "";
    $extension_name = "";
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

    $validation_message = "";
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        update_record($district, $city, $tvi, $qualification_title, $sector, $last_name, $first_name, $middle_name, $extension_name, $full_name, $sex, $birthdate, 
            $contact_number, $email, $scholarship_type, $address, $allocation, $verification_means, $verification_date, $verification_status, $follow_up_date_1, 
            $follow_up_date_2, $response_status, $not_interested_reason, $referral_status, $referral_date, $no_referral_reason, $invalid_contact, $company_name, 
            $company_address, $job_title, $employment_status, $hired_date, $submitted_documents_date, $interview_date, $not_hired_reason, $validation_message);
    }
    else {
        read_details($district, $city, $tvi, $qualification_title, $sector, $last_name, $first_name, $middle_name, $extension_name, $full_name, $sex, $birthdate, 
            $contact_number, $email, $scholarship_type, $address, $allocation, $verification_means, $verification_date, $verification_status, $follow_up_date_1, 
            $follow_up_date_2, $response_status, $not_interested_reason, $referral_status, $referral_date, $no_referral_reason, $invalid_contact, $company_name, 
            $company_address, $job_title, $employment_status, $hired_date, $submitted_documents_date, $interview_date, $not_hired_reason);
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
    <link rel="stylesheet" href="../wwwroot/css/records/edit.css" />
    <link rel="stylesheet" href="../wwwroot/css/records/style.css" />
</head>
<body>
    <?php include "../sections/header.php"; ?>
    <div class="container">
        <main role="main" class="pb-3">

            <div class="text-center mb-4">
                <h1 class="display-4">Update Record</h1>
                <a class="btn btn-secondary" href="../records/details.php?id=<?php echo $id; ?>" role="button">Cancel</a>
            </div>
            <div class="tab-buttons">
                <button class="tablink" id="detailsTab">Details</button>
                <button class="tablink" id="verificationTab">Verification</button>
                <button class="tablink" id="employmentTab">Employment</button>
            </div>
            <form asp-action="Edit" method="post">
                <div id="details" class="tabcontent">
                    <fieldset disabled>
                        <!-- FULL NAME -->
                        <div class="form-group mb-4">
                            <label class="form-label control-label-2">Last Name</label>
                            <input class="form-control" type="text" name="last_name" value="<?php echo $last_name ?>" />
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label control-label-2">First Name</label>
                            <input class="form-control" type="text" name="first_name" value="<?php echo $first_name ?>" />
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label control-label-2">Middle Name</label>
                            <input class="form-control" type="text" name="middle_name" value="<?php echo $middle_name ?>" />
                        </div>
                        <div class="form-group mb-5">
                            <label class="form-label control-label-2">Extension Name</label>
                            <input class="form-control" type="text" name="extension_name" value="<?php echo $extension_name ?>" />
                        </div>
                        <div class="form-group mb-5">
                            <label class="form-label control-label-2">Full Name</label>
                            <input class="form-control" type="text" name="full_name" value="<?php echo $full_name ?>" />
                        </div>
                        <!-- INITIAL DATA -->
                        <div class="form-group mb-3">
                            <label class="form-label control-label-2">Sex</label>
                            <input class="form-control" type="text" name="sex" value="<?php echo $sex ?>" />
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label control-label-2">Date of Birth</label>
                            <input class="form-control" type="text" name="birthdate" value="<?php echo $birthdate ?>" />
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label control-label-2">Contact Number</label>
                            <input class="form-control" type="text" name="contact_number" value="<?php echo $contact_number ?>" />
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label control-label-2">Address</label>
                            <input class="form-control" type="text" row="5" name="address" value="<?php echo $address ?>" />
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label control-label-2">E-mail Address</label>
                            <input class="form-control" type="email" name="email" value="<?php echo $email ?>" />
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label control-label-2">Sector</label>
                            <input class="form-control" type="text" name="sector" value="<?php echo $sector ?>" />
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label control-label-2">Qualification Title</label>
                            <input class="form-control" type="text" name="qualification_title" value="<?php echo $qualification_title ?>" />
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label control-label-2">District</label>
                            <input class="form-control" type="text" name="district" value="<?php echo $district ?>" />
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label control-label-2">City</label>
                            <input class="form-control" type="text" name="city" value="<?php echo $city ?>" />
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label control-label-2">Type of Scholarship</label>
                            <input class="form-control" type="text" name="scholarship_type" value="<?php echo $scholarship_type ?>" />
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label control-label-2">Name of TVI</label>
                            <input class="form-control" type="text" name="tvi" value="<?php echo $tvi ?>" />
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label control-label-2">Allocation</label>
                            <input class="form-control" type="text" name="allocation" value="<?php echo $allocation ?>" />
                        </div>
                    </fieldset>
                </div>
                <div id="verification" class="tabcontent">
                    <div class="container">
                        <?php 
                            if (!empty($validation_message)) { 
                                echo "
                                <div class='alert alert-danger' role='alert'>
                                    $validation_message
                                </div>
                                ";
                            }
                        ?>
                        <div class="form-group mb-4">
                            <label class="form-label control-label-1" for="verification_means">Means of Verification</label>
                            <select class="form-control" id="verification_means" name="verification_means">
                                <?php
                                    $verifmeans_options = ["None", "For Verification", "Phone-called", "E-mailed", "SMS"];
                                    $verifmeans_db = (!empty($verification_means)) ? $verification_means : "None";
                                    foreach ($verifmeans_options as $option) { ?>
                                    <option value="<?php echo $option; ?>" <?php echo ($option == $verifmeans_db) ? 'selected' : ''; ?>>
                                        <?php echo ucfirst($option); ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label class="form-label control-label-1" for="verification_date">Date of Verification</label>
                            <input class="form-control" type="date" id="verification_date" name="verification_date" value="<?php echo $verification_date ?>" />
                        </div>
                        <div class="form-group">
                            <label class="form-label control-label-1" for="respondedBtn">Status of Verification</label>

                            <div class="form-check">
                                <?php
                                    $responded = "Responded";
                                    $no_response = "No Response"; 
                                ?>
                                <input class="form-check-input" type="radio" id="respondedBtn" name="verification_status" value="Responded" <?php echo ($verification_status == $responded) ? 'checked' : ''; ?> />
                                <label class="form-label" for="respondedBtn">Responded</label>
                                <br />
                                <input class="form-check-input" type="radio" id="noResponseBtn" name="verification_status" value="No Response" <?php echo ($verification_status == $no_response) ? 'checked' : ''; ?> />
                                <label class="form-label" for="noResponseBtn">No Response</label>
                            </div>
                        </div>
                        <div class="verification-status-div mb-4" id="responded">
                            <div class="form-group">
                                <label class="form-label control-label-1">Type of Response</label>

                                <div style="margin-left: 30px" class="form-check">
                                    <?php
                                        $interested = "Interested";
                                        $not_interested = "Not Interested";
                                    ?>
                                    <input class="form-check-input" type="radio" id="interestedBtn" name="response_status" value="Interested" <?php echo ($response_status == $interested) ? 'checked' : ''; ?> />
                                    <label class="form-label" for="interestedBtn">Interested</label>
                                    <div>
                                        <label class="form-label control-label-2">Refer to Company?</label>

                                        <div style="margin-left: 30px">
                                            <fieldset id="referralStatusForm" disabled>
                                                <?php
                                                    $yes = "Yes";
                                                    $no = "No";
                                                ?>
                                                <input class="form-check-input" type="radio" id="referYesBtn" name="referral_status" value="Yes" <?php echo ($referral_status == $yes) ? 'checked' : ''; ?> />
                                                <label class="form-label" for="referYesBtn">YES</label>
                                                <br />
                                                <input class="form-control" type="date" id="referralDate" name="referral_date" value="<?php echo $referral_date ?>" disabled />
                                                <br />
                                                <input class="form-check-input" type="radio" id="referNoBtn" name="referral_status" value="No" <?php echo ($referral_status == $no) ? 'checked' : ''; ?> />
                                                <label class="form-label" for="referNoBtn">NO</label>
                                                <br />
                                                <label class="form-label" for="noReferralReason">Reason</label>
                                                <input class="form-control" type="text" id="noReferralReason" name="no_referral_reason" value="<?php echo $no_referral_reason ?>" disabled />
                                            </fieldset>
                                        </div>
                                    </div><br />

                                    <input class="form-check-input" type="radio" id="notInterestedBtn" name="response_status" value="Not Interested" <?php echo ($response_status == $not_interested) ? 'checked' : ''; ?> />
                                    <label class="form-label" for="notInterestedBtn">Not Interested</label>
                                    <div>
                                        <label class="form-label" for="notInterestedBtn">Reason</label>
                                        <input class="form-control" type="text" row="5" id="notInterestedReason" name="not_interested_reason" value="<?php echo $not_interested_reason ?>" disabled />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="verification-status-div mb-4" id="noResponse">
                            <div class="form-group">
                                <label class="form-label control-label-2">No Response (For Follow-up)</label>

                                <div style="margin-left: 30px" class="mb-4">
                                    <label class="form-label" for="followup1">First Follow-up</label>
                                    <input class="form-control" type="date" id="followup1" name="follow_up_date_1" value="<?php echo $follow_up_date_1 ?>" />
                                </div>
                                <div style="margin-left: 30px" class="mb-4">
                                    <label class="form-label" for="followup2">Second Follow-up</label>
                                    <input class="form-control" type="date" id="followup2" name="follow_up_date_2" value="<?php echo $follow_up_date_2 ?>" />
                                </div>
                                <div style="margin-left: 30px" class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" id="invalidContact" name="invalid_contact" value="Yes" <?php echo ($invalid_contact == "Yes") ? 'checked' : '' ?> />
                                    <label class="form-check-label" for="invalidContact">Invalid Contact</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" role="button" name="submit" value="Submit" />
                            <a class="btn btn-secondary" role="button" href="../records/details.php?id=<?php echo $id ?>">Cancel</a>
                        </div>
                    </div>
                </div>
                <div id="employment" class="tabcontent">
                    <div class="container">
                        <?php 
                            if (!empty($validation_message)) { 
                                echo "
                                <div class='alert alert-danger' role='alert'>
                                    $validation_message
                                </div>
                                ";
                            }
                        ?>
                        <fieldset id="employmentField" disabled>
                            <div class="form-group mb-4">
                                <label class="form-label control-label-1" for="companyName">Name of Company</label>
                                <input class="form-control" type="text" id="companyName" name="company_name" value="<?php echo $company_name ?>" />
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label control-label-1" for="companyAddress">Address</label>
                                <input class="form-control" type="text" row="5" id="companyAddress" name="company_address" value="<?php echo $company_address ?>" />
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label control-label-1" for="jobTitle">Job Title</label>
                                <input class="form-control" type="text" id="jobTitle" name="job_title" value="<?php echo $job_title ?>" />
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label control-label-1">Employment Status</label>

                                <div class="form-check">
                                    <?php
                                        $hired = "Hired";
                                        $submit_docs = "Submitted Documents";
                                        $for_interview = "For Interview";
                                        $not_hired = "Not Hired";
                                    ?>
                                    <input class="form-check-input" type="radio" id="hired" name="employment_status" value="Hired" <?php echo ($employment_status == $hired) ? 'checked' : '' ?> />
                                    <label class="form-label employment-status-label" for="hired">Hired</label>
                                    <div class="indent mb-4">
                                        <input class="form-control" type="date" id="hiredDate" name="hired_date" value="<?php echo $hired_date ?>" disabled />
                                    </div>
                                    <input class="form-check-input" type="radio" id="submitDocs" name="employment_status" value="Submitted Documents" <?php echo ($employment_status == $submit_docs) ? 'checked' : '' ?> />
                                    <label class="form-label employment-status-label" for="submitDocs">Submitted Documents</label>
                                    <div class="indent-1 mb-4">
                                        <input class="form-control" type="date" id="submitDocsDate" name="submitted_documents_date" value="<?php echo $submitted_documents_date ?>" disabled />
                                    </div>
                                    <input class="form-check-input" type="radio" id="forInterview" name="employment_status" value="For Interview" <?php echo ($employment_status == $for_interview) ? 'checked' : '' ?> />
                                    <label class="form-label employment-status-label" for="forInterview">For Interview</label>
                                    <div class="indent-1 mb-4">
                                        <input class="form-control" type="date" id="interviewDate" name="interview_date" value="<?php echo $interview_date ?>" disabled />
                                    </div>
                                    <input class="form-check-input" type="radio" id="notHired" name="employment_status" value="Not Hired" <?php echo ($employment_status == $hired) ? 'checked' : '' ?> />
                                    <label class="form-label employment-status-label" for="notHired">Not Hired</label>
                                    <div class="indent-1 mb-4">
                                        <label class="form-label" for="notHiredReason">Reason</label>
                                        <select class="form-control" id="notHiredReason" name="not_hired_reason" disabled>
                                            <?php
                                                $not_hired_reasons = ["None", "Underage", "Upskilling", "Lack of Experience", "Did not meet the requirements"];
                                                $reason_db = (!empty($not_hired_reason)) ? $not_hired_reason : "None";
                                                foreach ($not_hired_reasons as $reason) { ?>
                                                <option value="<?php echo $reason ?>" <?php echo ($reason == $reason_db) ? 'selected' : ''; ?>>
                                                    <?php echo ucfirst($reason); ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input class="btn btn-primary" type="submit" role="button" name="submit" value="Submit" />
                                <a class="btn btn-secondary" role="button" href="../records/details.php?id=<?php echo $id ?>">Cancel</a>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </form>

        </main>
    </div>

    <!-- <?php include "../sections/footer.php"; ?> -->
    <script src="../wwwroot/lib/jquery/dist/jquery.min.js"></script>
    <script src="../wwwroot/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../wwwroot/js/script.js"></script>
    <script src="../wwwroot/js/records/edit.js"></script>
</body>
</html>
<?php
    function update_record(&$district, &$city, &$tvi, &$qualification_title, &$sector, &$last_name, &$first_name, &$middle_name, &$extension_name, &$full_name, &$sex, 
        &$birthdate, &$contact_number, &$email, &$scholarship_type, &$address, &$allocation, &$verification_means, &$verification_date, &$verification_status, 
        &$follow_up_date_1, &$follow_up_date_2, &$response_status, &$not_interested_reason, &$referral_status, &$referral_date, &$no_referral_reason, &$invalid_contact, 
        &$company_name, &$company_address, &$job_title, &$employment_status, &$hired_date, &$submitted_documents_date, &$interview_date, &$not_hired_reason, &$validation_message) 
    {
        if (!isset($_GET["id"])) {
            header("Location: ../records/index.php");
            exit;
        }

        if (!isset($_POST["submit"]))
            return;

        include("../sections/database.php");
        $connection = mysqli_connect($db_server, $db_user, $db_password, $db_schema);
        if ($connection->connect_error) {
            die("<strong>Connection failed. </strong><br />" . $connection->connect_error);
        }

        try {
            $id = $_GET["id"];
            $district = filter_input(INPUT_POST, "district", FILTER_SANITIZE_SPECIAL_CHARS);
            $city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_SPECIAL_CHARS);
            $tvi = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
            $qualification_title = filter_input(INPUT_POST, "qualification_title", FILTER_SANITIZE_SPECIAL_CHARS);
            $sector = filter_input(INPUT_POST, "sector", FILTER_SANITIZE_SPECIAL_CHARS);
            $last_name = filter_input(INPUT_POST, "last_name", FILTER_SANITIZE_SPECIAL_CHARS);
            $first_name = filter_input(INPUT_POST, "first_name", FILTER_SANITIZE_SPECIAL_CHARS);
            $middle_name = filter_input(INPUT_POST, "middle_name", FILTER_SANITIZE_SPECIAL_CHARS);
            $extension_name = filter_input(INPUT_POST, "extension_name", FILTER_SANITIZE_SPECIAL_CHARS);
            $full_name = filter_input(INPUT_POST, "full_name", FILTER_SANITIZE_SPECIAL_CHARS);
            $sex = filter_input(INPUT_POST, "sex", FILTER_SANITIZE_SPECIAL_CHARS);
            $birthdate = filter_input(INPUT_POST, "birthdate", FILTER_SANITIZE_SPECIAL_CHARS);
            $contact_number = filter_input(INPUT_POST, "contact_number", FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
            $scholarship_type = filter_input(INPUT_POST, "scholarship_type", FILTER_SANITIZE_SPECIAL_CHARS);
            $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
            $allocation = filter_input(INPUT_POST, "allocation", FILTER_SANITIZE_SPECIAL_CHARS);

            $verification_means = filter_input(INPUT_POST, "verification_means", FILTER_SANITIZE_SPECIAL_CHARS);
            $verification_date = filter_input(INPUT_POST, "verification_date", FILTER_SANITIZE_SPECIAL_CHARS);
            $verification_status = filter_input(INPUT_POST, "verification_status", FILTER_SANITIZE_SPECIAL_CHARS);
            $follow_up_date_1 = filter_input(INPUT_POST, "follow_up_date_1", FILTER_SANITIZE_SPECIAL_CHARS);
            $follow_up_date_2 = filter_input(INPUT_POST, "follow_up_date_2", FILTER_SANITIZE_SPECIAL_CHARS);
            $response_status = filter_input(INPUT_POST, "response_status", FILTER_SANITIZE_SPECIAL_CHARS);
            $not_interested_reason = filter_input(INPUT_POST, "not_interested_reason", FILTER_SANITIZE_SPECIAL_CHARS);
            $referral_status = filter_input(INPUT_POST, "referral_status", FILTER_SANITIZE_SPECIAL_CHARS);
            $referral_date = filter_input(INPUT_POST, "referral_date", FILTER_SANITIZE_SPECIAL_CHARS);
            $no_referral_reason = filter_input(INPUT_POST, "no_referral_reason", FILTER_SANITIZE_SPECIAL_CHARS);
            $invalid_contact = filter_input(INPUT_POST, "invalid_contact", FILTER_SANITIZE_SPECIAL_CHARS);

            $company_name = filter_input(INPUT_POST, "company_name", FILTER_SANITIZE_SPECIAL_CHARS);
            $company_address = filter_input(INPUT_POST, "company_address", FILTER_SANITIZE_SPECIAL_CHARS);
            $job_title = filter_input(INPUT_POST, "job_title", FILTER_SANITIZE_SPECIAL_CHARS);
            $employment_status = filter_input(INPUT_POST, "employment_status", FILTER_SANITIZE_SPECIAL_CHARS);
            $hired_date = filter_input(INPUT_POST, "hired_date", FILTER_SANITIZE_SPECIAL_CHARS);
            $submitted_documents_date = filter_input(INPUT_POST, "submitted_documents_date", FILTER_SANITIZE_SPECIAL_CHARS);
            $interview_date = filter_input(INPUT_POST, "interview_date", FILTER_SANITIZE_SPECIAL_CHARS);
            $not_hired_reason = filter_input(INPUT_POST, "not_hired_reason", FILTER_SANITIZE_SPECIAL_CHARS);
            
            $sql = $connection->prepare("CALL update_record('$id', '$verification_means', '$verification_date', '$verification_status', '$follow_up_date_1', '$follow_up_date_2', 
                '$response_status', '$not_interested_reason', '$referral_status', '$referral_date', '$no_referral_reason', '$invalid_contact', '$company_name', '$company_address', 
                '$job_title', '$employment_status', '$hired_date', '$submitted_documents_date', '$interview_date', '$not_hired_reason');");
            $sql->execute();

            header("Location: ../records/index.php");
            $connection->close();
            exit;
        }
        catch (mysqli_sql_exception) {
            $validation_message = "<strong>Database error: </strong><br />" . $connection->error;
        }
    }

    function read_details(&$district, &$city, &$tvi, &$qualification_title, &$sector, &$last_name, &$first_name, &$middle_name, &$extension_name, &$full_name, &$sex, 
        &$birthdate, &$contact_number, &$email, &$scholarship_type, &$address, &$allocation, &$verification_means, &$verification_date, &$verification_status, 
        &$follow_up_date_1, &$follow_up_date_2, &$response_status, &$not_interested_reason, &$referral_status, &$referral_date, &$no_referral_reason, &$invalid_contact, 
        &$company_name, &$company_address, &$job_title, &$employment_status, &$hired_date, &$submitted_documents_date, &$interview_date, &$not_hired_reason)
    {
        include("../sections/database.php");
        $connection = mysqli_connect($db_server, $db_user, $db_password, $db_schema);
        if ($connection->connect_error) {
            die("<strong>Connection failed. </strong><br />" . $connection->connect_error);
        }

        $id = $_GET["id"];
        $sql = $connection->prepare("CALL read_details(?)");
        $sql->bind_param("s", $id);
        $sql->execute();
        $result = $sql->get_result();

        if ($result->num_rows === 0) {
            header("Location: ../records/index.php");
            $connection->close();
            exit;
        }

        while ($row = $result->fetch_assoc()) {
            $district = $row["district"];
            $city = $row["city"];
            $tvi = $row["tvi"];
            $qualification_title = $row["qualification_title"];
            $sector = $row["sector"];
            $last_name = $row["last_name"];
            $first_name = $row["first_name"];
            $middle_name = $row["middle_name"];
            $extension_name = $row["extension_name"];
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
        }

        $connection->close();
    }
?>