<?php
session_start();
include '../../connect.php';
if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
   
        <?php include '../components/header.php'; ?>
        
        <title>Deploy</title>
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
                                    <hr>
                                    <div class="title justify-content-center align-items-center mx-auto text-center">
                                        <h4 class="fs-4">
                                            SELECT SHORTLIST TITLE
                                        </h4>
                                    </div>
                                    <hr>
                                    <form action="" method="POST"><br>
                                        <label class="form-label"> Project Title </label>
                                        <center>
                                            <select class="form-select" name="shortlisttitle1del" required> ;
                                                <option value="">Select shortlist Name</option>
                                                <?php
                                                $resultpro = mysqli_query($link, "SELECT * FROM shortlist_details WHERE activity = 'ACTIVE' order by shortlistname ASC ");
                                                while ($rowpro = mysqli_fetch_assoc($resultpro)) { ?>
                                                    <option value="<?php echo $rowpro["shortlistname"] ?>"><?php echo $rowpro['shortlistname'] . '(' . $rowpro['project'] . ')' ?></option>';
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </center>
                                </div>
                                <div class="modal-footer mt-3">
                                    <input type="submit" name="addappdel1" value="Okay" class="btn btn-info">
                                </div>
                                </form>

                                <!-- If the button click, show this -->
                                <?php
                                if (isset($_POST['addappdel1'])) {
                                    $short1 = $_POST['shortlisttitle1del'];
                                    $_SESSION["data"] = $short1;
                                    $_SESSION["account"] = "recruitment";
                                    $data = $_SESSION["data"];
                                    $view = "Applicants Shortlisted on (" . $data . ")";
                                    $_SESSION["dataexport1"] = $data;
                                ?>

                                    <div class="modal fade" id="addtoshortlist" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Applicant to Shortlists</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-md-6 mb-3">
                                                        <input type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">
                                                    </div>
                                                    <form action="action.php" method="POST" class="form-group row">
                                                        <div class="col-md-6 form-check">
                                                            <input type="checkbox" name="select-all" id="select-all" class="form-check-input"> Select All
                                                        </div>
                                                        <table class="table" id="myTable" style="width:100%; font-size: 14px !important;">
                                                            <thead class="p-3">
                                                                <tr>
                                                                    <th>Select</th>
                                                                    <th>ID</th>
                                                                    <th>Name</th>
                                                                    <th>Birthday</th>
                                                                    <th>EWB Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <?php

                                                                    $query_employee = "SELECT * FROM employees";
                                                                    $result_employee = $link->query($query_employee);
                                                                    while ($row = mysqli_fetch_assoc($result_employee)) {
                                                                        $appno = $row['appno'];
                                                                        $user_id = $row["id"];
                                                                        $birth_date = $row['birthday'];
                                                                        $timestamp_birthdate = strtotime($birth_date);
                                                                        $formattedDate_birthdate = date("F d, Y", $timestamp_birthdate);

                                                                        $query_shortlist_master = "SELECT * FROM shortlist_master WHERE appnumto = '$appno' AND shortlistnameto = '$data'";
                                                                        $result_shortlist_master = $link->query($query_shortlist_master);

                                                                        if (mysqli_num_rows($result_shortlist_master) === 0) {
                                                                    ?>
                                                                            <td>
                                                                                <div class="col-md-6 form-check">
                                                                                    <input type="checkbox" name="user[]" class="form-check-input" value="<?php echo $appno ?>">
                                                                                </div>
                                                                            </td>
                                                                            <td><?php echo $row['id'] ?></td>
                                                                            <td><?php echo $row['lastnameko'] . ", " . $row['firstnameko'] . " " . $row['mnko'] ?></td>
                                                                            <td><?php echo $formattedDate_birthdate ?></td>
                                                                            <td><?php echo $row['ewb_status'] ?></td>
                                                                </tr>
                                                            </tbody>
                                                    <?php }
                                                                    } ?>
                                                        </table>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="add_to_shortlist" class="btn btn-primary">Add to Shortlist</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <hr>
                                    <div class="title justify-content-center align-items-center mx-auto text-center">
                                        <h4 class="fs-4">
                                            <?php echo $view ?>
                                        </h4>
                                    </div>
                                    <hr>

                                    <div class="col-md-6 mb-5">
                                        <button type="button" class="btn btn-primary mx-3" data-bs-toggle="modal" data-bs-target="#addtoshortlist" style="float: left !important;"><i class="bi bi-plus-circle-fill"></i> &nbsp;Add shortlist</button>
                                    </div>
                                    <br>
                                    <table id="example" class="table " style="width:100%;font-size:14 !important;">
                                        <thead>
                                            <tr>
                                                <th> ID </th>
                                                <th> Name </th>
                                                <th> SSS </th>
                                                <th> Pag-ibig </th>
                                                <th> Philhealth </th>
                                                <th> TIN </th>
                                                <th> PSA </th>
                                                <th> STATUS </th>
                                                <th> Action </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php

                                            $queryx1 = "SELECT * FROM shortlist_master WHERE shortlistnameto = '$data' AND is_deleted = '0'";
                                            $resultx1 = mysqli_query($link, $queryx1);

                                            while ($rowx1 = mysqli_fetch_assoc($resultx1)) {
                                                $app_num = $rowx1['appnumto'];

                                                $queryx1 = "SELECT * FROM employees WHERE appno = '$app_num'";
                                                $resultx = mysqli_query($link, $queryx1);
                                                while ($rowx = mysqli_fetch_assoc($resultx)) {
                                                    $police = $rowx['policed'];
                                                    $barangay = $rowx['brgyd'];
                                                    $nbi = $rowx['nbid'];
                                                    $timestamp_police = strtotime($police);
                                                    $timestamp_barangay = strtotime($barangay);
                                                    $timestamp_nbi = strtotime($nbi);
                                                    $formattedDate_police = date("F d, Y", $timestamp_police);
                                                    $formattedDate_barangay = date("F d, Y", $timestamp_barangay);
                                                    $formattedDate_nbi = date("F d, Y", $timestamp_nbi);
                                                    // or  $rowx["ewbdate"] != ''
                                                    if ($rowx['actionpoint'] == "DEPLOYED") { ?>
                                                        <tr>
                                                            <td> <?php echo $rowx['id'] ?> </td>
                                                            <td> <?php echo $rowx['lastnameko'] . ", " . $rowx['firstnameko'] . " " . $rowx['mnko'] ?> </td>
                                                            <td> <?php echo $rowx['sssnum'] ?> </td>
                                                            <td> <?php echo $rowx["pagibignum"] ?> </td>
                                                            <td> <?php echo $rowx["phnum"] ?> </td>
                                                            <td> <?php echo $rowx["tinnum"] ?> </td>
                                                            <td> <?php echo $rowx["psa"] ?> </td>
                                                            <td> <?php echo $rowx["ewb_status"] ?> </td>
                                                            <td>

                                                                <form action="" method="POST">
                                                                    <input type="hidden" name="shadowE1x" value="<?php echo $rowx["appno"] ?>">
                                                                    <input type="hidden" name="shadowE1" value="<?php echo $rowx["appno"] ?>">
                                                                    <?php
                                                                    $appno = $rowx["appno"];
                                                                    $resultcem = mysqli_query($link, "SELECT * FROM shortlist_master where appnumto = '$appno'");
                                                                    $corow = mysqli_num_rows($resultcem); ?>
                                                                    <input type="hidden" name="shad" value="<?php echo $corow ?>">

                                                                    <button type="submit" name="addtoewb" class="btn btn-info notification mt-1 mb-1 addtoewb" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Deploy">
                                                                        <i class="bi bi-layer-forward"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    } else { ?>
                                                        <tr>
                                                            <td><?php echo $rowx['id'] ?> </td>
                                                            <td> <?php echo $rowx['lastnameko'] . ", " . $rowx['firstnameko'] . " " . $rowx['mnko'] ?> </td>
                                                            <td><?php echo $rowx['sssnum'] ?> </td>
                                                            <td><?php echo $rowx["pagibignum"] ?> </td>
                                                            <td><?php echo $rowx["phnum"] ?> </td>
                                                            <td><?php echo $rowx["tinnum"] ?> </td>
                                                            <td><?php echo $rowx["psa"] ?> </td>
                                                            <td><?php echo $rowx["ewb_status"] ?> </td>
                                                            <td>

                                                                <form action="" method="POST">
                                                                    <input type="hidden" name="shadowE1x" value="<?php echo $rowx["appno"] ?>">
                                                                    <input type="hidden" name="appno_deploy" class="appno_deploy" id="appno_deploy" value="<?php echo $rowx["appno"] ?>">
                                                                    <?php
                                                                    $appno = $rowx["appno"];
                                                                    $resultcem = mysqli_query($link, "SELECT * FROM shortlist_master where appnumto = '$appno'");
                                                                    $corow = mysqli_num_rows($resultcem);
                                                                    ?>
                                                                    <input type="hidden" name="shad" value="<?php echo $corow ?>">
                                                                    <?php
                                                                    if ($rowx['ewb_status'] === 'VERIFIED') { ?>

                                                                        <button type="submit" name="addtoewb" class="btn btn-default notification mt-1 mb-1 addtoewb" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Deploy" style="visibility: hidden !important;">
                                                                            <i class="bi bi-layer-forward"></i>
                                                                        </button>
                                                                    <?php } else { ?>

                                                                        <?php
                                                                        if ($rowx['psa'] === '') { ?>
                                                                            <button type="button" name="editInfos" class="btn btn-success mt-1 mb-1 updateInfoBtn" data-bs-target="#updateInfoModal-<?php echo $rowx['id'] ?>" data-bs-toggle="modal" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Update Mandatory">
                                                                                <i class="bi bi-folder-plus"></i>
                                                                            </button>
                                                                        <?php } else { ?>
                                                                            <button type="submit" name="addtoewb" class="btn btn-primary notification mt-1 mb-1 addtoewb" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Deploy">
                                                                                <i class="bi bi-layer-forward"></i>
                                                                            </button>

                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </form>
                                                            </td>
                                                        <?php } ?>


                                                        <!-- Modal for Updating Employees' Information -->
                                                        <div class="modal fade" id="updateInfoModal-<?php echo $rowx['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <?php
                                                                        $fetch = "SELECT * FROM employees WHERE id = '" . $rowx['id'] . "'";
                                                                        $fetch_result = $link->query($fetch);
                                                                        while ($fetch_row = $fetch_result->fetch_assoc()) {
                                                                        ?>
                                                                            <div class="container">
                                                                                <div class="title">
                                                                                    <h2 class="fs-4 text-center mb-3"><?php echo $fetch_row['firstnameko'] . " " . $fetch_row['lastnameko'] ?>'s Details</h2>
                                                                                </div>
                                                                                <!-- <script>
            function validateForm() {
                var sssnum = document.getElementById('sssnum').value;
                var phnum = document.getElementById('phnum').value;
                var pagibignum = document.getElementById('pagibignum').value;
                var waiver = document.getElementById('waiver');
 
                console.log('SSS: ', sssnum);
                console.log('Pagibig: ', pagibignum);
                console.log('Philhealth: ', phnum);
                console.log('Waiver: ', waiver);
                // If both first name and last name are empty, make file input required
                if (sssnum.trim() === '' || phnum.trim()) {
                    // Check if file input is empty
                    if (!waiver.value) {
                        alert('File is required!');
                        return false; // Prevent form submission
                    }
                }

                // Continue with form submission if validation passes
                return true;
            }
        </script> -->
                                                                                <form action="action.php" method="POST" class="form-group" enctype="multipart/form-data" onsubmit="return validateForm();">
                                                                                    <input type="hidden" name="update_id" id="update_id" value="<?php echo $fetch_row['id'] ?>">
                                                                                    <div class="row mt-3">
                                                                                        <div class="col-md-2">
                                                                                            <label class="form-label">Last Name</label>
                                                                                        </div>
                                                                                        <div class="col-md-10">
                                                                                            <input type="text" name="lastnameko" value="<?php echo $fetch_row["lastnameko"] ?>" class="form-control">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mt-3">
                                                                                        <div class="col-md-2">
                                                                                            <label class="form-label">First Name:</label>
                                                                                        </div>
                                                                                        <div class="col-md-10">
                                                                                            <input type="text" name="firstnameko" value="<?php echo $fetch_row["firstnameko"] ?>" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row mt-3">
                                                                                        <div class="col-md-2">
                                                                                            <label class="form-label">Middle Name:</label>
                                                                                        </div>
                                                                                        <div class="col-md-10">
                                                                                            <input type="text`" name="mnko" value="<?php echo $fetch_row["mnko"] ?>" class="form-control">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mt-3">
                                                                                        <div class="col-md-2">
                                                                                            <label class="form-label">Extension Name:</label>
                                                                                        </div>
                                                                                        <div class="col-md-10">
                                                                                            <input type="text" name="extnname" value="<?php echo $fetch_row["extnname"] ?>" maxlength="5" class="form-control" placeholder="">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mt-3">
                                                                                        <div class="col-md-2">
                                                                                            <label class="form-label">Present Address:</label>
                                                                                        </div>
                                                                                        <div class="col-md-10">
                                                                                            <input type="text" name="paddress" value="<?php echo $fetch_row["paddress"] ?>" class="form-control">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mt-3">
                                                                                        <div class="col-md-2">
                                                                                            <label class="form-label">Region :</label>
                                                                                        </div>
                                                                                        <div class="col-md-10">
                                                                                            <select class="form-select cbo" name="regionn" id="regionn" data-placeholder="Select User type" required>
                                                                                                <option value="<?php echo $fetch_row['regionn'] ?>"><?php echo $fetch_row['regionn'] ?></option>
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
                                                                                                <option value="<?php echo $fetch_row['cityn'] ?>"><?php echo $fetch_row['cityn'] ?></option>
                                                                                                <!-- Options will be dynamically added by JavaScript -->
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="row mt-3">
                                                                                        <div class="col-md-2">
                                                                                            <label class="form-label">Permanent Address </label>
                                                                                        </div>
                                                                                        <div class="col-md-10">
                                                                                            <input type="text" name="peraddress" value="<?php echo  $fetch_row["peraddress"] ?>" class="form-control">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mt-3">
                                                                                        <div class="col-md-2">
                                                                                            <label class="form-label">Date of Birth </label>
                                                                                        </div>
                                                                                        <div class="col-md-10">
                                                                                            <input type="date" name="birthday" id="birthdate" onchange="calculateAge()" value="<?php echo $fetch_row["birthday"] ?>" class="form-control">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mt-3">
                                                                                        <div class="col-md-2">
                                                                                            <label class="form-label">Age </label>
                                                                                        </div>
                                                                                        <div class="col-md-10">
                                                                                            <input type="text" name="agen" id="agen" value="<?php echo $fetch_row["age"] ?>" class="form-control" placeholder="" readonly>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mt-3">
                                                                                        <div class="col-md-2">
                                                                                            <label class="form-label">Gender </label>
                                                                                        </div>
                                                                                        <div class="col-md-10">
                                                                                            <select class="form-select cbo" name="gendern" value="<?php echo $fetch_row["gendern"] ?>" data-placeholder="Select Gendert ">
                                                                                                <option value="<?php echo $fetch_row["gendern"] ?>"><?php echo $fetch_row["gendern"] ?></option>
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
                                                                                            <select class="form-select cbo" name="civiln" value="<?php echo $fetch_row["civiln"] ?>" data-placeholder="" required>
                                                                                                <option value="<?php echo $fetch_row["civiln"] ?>"><?php echo $fetch_row["civiln"] ?></option>
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
                                                                                            <label class="form-label">Cellphone Number </label>
                                                                                        </div>
                                                                                        <div class="col-md-10">
                                                                                            <input type="text" name="cpnum" value="<?php echo $fetch_row["cpnum"] ?>" maxlength="14" oninput="formatContactNumber(this)" class="form-control" placeholder="">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mt-3">
                                                                                        <div class="col-md-2">
                                                                                            <label class="form-label">landline </label>
                                                                                        </div>
                                                                                        <div class="col-md-10">
                                                                                            <input type="text" name="landline" value="<?php echo $fetch_row["landline"] ?>" class="form-control" placeholder="">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mt-3">
                                                                                        <div class="col-md-2">
                                                                                            <label class="form-label">Email Address </label>
                                                                                        </div>
                                                                                        <div class="col-md-10">
                                                                                            <input type="text" name="emailadd" value="<?php echo $fetch_row["emailadd"] ?>" class="form-control" placeholder="">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mt-3">
                                                                                        <div class="col-md-2">
                                                                                            <label class="form-label">Desired Position </label>
                                                                                        </div>

                                                                                        <div class="col-md-10">
                                                                                            <select class="form-select cbo" name="despo" value="<?php echo $fetch_row["despo"] ?>" data-placeholder="">
                                                                                                <option value="<?php echo $fetch_row["despo"] ?>"><?php echo $fetch_row["despo"] ?></option>
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
                                                                                            <select class="form-select cbo" name="classn" value="<?php echo $fetch_row["classn"] ?>" data-placeholder="" required>
                                                                                                <option value="<?php echo $fetch_row["classn"] ?>"><?php echo $fetch_row["classn"] ?></option>
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
                                                                                            <select class="form-select cbo" name="idenn" value="<?php echo $fetch_row["idenn"] ?>" data-placeholder="" required>
                                                                                                <option value="<?php echo $fetch_row['idenn'] ?>"><?php echo $fetch_row['idenn'] ?></option>
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
                                                                                            <input type="text" name="sssnum" id="sssnum" maxlength="10" minlength="10" class="form-control" value="<?php echo $fetch_row['sssnum']?>">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mt-3">
                                                                                        <div class="col-md-2">
                                                                                            <label class="form-label">PAG-IBIG:</label>
                                                                                        </div>

                                                                                        <div class="col-md-10">
                                                                                            <input type="text" name="pagibignum" id="pagibignum" maxlength="12" minlength="12" class="form-control" value="<?php echo $fetch_row['pagibignum']?>">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mt-3">
                                                                                        <div class="col-md-2">
                                                                                            <label class="form-label">PHILHEALTH:</label>
                                                                                        </div>

                                                                                        <div class="col-md-10">
                                                                                            <input type="text" name="phnum" id="phnum" maxlength="12" minlength="12" class="form-control" value="<?php echo $fetch_row['phnum']?>">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mt-3">
                                                                                        <div class="col-md-2">
                                                                                            <label class="form-label">TIN:</label>
                                                                                        </div>

                                                                                        <div class="col-md-10">
                                                                                            <input type="text" name="tinnum" maxlength="12" minlength="12" value="<?php echo $fetch_row["tinnum"] ?>" class="form-control" value="<?php echo $fetch_row['tinnum']?>">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mt-3">
                                                                                        <div class="col-md-2">
                                                                                            <label class="form-label">POLICE:</label>
                                                                                        </div>

                                                                                        <div class="col-md-10">
                                                                                            <input type="date" name="policed" value="<?php echo $fetch_row["policed"] ?>" class="form-control">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mt-3">
                                                                                        <div class="col-md-2">
                                                                                            <label class="form-label">BRGY:</label>
                                                                                        </div>

                                                                                        <div class="col-md-10">
                                                                                            <input type="date" name="brgyd" value="<?php echo $fetch_row["brgyd"] ?>" class="form-control">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mt-3">
                                                                                        <div class="col-md-2">
                                                                                            <label class="form-label">NBI:</label>
                                                                                        </div>

                                                                                        <div class="col-md-10">
                                                                                            <input type="date" name="nbid" value="<?php echo $fetch_row["nbid"] ?>" class="form-control">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mt-3">
                                                                                        <div class="col-md-2">
                                                                                            <label class="form-label">PSA:</label>
                                                                                        </div>

                                                                                        <div class="col-md-10">
                                                                                            <select class="form-select cbo" name="psa" value="<?php echo $fetch_row["psa"] ?>" data-placeholder="" required> ;
                                                                                                <option value="<?php echo $fetch_row["psa"] ?>"><?php echo $fetch_row["psa"] ?></option>
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
                                                                                            <input type="text" name="e_person" value="<?php echo $fetch_row["e_person"] ?>" class="form-control" required>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mt-3">
                                                                                        <div class="col-md-2">
                                                                                            <label class="form-label">Emergency Contact Address:</label>
                                                                                        </div>

                                                                                        <div class="col-md-10">
                                                                                            <input type="text" name="e_address" value="<?php echo $fetch_row["e_address"] ?>" class="form-control" required>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mt-3">
                                                                                        <div class="col-md-2">
                                                                                            <label class="form-label">Emergency Contact Number</label>
                                                                                        </div>

                                                                                        <div class="col-md-10">
                                                                                            <input type="text" name="e_contact" value="<?php echo $fetch_row["e_number"] ?>" class="form-control" required>
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="row mt-3 mb-5">
                                                                                        <div class="col-md-2">
                                                                                            <label class="form-label">REMARKS</label>
                                                                                        </div>

                                                                                        <div class="col-md-10">
                                                                                            <input type="text" name="remarks" value="<?php echo $fetch_row["remarks"] ?>" class="form-control" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row mt-3 mb-5">
                                                                                        <div class="col-md-2">
                                                                                            <label class="form-label">WAIVER</label>
                                                                                        </div>

                                                                                        <div class="col-md-10">
                                                                                            <input type="file" name="waiver" id="waiver" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <button class="btn btn-outline-primary" id="submit_update" name="submit_update">Update</button>
                                                                                    </div>

                                                                                </form>
                                                                            </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </tr>
                                                <?php

                                                }
                                            }
                                                ?>
                                        </tbody>
                                    </table>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
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