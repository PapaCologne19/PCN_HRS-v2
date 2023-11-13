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

                                    <table class="table" id="example">
                                        <thead>
                                            <tr>
                                                <th>Applicant Name</th>
                                                <th>gender</th>
                                                <th>Age</th>
                                                <th>Contact Number</th>
                                                <th>Date Applied</th>
                                                <th>Resume</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
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
                                                    <td><?php echo $row['lastname'] . ", " . $row['firstname'] . " " . $row['middlename'] ?></td>
                                                    <td><?php echo $row['gender'] ?></td>
                                                    <td><?php echo $row['age'] ?></td>
                                                    <td><?php echo $row['mobile_number'] ?></td>
                                                    <td><?php echo $row['date_applied'] ?></td>
                                                    <td>
                                                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#viewResume-<?php echo $row['id']; ?>" title="View Resume" style="text-decoration: underline; box-shadow: none !important; outline: none !important;"><?php echo $row['resume_file'] ?></button>
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
                                                                    <iframe <?php echo 'src="../../../pcn_OLA/resumeStorage/' . $row['resume_file'] . '"'; ?> height="1000" width="100%"></iframe>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <td><?php echo $row['status'] ?></td>

                                                    <td>
                                                        <?php
                                                            if ($row['status'] === 'PENDING') {
                                                        ?>
                                                            <input type="hidden" class="exampleModalID" value="<?php echo $row['id'] ?>">
                                                            <button type="button" class="btn btn-primary btntooltips exampleModal" title="Screening"><i class="bi bi-telephone"></i></button>
                                                            <button class="btn btn-danger">Reject</button>
                                                        <?php 
                                                            } elseif ($row['status'] === 'NOT QUALIFIED' && empty($row['project_status'])) { 
                                                        ?>
                                                            <input type="hidden" class="editID" value="<?php echo $row['id'] ?>">
                                                            <button type="button" class="btn btn-info editBtn">Edit</button>
                                                        <?php 
                                                            } elseif ($row['status'] === 'QUALIFIED' && empty($row['project_status'])) { 
                                                        ?>
                                                            <input type="hidden" class="editID" value="<?php echo $row['id'] ?>">
                                                            <button type="button" class="btn btn-info editBtn">Edit</button>
                                                        <?php 
                                                            } 
                                                        ?>
                                                    </td>
                                                <?php } ?>
                                            </tr>
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