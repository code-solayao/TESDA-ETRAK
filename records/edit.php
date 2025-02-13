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

    switch ($_SERVER["REQUEST_METHOD"]) {
        case "GET":
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
            
            if (mysqli_num_rows($result) === 0) {
                header("Location: ../records/index.php");
                mysqli_close($connection);
                exit();
            }
            else {
                $row = mysqli_fetch_assoc($result);
    
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
    
                mysqli_close($connection);
            }
            break;

        case "POST":
            if (isset($_POST["submit"])) {
                
            }
            break;
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
</head>
<body>
    <?php include "../sections/header.php"; ?>
    <div class="container">
        <main role="main" class="pb-3">

            <div class="text-center mb-4">
                <h1 class="display-4">Update Record</h1>
                <a class="btn btn-secondary" href="../records/index.php" role="button">Cancel</a>
            </div>
            <div class="tab-buttons">
                <button class="tablink" id="detailsTab">Details</button>
                <button class="tablink" id="verificationTab">Verification</button>
                <button class="tablink" id="employmentTab">Employment</button>
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
            <form asp-action="Edit" method="post">
                <div id="postDetails" class="form-group mb-4">
                    <input class="form-control" type="number" name="Id" value="<?php echo $id ?>" placeholder="0" />
                    <input class="form-control" type="text" name="last_name" value="<?php echo $last_name ?>" />
                    <input class="form-control" type="text" name="first_name" value="<?php echo $first_name ?>" />
                    <input class="form-control" type="text" name="middle_name" value="<?php echo $middle_name ?>" />
                    <input class="form-control" type="text" name="extension_name" value="<?php echo $extension_name ?>" />
                    <input class="form-control" type="text" name="full_name" value="<?php echo $full_name ?>" />
                    <input class="form-control" type="text" name="sex" value="<?php echo $sex ?>" />
                    <input class="form-control" type="text" name="birthdate" value="<?php echo $birthdate ?>" />
                    <input class="form-control" type="text" name="contact_number" value="<?php echo $contact_number ?>" />
                    <input class="form-control" type="text" name="email" value="<?php echo $email ?>" />
                    <input class="form-control" type="text" name="address" value="<?php echo $address ?>" />
                    <input class="form-control" type="text" name="sector" value="<?php echo $sector ?>" />
                    <input class="form-control" type="text" name="qualification_title" value="<?php echo $qualification_title ?>" />
                    <input class="form-control" type="text" name="district" value="<?php echo $district ?>" />
                    <input class="form-control" type="text" name="city" value="<?php echo $city ?>" />
                    <input class="form-control" type="text" name="scholarship_type" value="<?php echo $scholarship_type ?>" />
                    <input class="form-control" type="text" name="tvi" value="<?php echo $tvi ?>" />
                    <input class="form-control" type="text" name="allocation" value="<?php echo $allocation ?>" />
                </div>
                <div id="verification" class="tabcontent">
                    <div class="container">
                        <!-- <div asp-validation-summary="All" class="text-danger"></div> -->
                        <div class="form-group mb-4">
                            <label asp-for="@Model.verification_means" class="form-label control-label-1">Means of Verification</label>
                            <select asp-for="@Model.verification_means" class="form-control">
                                <option value="">None</option>
                                <option value="For Verification">For Verification</option>
                                <option value="Phone-called">Phone-called</option>
                                <option value="E-mailed">E-mailed</option>
                                <option value="SMS">SMS</option>
                            </select>
                        </div>
                        <div class="form-group mb-4">
                            <label asp-for="@Model.verification_date" class="form-label control-label-1">Date of Verification</label>
                            <input asp-for="@Model.verification_date" class="form-control" type="date" />
                        </div>
                        <div class="form-group">
                            <label asp-for="@Model.verification_status" class="form-label control-label-1">Status of Verification</label>

                            <div class="form-check">
                                <input asp-for="@Model.verification_status" class="form-check-input" type="radio" value="Responded" id="respondedBtn" />
                                <label asp-for="@Model.verification_status" class="form-label">Responded</label>
                                <br />
                                <input asp-for="@Model.verification_status" class="form-check-input" type="radio" value="No Response" id="noResponseBtn" />
                                <label asp-for="@Model.verification_status" class="form-label">No Response</label>
                            </div>
                        </div>
                        <div class="verification-status-div mb-4" id="responded">
                            <div class="form-group">
                                <label asp-for="@Model.response_status" class="form-label control-label-1">Type of Response</label>

                                <div style="margin-left: 30px" class="form-check">
                                    <input asp-for="@Model.response_status" class="form-check-input" type="radio" value="Interested" id="interestedBtn" />
                                    <label asp-for="@Model.response_status" class="form-label">Interested</label>
                                    <div>
                                        <label asp-for="@Model.referral_status" class="form-label control-label-2">Refer to Company?</label>

                                        <div style="margin-left: 30px">
                                            <fieldset id="referralStatusForm" disabled>
                                                <input asp-for="@Model.referral_status" class="form-check-input" type="radio" value="Yes" id="referYesBtn" />
                                                <label asp-for="@Model.referral_status" class="form-label">YES</label>
                                                <br />
                                                <input asp-for="@Model.referral_date" class="form-control" type="date" id="referralDate" disabled />
                                                <br />
                                                <input asp-for="@Model.referral_status" class="form-check-input" type="radio" value="No" id="referNoBtn" />
                                                <label asp-for="@Model.referral_status" class="form-label">NO</label>
                                                <br />
                                                <label asp-for="@Model.no_referral_reason" class="form-label">Reason</label>
                                                <input asp-for="@Model.no_referral_reason" class="form-control" type="text" id="noReferralReason" disabled />
                                            </fieldset>
                                        </div>
                                    </div><br />

                                    <input asp-for="@Model.response_status" class="form-check-input" type="radio" value="Not Interested" id="notInterestedBtn" />
                                    <label asp-for="@Model.response_status" class="form-label">Not Interested</label>
                                    <div>
                                        <label asp-for="@Model.not_interested_reason" class="form-label">Reason</label>
                                        <input asp-for="@Model.not_interested_reason" class="form-control" type="text" row="5" id="notInterestedReason" disabled />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="verification-status-div mb-4" id="noResponse">
                            <div class="form-group">
                                <label class="form-label control-label-2">No Response (For Follow-up)</label>

                                <div style="margin-left: 30px" class="mb-4">
                                    <label asp-for="@Model.follow_up_date_1" class="form-label">First Follow-up</label>
                                    <input asp-for="@Model.follow_up_date_1" class="form-control" type="date" id="followup1" />
                                </div>
                                <div style="margin-left: 30px" class="mb-4">
                                    <label asp-for="@Model.follow_up_date_2" class="form-label">Second Follow-up</label>
                                    <input asp-for="@Model.follow_up_date_2" class="form-control" type="date" id="followup2" />
                                </div>
                                <div style="margin-left: 30px" class="form-check mb-4">
                                    <input asp-for="@Model.invalid_contact" class="form-check-input" type="checkbox" id="invalidContact" />
                                    <label asp-for="@Model.invalid_contact" class="form-check-label">Invalid Contact</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a asp-controller="Records" asp-action="Details" asp-route-id="@Model.Id" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
                <div id="employment" class="tabcontent">
                    <div class="container">
                        <div asp-validation-summary="All" class="text-danger"></div>
                        <fieldset id="employmentField" disabled>
                            <div class="form-group mb-4">
                                <label asp-for="@Model.company_name" class="form-label control-label-1">Name of Company</label>
                                <input asp-for="@Model.company_name" class="form-control" type="text" id="companyName" />
                            </div>
                            <div class="form-group mb-4">
                                <label asp-for="@Model.company_address" class="form-label control-label-1">Address</label>
                                <input asp-for="@Model.company_address" class="form-control" type="text" row="5" id="companyAddress" />
                            </div>
                            <div class="form-group mb-4">
                                <label asp-for="@Model.job_title" class="form-label control-label-1">Job Title</label>
                                <input asp-for="@Model.job_title" class="form-control" type="text" id="jobTitle" />
                            </div>
                            <div class="form-group mb-4">
                                <label class="form-label control-label-1">Employment Status</label>

                                <div class="form-check">
                                    <input asp-for="@Model.employment_status" class="form-check-input" type="radio" value="Hired" id="hired" />
                                    <label asp-for="@Model.employment_status" class="form-label employment-status-label">Hired</label>
                                    <div class="indent mb-4">
                                        <input asp-for="@Model.hired_date" class="form-control" type="date" id="hiredDate" disabled />
                                    </div>
                                    <input asp-for="@Model.employment_status" class="form-check-input" type="radio" value="Submitted Documents" id="submitDocs" />
                                    <label asp-for="@Model.employment_status" class="form-label employment-status-label">Submitted Documents</label>
                                    <div class="indent-1 mb-4">
                                        <input asp-for="@Model.submitted_documents_date" class="form-control" type="date" id="submitDocsDate" disabled />
                                    </div>
                                    <input asp-for="@Model.employment_status" class="form-check-input" type="radio" value="For Interview" id="forInterview" />
                                    <label asp-for="@Model.employment_status" class="form-label employment-status-label">For Interview</label>
                                    <div class="indent-1 mb-4">
                                        <input asp-for="@Model.interview_date" class="form-control" type="date" id="interviewDate" disabled />
                                    </div>
                                    <input asp-for="@Model.employment_status" class="form-check-input" type="radio" value="Not Hired" id="notHired" />
                                    <label asp-for="@Model.employment_status" class="form-label employment-status-label">Not Hired</label>
                                    <div class="indent-1 mb-4">
                                        <label asp-for="@Model.not_hired_reason" class="form-label">Reason</label>
                                        <select asp-for="@Model.not_hired_reason" class="form-control" id="notHiredReason" disabled>
                                            <option value="">None</option>
                                            <option value="Underage">Underage</option>
                                            <option value="Upskilling">Upskilling</option>
                                            <option value="Lack of experience">Lack of experience</option>
                                            <option value="Did not meet the requirements">Did not meet the requirements</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a asp-controller="Records" asp-action="Details" asp-route-id="@Model.Id" class="btn btn-secondary">Cancel</a>
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