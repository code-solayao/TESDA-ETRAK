<?php
    session_start();
    if (!isset($_SESSION["username"])) {
        session_unset();
        session_destroy();
        header("Location: ../login/index.php");
        exit();
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

            <div class="text-center">
                <h1 class="display-4">Create an Entry</h1>
                <a class="btn btn-secondary" href="../records/index.php" role="button">Cancel</a>
            </div>
            <div class="container mt-4">
                <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
                    <!-- <div asp-validation-summary="All" class="text-danger"></div> -->
                    <!-- FULL NAME -->
                    <div class="form-group mb-4">
                        <label class="form-label control-label-1">Last Name</label>
                        <input class="form-control" type="text" name="last_name" placeholder="Enter last name" />
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label control-label-1">First Name</label>
                        <input class="form-control" type="text" name="first_name" placeholder="Enter first name" />
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label control-label-1">Middle Name</label>
                        <input class="form-control" type="text" name="middle_name" placeholder="Enter middle name" />
                    </div>
                    <div class="form-group mb-5">
                        <label class="form-label control-label-1">Extension Name</label>
                        <select class="form-control" name="extension_name">
                            <option value="">None</option>
                            <option value="Sr.">Sr.</option>
                            <option value="Jr.">Jr.</option>
                            <option value="III">III</option>
                        </select>
                    </div>
                    <!-- INITIAL DATA -->
                    <div class="form-group mb-3">
                        <label class="form-label control-label-1">Sex</label>

                        <div>
                            <input class="form-check-input" type="radio" name="sex" value="Male" />
                            <label class="form-label">Male</label>
                            <br />
                            <input class="form-check-input" type="radio" name="sex" value="Female" />
                            <label class="form-label">Female</label>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label control-label-1">Date of Birth</label>
                        <input class="form-control" type="date" name="birthdate" />
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label control-label-1">Contact Number</label>
                        <input class="form-control" type="text" name="contact_number" placeholder="0900-000-0000" />
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label control-label-1">Address</label>
                        <input class="form-control" type="text" row="5" name="address" />
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label control-label-1">E-mail Address</label>
                        <input class="form-control" type="email" name="email" placeholder="username@email.com" />
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label control-label-1">Sector</label>
                        <select class="form-control" name="sector">
                            <option value="">None</option>
                            <option value="Agriculture">Agriculture</option>
                            <option value="ALT">ALT</option>
                            <option value="Construction">Construction</option>
                            <option value="Electrical and Electronics">Electrical and Electronics</option>
                            <option value="Garments">Garments</option>
                            <option value="Health">Health</option>
                            <option value="HVAC/R">HVAC/R</option>
                            <option value="ICT">ICT</option>
                            <option value="Marine">Marine</option>
                            <option value="Metals and Engineering">Metals and Engineering</option>
                            <option value="Others">Others</option>
                            <option value="Processed Foods and Beverages">Processed Foods and Beverages</option>
                            <option value="SCDOS">SCDOS</option>
                            <option value="Tourism">Tourism</option>
                            <option value="TVET">TVET</option>
                            <option value="Visual Arts">Visual Arts</option>
                            <option value="Wholesale">Wholesale</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label control-label-1">Qualification Title</label>
                        <input class="form-control" type="text" name="qualification_title" />
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label control-label-1">District</label>
                        <select class="form-control" name="district" id="selectDistrict">
                            <option value="">None</option>
                            <option value="CaMaNaVa">CaMaNaVa</option>
                            <option value="Manila">Manila</option>
                            <option value="MuntiParLasTaPat">MuntiParLasTaPat</option>
                            <option value="PaMaMariSan">PaMaMariSan</option>
                            <option value="Pasay-Makati">Pasay-Makati</option>
                            <option value="Quezon City">Quezon City</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label control-label-1">City</label>
                        <select class="form-control" name="city" id="selectCity">
                            <option value="">None</option>
                            <option value="Caloocan City">Caloocan City</option>
                            <option value="Malabon City">Malabon City</option>
                            <option value="Navotas City">Navotas City</option>
                            <option value="Valenzuela City">Valenzuela City</option>
                            <option value="Manila">Manila</option>
                            <option value="Las Piñas City">Las Piñas City</option>
                            <option value="Muntinlupa City">Muntinlupa City</option>
                            <option value="Parañaque City">Parañaque City</option>
                            <option value="Taguig City">Taguig City</option>
                            <option value="Mandaluyong City">Mandaluyong City</option>
                            <option value="Marikina City">Marikina City</option>
                            <option value="Pasig City">Pasig City</option>
                            <option value="San Juan City">San Juan City</option>
                            <option value="Makati City">Makati City</option>
                            <option value="Pasig City">Pasig City</option>
                            <option value="Quezon City">Quezon City</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label control-label-1">Type of Scholarship</label>
                        <select class="form-control" name="scholarship_type">
                            <option value="">None</option>
                            <option value="STEP">STEP</option>
                            <option value="TWSP">TWSP</option>
                            <option value="PESFA">PESFA</option>
                            <option value="TTSP">TTSP</option>
                            <option value="UAQTEA">UAQTEA</option>
                            <option value="TSUPER Iskolar">TSUPER Iskolar</option>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label control-label-1">Name of TVI</label>
                        <input class="form-control" type="text" name="tvi" />
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label control-label-1">Year of Graduation</label>
                        <div>
                            <input class="form-check-input" type="radio" name="allocation" value="2023" />
                            <label class="form-label">2023</label>
                            <br />
                            <input class="form-check-input" type="radio" name="allocation" value="2024" />
                            <label class="form-label">2024</label>
                            <br />
                            <input class="form-check-input" type="radio" name="allocation" value="2025" />
                            <label class="form-label">2025</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Submit" role="button" />
                        <a class="btn btn-secondary" href="../records/index.php" role="button">Cancel</a>
                    </div>
                </form>
            </div>
            
        </main>
    </div>

    <!-- <?php include "../sections/footer.php"; ?> -->
    <script src="../wwwroot/lib/jquery/dist/jquery.min.js"></script>
    <script src="../wwwroot/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../wwwroot/js/script.js"></script>
    <script src="../wwwroot/js/records/create.js"></script>
</body>
</html>
<?php
    //for the meantime
?>