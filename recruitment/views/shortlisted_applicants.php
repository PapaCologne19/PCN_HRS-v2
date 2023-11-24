<?php
session_start();
include '../../connect.php';
if (isset($_SESSION['username'], $_SESSION['password'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../components/header.php'; ?>
        <title>List of Applicants</title>

        <style>
            .contain {
                display: grid;
                grid-template-columns: 0fr 0fr;
                grid-template-rows: 0fr 0fr;
                gap: 5px;
                margin: 0 auto;
            }

            .columns {
                box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
            }
        </style>
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
                    <div class="content-wrapper mt-1">
                        <div class="container">
                            <div class="card">
                                <div class="container">
                                    <hr>
                                    <div class="title justify-content-center align-items-center mx-auto text-center">
                                        <h4 class="fs-4">
                                            List of Applicants
                                        </h4>
                                    </div>
                                    <hr>
                                    <div class="container mt-4 mb-4">
                                        <button type="button" class="btn btn-dark" title="Add Applicants to Shortlist" data-bs-toggle="modal" data-bs-target="#addApplicantsToShortlist">Add</button>
                                    </div>
                                    <table class="table" id="example">
                                        <thead>
                                            <tr>
                                                <th>Applicant Name</th>
                                                <th>gender</th>
                                                <th>Age</th>
                                                <th>Contact Number</th>
                                                <th>Location</th>
                                                <th>Date Applied</th>
                                                <th>Resume</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $id = $_GET['id'];
                                            $query = "SELECT applicant.*, project.*, resume.*, DATE_FORMAT(resume.date_applied, '%M %d, %Y') as date_applied
                                                    FROM applicant applicant, projects project, applicant_resume resume
                                                    WHERE applicant.id = resume.applicant_id 
                                                    AND project.id = resume.project_id 
                                                    AND project.id = '$id'";
                                            $result = $link->query($query);
                                            while ($row = $result->fetch_assoc()) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $row['lastname'] . ", " . $row['firstname'] . " " . $row['middlename'] ?></td>
                                                    <td><?php echo $row['gender'] ?></td>
                                                    <td><?php echo $row['age'] ?></td>
                                                    <td><?php echo $row['mobile_number'] ?></td>
                                                    <td><?php echo $row['present_address'] . ", " . $row['city']; ?></td>
                                                    <td><?php echo $row['date_applied'] ?></td>
                                                    <td>
                                                        <?php
                                                        $resumeFilePath = "../../../pcn_OLA/" . $row['resume_path'] . "/Requirements/" . $row['resume_file'];
                                                        $fileExtension = pathinfo($resumeFilePath, PATHINFO_EXTENSION);

                                                        if (strtolower($fileExtension) === 'pdf') {
                                                            // Display in modal using iframe
                                                            echo '<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#viewResume-' . $row['id'] . '" title="View Resume" style="text-decoration: underline; box-shadow: none !important; outline: none !important;">' . $row['resume_file'] . '</button>';
                                                        } else {
                                                            // Download link
                                                            echo '<a href="' . $resumeFilePath . '" download="' . $row['resume_file'] . '" class="btntooltips" title="Download Resume" style="text-decoration: underline; color: #83A2FF;">' . $row['resume_file'] . '</a>';
                                                        }
                                                        ?>
                                                    </td>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="viewResume-<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">RESUME ATTACHED</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <?php
                                                                    if (strtolower($fileExtension) === 'pdf') {
                                                                        // Display PDF in iframe
                                                                        echo '<iframe src="' . $resumeFilePath . '" height="1000" width="100%"></iframe>';
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- End of Modal -->


                                                    <td><?php echo $row['status'] ?></td>

                                                    <td>
                                                        <?php
                                                        if ($row['status'] === 'PENDING' || $row['status'] === 'FOR SCREENING') {
                                                        ?>

                                                            <div class="contain">
                                                                <div class="columns">
                                                                    <input type="hidden" class="exampleModalID resume_id" value="<?php echo $row['id'] ?>">
                                                                    <input type="hidden" class="exampleModalID mrf_id" value="<?php echo $_GET['id'] ?>">
                                                                    <button type="button" class="btn btn-sm btn-primary btntooltips exampleModal" title="Screening"><i class="bi bi-telephone"></i></button>
                                                                </div>
                                                                <div class="columns">
                                                                    <input type="hidden" class="exampleModalID resume_id" value="<?php echo $row['id'] ?>">
                                                                    <input type="hidden" class="exampleModalID mrf_id" value="<?php echo $_GET['id'] ?>">
                                                                    <button class="btn btn-sm btn-danger btnRejectShortlistedApplicant">Reject</button>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        } elseif ($row['status'] === 'NOT QUALIFIED' && empty($row['project_status'])) {
                                                        ?>
                                                            <input type="hidden" class="editID" value="<?php echo $row['id'] ?>">
                                                            <button type="button" class="btn btn-sm btn-info editBtn">Edit</button>
                                                        <?php
                                                        } elseif ($row['status'] === 'QUALIFIED' && empty($row['project_status'])) {
                                                        ?>
                                                            <input type="hidden" class="editID" value="<?php echo $row['id'] ?>">
                                                            <button type="button" class="btn btn-sm btn-info editBtn">Edit</button>
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>

                                            <?php } ?>
                                        </tbody>
                                    </table>


                                    <!-- Modal for Screening -->
                                    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal for Editing Screening -->
                                    <div class="modal fade" id="editBtn" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal for Adding Applicants in Shortlisting -->
                                    <div class="modal fade" id="addApplicantsToShortlist" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <form action="action.php" method="POST" class="form-group row" enctype="multipart/form-data">
                                                            <?php
                                                            $job_id = $_GET['id'];
                                                            ?>
                                                            <input type="hidden" name="job_id" value="<?php echo $job_id ?>">
                                                            <div class="col-md-12">
                                                                <label for="source" class="form-label">Source</label>
                                                                <input list="sources" name="source" id="source" class="form-control">
                                                                <datalist id="sources">
                                                                    <option value="REFERRAL">REFERRAL</option>
                                                                    <option value="NON REFERRAL">NON REFERRAL</option>
                                                                </datalist>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="" class="form-label">Firstname</label>
                                                                <input type="text" name="firstname" id="firstname" class="form-control" required>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="" class="form-label">Middlename</label>
                                                                <input type="text" name="middlename" id="middlename" class="form-control">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="" class="form-label">Lastname</label>
                                                                <input type="text" name="lastname" id="lastname" class="form-control" required>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="" class="form-label">Extension Name</label>
                                                                <input type="text" name="extension_name" id="extension_name" class="form-control">
                                                            </div>
                                                            <div class="col-md-12 mt-1">
                                                                <label for="" class="form-label">Gender</label>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Male" required checked>
                                                                    <label class="form-check-label" for="gender">Male</label>
                                                                </div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="Female" required>
                                                                    <label class="form-check-label" for="gender">Female</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="" class="form-label">Civil Status</label>
                                                                <select name="civil_status" id="civil_status" class="form-select" required>
                                                                    <option value=""></option>
                                                                    <option value="Single">Single</option>
                                                                    <option value="Married">Married</option>
                                                                    <option value="Widowed">Widowed</option>
                                                                    <option value="Separated">Separated</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="" class="form-label">Mobile Number</label>
                                                                <input type="number" name="mobile_number" id="mobile_number" class="form-control" required>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="" class="form-label">Email Address</label>
                                                                <input type="email" name="email_address" id="email_address" class="form-control" required>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="" class="form-label">Birthday</label>
                                                                <input type="date" name="birthday" id="birthdate" onchange="calculateAge()" class="form-control" required>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="hidden" name="age" class="form-control" id="age">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="" class="form-label">Present Address</label>
                                                                <input type="text" name="address" id="address" class="form-control" required>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="" class="form-label">Region</label>
                                                                <select name="region" id="regionn" class="form-select" required>
                                                                    <option value=""></option>
                                                                    <?php
                                                                    $select_region = "SELECT * FROM region";
                                                                    $select_region_result = $link->query($select_region);
                                                                    while ($select_region_row = mysqli_fetch_assoc($select_region_result)) {
                                                                    ?>
                                                                        <option value="<?php echo $select_region_row['regCode'] ?>"><?php echo $select_region_row['regDesc'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="" class="form-label">City</label>
                                                                <select name="city" id="cityn" class="form-select">

                                                                </select>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="" class="form-label">Resume File</label>
                                                                <input type="file" name="resume_file" id="resume_file" class="form-control" required>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="create_shortlist_applicant">Submit</button>
                                                </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
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