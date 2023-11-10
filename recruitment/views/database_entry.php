<?php
session_start();
include '../../connect.php';
if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>
        <title>Database Entry</title>
    </head>

    <body>

        <body>
            <?php
            if (isset($_SESSION['successMessage'])) { ?>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: "<?php echo $_SESSION['successMessage']; ?>",
                    })
                </script>
            <?php unset($_SESSION['successMessage']);
            } ?>

            <?php
            if (isset($_SESSION['errorMessage'])) { ?>
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: "<?php echo $_SESSION['errorMessage']; ?>",
                    })
                </script>
            <?php unset($_SESSION['errorMessage']);
            }
            ?>
            <?php
            if (isset($_SESSION['warningMessage'])) { ?>
                <script>
                    Swal.fire({
                        icon: 'warning',
                        title: "<?php echo $_SESSION['warningMessage']; ?>",
                    })
                </script>
            <?php unset($_SESSION['warningMessage']);
            }
            ?>


            <div class="body5010p" id="my_camera" style="z-index: 1;"></div>

            <div class="layout-wrapper layout-content-navbar">
                <div class="layout-container">
                    <?php include '../components/sidebar.php'; ?>

                    <!-- Main page -->
                    <div class="layout-page">
                        <?php include '../components/navbar.php'; ?>

                        <!-- Content -->
                        <div class="content-wrapper mt-2">
                            <div class="container">
                                <div class="card">
                                    <div class="container">
                                        <?php
                                        if (isset($_POST['database_entry']) && isset($_SESSION["photoko"]) || empty($_SESSION["photoko"])) {
                                            $_SESSION['warningMessage'] = "Take Photo First!";
                                            echo '<script>window.location.href = "take_photo.php";</script>';
                                        } else {
                                            $resulttracking = mysqli_query($link, "SELECT * FROM track WHERE id = '1'");
                                            while ($rowtr = mysqli_fetch_array($resulttracking))
                                                $newtracking = $rowtr[1] + 1;
                                            mysqli_query($link, "UPDATE track SET appno = '$newtracking' WHERE id = '1'");
                                            date_default_timezone_set('Asia/Manila');
                                            $datenow = date('Y-m-d H:i:s');
                                        ?>
                                            <form action="action.php" method="POST">
                                                <div class="">
                                                    <center>
                                                        <img src="<?php echo $_SESSION["photoko"] ?>" alt="" style="width:200px;height:200px;">
                                                    </center>
                                                </div>

                                                <div class="row mt-5">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Date Applied</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" name="dapplied" class="form-control" value="<?php echo $datenow ?>" readonly>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Applicant Number</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" name="appnoko" value="<?php echo $newtracking ?>" class="form-control" readonly>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Source</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <select class="form-select cbo" name="source" data-placeholder="Select Source" required>
                                                            <option value="" disabled selected>Select Source</option>
                                                            <?php
                                                            $results = mysqli_query($link, "SELECT * FROM sources");
                                                            while ($rows = mysqli_fetch_assoc($results)) { ?>
                                                                <option value="<?php echo $rows['description'] ?>"><?php echo $rows['description'] ?></option>' ;
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Last Name</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" name="lastnameko" class="form-control" placeholder="" required>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">First Name</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" name="firstnameko" class="form-control" placeholder="" required>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Middle Name</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text`" name="mnko" class="form-control" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Extension Name</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" name="extnname" maxlength="5" class="form-control" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Present Address</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" name="paddress" class="form-control" placeholder="" required>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Region</label>
                                                    </div>


                                                    <div class="col-md-10">
                                                        <select class="form-select cbo" name="regionn" id="regionn" data-placeholder="Select User type">
                                                            <option value="" selected disabled>Select Region</option>
                                                            <?php
                                                            $resultrg = mysqli_query($link, "SELECT * FROM region");
                                                            while ($rowrg = mysqli_fetch_assoc($resultrg)) {
                                                            ?>
                                                                <option value="<?php echo $rowrg['regCode'] ?>"><?php echo $rowrg['regDesc'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">City </label>
                                                    </div>


                                                    <div class="col-md-10">
                                                        <select class="form-select" name="cityn" id="cityn" data-placeholder="Select City"></select>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Permanent Address </label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" name="peraddress" class="form-control" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Date of Birth</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="date" name="birthday" id="birthdate" onchange="calculateAge()" class="form-control" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Age</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" name="age" id="age" class="form-control" placeholder="" readonly>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Gender </label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <select class="form-select cbo" name="gendern" data-placeholder="Select Gendert ">
                                                            <option>Select Gender</option>
                                                            <?php
                                                            $resultg = mysqli_query($link, "SELECT * FROM gender");
                                                            while ($rowg = mysqli_fetch_assoc($resultg)) {
                                                            ?>
                                                                <option value="<?php echo $rowg['gender'] ?>"><?php echo $rowg['gender'] ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Civil Statuss </label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <select class="form-select cbo" name="civiln" onchange="myFunction_focusout()" data-placeholder="">
                                                            <option>Select Civil Status:</option>
                                                            <?php
                                                            $resultt = mysqli_query($link, "SELECT * FROM tax_status");
                                                            while ($rowtt = mysqli_fetch_assoc($resultt)) {
                                                            ?>
                                                                <option value="<?php echo $rowtt['description'] ?>"><?php echo $rowtt['description'] ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Cellphone Number </label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" name="cpnum" class="form-control" maxlength="14" oninput="formatContactNumber(this)" placeholder="e.g. 0912-345-6789">
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">landline </label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" name="landline" class="form-control" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Email Address
                                                    </div></label>
                                                    <div class="col-md-10">
                                                        <input type="text" name="emailadd" class="form-control" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Desired Position </label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <select class="form-select cbo" name="despo" data-placeholder="">
                                                            <option>Select job title:</option>
                                                            <?php
                                                            $resultjt = mysqli_query($link, "SELECT * FROM job_title ");
                                                            while ($rowjt = mysqli_fetch_assoc($resultjt)) {
                                                            ?>
                                                                <option value="<?php echo $rowjt['description'] ?>"><?php echo $rowjt['description'] ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Classification of Applicant </label>
                                                    </div>

                                                    <div class="col-md-10">
                                                        <select class="form-select cbo" name="classn" data-placeholder="">
                                                            <option>Select Classification:</option> ' ;
                                                            <?php
                                                            $resultc = mysqli_query($link, "SELECT * FROM classifications");
                                                            while ($rowc = mysqli_fetch_assoc($resultc)) {
                                                            ?>
                                                                <option value="<?php echo $rowc['description'] ?>"><?php echo $rowc['description'] ?> </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Identification Marks </label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <select class="form-select cbo" name="idenn" data-placeholder="">
                                                            <option>Select Identification Marks:</option>
                                                            <?php
                                                            $resultide = mysqli_query($link, "SELECT * FROM distinguishing_qualification_marks");
                                                            while ($rowider = mysqli_fetch_assoc($resultide)) {
                                                            ?>
                                                                <option value="<?php echo $rowider['description'] ?>"><?php echo $rowider['description'] ?> </option> ' ;
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">SSS</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="number" name="sssnum" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==10) return false;" class="form-control" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Pag-IBIG</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="number" name="pagibignum" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==12) return false;" class="form-control" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">PhilHealth</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="number" name="phnum" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==12) return false;" class="form-control" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">TIN</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="number" name="tinnum" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==12) return false;" class="form-control" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">POLICE</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="date" name="policed" class="form-control" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">BRGY</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="date" name="brgyd" class="form-control" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">NBI</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="date" name="nbid" class="form-control" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">PSA</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <select class="form-select cbo" name="psa" data-placeholder="" required>
                                                            <option selected disabled value="">Select One:</option>
                                                            <option value="With">With</option>
                                                            <option value="Without">Without</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Emergency Contact Person</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" name="e_person" value="" class="form-control" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Emergency Contact Address</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" name="e_address" value="" class="form-control" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">Emergency Contact Number</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" name="e_contact" value="" class="form-control" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-md-2">
                                                        <label class="form-label">REMARKS</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input type="text" name="remarks" class="form-control" placeholder="">
                                                    </div>
                                                </div>

                                                <center>
                                                    <div class="col-md-6 mt-5 mb-5">
                                                        <input type="submit" name="next" value="Save" class="btn btn-info">
                                                    </div>
                                                </center>
                                            </form>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function formatContactNumber(input) {
                    // Remove any non-numeric characters
                    const numericOnly = input.value.replace(/\D/g, '');

                    // Check if the number starts with "09"
                    if (/^09/.test(numericOnly)) {
                        // Format the number with dashes
                        const formattedNumber = numericOnly.replace(/(\d{4})(\d{3})(\d{4})/, '$1-$2-$3');

                        // Update the input value
                        input.value = formattedNumber;
                    }
                }
            </script>
            <?php include '../components/footer.php'; ?>
        </body>

    </html>

<?php
} else {
    header("Location: ../../index.php");
    session_destroy();
    exit(0);
}
?>