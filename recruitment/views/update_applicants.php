<?php
session_start();
include '../../connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/header.php'; ?>
    <title>Update Applicants</title>
</head>

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
                                if (isset($_POST['Editbtn'])) {
                                    $id = $link->real_escape_string($_POST['shadowE']);
                                    $resulted = mysqli_query($link, "SELECT * FROM employees WHERE id = '$id'");
                                    while ($rowed = mysqli_fetch_assoc($resulted)) { ?>
                                        <form action="action.php" method="POST">
                                            <center>
                                                <img src="<?php echo $rowed["photopath"] ?>" alt="" class="img-circle" style="width:200px;height:200px;">
                                            </center>

                                            <div class="row mt-5">
                                                <div class="col-md-2">
                                                    <label class="form-label">Sources :</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <select class="form-select" name="source" value="<?php echo $rowed["source"] ?>" data-placeholder="Select Source">
                                                        <option value="<?php echo $rowed["source"] ?>"><?php echo $rowed["source"] ?></option>
                                                        <?php
                                                        $results = mysqli_query($link, "SELECT * FROM sources");
                                                        while ($rows = mysqli_fetch_assoc($results)) {
                                                        ?>
                                                            <option value="<?php echo $rows["description"] ?>"><?php echo $rows["description"] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">Last Name</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" name="lastnameko" value="<?php echo $rowed["lastnameko"] ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">First Name:</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" name="firstnameko" value="<?php echo $rowed["firstnameko"] ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">Middle Name:</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text`" name="mnko" value="<?php echo $rowed["mnko"] ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">Extension Name:</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" name="extnname" value="<?php echo $rowed["extnname"] ?>" maxlength="5" class="form-control" placeholder="">
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">Present Address:</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" name="paddress" value="<?php echo $rowed["paddress"] ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">Region :</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <select class="form-select cbo" name="regionn" id="regionn" data-placeholder="Select User type" required>
                                                        <option value="<?php echo $rowed['regionn']?>"><?php echo $rowed['regionn']?></option>
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
                                                    <label class="form-label">City : </label>
                                                </div>
                                                <div class="col-md-10">
                                                    <select class="form-select" name="cityn" id="cityn" data-placeholder="Select City"> 
                                                        <option value="<?php echo $rowed['cityn']?>"><?php echo $rowed['cityn']?></option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">Permanent Address </label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" name="peraddress" value="<?php echo  $rowed["peraddress"] ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">Date of Birth </label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="date" name="birthday" id="birthdate" onchange="calculateAge()" value="<?php echo $rowed["birthday"] ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">Age </label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" name="agen" id="agen" value="<?php echo $rowed["age"] ?>" class="form-control" placeholder="" readonly>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">Gender </label>
                                                </div>
                                                <div class="col-md-10">
                                                    <select class="form-select cbo" name="gendern" value="<?php echo $rowed["gendern"] ?>" data-placeholder="Select Gendert ">
                                                        <option value="<?php echo $rowed["gendern"] ?>"><?php echo $rowed["gendern"] ?></option>
                                                        <?php
                                                        $resultg = mysqli_query($link, "SELECT * FROM gender");
                                                        while ($rowg = mysqli_fetch_array($resultg)) {
                                                        ?>
                                                            <option value="<?php echo $rowg[1] ?>"><?php echo $rowg[1] ?> </option> <?php }  ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">Civil Status </label>
                                                </div>
                                                <div class="col-md-10">
                                                    <select class="form-select cbo" name="civiln" value="<?php echo $rowed["civiln"] ?>" data-placeholder="">
                                                        <option value="<?php echo $rowed["civiln"] ?>"><?php echo $rowed["civiln"] ?></option>
                                                        <?php
                                                        $resultt = mysqli_query($link, "SELECT * FROM tax_status");
                                                        while ($rowtt = mysqli_fetch_array($resultt)) {
                                                        ?>
                                                            <option value="<?php echo $rowtt[2] ?>"><?php echo $rowtt[2] ?> </option> <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">Cell Phone Number </label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" name="cpnum" value="<?php echo $rowed["cpnum"] ?>" class="form-control" placeholder="">
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">landline </label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" name="landline" value="<?php echo $rowed["landline"] ?>" class="form-control" placeholder="">
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">Email Address </label>
                                                </div>
                                                <div class="col-md-10">
                                                    <input type="text" name="emailadd" value="<?php echo $rowed["emailadd"] ?>" class="form-control" placeholder="">
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">Desired Position </label>
                                                </div>

                                                <div class="col-md-10">
                                                    <select class="form-select cbo" name="despo" value="<?php echo $rowed["despo"] ?>" data-placeholder="">
                                                        <option value="<?php echo $rowed["despo"] ?>"><?php echo $rowed["despo"] ?></option>
                                                        <?php
                                                        $resultjt = mysqli_query($link, "SELECT * FROM job_title ");
                                                        while ($rowjt = mysqli_fetch_array($resultjt)) {
                                                        ?>
                                                            <option value="<?php echo $rowjt[2] ?>"><?php echo $rowjt[2] ?> </option> <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">Classification of Applicant </label>
                                                </div>

                                                <div class="col-md-10">
                                                    <select class="form-select cbo" name="classn" value="<?php echo $rowed["classn"] ?>" data-placeholder="">
                                                        <option value="<?php echo $rowed["classn"] ?>"><?php echo $rowed["classn"] ?></option>
                                                        <?php $resultca = mysqli_query($link, "SELECT * FROM classifications");
                                                        while ($rowca = mysqli_fetch_array($resultca)) { ?>
                                                            <option value="<?php echo $rowca[1] ?>"><?php echo $rowca[1] ?> </option> <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">Identification Marks </label>
                                                </div>

                                                <div class="col-md-10">
                                                    <select class="form-select cbo" name="idenn" value="<?php echo $rowed["idenn"] ?>" data-placeholder="">
                                                        <option value="<?php echo $rowed['idenn'] ?>"><?php echo $rowed['idenn'] ?></option>
                                                        <?php
                                                        $resultide = mysqli_query($link, "SELECT * FROM distinguishing_qualification_marks");
                                                        while ($rowider = mysqli_fetch_array($resultide)) {
                                                        ?>
                                                            <option value="<?php echo $rowider[1] ?>"><?php echo $rowider[1] ?> </option> <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">SSS:</label>
                                                </div>

                                                <div class="col-md-10">
                                                    <input type="text" name="sssnum" value="<?php echo $rowed["sssnum"] ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">PAG-IBIG:</label>
                                                </div>

                                                <div class="col-md-10">
                                                    <input type="text" name="pagibignum" value="<?php echo $rowed["pagibignum"] ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">PHILHEALTH:</label>
                                                </div>

                                                <div class="col-md-10">
                                                    <input type="text" name="phnum" value="<?php echo $rowed["phnum"] ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">TIN:</label>
                                                </div>

                                                <div class="col-md-10">
                                                    <input type="text" name="tinnum" value="<?php echo $rowed["tinnum"] ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">POLICE:</label>
                                                </div>

                                                <div class="col-md-10">
                                                    <input type="date" name="policed" value="<?php echo $rowed["policed"] ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">BRGY:</label>
                                                </div>

                                                <div class="col-md-10">
                                                    <input type="date" name="brgyd" value="<?php echo $rowed["brgyd"] ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">NBI:</label>
                                                </div>

                                                <div class="col-md-10">
                                                    <input type="date" name="nbid" value="<?php echo $rowed["nbid"] ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">PSA:</label>
                                                </div>

                                                <div class="col-md-10">
                                                    <select class="form-select cbo" name="psa" value="<?php echo $rowed["psa"] ?>" data-placeholder=""> ;
                                                        <option value="<?php echo $rowed["psa"]?>"><?php echo $rowed["psa"]?></option>
                                                        <option value="With">With</option>
                                                        <option value="Without">Without</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">Emergency Contact Person:</label>
                                                </div>

                                                <div class="col-md-10">
                                                    <input type="text" name="e_person" value="<?php echo $rowed["e_person"] ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">Emergency Contact Address:</label>
                                                </div>

                                                <div class="col-md-10">
                                                    <input type="text" name="e_address" value="<?php echo $rowed["e_address"] ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-md-2">
                                                    <label class="form-label">Emergency Contact Number:</label>
                                                </div>

                                                <div class="col-md-10">
                                                    <input type="text" name="e_contact" value="<?php echo $rowed["e_number"] ?>" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row mt-3 mb-5">
                                                <div class="col-md-2">
                                                    <label class="form-label">REMARKS:</label>
                                                </div>

                                                <div class="col-md-10">
                                                    <input type="text" name="remarks" value="<?php echo $rowed["remarks"] ?>" class="form-control">
                                                </div>
                                            </div>

                                            <input type="hidden" name="shadowEdit" value="<?php echo $rowed["id"] ?>" class="form-control">
                                            <button <input type="submit" name="updateit" value="" class="btn btn-info mb-5" style="vertical-align:middle">Update It</button>
                                            <a href="applicant.php" name="Cancel" value="" class="btn btn-dark mb-5" style="vertical-align:middle">Cancel</a>
                                        </form>
                                <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../components/footer.php'; ?>
</body>

</html>